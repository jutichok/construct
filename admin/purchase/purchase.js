$( document ).ready(function() {
	//initial
	$('.fa.fa-exchange').parent().parent().attr("class","active");
	
	var pageval = 1;
	var sortval = 'purid';
	var orderval = 'desc';
	doQuery(pageval,sortval,orderval);
	$('#btnAdd').click(function(){
		window.location = "/construct/admin/addPurchase/addPurchase.php";
	});
	
	$('.sort').click(function(){
		sortval = $(this).attr('value');
		orderval = $('#strOrderNow').val();
		reset();
		doQuery(pageval,sortval,orderval);
	});
	
	$(document).on('click','.getpage',function(){
		pageval = $(this).attr('value');
		//orderval = $('#strOrderNow').val();
		reset();
		doQuery(pageval,sortval,orderval);
	});
	
	
	
});
function reset(){
	$("#tableuser").find("tbody").html('');
	$('#results').html('');
}

function doQuery(pageval,sortval,orderval) {
	$.ajax({
		url: "purchase_p.php",
		type: "POST",
		data: 'page='+pageval+'&sort='+sortval+'&order='+orderval,//"{ page : '"+page+"', sort : '"+sort+"',order : '"+order+"' }",
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			var numrow = $xml.find('numrow:first').text();
			var numpage = $xml.find("numpage:first").text();
			var prevpage = $xml.find("PrevPage:first").text();
			var pagenow = $xml.find("pageNow:first").text();
			var strNewOrder = $xml.find("strNewOrder:first").text();
			var nextpage = parseInt(pagenow)+1;
			
			var html;
			$xml.find("row").each(function(d){
				html = "<tr>";
				html += "<td>"+ $(this).find("purid").text() +"</td>";
				html += "<td>"+ $(this).find("purname").text() +"</td>";
				html += "<td>"+ $(this).find("purprice").text() +"</td>";
				html += "<td>"+ $(this).find("purqty").text() +"</td>";
				html += "<td>"+ $(this).find("createdate").text() +"</td>";
				html += "<td>"+ $(this).find("user").text() +"</td>";
				html += "<td>"+ $(this).find("statusname").text() +"</td>";
				html += "<td><a href=/construct/admin/editPurchase/editPurchase.php?id="+$(this).find("purid").text()+">Edit</a> | <a href=/construct/admin/deletePurchase/deletePurchase.php?id="+$(this).find("purid").text()+">Delete</a></td>";
				html += "</tr>";
				$("#tableuser").find("tbody").append(html);
			});
			$('#results').append("Total "+numrow+" Record : "+numpage+" Page :");
			if(prevpage!=0)
			{
				$('#results').append(" <a class='getpage' value="+prevpage+"><< Back</a>");
			}
			for(var i=1; i<=numpage; i++)
			{
				if(i != pagenow)
				{
					$('#results').append(" <a class='getpage' value="+i+">"+i+"</a> ");
				}
				else
				{
					$('#results').append(" <b> "+i+" </b>");
				}
			}
			if(pagenow!=numpage)
			{
				$('#results').append("<a class='getpage' value="+nextpage+">Next>></a> ");
			}
			$('#strOrderNow').val(strNewOrder);
		},
		error: function(data){
			alert("Error Please Try Again");
		}
	});

}
