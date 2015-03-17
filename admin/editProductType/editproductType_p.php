<?php
include("../../connection.php");
$pname = "";
$prodid = "";
if (isset($_POST["pname"]) && !empty($_POST["pname"])) {
	$pname = $_POST["pname"];    
}
if (isset($_POST["prodid"]) && !empty($_POST["prodid"])) {
	$prodid = $_POST["prodid"];    
}

$str = "";

if(updateTprod($prodid,$pname)){
	$str.=("<Edit>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Edit Product Success.</reason>");
	$str.=("</Edit>");
	echo $str;
}
else{
	$str.=("<Edit>");
	$str.=("<result>N</result>");
	$str.=("<reason>Edit Product Error.</reason>");
	$str.=("</Edit>");
	echo $str;
}
mysql_close();

function updateTprod($prodid,$pname) {
	$updateSQL = "update tprodtype set prodtypename='$pname' where prodtypeid='$prodid'";
	
	mysql_query($updateSQL);
	return true;
}
?>