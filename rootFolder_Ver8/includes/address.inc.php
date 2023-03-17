<?php


if (isset($_POST["address-save"])) {
    
  require_once "dbh.inc.php";
  require_once 'functions.inc.php';
  
  // First we get the form data from the URL
  session_start();
  $address = $_POST["accountAddress"];
  $usersId = $_SESSION['userid'];

  // Then we run a bunch of error handlers to catch any user mistakes we can (you can add more than I did)
  // These functions can be found in functions.inc.php



  // Left inputs empty
  // We set the functions "!== false" since "=== true" has a risk of giving us the wrong outcome
  if (emptyInputAddress($address) !== false) {
    header("location: ../address.php?error=emptyinput");
		exit();
  }

  // If we get to here, it means there are no user errors

  // Now we update the address from database
    updateAddress($conn, $address, $usersId);
  
  
} else {
	header("location: ../address.php");
    exit();
}
