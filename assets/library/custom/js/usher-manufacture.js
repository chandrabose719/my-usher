$(document).ready(function(){
    
	// Display Stripe Button on Overview Page
    var path = window.location.pathname;
	var urlFileName = path.substr(path.lastIndexOf("/") + 1);

    // Pay Button Designs
    if (urlFileName == 'manufacture-overview') {
	    $(".stripe-button-el").find("span").remove();
		$(".stripe-button-el").attr('id', 'stripe-button');
		$("#stripe-button").removeClass("stripe-button-el").addClass("btn btn-primary Pbtn");
		$("#stripe-button").html("PAY NOW");
	}

	// Product Count
	if(urlFileName == 'manufacture-overview'){
		window.onload = onLoadStripeAmount;
	}
});

function onLoadStripeAmount(){
	var hidden_file_qty = $('#stripe_amount').val();
	$('.stripe-button').attr('data-amount', hidden_file_qty);	
}

var fileDataArray = [];
var displayFile = '';
var resourceFileArray = [];
var displayResource = '';

// ********************
// Upload Page
function displayUploadFile(){
	var uploadFile = document.getElementById('upload');
	if (uploadFile.files.length > 0) {
        for (var i = 0; i <= uploadFile.files.length - 1; i++) {
    		var fileValue = uploadFile.value;
    		var reg = /(.*?)\.(stl|STL|stp|iges|igs|step)$/;
	       	if(!fileValue.match(reg)){
	    	   	var alert = `
	    	   		<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Wrong file! </strong> Uploads available only for igs, iges, step, stp or stl files.
					</div>
	    	   	`;
	    	   	$('#validation-message').html(alert);
	    	   	return false;
	       	}
	       	var fileName = uploadFile.files[i].name;
        	for(var i in fileDataArray){
			    if(fileDataArray[i]['name'] == fileName){
			    	var alert = `
		    	   		<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong> Warning! </strong> File Already Uploaded.
						</div>
		    	   	`;
		    	   	$('#validation-message').html(alert);
		    	   	return false;    
			    }
			}
        	var fileSize = uploadFile.files[i].size / 1024 / 1024;
        	if (fileSize > 100) {
	       		var alert = `
	    	   		<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Warning! </strong> File Size More Than 100 MB.
					</div>
	    	   	`;
	    	   	$('#validation-message').html(alert);
	    	   	return false;	
	       	}
	    }
        for (var i = 0; i <= uploadFile.files.length - 1; i++) {
        	fileDataArray.push(uploadFile.files.item(i));
        }
        var displayFile = displayFileFunc(fileDataArray);
        var formGroup = `<div class="form-group">	
	    	<input type="button" name="submit" class="form-control btn btn-primary Abtn" value="Upload" onclick="saveFile()">
	    </div>`;
        $('.display-file').html(displayFile);
        $('.form-group-content').html(formGroup);
    }
};

function dragUploadFile(event){
	event.preventDefault();
	var uploadFile = event.dataTransfer;
	if (uploadFile.files.length > 0) {
        for (var i = 0; i <= uploadFile.files.length - 1; i++) {
    		var fileValue = uploadFile.files[i].name;
    		var reg = /(.*?)\.(stl|STL|stp|iges|igs|step)$/;
	       	if(!fileValue.match(reg)){
	    	   	var alert = `
	    	   		<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Wrong file! </strong> Uploads available only for igs, iges, step, stp or stl files.
					</div>
	    	   	`;
	    	   	$('#validation-message').html(alert);
	    	   	return false;
	       	}
	       	var fileName = uploadFile.files[i].name;
        	for(var i in fileDataArray){
			    if(fileDataArray[i]['name'] == fileName){
			    	var alert = `
		    	   		<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong> Warning! </strong> File Already Uploaded.
						</div>
		    	   	`;
		    	   	$('#validation-message').html(alert);
		    	   	return false;    
			    }
			}
        	var fileSize = uploadFile.files[i].size / 1024 / 1024;
        	if (fileSize > 100) {
	       		var alert = `
	    	   		<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Warning! </strong> File Size More Than 100 MB.
					</div>
	    	   	`;
	    	   	$('#validation-message').html(alert);
	    	   	return false;	
	       	}
	    }
        for (var i = 0; i <= uploadFile.files.length - 1; i++) {
        	fileDataArray.push(uploadFile.files.item(i));
        }
        saveFile();
    }
}

function additionalUploadFile(){
	var uploadFile = document.getElementById('upload');
	if (uploadFile.files.length > 0) {
        for (var i = 0; i <= uploadFile.files.length - 1; i++) {
    		var fileValue = uploadFile.value;
    		var reg = /(.*?)\.(stl|STL|stp|iges|igs|step)$/;
	       	if(!fileValue.match(reg)){
	    	   	var alert = `
	    	   		<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Wrong file! </strong> Uploads available only for igs, iges, step, stp or stl files.
					</div>
	    	   	`;
	    	   	$('#validation-message').html(alert);
	    	   	return false;
	       	}
	       	var fileName = uploadFile.files[i].name;
        	for(var i in fileDataArray){
			    if(fileDataArray[i]['name'] == fileName){
			    	var alert = `
		    	   		<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong> Warning! </strong> File Already Uploaded.
						</div>
		    	   	`;
		    	   	$('#validation-message').html(alert);
		    	   	return false;    
			    }
			}
        	var fileSize = uploadFile.files[i].size / 1024 / 1024;
        	if (fileSize > 100) {
	       		var alert = `
	    	   		<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Warning! </strong> File Size More Than 100 MB.
					</div>
	    	   	`;
	    	   	$('#validation-message').html(alert);
	    	   	return false;	
	       	}
	    }
        for (var i = 0; i <= uploadFile.files.length - 1; i++) {
        	fileDataArray.push(uploadFile.files.item(i));
        }
        saveFile();
    }
};

function removeFile(name){
	for(var i in fileDataArray){
	    if(fileDataArray[i]['lastModified'] == name){
	        fileDataArray.splice(fileDataArray[i],1);
	        break;
	    }
	}
	if(fileDataArray.length >= 1){
		var displayFile = displayFileFunc(fileDataArray);
    	$('.display-file').html(displayFile);
    }else{
    	window.location.reload();
    }	
};

function displayFileFunc(fileDataArray){
    displayFile = '';
    for (var i = 0; i < fileDataArray.length; i++) {
    	var fname = fileDataArray[i]['name'];
        var fsize = fileDataArray[i]['size'];
        var flastModified = fileDataArray[i]['lastModified'];
    	var fsizeMB = (fsize / (1024*1024)).toFixed(2);
		if (fileDataArray.length > 0) {
    		displayFile += `
	    		<div class="display-file-content">
	    			<div class="media border p-2">
						<a class="align-self-center" href="#" onclick="removeFile(`+ flastModified +`)">
	    					<i class="fa fa-window-close"></i>
	    				</a>
						<div class="media-body">
					   		<p>` + fname + `</p> 
			    			<p>` + fsizeMB + ` MB </p>
			    		</div>
					</div> 
	    		</div>		
	    	`;			
    	}
    }
    return displayFile;
};

function saveFile(){
	if (fileDataArray.length > 0 ) {
		var formdata = new FormData();
		for (var i = 0; i < fileDataArray.length; i++) {
			formdata.append('fileDataArray[]', fileDataArray[i]);
		}
			$.ajax({
		       	url : baseUrl+'manufacture-store-session',
		       	type : 'POST',
		       	data : formdata,
		       	processData: false,  
		       	contentType: false,
		       	beforeSend: function(){
			        showLoading();
			    },
			    complete: function(){
			        hideLoading();
			    },
		       	success : function(data) {
		        	console.log(data);
		        	if (data == 'success') {
		        		window.location.href = baseUrl+"manufacture-details";	
		        	}
		       	}
			});
	}else{
		var alert = `
	   		<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning!</strong> Please Upload Atleast One File
			</div>
	   	`;
	   	$('#validation-message').html(alert);
	   	return false;	
	}	
}
// End Upload Page
// ********************

// ********************
// Cart Page
function displayMaterial(file_id){
	var technology_id = $('#'+file_id+'_technology_id').val();
	if (technology_id != 0) {
		$.ajax({
	       	url : 'manufactureDetailsAjax.php',
	       	type : 'POST',
	       	data : {'technology_id' : technology_id, 'file_id' : file_id, 'type': 'material' },
	       	success : function(data) {
	        	$('#'+file_id+'-product-material').html(data);
	        	$('#'+file_id+'-color-layer-process-content').html('');			
			}
		});
	}else{
		$('#'+file_id+'-product-material').html('');
	    $('#'+file_id+'-color-layer-process-content').html('');
	}	
};

function displayColorProcess(file_id){
	var material_id = $('#'+file_id+'_material_id').val();
	if (material_id != 0) {
		$.ajax({
	       	url : baseUrl+'manufacture/color_process',
	       	type : 'POST',
	       	data : {'file_id' : file_id, 'material_id' : material_id},
	       	success : function(data) {
	        	// console.log(data);
	        	data = $.trim(data);
	            data = $.parseJSON(data);
	            $('#'+file_id+'-color-layer-process-content').html(data['color_process_result']);
	        	$('#'+file_id+'-price-content').html(data['price_content']);
			}
		});
	}else{
		$('#'+file_id+'-color-layer-process-content').html('');
		$('#'+file_id+'-price-content').html('');
	}	
};

function costCalculation(file_id){
	var material_id = $('#'+file_id+'_material_id').val();
	var layer_height_id = $('#'+file_id+'_layer_height_id').val();
	if (material_id != 0) {
		$.ajax({
	       	url : baseUrl+'manufacture/cost_calc',
	       	type : 'POST',
	       	data : {'file_id' : file_id, 'material_id' : material_id, 'layer_height_id':layer_height_id},
	       	success : function(data) {
	        	// console.log(data);
	        	$('#'+file_id+'-price-content').html(data);
			}
		});
	}else{
		$('#'+file_id+'-color-layer-process-content').html('');
	}	
};

function deleteManufacture(){
	var msg = confirm("Are you sure you want to delete this file and information permanently?");
    if(msg != true){
        return false;
    }
};
// End Cart Page
// ********************

// ********************
// Manufacture Details Page
function changeUnit(file_id, x, y, z){
	var file_unit = $('#'+file_id+'_file_unit').val();
	if (file_unit == 'cm') {
		DimensionX = x/10;
		DimensionY = y/10;
		DimensionZ = z/10;
	}else if (file_unit == 'in') {
		DimensionX = x/25.4;
		DimensionY = y/25.4;
		DimensionZ = z/25.4;
	}else{
		DimensionX = x;
		DimensionY = y;
		DimensionZ = z;
	}
	var content = 
		`<span>`
			+DimensionX.toFixed(2)+` X `+DimensionY.toFixed(2)+` X `+DimensionZ.toFixed(2)+
		`</span> `;
	$('#'+file_id+'-unit-content').html(content);
};

// End Manufacture Details Page
// ********************

// ********************
// Overview Page
function sameAddress(){
	if($("#same_address").is(':checked')){
		$("#shipping-content input[type='text']").attr('readonly','readonly');
		$("#shipping-content input[type='number']").attr('readonly','readonly');
		$("#shipping-content select").attr('disabled','disabled');
	}else{
		$("#shipping-content input[type='text']").removeAttr('readonly','readonly');
		$("#shipping-content input[type='number']").removeAttr('readonly','readonly');
		$("#shipping-content select").removeAttr('disabled','disabled');
	}
};

function productCount(){
	$.ajax({
       	url : baseUrl+'manufacture/product_count',
       	type : 'GET',
       	processData: false,  
       	contentType: false,
       	success : function(data) {
	        if(data != undefined && data != ''){
	        	data = JSON.parse(data);
	        	for (var i = 0; i < data.length; i++) {
	        		var countContent = data[i].file_qty;
	        		var amountContent = data[i].file_amount * data[i].file_qty;
	        		amountContent = '&dollar; '+amountContent.toFixed(2);
	        		$('#'+data[i].file_id+'-product-count-content').html(countContent);
	        		document.getElementById(data[i].file_id+'_hidden_file_qty').value = countContent;
	        		$('#'+data[i].file_id+'-product-amount-content').html(amountContent);
	        		
	        	}
	        }	
		}
	});
}

function changeCount(type, file_id){
	var hidden_file_qty = $('#'+file_id+'_hidden_file_qty').val();
	var operation = true;
	if (hidden_file_qty == 1 && type == 'dec') {
		operation = false;
	}		
	if(operation == true){
		$.ajax({
	 		url : baseUrl+'manufacture/change_count',
	       	type : 'POST',
	       	data : {'type': type, 'file_id' : file_id},
	       	success : function(data) {
	        	productCount();
	        	productTotal();
				payableAmount();
			}
		});
	}	
}

function productTotal(){
	$.ajax({
       	url : baseUrl+'manufacture/product_total',
       	type : 'GET',
       	processData: false,  
       	contentType: false,
       	success : function(data) {
	        if(data != undefined && data != ''){
	        	var totalAmount = 0;
	        	data = JSON.parse(data);
	        	for (var i = 0; i < data.length; i++) {
	        		var amount = data[i].file_amount * data[i].file_qty;
        			totalAmount += amount;			
	        	}
	        	var totalCountContent = `
	        		<h4>Price (`+data.length+` Part)</h4>
	        	`;
        		var totalAmountContent = `
        			<h4> &dollar; `+totalAmount.toFixed(2)+`</h4>
        		`;
        		$('#total-count-content').html(totalCountContent);
        		$('#total-amount-content').html(totalAmountContent);
	        }	
		}
	});	
}

function displayDeliveryAmount(){
	var delivery_type = $('input[name=delivery_type]:checked').val();
	if (delivery_type == 'Express') {
		var delivery_amount = 30;	
	}else{
		var delivery_amount = 10;
	}
	$.ajax({
 		url : baseUrl+'manufacture/delivery_type',
       	type : 'POST',
       	data : {'type':delivery_type, 'amount': delivery_amount},
       	success : function(data) {
        	data = JSON.parse(data);
        	$('#delivery_amount_content').html('&#36; '+data.delivery_amount);
			payableAmount();
		}
	});
};

function payableAmount(){
	$.ajax({
 		url : baseUrl+'manufacture/payable_amount',
       	type : 'GET',
       	processData: false,  
       	contentType: false,
       	success : function(data) {
        	var totalAmount = 0;
        	data = JSON.parse(data);
        	var payAmount = data.toFixed(2);
        	var payableAmountContent = `
    			&dollar; `+payAmount+`
    		`;
    		$('#payable_amount_content').html(payableAmountContent);
    		$('#stripe_amount').val(payAmount*100);
        	$('.stripe-button').attr('data-amount', payAmount*100);	
        }
	});	
}

// End Overview Page
// ********************
