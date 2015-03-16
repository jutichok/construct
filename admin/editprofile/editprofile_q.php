<?php
session_start();
include("../../connection.php");

$userid = "";
$str = "";
$username ="";

if (isset($_POST["getrole"]) && !empty($_POST["getrole"])) {

	$getrole = $_POST["getrole"];
	$str = getRole();
	echo $str;
}
else
{
	if (isset($_POST["userid"]) && !empty($_POST["userid"])) {

		$userid = $_POST["userid"];
	}
	$str = queryData($userid);
	echo $str;
}
mysql_close();

function getRole() {
	$role = $_SESSION['role'];
	if($_SESSION["role"]=="employee"){
		$sql = "select groupid,groupname from tusergrp where groupname ='employee'";
	}
	else
	{
		$sql = "select groupid,groupname from tusergrp where";
	}
	$result = mysql_query($sql);
	$str = "<head>";
	while($uid = mysql_fetch_array($result))
	{
		$str.=("<row>");
		$str.=("<groupid>".$uid["groupid"]."</groupid>");
		$str.=("<groupname>".$uid["groupname"]."</groupname>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}

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