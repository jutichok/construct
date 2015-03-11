$( document ).ready(function() {
	$("#pname").focus();
	
	QuerygetType();
	setTimeout(function(){
		doQuery(),500
	});
	
	$("#editproductform").submit(function() {
		doSubmit(this);
		return false;
	});
	
	$('#back').click(function(){
		window.location = '/construct/admin/product/product.php';
	});

});

function QuerygetType() {
	$.ajax({
		url: "editproduct_q.php",
		type: "POST",
		data: "getType=true",
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			$xml.find('row').each(function(d){
				$('#role').append("<option value="+$(this).find('prodtypeid').text()+">"+$(this).find('prodtypename').text()+"</option>");
			});
		}
	});
}

function doQuery() {
	$.ajax({
		url: "editproduct_q.php",
		type: "POST",
		data: "prodid="+$('#prodid').val(),
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			var prodname = $xml.find( "prodname" ).text();
			var price = $xml.find( "price" ).text();
			var qty = $xml.find( "qty" ).text();
			var measure = $xml.find( "measure" ).text();
			var prodtypeid = $xml.find( "prodtypeid" ).text();
			setQueryData(prodname,price,qty,measure,prodtypeid);
		}
	});

}
function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	//aform.submit();
	$.ajax({
		url: "editproduct_p.php",
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
		alert("Please enter your productname");
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
	else if($("#measure").val() == "") {
		alert("Please enter measure");
		$("#measure").focus();
		return false;
	}
	return true;
}

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/admin/product/product.php";
	}
	else {
		location.href = "/construct/admin/editproduct/editproduct.php";
	}

}
function setQueryData(prodname,price,qty,measure,prodtypeid) {
	$("#pname").val(prodname);
	$("#price").val(price);
	$("#qty").val(qty);
	$("#measure").val(measure);
	$("#role").val(prodtypeid)
}