<?php
include("../../connection.php");
$pname = "";
$price = "";
$Qty = "";
$Measure = "";
$Role = "";
$prodid = "";
$image  ="";
if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {

	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 

}

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
if(updateTprod($prodid,$pname,$price,$Qty,$Measure,$role,$image)){
	echo 	"<script language = 'javascript'>
			alert('Update Product Success');
			window.location.href = '/construct/admin/product/product.php';
			</script>";
	

}
else {
	echo 	"<script language = 'javascript'>
			alert('Update Product Error');
			window.location.href = '/construct/admin/product/product.php';
			</script>";

mysql_close();
}

function updateTprod($prodid,$pname,$price,$Qty,$Measure,$role,$image) {
	if($image==""){
		$updateSQL = "update tprod set prodname='$pname', price='$price', Qty='$Qty',Measure='$Measure',prodtypeid='$role' where prodid='$prodid'";
	}
	else{
		$updateSQL = "update tprod set prodname='$pname', price='$price', Qty='$Qty',Measure='$Measure',prodtypeid='$role',prodimg='{$image}' where prodid='$prodid'";
	}
	mysql_query($updateSQL);
	return true;
}
?>