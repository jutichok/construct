<?php
include("../../connection.php");
$Product = "";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$Product = $_GET["id"];  

	if(deleteProduct($Product)) {
		?>
		<script language = "javascript">
			alert("Delete Product Success");
			window.location = "/construct/admin/Product/Product.php";
		</script>
		<?php
	}
}

mysql_close();

function deleteProduct($Product) {
	$sql = "delete FROM tprod where prodid = '$Product'";
	$result = mysql_query($sql);
	if($result!="") {
		return true;
	}
	else {
		return false;
	}
	
}


?>