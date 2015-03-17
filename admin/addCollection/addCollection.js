$( document ).ready(function() {
	$("#pname").focus();
	
	QuerygetType();
	
	$("#addCollection").submit(function() {
		doSubmit(this);
		return false;
    });

    $('#back').click(function () {
        window.location = '/construct/admin/Collection/Collection.php';
    });
	
	
});

function QuerygetType() {
	$.ajax({
		url: "addCollection_q.php",
		type: "POST",
		data: "getType=true",
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			$xml.find('row').each(function(d){
				$('#ddltype').append("<option value="+$(this).find('coltypeid').text()+">"+$(this).find('coltypename').text()+"</option>");
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
	else if($("#ddltype").val() == "") {
		alert("Please select type");
		$("#ddltype").focus();
		return false;
	}
	else if($("#imaggg").val() == "") {
		alert("Please enter image");
		$("#imaggg").focus();
		return false;
	}
	return true;
}


