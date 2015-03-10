<?php
if(!isset($_SESSION)){
	session_start();
}
?>

<header class="clearfix">
	<span>SOMETIME <span class="bp-icon bp-icon-about" data-content="This website for sell contruction product"></span></span>
		<h1>CONSTRUCTION.COM</h1>
		<?php if(isset($_SESSION['userid'])){ ?>
			<nav>
				<span>Hi <?php echo $_SESSION["username"];?></span>
				<a href="/construct/editprofile/editprofile.php"> Profile </a>
				<a style="width:7.2em;" href="/construct/changepassword/changepassword.php"> Change password </a>
				<a style="width:7.1em;" href="/construct/logout/logout.php"> Logout</a>
			</nav>
		<?php }
		else { ?>
			<nav>
				<a href="/construct/login/login.php">Login</a>
				<a href="/construct/register/register.php">Register</a>
			</nav>
		<?php } ?>
</header>	
	<div id="tabs" class="tabs">
		<nav>
			<ul>
				<li><a href="/construct/index.php" class="icon-home"><span>Home</span></a></li>
				<li><a href="#section-2" class="icon-gallery"><span>Gallary</span></a></li>
				<li><a href="#section-3" class="icon-design"><span>Design</span></a></li>
				<li><a href="#section-4" class="icon-cal"><span>Calculate</span></a></li>
				<li><a href="#section-5" class="icon-contact"><span>Contact us</span></a></li>
					</ul>
				</nav>
	</div><!-- /tabs -->