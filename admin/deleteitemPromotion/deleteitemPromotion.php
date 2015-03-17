<?php
include("../../connection.php");
$Product = "";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$Product = $_GET["id"];  

	if(deleteProduct($Product)) {
		?>
		<script language = "javascript">
			alert("Delete Item Success");
			window.location = "/construct/admin/promotion/promotion.php";
		</script>
		<?php
	}
}

mysql_close();

function deleteProduct($Product) {
	$sql = "delete FROM tipromo where ipromoid = '$Product'";
	$result = mysql_query($sql);
	if($result!="") {
		return true;
	}
	else {
		return false;
	}
	
}


?>