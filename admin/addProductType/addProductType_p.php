<?php
include("../../connection.php");
$str = "";
if (isset($_POST["ptname"]) && !empty($_POST["ptname"])) {

	$ptname = $_POST["ptname"];
}

if(checkProductname($ptname)){
	addProductType($ptname);
	$str.=("<add>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Add Product Type Success.</reason>");
	$str.=("</add>");
	echo $str;
}
else{
	$str.=("<add>");
	$str.=("<result>N</result>");
	$str.=("<reason>Add Product Type Error.</reason>");
	$str.=("</add>");
	echo $str;
}

mysql_close();

function checkProductname($ptname){
	$str="";
	$uid="";
	$sql = "SELECT * from tprodtype where prodtypename = '$ptname'";
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

function addProductType($ptname){
	
	$sql = "INSERT INTO tprodtype(prodtypename) VALUES ('$ptname')";
	$result = mysql_query($sql);
}


?>