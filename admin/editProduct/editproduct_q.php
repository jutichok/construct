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

function queryData($prodid) {
	$sql = "SELECT prodid,prodname,price,qty,measure,tpy.prodtypeid as prodtypeid,prodimg FROM tprod tp inner join tprodtype tpy on tpy.prodtypeid = tp.prodtypeid where prodid='$prodid'";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$prodid = $uid['prodid'];
	$prodname = $uid['prodname'];
	$price = $uid['price'];
	$qty = $uid['qty'];
	$measure = $uid['measure'];
	$prodimg = $uid['prodimg'];
	$prodtypeid = $uid['prodtypeid'];
	$encodeimage = base64_encode($prodimg);
	$xml = toXML($prodname,$price,$qty,$measure,$prodtypeid,$encodeimage);
	return $xml;
}
function toXML($prodname,$price,$qty,$measure,$prodtypeid,$encodeimage) {
	$xml = "";
	$xml.="<product>";
	$xml.="<prodname>".$prodname."</prodname>";
	$xml.="<price>".$price."</price>";
	$xml.="<qty>".$qty."</qty>";
	$xml.="<measure>".$measure."</measure>";
	$xml.="<prodimg>".$encodeimage."</prodimg>";
	$xml.="<prodtypeid>".$prodtypeid."</prodtypeid>";
	$xml.="</product>";
	return $xml;
}
?>