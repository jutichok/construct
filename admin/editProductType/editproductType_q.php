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
	$sql = "SELECT prodtypename from tprodtype where prodtypeid='$prodid'";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$prodtypename = $uid['prodtypename'];
	$xml = toXML($prodtypename);
	return $xml;
}
function toXML($prodtypename) {
	$xml = "";
	$xml.="<product>";
	$xml.="<prodtypename>".$prodtypename."</prodtypename>";
	$xml.="</product>";
	return $xml;
}
?>