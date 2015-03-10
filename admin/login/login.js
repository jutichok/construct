$( document ).ready(function() {
	$("#username").focus();
	$("#loginform").submit(function() {
		doSubmit(this);
		return false;
	});

});
function doSubmit(aform){
	if(!chkNullValue()) {
		return false;
	}
	$.ajax({
		url: "login_p.php",
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
	return true;
}

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/admin/index.php";
	}
	else {
		location.href = "/construct/admin/login/login.php";
	}

}