$( document ).ready(function() {
	$('.fa.fa-picture-o').parent().parent().attr("class","active");
	$("#pname").focus();
	
	doQuery();
	
	
	$("#editCollectionType").submit(function() {
		doSubmit(this);
		return false;
	});
	
	$('#back').click(function(){
		window.location = '/construct/admin/CollectionType/CollectionType.php';
	});

});


function doQuery() {
	$.ajax({
		url: "editCollectionType_q.php",
		type: "POST",
		data: "prodid="+$('#prodid').val(),
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			var coltypename = $xml.find( "coltypename" ).text();
			setQueryData(coltypename);
		}
	});

}
function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	// aform.submit();
	$.ajax({
		url: "editCollectionType_p.php",
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
		location.href = "/construct/admin/CollectionType/CollectionType.php";
	}
	else {
		location.href = "/construct/admin/editCollectionType/editCollectionType.php";
	}

}
function setQueryData(coltypename) {
	$("#pname").val(coltypename);
	
}