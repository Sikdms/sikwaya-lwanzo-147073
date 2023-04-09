<?php

 session_start();

require_once "../config/dbConnect.php"; 

//sign up process

if (isset($_POST["signup"])){
	$firstname = mysqli_real_escape_string($dbConn, $_POST["firstname"]);
	$lastname = mysqli_real_escape_string($dbConn, $_POST["lastname"]);
	$othername = mysqli_real_escape_string($dbConn, $_POST["othername"]);
	$gender = mysqli_real_escape_string($dbConn, $_POST["gender"]);
	$dob = mysqli_real_escape_string($dbConn, $_POST["dob"]);
	$username = mysqli_real_escape_string($dbConn, $_POST["username"]);
	$email = mysqli_real_escape_string($dbConn, $_POST["email"]);
	$password = mysqli_real_escape_string($dbConn, $_POST["password"]);
	$passwordconf = mysqli_real_escape_string($dbConn, $_POST["passwordconf"]);
	$userType = mysqli_real_escape_string($dbConn, $_POST["userType"]);
	
	if($password != $passwordconf){
		header("Location: ../signup.php");
		exit();
	}
	$hash_password = password_hash($passwordconf, PASSWORD_DEFAULT);
	
	$user_insert= "INSERT INTO tbl_users(firstname,lastname,othername,gender,dob,username,email,password, userType, created)VALUES('$firstname','$lastname','$othername','$gender','$dob','$username','$email','$hash_password','$userType', UNIX_TIMESTAMP())";
	
	
	if($dbConn->query($user_insert) === TRUE){
		header("Location: ../Login.php");
		exit();
	}
	else{
		die("Failed to insert the record: " .$dbConn->error);
	}
	
}

//login process
 if(isset($_POST["Login"])){
	$entered_username = mysqli_real_escape_string($dbConn, $_POST["username"]);
	$entered_password = mysqli_real_escape_string($dbConn, $_POST["password"]);
	
	$spot_username = "SELECT*FROM tbl_users WHERE username = '$entered_username' LIMIT 1";
	
	$uName_res = $dbConn->query($spot_username);
	
	if($uName_res->num_rows > 0){
		$_SESSION["control"] = $uName_res->fetch_assoc();
		
		$stored_password = $_SESSION["control"]["password"];
		$userType = $_SESSION["control"]["userType"];
		
		if(password_verify($entered_password, $stored_password)){
	// die("$userType");
			if($userType == "farmer"){
			header("Location: ../farmer.php");
			exit();
			
		}elseif($userType == "admin"){	
			header("Location: ../admin.php");
			exit();
		
		}elseif($userType == "Client"){	
			header("Location: ../Client.php");
			exit();
		}else{
			unset($_SESSION["control"]);
			header("Location: ../Login.php");
			exit();
		
		}
	
	}else{
			
			header("Location: ../Login.php");
			exit();
		
		}

}else{
			
			header("Location: ../Login.php");
			exit();
		
		}
	
	}
	
	//logout process
	if(isset($_GET["logout"])){
		unset($_SESSION["control"]);
			header("Location: ../Login.php");      
			exit();
		
	}
	
	// Delete user process
	
	if(isset($_GET["DeleteUser"])){
	$DeleteUser = mysqli_real_escape_string($dbConn, $_GET["DeleteUser"]);
	
	$DeleteUser_SQL = "DELETE FROM tbl_users WHERE userId = '$DeleteUser' LIMIT 1";
	 
	$uDelete_res = $dbConn->query($DeleteUser_SQL);
	if($DeleteUser_SQL === TRUE){
		header("Location: ../admin/manageAccount.php");
			exit();
		
		}else{
		print $dbConn->error;
		header("Location: ../admin/manageAccount.php");
			exit();
	}
}

  //Update user process


if (isset($_POST["update"])){
	$firstname = mysqli_real_escape_string($dbConn, $_POST["firstname"]);
	$lastname = mysqli_real_escape_string($dbConn, $_POST["lastname"]);
	$othername = mysqli_real_escape_string($dbConn, $_POST["othername"]);
	$gender = mysqli_real_escape_string($dbConn, $_POST["gender"]);
	$dob = mysqli_real_escape_string($dbConn, $_POST["dob"]);
	$username = mysqli_real_escape_string($dbConn, $_POST["username"]);
	$email = mysqli_real_escape_string($dbConn, $_POST["email"]);
	$userId = mysqli_real_escape_string($dbConn, $_POST["userId"]);
	

	$user_update= "UPDATE tbl_users SET firstname ='$firstname',lastname ='$lastname',othername ='$othername',gender ='$gender',dob ='$dob',username ='$username',email ='$email' WHERE userId='$userId' LIMIT 1";
	
	
	if($dbConn->query($user_update) === TRUE){
		header("Location: ../admin/manageAccount.php");
		exit();
	}
	else{
		print $dbConn->error;
		
	
	}
	
}

 

?> 