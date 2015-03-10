<?php
	if(!isset($_SESSION)){
		session_start();
	}
	
	$username = $_SESSION['username'];
	if($_GET["id"]!=null)
	{
		$userid =  $_GET["id"];
	}
	else
	{
		$userid = $_SESSION['userid'];
	}
?>
<script>
	
</script>
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
		<link rel="stylesheet" type="text/css" href="editprofile.css" />
		<script type="text/javascript" src="editprofile.js"></script>
		
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<?php include '../header.php'; ?>
			
			<div class="center-form">
					<h2>Edit Your Profile</h2>
					<form id="editprofileform" method="post" action="register_p.php">
						<div>
						<input type="text" class="textbox" id="username" name="username" value="<?php echo $username ?>"placeholder="USERNAME" readonly>
						</div>
						<div>
						<input type="password" class="textbox" id="conpassword" name="conpassword" placeholder="CONFIRM">
						</div>
						<div>
						<input type="text" class="textbox" id="email" name="email" placeholder="EMAIL">
						</div>
						<div>
						<input type="text" class="textbox" id="name" name="name" placeholder="Name">
						</div>
						<div>
						<input type="text" class="textbox" id="tel" name="tel" placeholder="TEL.">
						</div>
						<input type="hidden" id="userid" name="userid" value="<?php echo $userid ?>">
						<input type="submit" value="Edit Profile" class="btn-style">
					</form>
			</div>
		</div>
	</body>
</html>
