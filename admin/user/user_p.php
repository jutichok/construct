<?php
include("../../connection.php");

$result = getUser();
echo $result;
mysql_close();

function getUser(){
	$str="";
	$uid="";
	$sql = "SELECT `userid`,`name`,`email`,`username`,`tel`,t.groupname as role FROM `tuser` inner join tusergrp t on t.groupid = usergrpid";
	$result = mysql_query($sql);
	$numrow = mysql_num_rows($result);
	$str = "<head>";
	while($uid = mysql_fetch_array($result))
	{
		$str.=("<row>");
		$str.=("<userid>".$uid["userid"]."</userid>");
		$str.=("<name>".$uid["name"]."</name>");
		$str.=("<email>".$uid["email"]."</email>");
		$str.=("<tel>".$uid["tel"]."</tel>");
		$str.=("<role>".$uid["role"]."</role>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}


?>