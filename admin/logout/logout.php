<?php
    session_Start();
	unset($_SESSION["username"]);
	unset($_SESSION["userid"]);
	unset($_SESSION["role"]);
	header( "location: /construct/admin/login/login.php" );
	session_destroy();
?> 
