	<style>
		.noti_bubble{
			 background-color: red;
			border-radius: 30px;
			box-shadow: 1px 1px 1px gray;
			color: white;
			font-size: 0.8em;
			font-weight: bold;
			padding: 1px 2px;
			position: absolute;
			right: 2px;
			top: 5px;
		}
	</style>
		<?php 
		
		$tot = "";
		$sql2 = "SELECT sum(qty) as tot FROM tprod WHERE inshop = '1' ";
		$result2 = mysql_query($sql2);
		if($uid2 = mysql_fetch_array($result2)) {
			$tot 	= $uid2['tot'];
		}
		?>
<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/construct/admin/index.php">Administrator Page</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
				<li class="dropdown">
                    <a href="/construct/admin/checkstock/checkstock.php" class="dropdown-toggle"><i class="fa fa-bullhorn"></i> <div class="noti_bubble"><?php if($tot<100) echo $tot;?></div></a>
                    
                </li>
					
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["username"];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/construct/admin/editprofile/editprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/construct/admin/logout/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
		<script>
		if($('.noti_bubble').html()=="")
		{
			$('.noti_bubble').remove();
		}
		</script>