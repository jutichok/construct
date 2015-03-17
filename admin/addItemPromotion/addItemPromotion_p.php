<?php
include("../../connection.php");
$itemname = "";
$price = "";
$str = "";
$prodid = "";
$itemid = "";
if (isset($_POST["prodid"]) && !empty($_POST["prodid"])) {
	$prodid = $_POST["prodid"];    
}
if (isset($_POST["itemname"]) && !empty($_POST["itemname"])) {
	$itemid = $_POST["itemname"];    
}
if (isset($_POST["price"]) && !empty($_POST["price"])) {

	$price = $_POST["price"];
}
if (isset($_POST["qty"]) && !empty($_POST["qty"])) {

	$qty = $_POST["qty"];
}

$sql = "select prodname from tprod where prodid = '$itemid'";
$result = mysql_query($sql);
$u = mysql_fetch_array($result);
$itemname = $u["prodname"];

if(addProduct($itemid ,$prodid,$itemname,$price,$qty)){
	$str.=("<add>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Add Item Success.</reason>");
	$str.=("</add>");
	echo $str;
	
}
else{
	$str.=("<add>");
	$str.=("<result>N</result>");
	$str.=("<reason>Add Item Error.</reason>");
	$str.=("</add>");
	echo $str;
}

mysql_close();

function addProduct($itemid,$prodid,$itemname,$price,$qty){
	
	$sql = "insert into tipromo (prodid,prodname, price, qty,promoid) values('$itemid','$itemname','$price','$qty','$prodid')";
	$result = mysql_query($sql);
	
	
	$sqlupdate = "UPDATE `tpromo` SET pricetot=(SELECT sum(price) as tot FROM tipromo where promoid = '$prodid') WHERE promoid = '$prodid'";
	$result = mysql_query($sqlupdate);
	return true;
}


?>