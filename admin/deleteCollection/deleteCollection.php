<?php
include("../../connection.php");
$purid = "";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$purid = $_GET["id"];  

	if(deletePurchase($purid)) {
		?>
		<script language = "javascript">
			alert("Delete Collection Success");
			window.location = "/construct/admin/Collection/Collection.php";
		</script>
		<?php
	}
}

mysql_close();

function deletePurchase($purid) {
	$sql = "delete FROM tcollection where colid = '$purid'";
	$result = mysql_query($sql);
	if($result!="") {
		return true;
	}
	else {
		return false;
	}
	
}


?>