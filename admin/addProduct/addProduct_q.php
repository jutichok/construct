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
	$sql = "SELECT prodtypeid,prodtypename FROM tprodtype";
	$result = mysql_query($sql);
	$str = "<head>";
	while($uid = mysql_fetch_array($result))
	{
		$str.=("<row>");
		$str.=("<prodtypeid>".$uid["prodtypeid"]."</prodtypeid>");
		$str.=("<prodtypename>".$uid["prodtypename"]."</prodtypename>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}

?>