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
	$sql = "SELECT coltypeid,coltypename FROM tcoltype";
	$result = mysql_query($sql);
	$str = "<head>";
	while($uid = mysql_fetch_array($result))
	{
		$str.=("<row>");
		$str.=("<coltypeid>".$uid["coltypeid"]."</coltypeid>");
		$str.=("<coltypename>".$uid["coltypename"]."</coltypename>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}

?>