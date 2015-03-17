$( document ).ready(function() {
	$("#pname").focus();
	
	QuerygetType();
	setTimeout(function(){
		doQuery(),500
	});
	
	$("#editCollection").submit(function() {
		doSubmit(this);
		return false;
	});
	
	$('#back').click(function(){
		window.location = '/construct/admin/collection/collection.php';
	});

});

function QuerygetType() {
	$.ajax({
		url: "editCollection_q.php",
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

function doQuery() {
	$.ajax({
		url: "editCollection_q.php",
		type: "POST",
		data: "prodid="+$('#prodid').val(),
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			var colid = $xml.find( "colid" ).text();
			var colname = $xml.find( "colname" ).text();
			var coltypename = $xml.find( "coltypename" ).text();
			var encodeimage = $xml.find( "encodeimage" ).text();
			$("#displayimg").attr("src","data:image/jpeg;base64,"+ encodeimage +"");
			setQueryData(colname,coltypename);
		}
	});

}
function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	aform.submit();
	// $.ajax({
		// url: "editproduct_p.php",
		// type: "POST",
		// data: $(aform).serialize(), 
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
		alert("Please enter your collection name");
		$("#pname").focus();
		return false;
	}
	else if($("#ddltype").val() == "") {
		alert("Please select type");
		$("#price").focus();
		return false;
	}
	return true;
}

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/admin/collection/collection.php";
	}
	else {
		location.href = "/construct/admin/editcollection/editcollection.php";
	}

}
function setQueryData(colname,coltypename) {
	$("#pname").val(colname);
	$("#ddltype").val(coltypename);
	
}