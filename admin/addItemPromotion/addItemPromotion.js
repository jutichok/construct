$( document ).ready(function() {
	$("#pname").focus();
	
	$('.fa.fa-star').parent().parent().attr("class","active");
	
	getProduct();
	
	$("#additemPromotion").submit(function() {
		doSubmit(this);
		return false;
    });
	
	
    $('#back').click(function () {
        window.location = '/construct/admin/itemPromotion/itemPromotion.php';
    });
	
});

function getProduct(){
	$.ajax({
		url: "addItemPromotion_q.php",
		type: "POST",
		data: "getType=true", 
		success: function(data){ 
			var xmldocs = $.parseXML(data);
			$xml = $( xmldocs );
			$xml.find('row').each(function(d){
				$('#itemname').append("<option value="+$(this).find('prodid').text()+">"+$(this).find('prodname').text()+"</option>");
			});
		}
	});
}

function doSubmit(aform) {
	if(!chkNullValue()) {
		return false;
	}
	//aform.submit();
	
	// console.log(formData);
	$.ajax({
		url: "addItemPromotion_p.php",
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
	if($("#itemname").val() == "") {
		alert("Please select your item");
		$("#itemname").focus();
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
	return true;
}

function locationPage(result) {
	var idpro = $('#prodid').val();
	if(result == "Y") {
		location.href = "/construct/admin/itempromotion/itempromotion.php?id="+idpro;
	}
	else {
		location.href = "/construct/admin/addItempromotion/addItempromotion.php";
	}
}
