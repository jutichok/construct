<?php
include("../../connection.php");
$purid = "";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$purid = $_GET["id"];  

	if(deletePurchase($purid)) {
		?>
		<script language = "javascript">
			alert("Delete Collection Type Success");
			window.location = "/construct/admin/CollectionType/CollectionType.php";
		</script>
		<?php
	}
}

mysql_close();

function deletePurchase($purid) {
	$sql = "delete FROM tcoltype where coltypeid = '$purid'";
	$result = mysql_query($sql);
	if($result!="") {
		return true;
	}
	else {
		return false;
	}
	
}


?>