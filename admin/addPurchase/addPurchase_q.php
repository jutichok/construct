<?php
include("../../connection.php");
$str = "";

if (isset($_POST["getUsers"]) && !empty($_POST["getUsers"])) {
	if($_POST["getUsers"])
	{
		$str = QueryGetUser();
		echo $str;
	}
}

if (isset($_POST["getStatus"]) && !empty($_POST["getStatus"])) {
	if($_POST["getStatus"])
	{
		$str = QueryGetStatus();
		echo $str;
	}
}

mysql_close();

function QueryGetUser(){
	$sql = "SELECT userid,name FROM tuser";
	$result = mysql_query($sql);
	$str = "<head>";
	while($uid = mysql_fetch_array($result))
	{
		$str.=("<row>");
		$str.=("<userid>".$uid["userid"]."</userid>");
		$str.=("<name>".$uid["name"]."</name>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}

function QueryGetStatus(){
	$sql = "SELECT statusid,statusname FROM tstatus";
	$result = mysql_query($sql);
	$str = "<head>";
	while($uid = mysql_fetch_array($result))
	{
		$str.=("<row>");
		$str.=("<statusid>".$uid["statusid"]."</statusid>");
		$str.=("<statusname>".$uid["statusname"]."</statusname>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}

?>