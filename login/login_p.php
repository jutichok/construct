<?php
session_start();
include("../connection.php");
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

function checkUserData($username,$password) {
	$sql = "select userid,username,password from tuser where username='$username';";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	mysql_close();
	$usernamedb = "";
	$passworddb = "";
	if($uid!=null) {
		$usernamedb = $uid['username'];
		$passworddb = $uid['password'];
		$_SESSION['userid'] = $uid['userid'];
		$_SESSION['username'] = $uid['username'];
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