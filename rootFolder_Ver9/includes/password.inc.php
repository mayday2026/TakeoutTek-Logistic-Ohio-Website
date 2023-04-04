<?php

if (isset($_POST["pwd-save"])) {

  require_once "dbh.inc.php";
  require_once 'functions.inc.php';
  
  // First we get the form data from the URL
  session_start();
  $oldPwd = $_POST["oldPwd"];
  $newPwd = $_POST["newPwd"];
  $newPwdRepeat = $_POST["repeatNewPwd"];
  $usersId = $_SESSION['userid'];

  // Then we run a bunch of error handlers to catch any user mistakes we can (you can add more than I did)
  // These functions can be found in functions.inc.php



  // Left inputs empty
  // We set the functions "!== false" since "=== true" has a risk of giving us the wrong outcome
  if (emptyInputPwd($oldPwd, $newPwd, $newPwdRepeat) !== false) {
    header("location: ../password.php?error=emptyinput");
		exit();
  }
	// Is the current password correct?
  if (checkOldPwd($oldPwd) !== false) {
    header("location: ../password.php?error=wrongOldPwd");
		exit();
  }

  // Do the two passwords match?
  if (pwdMatch($newPwd, $newPwdRepeat) !== false) {
    header("location: ../password.php?error=passwordsdontmatch");
		exit();
  }

  
  // If we get to here, it means there are no user errors

  // Now we insert the user into the database
  updatePwd($conn, $newPwd, $usersId);
  
} else {
	header("location: ../password.php");
    exit();
}
