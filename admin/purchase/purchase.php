<?php
session_start();
include("../../connection.php");
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
	<link href="purchase.css" rel="stylesheet"/>
	
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
	<script type="text/javascript" src="purchase.js"></script>
	
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
						<h2 class="page-header">Purchase</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped" id="tableuser">
                                <thead>
                                    <tr>
                                        <th><a class="sort" value="prodid">ID</a></th>
                                        <th><a class="sort" value="prodname">Name</a></th>
                                        <th><a class="sort" value="price">Price</a></th>
                                        <th><a class="sort" value="qty">Quantity</a></th>
										<th><a class="sort" value="date">Purchase Date</a></th>
										<th><a class="sort" value="user">Purchase By</a></th>
										<th><a class="sort" value="status">Purchase Status</a></th>
										<th>Manage</th>
                                    </tr>
                                </thead>
                                <tbody align=center>
									
                                </tbody>
                            </table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-6">
						<div id="results"><!-- content will be loaded here --></div>
						<input type="hidden" id="strOrderNow"><br/>
						<input type="button" class="btn btn-default" value="Add Purchase" id="btnAdd"> 
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
