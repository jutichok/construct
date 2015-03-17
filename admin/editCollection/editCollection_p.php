<?php
include("../../connection.php");
$pname = "";
$ddltype = "";
$image  ="";
$prodid = "";
if (isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name'])) {

	$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 

}

if (isset($_POST["prodid"]) && !empty($_POST["prodid"])) {

	$prodid = $_POST["prodid"];
}
if (isset($_POST["pname"]) && !empty($_POST["pname"])) {
	$pname = $_POST["pname"];    
}
if (isset($_POST["ddltype"]) && !empty($_POST["ddltype"])) {

	$ddltype = $_POST["ddltype"];
}
$str = "";
if(updateTprod($prodid,$pname,$ddltype,$image)){
	echo 	"<script language = 'javascript'>
			alert('Update Collection Success');
			window.location.href = '/construct/admin/Collection/Collection.php';
			</script>";
	

}
else {
	echo 	"<script language = 'javascript'>
			alert('Update Collection Error');
			window.location.href = '/construct/admin/Collection/Collection.php';
			</script>";

mysql_close();
}

function updateTprod($prodid,$pname,$ddltype,$image) {
	if($image==""){
		$updateSQL = "update tCollection set colname='$pname', coltype='$ddltype' where colid='$prodid'";
	}
	else{
		$updateSQL = "update tCollection set colname='$pname', coltype='$ddltype',file='{$image}' where colid='$prodid'";
	}
	mysql_query($updateSQL);
	return true;
}
?>