<?php
    session_Start();
	unset($_SESSION["username"]);
	unset($_SESSION["userid"]);
	header( "location: /construct/index.php" );
	session_destroy();
?> 
