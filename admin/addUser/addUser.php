<?php
session_start();
if(isset($_SESSION["username"])=="")
{
	?>
	<script language = "javascript">
		alert("Access Denied");
		window.location.href = "/construct/admin/login/login.php";
	</script>
	<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
		
    <title>Administrator Page</title>
	
	<!--Page CSS -->
	<link href="addUser.css" rel="stylesheet"/>
	
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!--<link href="css/plugins/morris.css" rel="stylesheet">-->

    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	
	<!-- js -->
	<script type="text/javascript" src="addUser.js"></script>
	
</head>

<body>
	<div id="wrapper">
		<!--header -->
		<?php include '../header.php'?>
        <!--side menu-->
		<?php include '../menu.php'?>
		<div id="page-wrapper">	
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="page-header">Add User</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<form id="addUser" method="post" action="addUser_p.php">
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" id="username" name="username" placeholder="USERNAME" >
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD">
						</div>
						<div class="form-group">
							<label>Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="EMAIL">
						</div>
						<div class="form-group">
							<label>Telephone</label>
							<input type="text" class="form-control" id="tel" name="tel" placeholder="TEL.">
						</div>
						<div class="form-group">
							<label>Role</label>
							<select class="form-control" name="role">
								<option value="1">ผู้ดูแลระบบ</option>
								<option value="2">พนักงานทั่วไป</option>
								<option value="3">ลูกค้า</option>
							</select>
						</div>
						<div class="form-group">
							<input type="submit" value="Add Profile" class="btn btn-default"> &nbsp;
							<input class="btn btn-default" type="button" value="Back" class="btn-style" id="back">
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
