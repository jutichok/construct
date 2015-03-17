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


if(checkProductname($pname)){
	addProduct($pname,$price,$image,$date);
	echo 	"<script language = 'javascript'>
			alert('Add Promotion Success');
			window.location.href = '/construct/admin/Promotion/Promotion.php';
			</script>";
	
	
}
else{
	echo 	"<script language = 'javascript'>
			alert('Add Promotion Error');
			window.location.href = '/construct/admin/addPromotion/addPromotion.php';
			</script>";
}

mysql_close();

function checkProductname($pname){
	$str="";
	$uid="";
	$sql = "SELECT * from tpromo where promoname = '$pname'";
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

function addProduct($pname,$price,$image,$date){
	
	$sql = "insert into tpromo (promoname, promoprice, createdate, promoimage) values('$pname','$price','$date','{$image}')";
	$result = mysql_query($sql);
}


?>