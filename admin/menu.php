

<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					<li id="man_user">
                        <a href="/construct/admin/user/user.php"><i class="fa fa-fw fa-user"></i> Manage User </a>
                    </li>
					<li id="productt">
						<a href="javascript:;" data-toggle="collapse" data-target="#product"><i class="fa fa-bars"></i> Product <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="product" class="collapse">
                            <li>
                                <a href="/construct/admin/product/product.php"><i class="fa fa-database"></i>  Manage Product</a>
                            </li>
                            <li>
                                <a href="/construct/admin/productType/productType.php"><i class="fa fa-database"></i>  Manage Type</a>
                            </li>
                        </ul>
                    </li>
                    <li id="transac">
                        <a href="/construct/admin/transaction/transaction.php"><i class="fa fa-credit-card"></i> Transaction</a>
                    </li>
                    <li id="purchase">
                        <a href="/construct/admin/Purchase/Purchase.php"><i class="fa fa-exchange"></i> Purchase</a>
                    </li>
                    <li>
						<a href="javascript:;" data-toggle="collapse" data-target="#report"><i class="fa fa-folder-open"></i> Report <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="report" class="collapse">
                            <li id="checkstock">
                                <a href="/construct/admin/checkstock/checkstock.php"><i class="fa fa-folder-open-o"></i>  Check Stock</a>
                            </li>
                            <li id="employees">
                                <a href="/construct/admin/target/target.php"><i class="fa fa-folder-open-o"></i>  Target Employee</a>
                            </li>
							<li id="targettranac">
                                <a href="/construct/admin/targetTransaction/targetTransaction.php"><i class="fa fa-folder-open-o"></i>  Target Transaction</a>
                            </li>
							<li id="targetpurchase">
                                <a href="/construct/admin/targetPurchase/targetPurchase.php"><i class="fa fa-folder-open-o"></i>  Target Purchase</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
			<!-- /.navbar-collapse -->
		</nav>
		
		<script>
if("<?php echo $_SESSION["role"]?>"=="employee"){
	$('#man_user').css('display','none');
	$('#productt').css('display','none');
	$('#transac').css('display','none');
	$('#targettranac').css('display','none');
	$('#targetpurchase').css('display','none');
}
</script>