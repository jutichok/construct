<?php
	if(!isset($_SESSION)){
		session_start();
	}
	$userid = $_SESSION['userid'];
?>
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
		<link rel="stylesheet" type="text/css" href="changepassword.css" />
		<script type="text/javascript" src="changepassword.js"></script>
		
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<?php include '../header.php'; ?>
			
			<div class="center-form">
					<h2>Change Password</h2>
					<form id="changepasswordform" method="post" action="changepassword_p.php">
					<div>
					<input type="password" class="textbox" id="oldpassword" name="oldpassword" placeholder="OLD PASSWORD">
					</div>
					<div>
					<input type="password" class="textbox" id="password" name="password" placeholder="PASSWORD">
					</div>
					<div>
					<input type="password" class="textbox" id="conpassword" name="conpassword" placeholder="CONFIRM">
					</div>
					<input type="hidden" id="userid" name="userid" value="<?php echo $userid ?>">
					<input type="submit" value="Change Password" class="btn-style">
					</form>
			</div>
		</div>
	</body>
</html>
