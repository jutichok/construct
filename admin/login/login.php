<!DOCTYPE html>
<html lang="en">
	<title>Login</title>
	<head>
		<link rel="stylesheet" type="text/css" href="login.css"/>
		<link rel="stylesheet" type="text/css" href="../../css/style.css" />
		<script src="../../js/jquery-1.11.2.min.js"></script>
		<script src="login.js"></script>
	</head>
	<body>
		<div class="container">
			<header class="clearfix">
				<span>SOMETIME <span class="bp-icon bp-icon-about" data-content="This website for sell contruction product"></span></span>
					<h1>CONSTRUCTION.COM</h1>
			</header>
		</div>
		<div class="center-form">	
			<h2>Administrator Login</h2>
				<form id="loginform" method="post" action="login_p.php">
					<div>
						<input type="text" class="textbox" id="username" name="username" placeholder="USERNAME">
					</div>
					<div>
						<input type="password" class="textbox" id="password" name="password" placeholder="PASSWORD">
					</div>
					<input type="submit" value="Sign in" class="btn-style">
				</form>
		</div>
	</body>
</html>