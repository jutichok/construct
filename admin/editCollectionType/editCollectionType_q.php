<?php
include("../../connection.php");

$prodid = "";
$str = "";

if (isset($_POST["prodid"]) && !empty($_POST["prodid"])) {

	$prodid = $_POST["prodid"];
}

$str = queryData($prodid);
echo $str;

mysql_close();


function queryData($prodid) {
	$sql = "SELECT coltypename from tcoltype where coltypeid='$prodid'";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$coltypename = $uid['coltypename'];
	$xml = toXML($coltypename);
	return $xml;
}
function toXML($coltypename) {
	$xml = "";
	$xml.="<product>";
	$xml.="<coltypename>".$coltypename."</coltypename>";
	$xml.="</product>";
	return $xml;
}
?>