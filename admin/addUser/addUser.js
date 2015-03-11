$( document ).ready(function() {
	$("#username").focus();
	
	getRole();
	
	$("#addUser").submit(function() {
		doSubmit(this);
		return false;
    });

    $('#back').click(function () {
        window.location = '/construct/admin/User/user.php';
    });
});

function getRole() {
	$.ajax({
		url: "addUser_q.php",
		type: "POST",
		data: "getrole=true",
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			$xml.find('row').each(function(d){
				$('#role').append("<option value="+$(this).find('groupid').text()+">"+$(this).find('groupname').text()+"</option>");
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
		url: "addUser_p.php",
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
		alert("Please enter password");
		$("#password").focus();
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
		location.href = "/construct/admin/User/user.php";
	}
	else {
		location.href = "/construct/admin/addUser/addUser.php";
	}
}
