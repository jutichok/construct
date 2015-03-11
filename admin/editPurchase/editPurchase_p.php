<?php
include("../../connection.php");
$pname = "";
$price = "";
$Qty = "";
$Measure = "";
$Role = "";
$prodid = "";
if (isset($_POST["prodid"]) && !empty($_POST["prodid"])) {

	$prodid = $_POST["prodid"];
}
if (isset($_POST["pname"]) && !empty($_POST["pname"])) {
	$pname = $_POST["pname"];    
}
if (isset($_POST["price"]) && !empty($_POST["price"])) {

	$price = $_POST["price"];
}
if (isset($_POST["qty"]) && !empty($_POST["qty"])) {

	$Qty = $_POST["qty"];
}
if (isset($_POST["datepicker"]) && !empty($_POST["datepicker"])) {
	$date = date('Y-m-d H:i:s', strtotime($_POST["datepicker"]));
}
if (isset($_POST["userss"]) && !empty($_POST["userss"])) {

	$userss = $_POST["userss"];
}
if (isset($_POST["status"]) && !empty($_POST["status"])) {

	$status = $_POST["status"];
}
$str = "";
if(updateTprod($prodid,$pname,$price,$Qty,$date,$userss,$status)){
	$str.=("<register>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Edit Profile Success.</reason>");
	$str.=("</register>");
	echo $str;

}
else {
	$str.=("<register>");
	$str.=("<result>N</result>");
	$str.=("<reason>Invalid Password.</reason>");
	$str.=("</register>");
	echo $str;

mysql_close();
}

function updateTprod($prodid,$pname,$price,$Qty,$date,$userss,$status) {
	$updateSQL = "UPDATE tpurchase SET purname='$pname',purprice='$price',purqty='$Qty',createdate='$date',userid='$userss',status='$status' where purid='$prodid'";
	mysql_query($updateSQL);
	return true;
}
?>