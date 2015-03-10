<?php
include("../../connection.php");
$userid = "";

if (isset($_GET["id"]) && !empty($_GET["id"])) {
	$userid = $_GET["id"];  

	if(deleteUser($userid)) {
		?>
		<script language = "javascript">
			alert("Delete User Success");
			window.location = "/construct/admin/user/user.php";
		</script>
		<?php
	}
}

mysql_close();

function deleteUser($userid) {
	$sql = "delete FROM tuser where userid = '$userid'";
	$result = mysql_query($sql);
	if($result!="") {
		return true;
	}
	else {
		return false;
	}
	
}


?>