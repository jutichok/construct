$( document ).ready(function() {
	$("#ptname").focus();
	
	$("#addProductType").submit(function() {
		doSubmit(this);
		return false;
    });

    $('#back').click(function () {
        window.location = '/construct/admin/ProductType/ProductType.php';
    });
});

function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	//aform.submit();
	$.ajax({
		url: "addProductType_p.php",
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
	if($("#ptname").val() == "") {
		alert("Please enter your product type");
		$("#ptname").focus();
		return false;
	}
	
	return true;
}

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/admin/ProductType/ProductType.php";
	}
	else {
		location.href = "/construct/admin/addProductType/addProductType.php";
	}
}
