$( document ).ready(function() {
	$("#pname").focus();
	
	QuerygetType();
	
	$("#addProduct").submit(function() {
		doSubmit(this);
		return false;
    });

    $('#back').click(function () {
        window.location = '/construct/admin/Product/Product.php';
    });
	
	
});

function QuerygetType() {
	$.ajax({
		url: "addProduct_q.php",
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

function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	aform.submit();
	
	// console.log(formData);
	// $.ajax({
		// url: "addProduct_p.php",
		// type: "POST",
		// data: formData, 
		// success: function(data){ 
			// var xmldocs = $.parseXML(data);
			// $xml = $( xmldocs );
			// var reason = $xml.find( "reason" ).text();
			// var result = $xml.find( "result" ).text();
			// alert(reason);
			// locationPage(result);
		// }
	// });
	

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
	else if($("#imaggg").val() == "") {
		alert("Please enter image");
		$("#imaggg").focus();
		return false;
	}
	return true;
}

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/admin/product/product.php";
	}
	else {
		location.href = "/construct/admin/addProduct/addProduct.php";
	}
}
