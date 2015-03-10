<?php
include("../connection.php");
$username = "";
$password = "";
$conpassword = "";
$email = "";

if (isset($_POST["username"]) && !empty($_POST["username"])) {
	$username = $_POST["username"];    
}
if (isset($_POST["password"]) && !empty($_POST["password"])) {

	$password = $_POST["password"];
}
if (isset($_POST["conpassword"]) && !empty($_POST["conpassword"])) {

	$conpassword = $_POST["conpassword"];
}
if (isset($_POST["email"]) && !empty($_POST["email"])) {

	$email = $_POST["email"];
}
$str = "";
if(checkUserData($username)) {
	insertIntoTuser($username,$password,$email);
	$str.=("<register>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Register Success.</reason>");
	$str.=("</register>");
	echo $str;

}
else {
	$str.=("<register>");
	$str.=("<result>N</result>");
	$str.=("<reason>Username is used.</reason>");
	$str.=("</register>");
	echo $str;

}

mysql_close();
function checkUserData($username) {
	$sql = "select username from tuser where username='$username';";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	if($uid!=null) {
		return false;
	}
	return true;
}
function insertIntoTuser($username,$password,$email) {
	$sql = "insert into tuser (username,password,email,usergrpid) values ('$username','$password','$email','3')";
	$insert = mysql_query($sql);
}
?>