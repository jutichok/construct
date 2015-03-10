<?php
session_start();
if(isset($_SESSION["username"])=="")
{
	?>
	<script language = "javascript">
		alert("Access Denied");
		window.location = "/construct/admin/login/login.php";
	</script>
	<?php
}

$userid = (isset($_GET['query_age']) ? $_GET['query_age'] : $_SESSION["userid"]);

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
	<link href="editprofile.css" rel="stylesheet"/>
	
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
	<script type="text/javascript" src="editprofile.js"></script>
	
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
						<h2 class="page-header">Edit Your Profile</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<form id="editprofileform" method="post" action="editprofile_p.php" role="form">
							<div class="col-lg-6 clearl">
								<label>Username</label>
								<input class="form-control" type="text" class="textbox" id="username" name="username" placeholder="USERNAME" readonly>
							</div>
							<div class="col-lg-6 clearl">
								<label>Password</label>
								<input class="form-control" type="password" class="textbox" id="conpassword" name="conpassword" placeholder="CONFIRM">
							</div>
							<div class="col-lg-6 clearl">
								<label>Email</label>
								<input class="form-control" type="text" class="textbox" id="email" name="email" placeholder="EMAIL">
							</div>
							<div class="col-lg-6 clearl">
								<label>Name</label>
								<input class="form-control" type="text" class="textbox" id="name" name="name" placeholder="Name">
							</div>
							<div class="col-lg-6 clearl">
								<label>Tel</label>
								<input class="form-control" type="text" class="textbox" id="tel" name="tel" placeholder="TEL.">
							</div>
							<div class="col-lg-6 clearl">
								<label>Role</label>
								<select class="form-control" name="role" id="role">
									<option value="1">ผู้ดูแลระบบ</option>
									<option value="2">พนักงานทั่วไป</option>
									<option value="3">ลูกค้า</option>
								</select>
							</div>
							<div class="col-lg-8 underline"> &nbsp;</div>
							<div class="col-lg-6 clearl">
								<input class="btn btn-default" type="submit" value="Edit Profile" class="btn-style">
								<input class="btn btn-default" type="button" value="Back" class="btn-style" id="back">
								<input type="hidden" id="userid" name="userid" value="<?php echo $userid;?>">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
