<?php
include("../../connection.php");
$purid = "";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$purid = $_GET["id"];  

	if(deletePurchase($purid)) {
		?>
		<script language = "javascript">
			alert("Delete Purchase Success");
			window.location = "/construct/admin/Purchase/Purchase.php";
		</script>
		<?php
	}
}

mysql_close();

function deletePurchase($purid) {
	$sql = "delete FROM tpurchase where purid = '$purid'";
	$result = mysql_query($sql);
	if($result!="") {
		return true;
	}
	else {
		return false;
	}
	
}


?>