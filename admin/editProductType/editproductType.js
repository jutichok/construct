$( document ).ready(function() {
	$("#pname").focus();
	
	doQuery(),500
	
	
	$("#editproductform").submit(function() {
		doSubmit(this);
		return false;
	});
	
	$('#back').click(function(){
		window.location = '/construct/admin/productType/productType.php';
	});

});


function doQuery() {
	$.ajax({
		url: "editproducttype_q.php",
		type: "POST",
		data: "prodid="+$('#prodid').val(),
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			var prodtypename = $xml.find( "prodtypename" ).text();
			setQueryData(prodtypename);
		}
	});

}
function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	// aform.submit();
	$.ajax({
		url: "editproducttype_p.php",
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
	return true;
}

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/admin/productType/productType.php";
	}
	else {
		location.href = "/construct/admin/editproductType/editproductType.php";
	}

}
function setQueryData(prodtypename) {
	$("#pname").val(prodtypename);
	
}