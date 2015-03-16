<?php 
session_start();
include("../../connection.php");
$username = "";
$password = "";
if (isset($_POST["username"]) && !empty($_POST["username"])) {
	$username = $_POST["username"];    
}
if (isset($_POST["password"]) && !empty($_POST["password"])) {

	$password = $_POST["password"];
}

$str = "";
if(checkUserData($username,$password)) {
	$str.=("<login>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Login Success.</reason>");
	$str.=("</login>");
	echo $str;

}
else {
	$str.=("<login>");
	$str.=("<result>N</result>");
	$str.=("<reason>Username or Password is invalid.</reason>");
	$str.=("</login>");
	echo $str;
}
mysql_close();
function checkUserData($username,$password) {
	$sql = "SELECT userid,username,name,tug.groupname as role,password FROM tuser U inner join tusergrp tug on tug.groupid = U.usergrpid WHERE U.username = '$username' && password = '$password'";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	
	$usernamedb = "";
	$passworddb = "";
	if($uid!=null) {
		$usernamedb = $uid['username'];
		$passworddb = $uid['password'];
		$_SESSION['userid'] 	= $uid['userid'];
		$_SESSION['username'] 	= $uid['username'];
		$_SESSION['role'] 		= $uid['role'];
	}
	if(validateUserPassword($username,$password,$usernamedb,$passworddb)) {
		return true;
	}
	return false;
}


function validateUserPassword($username,$password,$usernamedb,$passworddb) {
	if($username != $usernamedb) {
		return false;
	}
	else if($password != $passworddb) {
		return false;
	}
	return true;
}
	
?>