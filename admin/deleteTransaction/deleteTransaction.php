<?php
include("../../connection.php");
$tranid = "";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$tranid = $_GET["id"];  

	if(deleteTransaction($tranid)) {
		?>
		<script language = "javascript">
			alert("Delete Transaction Success");
			window.location = "/construct/admin/transaction/transaction.php";
		</script>
		<?php
	}
}

mysql_close();

function deleteTransaction($tranid) {
	$sql = "delete FROM ttransact where tranid = '$tranid'";
	$result = mysql_query($sql);
	if($result!="") {
		return true;
	}
	else {
		return false;
	}
	
}


?>