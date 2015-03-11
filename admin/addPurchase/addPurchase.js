$( document ).ready(function() {
	$("#pname").focus();
	
	getUser();
	getStatus();
	
	$( "#datepicker" ).datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
	
	$("#addPurchase").submit(function() {
		doSubmit(this);
		return false;
    });

    $('#back').click(function () {
        window.location = '/construct/admin/Purchase/Purchase.php';
    });
});

function getUser(){
	$.ajax({
		url: "addPurchase_q.php",
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
		url: "addPurchase_q.php",
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

function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	//aform.submit();
	$.ajax({
		url: "addPurchase_p.php",
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
		location.href = "/construct/admin/Purchase/Purchase.php";
	}
	else {
		location.href = "/construct/admin/addPurchase/addPurchase.php";
	}
}
