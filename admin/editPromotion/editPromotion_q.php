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
	$sql = "SELECT  promoname, promoprice, promoimage, createdate FROM tpromo where promoid='$prodid'";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$promoname = $uid['promoname'];
	$promoprice = $uid['promoprice'];
	$promoimage = $uid['promoimage'];
	$createdate = $uid['createdate'];
	$encodeimage = base64_encode($promoimage);
	$xml = toXML($promoname,$promoprice,$createdate,$encodeimage);
	return $xml;
}
function toXML($promoname,$promoprice,$createdate,$encodeimage) {
	$xml = "";
	$xml.="<product>";
	$xml.="<promoname>".$promoname."</promoname>";
	$xml.="<promoprice>".$promoprice."</promoprice>";
	$xml.="<createdate>".$createdate."</createdate>";
	$xml.="<encodeimage>".$encodeimage."</encodeimage>";
	$xml.="</product>";
	return $xml;
}
?>