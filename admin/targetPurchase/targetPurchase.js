$( document ).ready(function() {
	//initial
	$('.fa.fa-folder-open').parent().parent().attr("class","active");
	
	var pageval = 1;
	var sortval = 'purid';
	var orderval = 'desc';
	
	$('#datestart').datepicker({
		dateFormat: 'yy-mm-dd' 
	});
	
	$('#dateend').datepicker({
		dateFormat: 'yy-mm-dd' 
	});
	
	
	$('#btnsearch').click(function(){
		var start = $('#datestart').val();
		var end = $('#dateend').val();
		
		if(start == "" && end == "")
		{
			alert("Please enter start date and end date")
		}
		else{
			reset();
			doQueryByDate(pageval,sortval,orderval,start,end)
		}
		
	});
	doQuery(pageval,sortval,orderval);
	
	
	
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

function doQueryByDate(pageval,sortval,orderval,start,end) {
	$.ajax({
		url: "targetPurchase_p.php",
		type: "POST",
		data: 'page='+pageval+'&sort='+sortval+'&order='+orderval+'&start='+start+'&end='+end,//"{ page : '"+page+"', sort : '"+sort+"',order : '"+order+"' }",
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

function doQuery(pageval,sortval,orderval) {
	$.ajax({
		url: "targetPurchase_p.php",
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
