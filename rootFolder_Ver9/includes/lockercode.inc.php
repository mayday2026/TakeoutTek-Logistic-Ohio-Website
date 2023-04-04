<?php

if (isset($_POST["place-order"])) {
    
  require_once "dbh.inc.php";
  require_once 'functions.inc.php';
  
  // First we get the form data from the URL
  session_start();
  $usersId = $_SESSION['userid'];

  // Then we run a bunch of error handlers to catch any user mistakes we can (you can add more than I did)
  // These functions can be found in functions.inc.php

  // If we get to here, it means there are no user errors
  
  //Assign a locker
    $locker = 0;
    $locker_available = assignLocker($conn, $usersId);
    
    if($locker_available == 3 || $locker_available == 1){
        $locker = 1;
        generateLocker($conn, $locker, $usersId);
        generateCode($conn, $usersId);
    }
    else if($locker_available == 2){
        $locker = 2;
        generateLocker($conn, $locker, $usersId);
        generateCode($conn, $usersId);
    }
    else{
        header("location: ../account.php?error=nolockersavaiable");
        exit();
    }
} else {
	header("location: ../account.php");
    exit();
}
