<?php
include("../../connection.php");
$Product = "";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$Product = $_GET["id"];  

	if(deleteProduct($Product)) {
		?>
		<script language = "javascript">
			alert("Delete Product Type Success");
			window.location = "/construct/admin/ProductType/ProductType.php";
		</script>
		<?php
	}
}

mysql_close();

function deleteProduct($Product) {
	$sql = "delete FROM tprodtype where prodtypeid = '$Product'";
	$result = mysql_query($sql);
	if($result!="") {
		return true;
	}
	else {
		return false;
	}
	
}


?>