<?php
include("../../connection.php");
if (isset($_POST["page"]) && !empty($_POST["page"])) {
	$pageNow = $_POST["page"];    
}
if (isset($_POST["sort"]) && !empty($_POST["sort"])) {
	$strSort = $_POST["sort"];    
}
if (isset($_POST["order"]) && !empty($_POST["order"])) {
	$strOrder = $_POST["order"];    
}
	

$result = getPurchase($pageNow,$strSort,$strOrder);
echo $result;
mysql_close();

function getPurchase($pageNow,$strSort,$strOrder){
	$str="";
	$uid="";
	$sql = "SELECT purid, purname , purprice, purqty, createdate, tu.name as user, ts.statusname  as statusname
			FROM tpurchase tp
			inner join tuser tu on tu.userid = tp.userid
			inner join tstatus ts on ts.statusid = tp.status";
	$result = mysql_query($sql);
	$numrow = mysql_num_rows($result);
	
	$Per_Page = 10;   // Per Page
	
	if(!$pageNow)
	{
	$pageNow=1;
	}
	$Prev_Page = $pageNow-1;
	$Next_Page = $pageNow+1;
	$Page_Start = (($Per_Page*$pageNow)-$Per_Page);
	if($numrow<=$Per_Page)
	{
	$Num_Pages =1;
	}
	else if(($numrow % $Per_Page)==0)
	{
	$Num_Pages =($numrow/$Per_Page) ;
	}
	else
	{
	$Num_Pages =($numrow/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
	}
	if($strSort == "")
	{
	$strSort = "purid";
	}
	
	if($strOrder == "")
	{
	$strOrder = "DESC";
	}
	$sql .=" order  by ".$strSort." ".$strOrder." LIMIT $Page_Start , $Per_Page";
	$qry  = mysql_query($sql);
	$strNewOrder = $strOrder == 'ASC' ? 'DESC' : 'ASC';
	
	
	$str = "<head>";
	while($uid = mysql_fetch_array($qry))
	{
		$str.=("<row>");
		$str.=("<numrow>".$numrow."</numrow>");
		$str.=("<PrevPage>".$Prev_Page."</PrevPage>");
		$str.=("<pageNow>".$pageNow."</pageNow>");
		$str.=("<numpage>".$Num_Pages."</numpage>");
		$str.=("<strNewOrder>".$strNewOrder."</strNewOrder>");
		$str.=("<purid>".$uid["purid"]."</purid>");
		$str.=("<purname>".$uid["purname"]."</purname>");
		$str.=("<purprice>".$uid["purprice"]."</purprice>");
		$str.=("<purqty>".$uid["purqty"]."</purqty>");
		$str.=("<createdate>".$uid["createdate"]."</createdate>");
		$str.=("<user>".$uid["user"]."</user>");
		$str.=("<statusname>".$uid["statusname"]."</statusname>");
		$str.=("</row>");
	}
	$str .= "</head>";
	return $str;
}


?>