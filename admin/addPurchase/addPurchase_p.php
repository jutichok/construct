<?php
include("../../connection.php");
$pname = "";
$price = "";
$Qty = "";
$userss = "";
$status = "";
$str = "";
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

if(checkPurchasename($pname)){
	addPurchase($pname,$price,$Qty,$date,$userss,$status);
	$str.=("<add>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Add Product Success.</reason>");
	$str.=("</add>");
	echo $str;
}
else{
	$str.=("<add>");
	$str.=("<result>N</result>");
	$str.=("<reason>Add Product Error.</reason>");
	$str.=("</add>");
	echo $str;
}

mysql_close();

function checkPurchasename($pname){
	$str="";
	$uid="";
	$sql = "SELECT * from tpurchase where purname = '$pname'";
	$result = mysql_query($sql);
	$numrow = mysql_num_rows($result);
	if($numrow>0)
	{
		return false;
	}
	else{
		return true;
	}
}

function addPurchase($pname,$price,$Qty,$date,$userss,$status){
	
	$sql = "INSERT INTO tpurchase(purname, purprice, purqty, createdate, userid, status) VALUES ('$pname','$price','$Qty','$date','$userss','$status')";
	$result = mysql_query($sql);
	return true;
}


?>