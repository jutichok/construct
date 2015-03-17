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
else{
	if (isset($_POST["prodid"]) && !empty($_POST["prodid"])) {

		$prodid = $_POST["prodid"];
	}

	$str = queryData($prodid);
	echo $str;
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

function queryData($prodid) {
	$sql = "SELECT colid, colname, coltype ,file FROM `tcollection` 
		 where colid = '$prodid'";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$colid = $uid['colid'];
	$colname = $uid['colname'];
	$coltypename = $uid['coltype'];
	$file = $uid['file'];
	$encodeimage = base64_encode($file);
	$xml = toXML($colid,$colname,$coltypename,$encodeimage);
	return $xml;
}
function toXML($colid,$colname,$coltypename,$encodeimage) {
	$xml = "";
	$xml.="<product>";
	$xml.="<colid>".$colid."</colid>";
	$xml.="<colname>".$colname."</colname>";
	$xml.="<coltypename>".$coltypename."</coltypename>";
	$xml.="<encodeimage>".$encodeimage."</encodeimage>";
	$xml.="</product>";
	return $xml;
}
?>