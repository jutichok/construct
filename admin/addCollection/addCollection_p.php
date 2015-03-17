<?php
include("../../connection.php");
$pname = "";
$type = "";
$str = "";

if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
}
if (isset($_POST["pname"]) && !empty($_POST["pname"])) {
	$pname = $_POST["pname"];    
}
if (isset($_POST["type"]) && !empty($_POST["type"])) {

	$type = $_POST["type"];
}



if(checkProductname($pname)){
	addCollection($pname,$type,$image);
	echo 	"<script language = 'javascript'>
			alert('Add Collection Success');
			window.location.href = '/construct/admin/Collection/Collection.php';
			</script>";
	
	
}
else{
	echo 	"<script language = 'javascript'>
			alert('Add Collection Error');
			window.location.href = '/construct/admin/addCollection/addCollection.php';
			</script>";
}

mysql_close();

function checkProductname($pname){
	$str="";
	$uid="";
	$sql = "SELECT * from tCollection where colname = '$pname'";
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

function addCollection($pname,$type,$image){
	
	$sql = "insert into tCollection (colname, coltype, file) values('$pname','$type','{$image}')";
	$result = mysql_query($sql);
}


?>