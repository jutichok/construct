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
	$sql = "SELECT prodid,prodname,price,qty,measure,tpy.prodtypeid as prodtypeid FROM tprod tp inner join tprodtype tpy on tpy.prodtypeid = tp.prodtypeid where prodid='$prodid'";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$prodid = $uid['prodid'];
	$prodname = $uid['prodname'];
	$price = $uid['price'];
	$qty = $uid['qty'];
	$measure = $uid['measure'];
	$prodtypeid = $uid['prodtypeid'];
	$xml = toXML($prodname,$price,$qty,$measure,$prodtypeid);
	return $xml;
}
function toXML($prodname,$price,$qty,$measure,$prodtypeid) {
	$xml = "";
	$xml.="<product>";
	$xml.="<prodname>".$prodname."</prodname>";
	$xml.="<price>".$price."</price>";
	$xml.="<qty>".$qty."</qty>";
	$xml.="<measure>".$measure."</measure>";
	$xml.="<prodtypeid>".$prodtypeid."</prodtypeid>";
	$xml.="</product>";
	return $xml;
}
?>