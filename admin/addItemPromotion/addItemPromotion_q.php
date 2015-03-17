<?php
include("../../connection.php");

$prodid = "";
$str = "";

if (isset($_POST["getType"]) && !empty($_POST["getType"])) {

	if($_POST["getType"])
	{
		$str = doQuerygetType();
		echo $str;
	}
}
mysql_close();

function doQuerygetType() {
	$sql = "SELECT prodid,prodname FROM tprod";
	$result = mysql_query($sql);
	$str = "<head>";
	while($uid = mysql_fetch_array($result))
	{
		$str.=("<row>");
		$str.=("<prodid>".$uid["prodid"]."</prodid>");
		$str.=("<prodname>".$uid["prodname"]."</prodname>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}

?>