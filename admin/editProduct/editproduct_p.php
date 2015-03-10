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
if (isset($_POST["measure"]) && !empty($_POST["measure"])) {

	$Measure = $_POST["measure"];
}
if (isset($_POST["role"]) && !empty($_POST["role"])) {

	$role = $_POST["role"];
}
$str = "";
if(updateTprod($prodid,$pname,$price,$Qty,$Measure,$role)){
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

function updateTprod($prodid,$pname,$price,$Qty,$Measure,$role) {
	$updateSQL = "update tprod set prodname='$pname', price='$price', Qty='$Qty',Measure='$Measure',prodtypeid='$role' where prodid='$prodid'";
	mysql_query($updateSQL);
	return true;
}
?>