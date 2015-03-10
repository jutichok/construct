<?php
	$host="localhost";
	$user="root";
	$pass="1234";
	$db="construction";
	$connect = mysql_connect($host,$user,$pass) ; 
	mysql_select_db($db) ;

	mysql_query("SET NAMES utf8",$connect);
?>