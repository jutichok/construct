$( document ).ready(function() {
	$("#pname").focus();
	
	$('.fa.fa-star').parent().parent().attr("class","active");
	doQuery();
	
	$( "#datepicker" ).datepicker({
		dateFormat : 'yy-mm-dd'
	});
	
	$("#editpromotionform").submit(function() {
		doSubmit(this);
		return false;
	});
	
	$('#back').click(function(){
		window.location = '/construct/admin/promotion/promotion.php';
	});

});


function doQuery() {
	$.ajax({
		url: "editPromotion_q.php",
		type: "POST",
		data: "prodid="+$('#prodid').val(),
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			var promoname = $xml.find( "promoname" ).text();
			var promoprice = $xml.find( "promoprice" ).text();
			var date = $xml.find( "createdate" ).text();
			var promoimage = $xml.find( "encodeimage" ).text();
			$("#displayimg").attr("src","data:image/jpeg;base64,"+ promoimage +"");
			setQueryData(promoname,promoprice,date);
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
		location.href = "/construct/admin/Promotion/Promotion.php";
	}
	else {
		location.href = "/construct/admin/editPromotion/editPromotion.php";
	}

}
function setQueryData(promoname,promoprice,date) {
	$("#pname").val(promoname);
	$("#price").val(promoprice);
	$("#datepicker").val(date);
	
}