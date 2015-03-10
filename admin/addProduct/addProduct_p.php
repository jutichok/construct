<?php
include("../../connection.php");
$pname = "";
$price = "";
$Qty = "";
$Measure = "";
$Role = "";
$prodid = "";
$str = "";
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

if(checkProductname($pname)){
	addProduct($pname,$price,$Qty,$Measure,$role);
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

function checkProductname($pname){
	$str="";
	$uid="";
	$sql = "SELECT * from tprod where prodname = '$pname'";
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

function addProduct($pname,$price,$Qty,$Measure,$role){
	
	$sql = "insert into tprod (prodname, price, qty, measure, prodtypeid) values('$pname','$price','$Qty','$Measure','$role')";
	$result = mysql_query($sql);
}


?>