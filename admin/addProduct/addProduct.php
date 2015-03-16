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
	<link href="addProduct.css" rel="stylesheet"/>
	
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
	<script type="text/javascript" src="addProduct.js"></script>
	
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
						<h2 class="page-header">Add Product</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8">
						<form id="addProduct" method="post" action="addProduct_p.php" enctype="multipart/form-data">
							<div class="col-lg-6 clearl">
								<label>Product Name</label>
								<input class="form-control" type="text" class="textbox" id="pname" name="pname" placeholder="PRODUCT NAME">
							</div>
							<div class="col-lg-6 clearl">
								<label>Price</label>
								<input class="form-control" type="text" class="textbox" id="price" name="price" placeholder="PRICE">
							</div>
							<div class="col-lg-6 clearl">
								<label>Qty</label>
								<input class="form-control" type="text" class="textbox" id="qty" name="qty" placeholder="QTY">
							</div>
							<div class="col-lg-6 clearl">
								<label>Measure</label>
								<input class="form-control" type="text" class="textbox" id="measure" name="measure" placeholder="MEASURE">
							</div>
							<div class="col-lg-6 clearl">
								<label>Role</label>
								<select class="form-control" name="role" id="role">
									
								</select>
							</div>
							<div class="col-lg-6 clearl">
								<label>Product Image</label>
								<input type="file" name="image">
							</div>
							
							<div class="col-lg-8 underline"> &nbsp;</div>
							<div class="col-lg-6 clearl">
								<input class="btn btn-default" type="submit" value="Add Product" class="btn-style">
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
