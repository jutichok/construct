<?php
include("../connection.php");

$userid = "";
$str = "";

if (isset($_POST["userid"]) && !empty($_POST["userid"])) {

	$userid = $_POST["userid"];
}

$str = queryData($userid);
echo $str;
mysql_close();


function queryData($userid) {
	$sql = "select * from tuser where userid='$userid';";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$email = $uid['email'];
	$name = $uid['name'];
	$tel = $uid['tel'];
	$xml = toXML($email,$name,$tel);
	return $xml;
}
function toXML($email,$name,$tel) {
	$xml = "";
	$xml.="<profile>";
	$xml.="<email>".$email."</email>";
	$xml.="<name>".$name."</name>";
	$xml.="<tel>".$tel."</tel>";
	$xml.="</profile>";
	return $xml;
}
?>