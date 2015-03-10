<?php
include("../../connection.php");
$username = "";
$password = "";
$email = "";
$name = "";
$tel = "";
$role = "";
$str = "";
if (isset($_POST["username"]) && !empty($_POST["username"])) {
	$username = $_POST["username"];    
}
if (isset($_POST["password"]) && !empty($_POST["password"])) {

	$password = $_POST["password"];
}
if (isset($_POST["email"]) && !empty($_POST["email"])) {

	$email = $_POST["email"];
}
if (isset($_POST["name"]) && !empty($_POST["name"])) {

	$name = $_POST["name"];
}
if (isset($_POST["tel"]) && !empty($_POST["tel"])) {

	$tel = $_POST["tel"];
}
if (isset($_POST["role"]) && !empty($_POST["role"])) {

	$role = $_POST["role"];
}

if(checkUsername($username)){
	addUser($username,$password,$name,$email,$tel,$role);
	$str.=("<add>");
	$str.=("<result>Y</result>");
	$str.=("<reason>Add User Success.</reason>");
	$str.=("</add>");
	echo $str;
}
else{
	$str.=("<add>");
	$str.=("<result>N</result>");
	$str.=("<reason>Add User Error.</reason>");
	$str.=("</add>");
	echo $str;
}

mysql_close();

function checkUsername($username){
	$str="";
	$uid="";
	$sql = "SELECT * from tuser where username = '$username'";
	$result = mysql_query($sql);
	$numrow = mysql_num_rows($result);
	if($numrow>0)
	{
		return false;
	}
	else{
		return true;
	}
}

function addUser($username,$password,$name,$email,$tel,$role){
	
	$sql = "insert into tuser (username,password,name,email,tel,usergrpid) values('$username','$password','$name','$email','$tel','$role')";
	$result = mysql_query($sql);
}


?>