<?php
include("../../connection.php");
$pname = "";
$price = "";
$str = "";
$image = "";

if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
}
if (isset($_POST["pname"]) && !empty($_POST["pname"])) {
	$pname = $_POST["pname"];    
}
if (isset($_POST["price"]) && !empty($_POST["price"])) {

	$price = $_POST["price"];
}
if (isset($_POST["date"]) && !empty($_POST["date"])) {

	$date = $_POST["date"];
}
if (isset($_POST["prodid"]) && !empty($_POST["prodid"])) {

	$prodid = $_POST["prodid"];
}

if(updateTprod($prodid,$pname,$price,$image,$date)){
	echo 	"<script language = 'javascript'>
			alert('Update Promotion Success');
			window.location.href = '/construct/admin/Promotion/Promotion.php';
			</script>";
	

}
else {
	echo 	"<script language = 'javascript'>
			alert('Update Promotion Error');
			window.location.href = '/construct/admin/Promotion/Promotion.php';
			</script>";

mysql_close();
}

function updateTprod($prodid,$pname,$price,$image,$date) {
	if($image==""){
		$updateSQL = "update tpromo set promoname='$pname', promoprice='$price',createdate = '$date' where promoid='$prodid'";
	}
	else{
		$updateSQL = "update tpromo set promoname='$pname', promoprice='$price',createdate = '$date',prodimg='{$image}' where promoid='$prodid'";
	}
	mysql_query($updateSQL);
	return true;
}
?>