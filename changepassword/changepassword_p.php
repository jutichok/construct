<?php
include("../connection.php");
$oldpassword = "";
$password = "";
$conpassword = "";
$userid = "";

if (isset($_POST["oldpassword"]) && !empty($_POST["oldpassword"])) {
	$oldpassword = $_POST["oldpassword"];    
}
if (isset($_POST["password"]) && !empty($_POST["password"])) {

	$password = $_POST["password"];
}
if (isset($_POST["conpassword"]) && !empty($_POST["conpassword"])) {

	$conpassword = $_POST["conpassword"];
}
if (isset($_POST["userid"]) && !empty($_POST["userid"])) {

	$userid = $_POST["userid"];
}
$str = "";
if(checkUserData($userid,$oldpassword)) {
	updatePassword($userid,$password);
	$str.=("<changepassword>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Change Password Success.</reason>");
	$str.=("</changepassword>");
	echo $str;

}
else {
	$str.=("<changepassword>");
	$str.=("<result>N</result>");
	$str.=("<reason>Invalid Password.</reason>");
	$str.=("</changepassword>");
	echo $str;
}
mysql_close();

function checkUserData($userid,$oldpassword) {
	$sql = "select password from tuser where userid='$userid';";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$passworddb = $uid['password'];
	if($oldpassword != $passworddb) {
		return false;
	}
	
	return true;
}
function updatePassword($userid,$password) {
	$sql = "update tuser set password='$password' where userid='$userid'";
	$update = mysql_query($sql);
}
?>