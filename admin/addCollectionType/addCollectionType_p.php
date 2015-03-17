<?php
include("../../connection.php");
$str = "";
if (isset($_POST["ptname"]) && !empty($_POST["ptname"])) {

	$ptname = $_POST["ptname"];
}

if(checkProductname($ptname)){
	addCollectionType($ptname);
	$str.=("<add>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Add Collection Type Success.</reason>");
	$str.=("</add>");
	echo $str;
}
else{
	$str.=("<add>");
	$str.=("<result>N</result>");
	$str.=("<reason>Add Collection Type Error.</reason>");
	$str.=("</add>");
	echo $str;
}

mysql_close();

function checkProductname($ptname){
	$str="";
	$uid="";
	$sql = "SELECT * from tcoltype where coltypename = '$ptname'";
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

function addCollectionType($ptname){
	
	$sql = "INSERT INTO tcoltype(coltypename) VALUES ('$ptname')";
	$result = mysql_query($sql);
}


?>