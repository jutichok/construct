$( document ).ready(function() {
	$("#pname").focus();
	$('.fa.fa-star').parent().parent().attr("class","active");
	
	$("#addPromotion").submit(function() {
		doSubmit(this);
		return false;
    });

    $('#back').click(function () {
        window.location = '/construct/admin/Promotion/Promotion.php';
    });
	
	$( "#datepicker" ).datepicker({
		dateFormat : 'yy-mm-dd'
	});
});


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
		alert("Please enter your promotion name");
		$("#pname").focus();
		return false;
	}
	else if($("#price").val() == "") {
		alert("Please enter confirm price");
		$("#price").focus();
		return false;
	}
	else if($("#datepicker").val() == "") {
		alert("Please enter date");
		$("#datepicker").focus();
		return false;
	}
	else if($("#imaggg").val() == "") {
		alert("Please enter image");
		$("#imaggg").focus();
		return false;
	}
	return true;
}

function locationPage(result) {
	if(result == "Y") {
		location.href = "/construct/admin/promotion/promotion.php";
	}
	else {
		location.href = "/construct/admin/addpromotion/addpromotion.php";
	}
}
