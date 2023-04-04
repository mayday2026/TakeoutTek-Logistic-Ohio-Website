<?php
$servername = "localhost";
$username = "id20316089_takeouttek";
$password = "HyvQ5tAgZyTZetZiy^%N";
$dbname = "id20316089_userinfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$verified_passwords_file = "verified_passwords.txt";

function record_verified_password($password) {
  global $verified_passwords_file;
  file_put_contents($verified_passwords_file, $password . PHP_EOL, FILE_APPEND | LOCK_EX);
}

function check_verified_password($password) {
  global $verified_passwords_file;
  $verified_passwords = file($verified_passwords_file, FILE_IGNORE_NEW_LINES);
  return in_array($password, $verified_passwords);
}

function remove_verified_password($password) {
  global $verified_passwords_file;
  $verified_passwords = file($verified_passwords_file, FILE_IGNORE_NEW_LINES);
  $updated_passwords = array_diff($verified_passwords, array($password));
  file_put_contents($verified_passwords_file, implode(PHP_EOL, $updated_passwords) . PHP_EOL);
}

function release_locker($conn, $input_password) {
  $sql = "UPDATE account SET locker_number = NULL, locker_code = NULL WHERE locker_code = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $input_password);
  $stmt->execute();
  $stmt->close();
}

if (isset($_POST['ESPpostData'])) {
  $input_password = $_POST['ESPpostData'];
  $delete_data = false;

  $sql = "SELECT locker_number FROM account WHERE locker_code = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $input_password);
  $stmt->execute();
  $stmt->bind_result($locker_number);

  if ($stmt->fetch()) {
    if (check_verified_password($input_password)) {
      $delete_data = true;
      remove_verified_password($input_password);
      
    } else {
      record_verified_password($input_password);
    }

    if ($locker_number == 1) {
    echo "1";
  } else if ($locker_number == 2) {
    echo "2";
  }
  } else {
    echo "0";
  }
  $stmt->close();
  
  if ($delete_data == true){
      release_locker($conn, $input_password);
  }



} else {
  echo "No Input.";
}

$conn->close();
?>