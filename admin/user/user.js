$( document ).ready(function() {
	doQuery();
	$('#btnAdd').click(function(){
		window.location = "/construct/admin/addUser/addUser.php";
	});
});
function doQuery() {
	$.ajax({
		url: "user_p.php",
		type: "POST",
		data: "",
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			$xml.find("row").each(function(d){
				$("#tableuser").find("tbody").append("<tr><td>"+ $(this).find("userid").text() +"</td><td>"+$(this).find("name").text()+"</td><td>"+$(this).find("email").text()+"</td><td>"+$(this).find("tel").text()+"</td><td>"+$(this).find("role").text()+"</td><td><a href=/construct/admin/editprofile/editprofile.php?id="+$(this).find("userid").text()+">Edit</a> | <a href=/construct/admin/deleteuser/deleteuser.php?id="+$(this).find("userid").text()+">Delete</a></td></tr>");
				
			});
		},
		error: function(data){
			alert("Error Please Try Again");
		}
	});

}
