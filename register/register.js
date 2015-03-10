$( document ).ready(function() {
	$("#username").focus();
	$("#registerform").submit(function() {
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
		url: "register_p.php",
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
	if($("#username").val() == "") {
		alert("Please enter your username");
		$("#username").focus();
		return false;
	}
	else if($("#password").val() == "") {
		alert("Please enter your password");
		$("#password").focus();
		return false;
	}
	else if($("#conpassword").val() == "") {
		alert("Please enter confirm password");
		$("#conpassword").focus();
		return false;
	}
	else if($("#email").val() == "") {
		alert("Please enter email");
		$("#email").focus();
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
		location.href = "/construct/register/register.php";
	}

}