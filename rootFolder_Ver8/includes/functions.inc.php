<?php


//-------------------------------signup.php-----------------------------------------
// Check for empty input signup
function emptyInputSignup($username, $email, $pwd, $pwdRepeat) {
	$result;
	if (empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid username
function invalidUid($username) {
	$result;
	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check invalid email
function invalidEmail($email) {
	$result;
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if passwords matches
function pwdMatch($pwd, $pwdrepeat) {
	$result;
	if ($pwd !== $pwdrepeat) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Check if username is in database, if so then return data
function uidExists($conn, $username) {
  $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $username);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

// Check if email is in database, if so then return data
function emailExists($conn, $email) {
  $sql = "SELECT * FROM users WHERE usersEmail = ? or usersUid = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $email, $email);
	mysqli_stmt_execute($stmt);

	// "Get result" returns the results from a prepared statement
	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

// Insert new user into database
function createUser($conn, $username, $email, $pwd) {
  $sql = "INSERT INTO users (usersUid, usersEmail, usersPwd) VALUES (?, ?, ?);";

	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../signup.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header("location: ../login.php?signup=success");
	exit();
}

// Check for empty input login
function emptyInputLogin($username, $pwd) {
	$result;
	if (empty($username) || empty($pwd)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}

// Log user into website
function loginUser($conn, $username, $pwd) {
	$accountExists = uidExists($conn, $username);

	if ($accountExists === false) {
		header("location: ../login.php?error=incorrect-information");
		exit();
	}

	$pwdHashed = $accountExists["usersPwd"];
	$checkPwd = password_verify($pwd, $pwdHashed);  // return true if two passwords match

	if ($checkPwd === false) {
		header("location: ../login.php?error=incorrect-information");
		exit();
	}
	elseif ($checkPwd === true) {
		session_start();
		$_SESSION["userid"] = $accountExists["usersId"];
		$_SESSION["useruid"] = $accountExists["usersUid"];
		header("location: ../index.php?login=success");
		exit();
	}
}



//-------------------------------address.php-----------------------------------------
// Check for empty input address
function emptyInputAddress($address) {
	$result;
	if (empty($address)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


// Insert new address into database
function updateAddress($conn, $address, $usersId) {
    // Check if there is an address already
    $query = mysqli_query($conn, "SELECT account_address FROM account WHERE users_Id = '$usersId';");
	if (mysqli_num_rows($query) < 1) {
	    // if not, insert the new address
	 	$result = "INSERT INTO account (account_address, users_Id) VALUES(?, ?);";
    	$stmt = mysqli_stmt_init($conn);
    	if (!mysqli_stmt_prepare($stmt, $result)) {
    	 	header("location: ../address.php?error=insertfailed");
    		exit();
	    }
	    else{
        	mysqli_stmt_bind_param($stmt, "ss", $address, $usersId);
        	mysqli_stmt_execute($stmt);
        	mysqli_stmt_close($stmt);
        	mysqli_close($conn);
        	header("location: ../address.php?insertAddress=success");
        	exit();
	    }
	}
	else{
	    // if yes, update the address
        $sql = "UPDATE account SET account_address = ? WHERE users_Id = ?;";
    	$stmt = mysqli_stmt_init($conn);
    	if (!mysqli_stmt_prepare($stmt, $sql)) {
    	 	header("location: ../address.php?error=stmtfailed");
    		exit();
    	}else{
            mysqli_stmt_bind_param($stmt, "ss", $address, $usersId);
            mysqli_stmt_execute($stmt);
            header("location: ../address.php?changeAddress=success");
        }
	}
}



//-------------------------------password.php-----------------------------------------

// Check for empty input password
function emptyInputPwd($oldPwd, $newPwd, $newPwdRepeat) {
	$result;
	if (empty($oldPwd) || empty($newPwd) || empty($newPwdRepeat)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}



// Is the current password correct?
function checkOldPwd($oldPwd) {
	$result;
	$pwdInDB = "SELECT usersPwd FROM users WHERE users_Id = '$usersId';";
	
	if (password_verify($oldPwd, $pwdInDB)) {
		$result = true;
	}
	else {
		$result = false;
	}
	return $result;
}


// Update new password into database
function updatePwd($conn, $newPwd, $usersId) {
    
    $sql = "UPDATE users SET usersPwd = ? WHERE usersId = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
	 	header("location: ../password.php?error=stmtfailed");
		exit();
	}else{
	    $hashedPwd = password_hash($newPwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $usersId);
        mysqli_stmt_execute($stmt);
        header("location: ../password.php?changePassword=success");
    }
}














