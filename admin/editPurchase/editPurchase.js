$( document ).ready(function() {
	$("#pname").focus();
	getUser();
	getStatus();
	
	setTimeout(function(){
		doQuery(),500
	});
	
	$( "#datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
	  dateFormat: 'yy-mm-dd' 
    });
	
	$("#editpurchaseform").submit(function() {
		doSubmit(this);
		return false;
	});
	
	$('#back').click(function(){
		window.location = '/construct/admin/purchase/purchase.php';
	});

});


function getUser(){
	$.ajax({
		url: "editPurchase_q.php",
		type: "POST",
		data: "getUsers=true",
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			$xml.find('row').each(function(d){
				$('#userss').append("<option value="+$(this).find('userid').text()+">"+$(this).find('name').text()+"</option>");
			});
		}
	});
}

function getStatus(){
	$.ajax({
		url: "editPurchase_q.php",
		type: "POST",
		data: "getStatus=true",
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			$xml.find('row').each(function(d){
				$('#status').append("<option value="+$(this).find('statusid').text()+">"+$(this).find('statusname').text()+"</option>");
			});
		}
	});
}

function doQuery() {
	$.ajax({
		url: "editpurchase_q.php",
		type: "POST",
		data: "prodid="+$('#prodid').val(),
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			var prodname = $xml.find( "prodname" ).text();
			var price = $xml.find( "price" ).text();
			var qty = $xml.find( "qty" ).text();
			var createdate = $xml.find( "createdate" ).text();
			var userid = $xml.find( "userid" ).text();
			var status = $xml.find( "status" ).text();
			setQueryData(prodname,price,qty,createdate,userid,status);
		}
	});

}
function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	//aform.submit();
	$.ajax({
		url: "editpurchase_p.php",
		type: "POST",
		data: $(aform).serialize(), 
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			var reason = $xml.find( "reason" ).text();
			var result = $xml.find( "result" ).text();
			alert(reason);
			locationPage(result);
		}
	});
	

}
function chkNullValue() {
	if($("#pname").val() == "") {
		alert("Please enter your purchasename");
		$("#pname").focus();
		return false;
	}
	else if($("#price").val() == "") {
		alert("Please enter confirm price");
		$("#price").focus();
		return false;
	}
	else if($("#qty").val() == "") {
		alert("Please enter qty");
		$("#qty").focus();
		return false;
	}
	return true;
}

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/admin/purchase/purchase.php";
	}
	else {
		location.href = "/construct/admin/editpurchase/editpurchase.php";
	}

}
function setQueryData(prodname,price,qty,createdate,userid,status) {
	$("#pname").val(prodname);
	$("#price").val(price);
	$("#qty").val(qty);
	$("#datepicker").val(createdate);
	$("#userss").val(userid);
	$("#status").val(status);
}