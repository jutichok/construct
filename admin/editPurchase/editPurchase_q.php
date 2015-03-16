<?php
session_start();
include("../../connection.php");

$prodid = "";
$str = "";

if (isset($_POST["getUsers"]) && !empty($_POST["getUsers"])) {
	if($_POST["getUsers"])
	{
		$str = QueryGetUser();
		echo $str;
	}
}

else if (isset($_POST["getStatus"]) && !empty($_POST["getStatus"])) {
	if($_POST["getStatus"])
	{
		$str = QueryGetStatus();
		echo $str;
	}
}
else{
	if (isset($_POST["prodid"]) && !empty($_POST["prodid"])) {

		$prodid = $_POST["prodid"];
	}

	$str = queryData($prodid);
	echo $str;
}
mysql_close();


function QueryGetUser(){
	$userid = $_SESSION['userid'];
	if($_SESSION["role"]=="employee")
	{
		$sql = "SELECT userid,name FROM tuser where userid='$userid'";
	}
	else
	{
		$sql = "SELECT userid,name FROM tuser";
	}
	$result = mysql_query($sql);
	$str = "<head>";
	while($uid = mysql_fetch_array($result))
	{
		$str.=("<row>");
		$str.=("<userid>".$uid["userid"]."</userid>");
		$str.=("<name>".$uid["name"]."</name>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}

function QueryGetStatus(){
	$sql = "SELECT statusid,statusname FROM tstatus";
	$result = mysql_query($sql);
	$str = "<head>";
	while($uid = mysql_fetch_array($result))
	{
		$str.=("<row>");
		$str.=("<statusid>".$uid["statusid"]."</statusid>");
		$str.=("<statusname>".$uid["statusname"]."</statusname>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}

function queryData($prodid) {
	$sql = "SELECT purid, purname , purprice, purqty, createdate, userid,status  FROM tpurchase where purid='$prodid'";
	$result = mysql_query($sql);
	$uid = mysql_fetch_array($result);
	$prodid = $uid['purid'];
	$prodname = $uid['purname'];
	$price = $uid['purprice'];
	$qty = $uid['purqty'];
	$createdate = $uid['createdate'];
	$userid = $uid['userid'];
	$status = $uid['status'];
	$xml = toXML($prodname,$price,$qty,$createdate,$userid,$status);
	return $xml;
}
function toXML($prodname,$price,$qty,$createdate,$userid,$status) {
	$xml = "";
	$xml.="<purchase>";
	$xml.="<prodname>".$prodname."</prodname>";
	$xml.="<price>".$price."</price>";
	$xml.="<qty>".$qty."</qty>";
	$xml.="<createdate>".$createdate."</createdate>";
	$xml.="<userid>".$userid."</userid>";
	$xml.="<status>".$status."</status>";
	$xml.="</purchase>";
	return $xml;
}
?>