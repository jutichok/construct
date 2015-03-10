<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<script language="JavaScript" type="text/javascript" src="/construct/js/jquery-1.11.2.min.js"></script>
		<title>MOCKUP2</title>
		<meta name="description" content="MOCKUP" />
		<meta name="keywords" content="MOCKUP" />
		<meta name="author" content="MOCKUP" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
		<link rel="stylesheet" type="text/css" href="../css/center.css" />
		<link rel="stylesheet" type="text/css" href="register.css" />
		<script type="text/javascript" src="register.js"></script>
		
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<?php include '../header.php'; ?>
			
			<div class="center-form">
					<h2>Create an account</h2>
					<form id="registerform" method="post" action="register_p.php">
					<div>
					<input type="text" class="textbox" id="username" name="username" placeholder="USERNAME">
					</div>
					<div>
					<input type="password" class="textbox" id="password" name="password" placeholder="PASSWORD">
					</div>
					<div>
					<input type="password" class="textbox" id="conpassword" name="conpassword" placeholder="CONFIRM">
					</div>
					<div>
					<input type="text" class="textbox" id="email" name="email" placeholder="EMAIL">
					</div>
					<input type="submit" value="Create an account" class="btn-style">
					</form>
			</div>
		</div>
	</body>
</html>
