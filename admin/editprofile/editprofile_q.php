<?php
include("../../connection.php");

$userid = "";
$str = "";
$username ="";
if (isset($_POST["userid"]) && !empty($_POST["userid"])) {

	$userid = $_POST["userid"];
}

$str = queryData($userid);
echo $str;
mysql_close();


function queryData($userid) {
	$sql = "select username,email,name,tel,t.groupid as role from tuser inner join tusergrp t on t.groupid = usergrpid where userid='$userid';";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$username = $uid['username'];
	$email = $uid['email'];
	$name = $uid['name'];
	$tel = $uid['tel'];
	$role = $uid['role'];
	$xml = toXML($username,$email,$name,$tel,$role);
	return $xml;
}
function toXML($username,$email,$name,$tel,$role) {
	$xml = "";
	$xml.="<profile>";
	$xml.="<username>".$username."</username>";
	$xml.="<email>".$email."</email>";
	$xml.="<name>".$name."</name>";
	$xml.="<tel>".$tel."</tel>";
	$xml.="<role>".$role."</role>";
	$xml.="</profile>";
	return $xml;
}
?>