$( document ).ready(function() {
	$("#oldpassword").focus();
	$("#changepasswordform").submit(function() {
		doSubmit(this);
		return false;
	});

});
function doSubmit(aform){
	if(!chkNullValue()) {
		return false;
	}
	if(!chkConPassword()) {
		return false;
	}
	//aform.submit();
	$.ajax({
		url: "changepassword_p.php",
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
	if($("#oldpassword").val() == "") {
		alert("Please enter your Old Password");
		$("#oldpassword").focus();
		return false;
	}
	else if($("#password").val() == "") {
		alert("Please enter your Password");
		$("#password").focus();
		return false;
	}
	else if($("#conpassword").val() == "") {
		alert("Please enter Confirm Password");
		$("#conpassword").focus();
		return false;
	}
	return true;
}
function chkConPassword() {
	if($("#password").val() != $("#conpassword").val()) {
		alert("Password not match");
		$("#password").val("");
		$("#conpassword").val("");
		$("#password").focus();
		return false;
	}
	return true;
}

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/index.php";
	}
	else {
		location.href = "/construct/changepassword/changepassword.php";
	}

}