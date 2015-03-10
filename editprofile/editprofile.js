$( document ).ready(function() {
	$("#username").focus();
	doQuery();

	$("#editprofileform").submit(function() {
		doSubmit(this);
		return false;
	});

});
function doQuery() {
	$.ajax({
		url: "editprofile_q.php",
		type: "POST",
		data: "userid="+userid,
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			var email = $xml.find( "email" ).text();
			var tel = $xml.find( "tel" ).text();
			var name = $xml.find( "name" ).text();
			setQueryData(email,tel,name);
		}
	});

}
function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	//aform.submit();
	$.ajax({
		url: "editprofile_p.php",
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

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/index.php";
	}
	else {
		location.href = "/construct/editprofile/editprofile.php";
	}

}
function setQueryData(email,tel,name) {
	$("#email").val(email);
	$("#tel").val(tel);
	$("#name").val(name);
}