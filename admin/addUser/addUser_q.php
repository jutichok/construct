<?php
include("../../connection.php");

$userid = "";
$str = "";
$username ="";

if (isset($_POST["getrole"]) && !empty($_POST["getrole"])) {

	$getrole = $_POST["getrole"];
	$str = getRole();
	echo $str;
}
mysql_close();

function getRole() {
	$sql = "select 	groupid,groupname from tusergrp";
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


?>