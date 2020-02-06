$(document).ready(function(){
    
	var url = window.location.pathname;
	var array = url.split('/');
	var segmentOne = array[array.length-1];
	var segmentTwo = array[array.length-2];

	// CAD Option Display
	if(segmentOne == 'manufacture-details'){

	}

	// Multiple Tabs in Same URL 
    $(function(){
		if(segmentOne == 'manufacture-details' || segmentOne == 'manufacture-overview'){
		 	if (window.IsDuplicate()) {
                var origin = window.location.origin;
				bootbox.alert("We currently do not support browsing this page in multiple browser tabs. Please close this tab or close the existing tabs to continue browsing.", function(){ 
				    window.location.href = origin; 
				});
            }
		}	
	});	

    // Nice Scroll
    $("#manufacture-part .file-name-content").mCustomScrollbar({
        theme:"dark-3"
    });

    // Pay Button Designs
    if (segmentOne == 'manufacture-overview') {
	    $(".stripe-button-el").find("span").remove();
		$(".stripe-button-el").attr('id', 'stripe-button');
		$("#stripe-button").removeClass("stripe-button-el").addClass("btn btn-primary Abtn");
		$("#stripe-button").html("PAY NOW");
	}

	if (segmentTwo == 'rfq-payment') {
		var order_id = segmentOne;
		$.ajax({
	       	url : baseUrl+'dashboard/payable_amount',
	       	type : 'POST',
	       	data : {'order_id':order_id},
       		success : function(data) {
		        $(".stripe-button-el").find("span").remove();
				$(".stripe-button-el").attr('id', 'stripe-button');
				$(".stripe-button-el").attr('style', 'width:200px');
				$("#stripe-button").removeClass("stripe-button-el").addClass("btn btn-primary Pbtn");
		        if(data != ''){		        	
					$("#stripe-button").html("PAY NOW  &dollar;"+data);
				}else{
					$("#stripe-button").html("PAY NOW");
				}	
	       	}
		});
	}

	// Product Count
	if(segmentOne == 'manufacture-overview'){
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
// File Upload Part
// File Validation
function fileValidation(uploadFile){
	for (var i = 0; i <= uploadFile.files.length - 1; i++) {
		var fileValue = uploadFile.files[i].name;
		var reg = /(.*?)\.(stl|STL|stp|STP|iges|IGES|igs|IGS|step|STEP)$/;
       	if(!fileValue.match(reg)){
    	   	var alert = `
    	   		<div class="alert alert-warning alert-dismissible">
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
	    	   		<div class="alert alert-warning alert-dismissible">
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
    	   		<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Warning! </strong> File Size More Than 100 MB.
				</div>
    	   	`;
    	   	$('#validation-message').html(alert);
    	   	return false;	
       	}
    }
    return true;
}

// File Uplaod
function cadUploadFile(){
	var uploadFile = document.getElementById('upload');
	if (uploadFile.files.length > 0) {
        var checkValidation = fileValidation(uploadFile);
	    if(checkValidation){
	        for (var i = 0; i <= uploadFile.files.length - 1; i++) {
	        	fileDataArray.push(uploadFile.files.item(i));
	        }
	        saveFile();
	    }    
    }
};

// File Uplaod
function cadUploadFileFromSideContent(){
	var uploadFile = document.getElementById('upload_from_side_content');
	if (uploadFile.files.length > 0) {
        var checkValidation = fileValidation(uploadFile);
	    if(checkValidation){
	        for (var i = 0; i <= uploadFile.files.length - 1; i++) {
	        	fileDataArray.push(uploadFile.files.item(i));
	        }
	        saveFile();
	    }    
    }
};

// File Drag and Drop
function dragUploadFile(event){
	event.preventDefault();
	var uploadFile = event.dataTransfer;
	if (uploadFile.files.length > 0) {
 		var checkValidation = fileValidation(uploadFile);
	    if(checkValidation){       
	        for (var i = 0; i <= uploadFile.files.length - 1; i++) {
	        	fileDataArray.push(uploadFile.files.item(i));
	        }
	        saveFile();
	    }    
    }
}

// File Upload, Display and Delete 
function displayUploadFile(){
	var uploadFile = document.getElementById('upload');
	if (uploadFile.files.length > 0) {
        var checkValidation = fileValidation(uploadFile);
	    if(checkValidation){
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
// File Upload, Display and Delete 

// Save File
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
	        	}else{
	    			var alert = `
				   		<div class="alert alert-warning alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>Warning!</strong> Error occured on uploading file, please refresh page and try again!
						</div>
				   	`;
				   	$('#validation-message').html(alert);
				   	return false;    		
	        	}
	       	}
		});
	}else{
		var alert = `
	   		<div class="alert alert-warning alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning!</strong> Please Upload Atleast One File
			</div>
	   	`;
	   	$('#validation-message').html(alert);
	   	return false;	
	}	
}
// End Save File
// End File Upload Part
// ********************

// ********************
// File Details Part
// Delete All Uploaded File
function deleteAllManufacture(){
	bootbox.confirm({
	    title: "Delete All",
	    message: "Are you sure you want to delete all files and information permanently?",
	    centerVertical: true,
	    buttons: {
	        cancel: {
	            label: '<i class="fa fa-times"></i> CANCEL'
	        },
	        confirm: {
	            label: '<i class="fa fa-check"></i> CONFIRM'
	        }
	    },
	    callback: function (result) {
	        if (result == true) {
	        	window.location.href = baseUrl+'manufacture-all-delete';
	        }
	    }
	});
};

// Delete Uploaded File
function deleteManufacture(file_id, file_name){
	bootbox.confirm({
	    title: "Delete "+ file_name,
	    message: "Are you sure you want to delete this file and information permanently?",
	    centerVertical: true,
	    buttons: {
	        cancel: {
	            label: '<i class="fa fa-times"></i> CANCEL'
	        },
	        confirm: {
	            label: '<i class="fa fa-check"></i> CONFIRM'
	        }
	    },
	    callback: function (result) {
	        if (result == true) {
	        	window.location.href = baseUrl+'manufacture-delete/'+file_id;
	        }
	    }
	});
};

// Change Unit
function changeUnit(file_id, x, y, z){
	var file_unit = $('#'+file_id+'-file-scale-unit').val();
	$.ajax({
       	url : baseUrl+'manufacture/change_unit',
       	type : 'POST',
	    data : {'file_unit': file_unit, 'file_id': file_id},
	    beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
	        var data = data.trim();
	        if(data == 'success'){
	        	$('#'+file_id+'-file-volume-unit').html(file_unit);
	        	checkPreferenceView();    		
	        }
		}
	});
};

// Apply Unit All Files
function applyAll(file_id){
	var file_unit = $('#'+file_id+'-file-scale-unit').val();
	$.ajax({
       	url : baseUrl+'manufacture/apply_all',
       	type : 'POST',
	    data : {'file_unit': file_unit},
	    beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
	        var data = data.trim();
	        if(data == 'success'){
	        	$('.file-scale-unit').val(file_unit);
	        	$('.file-volume-unit').html(file_unit);
	        	checkPreferenceView();    		
	        }
		}
	});
};

// File Quantity Change
function fileQtyChange(file_id){
	var file_qty = $('#'+file_id+'-file-qty').val();
	if (file_qty >= 1) {
		$.ajax({
	 		url : baseUrl+'manufacture/change_file_qty',
	       	type : 'POST',
	       	data : {'file_qty': file_qty, 'file_id' : file_id},
	       	beforeSend: function(){
		        showLoading();
		    },
		    complete: function(){
		        hideLoading();
		    },
	       	success : function(data) {
				var data = data.trim();
		        if(data == 'success'){
		        	checkPreferenceView();
		        }
			}
		});
	}	
}

// Click Preferences Tab IDs
$(document).on('click', '#question-selection-tab', function(){
	clearTabIDs();
});

$(document).on('click', '#direct-selection-tab', function(){
	clearTabIDs();
});

// Clear Preferences Tab IDs
function clearTabIDs(){
	$('.preference-component h3 div').removeClass('d-tickmark');

	$('input[name=requirement_id]').prop("checked", false);		
	$('input[name=priority_id]').prop("checked", false);
	$('.question-technology-block').html('');
	$('.question-material-block').html('');
	
	$('input[name=direct_technology]').prop("checked", false);		
	$('.direct-material-block').html("");
	
	$('.price-body').html(`
		<small class="text-muted">
			<em>Choose relevant options for us to suggest technology and material</em>
		</small>
	`);
	$('.address-block').html('');
};

// Check Preference View
function checkPreferenceView(){
	var requirement_id = $('input[name=requirement_id]:checked').val();
	var priority_id = $('input[name=priority_id]:checked').val();

	var direct_technology = $('input[name=direct_technology]:checked').val();
	var direct_material = $('input[name=direct_material]:checked').val();
	
	if(requirement_id != '' && requirement_id != undefined 
		&& priority_id != '' && priority_id != undefined){
		getQuestionTechnology();	
	}
	if(direct_technology != '' && direct_technology != undefined 
		&& direct_material != '' && direct_material != undefined){
		getDirectQuote();
	}
}

// Requirement Custom Textbox 
function requirementCustom(){
	requirement_id = $('input[name=requirement_id]:checked').val();
	if(requirement_id == '4'){
		var content = `
			<div class="form-group my-2">
				<input type="text" class="form-control" name="requirement_custom" placeholder="Specify material needed">
			</div>
		`;
		$('.requirement-custom-content').html(content);
	}else{
		$('.requirement-custom-content').html('');
	}
	getQuestionTechnology();	
}

// Display Question Technology Details
function getQuestionTechnology(){
	var requirement_id = $('input[name=requirement_id]:checked').val();
	var priority_id = $('input[name=priority_id]:checked').val();
	if(requirement_id != '' && requirement_id != undefined 
		&& priority_id != '' && priority_id != undefined){
		$.ajax({
	       	url : baseUrl+'manufacture/question_technology',
	       	type : 'POST',
	       	data : {'requirement': requirement_id, 'priority':priority_id},
	       	beforeSend: function(){
		        showLoading();
		    },
		    complete: function(){
		        hideLoading();
		    },
	       	success : function(data) {
		       	data = $.trim(data);
	            data = $.parseJSON(data);
	        	if(data != ''){
		       		$('.question-technology-block').html(data['technology_content']);
		       		$('.question-material-block').html(data['material_content']);
					$('.price-body').html(data['cost_content']);
		        	$('.address-block').html(data['address_content']);
		        	$('.preference-header-block h3 div').addClass('d-tickmark');
		        }	
			}
		});
	}	
}

// Display Question Material Details
function getQuestionMaterial(){
	var technology_id = $('input[name=professional_technology]:checked').val();
	if(technology_id != '' && technology_id != undefined ){
		$.ajax({
	       	url : baseUrl+'manufacture/question_material',
	       	type : 'POST',
	       	data : {'technology_id': technology_id},
	       	beforeSend: function(){
		        showLoading();
		    },
		    complete: function(){
		        hideLoading();
		    },
	       	success : function(data) {
		       	data = $.trim(data);
	            data = $.parseJSON(data);
	        	if(data != ''){
		       		$('.question-material-block').html(data['material_content']);
					$('.price-body').html(data['cost_content']);
		        	$('.address-block').html(data['address_content']);
		        	$('.question-technology-block h3 div').addClass('d-tickmark');
		        }	
			}
		});
	}
}

// Display Qoute or RFQ Info in Price Body
function getQuestionQuote(){
	var professional_material = $('input[name=professional_material]:checked').val();
	if(professional_material != '' && professional_material != undefined){
		$.ajax({
	       	url : baseUrl+'manufacture/question_quote',
	       	type : 'POST',
	       	data : {'material':professional_material},
	       	beforeSend: function(){
		        showLoading();
		    },
		    complete: function(){
		        hideLoading();
		    },
	       	success : function(data) {
	       		data = $.trim(data);
	            data = $.parseJSON(data);
	            if(data != ''){
		       		$('.price-body').html(data['cost_content']);
		        	$('.address-block').html(data['address_content']);
		        }
			}
		});
	}	
}

// Display Materials Directly
function getDiractMaterial(){
	var direct_technology = $('input[name=direct_technology]:checked').val();
	if(direct_technology != '' && direct_technology != undefined){
		$.ajax({
	       	url : baseUrl+'manufacture/get_direct_material',
	       	type : 'POST',
	       	data : {'technology_id':direct_technology},
	       	beforeSend: function(){
		        showLoading();
		    },
		    complete: function(){
		        hideLoading();
		    },
	       	success : function(data) {
	       		data = $.trim(data);
	            data = $.parseJSON(data);
	        	if(data != ''){
		       		$('.direct-material-block').html(data.material_content);
		       		$('.price-body').html(data.cost_content);
		       		$('.address-block').html(data.address_content);
		       		$('.preference-component h3 div').addClass('d-tickmark');
		       	}
			}
		});
	}	
}

// Display Instant Quote or RFQ Directly
function getDirectQuote(){
	var direct_technology = $('input[name=direct_technology]:checked').val();
	var direct_material = $('input[name=direct_material]:checked').val();
	if(direct_technology != '' && direct_technology != undefined 
		&& direct_material != '' && direct_material != undefined){
		$.ajax({
	       	url : baseUrl+'manufacture/get_direct_instant',
	       	type : 'POST',
	       	data : {'technology_id':direct_technology, 'material_id':direct_material},
	       	beforeSend: function(){
		        showLoading();
		    },
		    complete: function(){
		        hideLoading();
		    },
	       	success : function(data) {
	       		data = $.trim(data);
	            data = $.parseJSON(data);
	       		if(data != ''){
		       		$('.price-body').html(data.cost_content);
		       		$('.address-block').html(data.address_content);
		       	}
			}
		});
	}	
};

// Insert or Update Addres Fields in Popup
function shippingAddress(){
	var user_mobile = $('#user_mobile').val();
	var billing_address = $('#billing_address').val();
	var billing_address1 = $('#billing_address1').val();
	var billing_city = $('#billing_city').val();
	var billing_state = $('#billing_state').val();
	var billing_country = $('#billing_country').val();
	var billing_zipcode = $('#billing_zipcode').val();
	// Shipping
	var shipping_address = $('#shipping_address').val();
	var shipping_address1 = $('#shipping_address1').val();
	var city = $('#city').val();
	var state = $('#state').val();
	var country = $('#country').val();
	var pin_code = $('#pin_code').val();
	var validation = true;
	if (user_mobile == '' || user_mobile == 'undefined' || user_mobile == null || user_mobile.length != '10') {	
		$('#address-validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Phone Number is Invalid!
			</div>`
		);
		validation = false;
		return false;
	}else if (billing_address == '' || billing_address == 'undefined' || billing_address == null) {	
		$('#address-validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Billing address field cannot be empty!
			</div>`
		);
		validation = false;
		return false;
	}else if (billing_city == '' || billing_city == 'undefined' || billing_city == null) {
		$('#address-validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Please fill city name. 
			</div>`
		);
		validation = false;
		return false;
	}else if (billing_state == '' || billing_state == 'undefined' || billing_state == null) {
		$('#address-validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Please fill billing state name. 
			</div>`
		);
		validation = false;
		return false;
	}else if (billing_country == '' || billing_country == 'undefined' || billing_country == null) {
		$('#address-validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Billing Country is Invalid! 
			</div>`
		);
		validation = false;
		return false;
	}else if (billing_zipcode == '' || billing_zipcode == 'undefined' || billing_zipcode == null) {
		$('#address-validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Postal zipcode is Invalid! 
			</div>`
		);
		validation = false;
		return false;
	}else if (billing_zipcode.length < '5' || billing_zipcode.length > '6') {
		$('#address-validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Postal zipcode is Invalid! 
			</div>`
		);
		validation = false;
		return false;
	} 
	var same_address = false;
	if($("#same_address").is(':checked')){
		same_address = true;
	}
	if (same_address == false) {
		if (shipping_address == '' || shipping_address == 'undefined' || shipping_address == null) {	
			$('#address-validation-message').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Shipping address field cannot be empty!
				</div>`
			);
			validation = false;
			return false;
		}else if (city == '' || city == 'undefined' || city == null) {
			$('#address-validation-message').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please fill shipping city name. 
				</div>`
			);
			validation = false;
			return false;
		}else if (state == '' || state == 'undefined' || state == null) {
			$('#address-validation-message').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please fill state name. 
				</div>`
			);
			validation = false;
			return false;
		}else if (country == '' || country == 'undefined' || country == null) {
			$('#address-validation-message').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Billing Country is Invalid! 
				</div>`
			);
			validation = false;
			return false;
		}else if (pin_code == '' || pin_code == 'undefined' || pin_code == null) {
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Postal zipcode is Invalid! 
				</div>`
			);
			validation = false;
			return false;
		}else if ((country == 'India') && ((pin_code.split(' ').join('').split('-').join('').length != 6) || (!isNaN(pin_code)))){
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please enter a valid 6 digit number! 
				</div>`
			);
			validation = false;
			return false;
		}else if ((country == 'United States') && ((pin_code.split(' ').join('').split('-').join('').length != 5) || (!isNaN(pin_code)))){
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please enter a valid 6 digit number! 
				</div>`
			);
			validation = false;
			return false;
		}else if ((country == 'Canada') && ((pin_code.split(' ').join('').length != 6) || (canada_regex.test(pin_code) == false))){
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please enter a valid 6 digit number! 
				</div>`
			);
			validation = false;
			return false;
		}else if ((country == 'United Kingdom') && ((ukValidation(pin_code) == false))){
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please enter a valid postal number! 
				</div>`
			);
			validation = false;
			return false;
		}
	}

	if(validation == true){
		if(same_address == false){
			var obj_shipping_address = shipping_address;
			var obj_shipping_address1 = shipping_address1;
			var obj_city = city;
			var obj_state = state;
			var obj_country = country;
			var obj_pin_code = pin_code;
		}else{
			var obj_shipping_address = billing_address;
			var obj_shipping_address1 = billing_address1;
			var obj_city = billing_city;
			var obj_state = billing_state;
			var obj_country = billing_country;
			var obj_pin_code = billing_zipcode;
		}
		addressObj = {
			'user_mobile':user_mobile,
			'billing_address': billing_address,
			'billing_address1': billing_address1,
			'billing_city': billing_city,
			'billing_state': billing_state,
			'billing_country': billing_country,
			'billing_zipcode': billing_zipcode,
			'shipping_address': obj_shipping_address,
			'shipping_address1': obj_shipping_address1,
			'city': obj_city,
			'state': obj_state,
			'country': obj_country,
			'pin_code': obj_pin_code
		}
		$('#addressModal').modal('hide');
		storeAddress(addressObj);		
	}
};


function storeAddress(Obj){
	$.ajax({
       	url : baseUrl+'manufacture/store_address',
       	type : 'POST',
       	data : Obj,
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
			data = $.trim(data);
            data = $.parseJSON(data);
       		if(data != ''){
	       		$('.address-block').html(data.address_content);
	       	}		       		
		}
	});
};

// UK Address Field Validation
function ukValidation(pin_code){
	var postal_code = pin_code.split(' ').join('').split('-').join('');
	var first_digit = ["Q", "q", "V", "v","X","x"];
	var second_digit = ["I", "i", "J", "j", "Z", "z"];
	var third_digit = ["A", "B", "C", "D", "E", "F", "G", "H", "J", "K", "S", "T", "U", "V", "W", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
	var alpha_regex = /^[a-zA-Z ]+$/i ;
	var numeric_regex = /^[0-9]+$/ ;
	
	if(postal_code.length == 5){
		if(first_digit.includes(postal_code[0].toUpperCase()) == false){
			if(second_digit.includes(postal_code[1].toUpperCase()) == false){
				if((numeric_regex.test(postal_code[2]) == true) && (alpha_regex.test(postal_code[3]) == true) && (alpha_regex.test(postal_code[4]) == true)){
					return true;		
				}
			}		
		}	
	} 
	
	if(postal_code.length == 6){
		if(first_digit.includes(postal_code[0].toUpperCase()) == false){
			if(second_digit.includes(postal_code[1].toUpperCase()) == false){
				if(third_digit.includes(postal_code[2].toUpperCase()) == true){
					if((numeric_regex.test(postal_code[3]) == true) && (alpha_regex.test(postal_code[4]) == true) && (alpha_regex.test(postal_code[5]) == true)){
						return true;		
					}
				}	
			}		
		}	
	}

	if(postal_code.length == 7){
		if(first_digit.includes(postal_code[0].toUpperCase()) == false){
			if(second_digit.includes(postal_code[1].toUpperCase()) == false){
				if(third_digit.includes(postal_code[2].toUpperCase()) == true){
					if((numeric_regex.test(postal_code[4]) == true) && (alpha_regex.test(postal_code[5]) == true) && (alpha_regex.test(postal_code[6]) == true)){
						return true;		
					}
				}	
			}		
		}	
	}

	return false;
}

// Custom Input Validation
function customInputValidation(){
	var requirement_custom = $('input[name=requirement_custom]').val();
	if (requirement_custom != undefined) {
		if (requirement_custom == '') {
			$('#validation-message').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong></strong> Please specify material requirement.
				</div>`
			);
			return false;	
		}
	}
	return true;
}

function manualRFQSubmit(){
	var requirement_id = $('input[name=requirement_id]:checked').val();
	var priority_id = $('input[name=priority_id]:checked').val();
	
	var direct_technology = $('input[name=direct_technology]:checked').val();
	var direct_material = $('input[name=direct_material]:checked').val();
	if(requirement_id != '' && requirement_id != undefined && priority_id != '' && priority_id != undefined){
		var status = customInputValidation();
		if(status == false){
			return status;
		}else{
			var professional_technology = $('input[name=professional_technology]:checked').val();	
			var professional_material = $('input[name=professional_material]:checked').val();	
			var technology_id = '';
			if(professional_technology != '' && professional_technology != undefined){
				technology_id = professional_technology;
			}
			var material_id = '';
			if(professional_material != '' && professional_material != undefined){
				material_id = professional_material;
			}
			var requirement_custom = '';
			if(requirement_id == 4){
				requirement_custom = $('input[name=requirement_custom]').val();
			}
			manualQuoteObj = {
				'user_level': 'QA', 
				'requirement_id': requirement_id, 
				'requirement_custom': requirement_custom, 
				'priority_id': priority_id, 
				'direct_technology' :technology_id,
				'direct_material' :material_id
			}
		}
	}else{
		if(direct_material == '' || direct_material == undefined){
			direct_material = '';
		}
		manualQuoteObj = {
			'user_level': 'DS',
			'requirement_id': '', 
			'requirement_custom': '', 
			'priority_id': '',
			'direct_technology' :direct_technology,
			'direct_material' :direct_material
		}
	}
	bootbox.confirm({
	    title: "Confirm Submission",
	    message: "By clicking 'Confirm' you will be submitting the files for manual quotation. Our engineers will review the files and connect with you within next 24 hours.",
	    centerVertical: true,
	    buttons: {
	        cancel: {
	            label: '<i class="fa fa-times"></i> CANCEL'
	        },
	        confirm: {
	            label: '<i class="fa fa-check"></i> CONFIRM'
	        }
	    },
	    callback: function (result) {
	        if (result == true) {
	        	manualQuote(manualQuoteObj);
	        }
	    }
	});
};

function manualQuote(manualQuoteObj){
	$.ajax({
       	url : baseUrl+'manufacture/manual_quote',
       	type : 'POST',
       	data : {
			'user_level': manualQuoteObj.user_level, 
       		'requirement_id': manualQuoteObj.requirement_id, 
       		'requirement_custom': manualQuoteObj.requirement_custom, 
       		'priority_id': manualQuoteObj.priority_id, 
       		'direct_technology': manualQuoteObj.direct_technology, 
       		'direct_material': manualQuoteObj.direct_material 
       	},
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
			if (data == 'success') {
        		window.location.href = baseUrl+"manufacture-request";	
        	}		       		
		}
	});
};

// End File Details Part
// ********************

// ********************
// Overview Page
// Same Address on Shipping and Profile
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

// File Count Increament and Decreament
function productCount(){
	$.ajax({
       	url : baseUrl+'manufacture/product_count',
       	type : 'GET',
       	processData: false,  
       	contentType: false,
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
	        if(data != undefined && data != ''){
	        	data = JSON.parse(data);
	        	for (var i = 0; i < data.length; i++) {
	        		var countContent = data[i].file_qty;
	        		var amountContent = data[i].file_amount * data[i].file_qty;
	        		amountContent = '&dollar; '+amountContent.toFixed(2);
	        		// $('#'+data[i].file_id+'-product-count-content').html(countContent);
	        		// document.getElementById(data[i].file_id+'_hidden_file_qty').value = countContent;
	        		$('#'+data[i].file_id+'-product-amount-content').html(amountContent);
	        		
	        	}
	        }	
		}
	});
}

// Change File Count
function changeCount(file_id){
	var hidden_file_qty = $('#'+file_id+'_hidden_file_qty').val();
	var operation = true;
	if (hidden_file_qty < 1) {
		operation = false;
	}		
	if(operation == true){
		$.ajax({
	 		url : baseUrl+'manufacture/change_count',
	       	type : 'POST',
	       	data : {'file_id' : file_id, 'file_qty': hidden_file_qty},
	       	beforeSend: function(){
		        showLoading();
		    },
		    complete: function(){
		        hideLoading();
		    },
	       	success : function(data) {
	        	var data = data.trim();
		        if(data == 'success'){
		        	productCount();
		        	displayDeliveryAmount();
		        	productTotal();
					payableAmount();
		        }
			}
		});
	}	
}

// Delete Uploaded File in Overview
function deleteManufactureOverview(file_id, file_name){
	bootbox.confirm({
	    title: "Delete "+ file_name,
	    message: "Are you sure you want to delete this file and information permanently?",
	    centerVertical: true,
	    buttons: {
	        cancel: {
	            label: '<i class="fa fa-times"></i> CANCEL'
	        },
	        confirm: {
	            label: '<i class="fa fa-check"></i> CONFIRM'
	        }
	    },
	    callback: function (result) {
	        if (result == true) {
	        	window.location.href = baseUrl+'manufacture-overview-delete/'+file_id;
	        }
	    }
	});
};

// Change Mode of Communication
function changeCommunicationMode(){
	var communication_mode = $('input[name=communication_mode]:checked').val();
	$.ajax({
 		url : baseUrl+'manufacture/change_communication_mode',
       	type : 'POST',
       	data : {'communication_mode' : communication_mode},
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
        	var data = data.trim();
        }
	});
}

// Display Product Total Count and Amount 
function productTotal(){
	$.ajax({
       	url : baseUrl+'manufacture/product_total',
       	type : 'GET',
       	processData: false,  
       	contentType: false,
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
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

// Change Delivery Type and Amount
function displayDeliveryAmount(){
	$.ajax({
 		url : baseUrl+'manufacture/delivery_type',
       	type : 'POST',
       	data : {'type':'Normal'},
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
        	data = JSON.parse(data);
        	console.log(data);
        	$('#delivery_amount_content').html('&#36; '+data.delivery_amount);
			payableAmount();
		}
	});
};

// Delete Discount Amount
function deleteDiscount(){
	bootbox.confirm({
	    title: "Remove Discount",
	    message: "Are you sure you want to remove discount permanently?",
	    centerVertical: true,
	    buttons: {
	        cancel: {
	            label: '<i class="fa fa-times"></i> CANCEL'
	        },
	        confirm: {
	            label: '<i class="fa fa-check"></i> CONFIRM'
	        }
	    },
	    callback: function (result) {
	        if (result == true) {
	        	window.location.href = baseUrl+'manufacture-remove-discount';
	        }
	    }
	});
};

// Display Payable Amount in Button
function payableAmount(){
	$.ajax({
 		url : baseUrl+'manufacture/payable_amount',
       	type : 'GET',
       	processData: false,  
       	contentType: false,
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
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







// Extra
function fileQtyCount(){
	$.ajax({
       	url : baseUrl+'manufacture/product_count',
       	type : 'GET',
       	processData: false,  
       	contentType: false,
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
	        if(data != undefined && data != ''){
	        	data = JSON.parse(data);
	        	for (var i = 0; i < data.length; i++) {
	        		var countContent = data[i].file_qty;
	        		var amountContent = data[i].file_amount * data[i].file_qty;
	        		amountContent = '&dollar; '+amountContent.toFixed(2);
	        		$('#'+data[i].file_id+'-product-count-content').html(countContent);
	        		document.getElementById(data[i].file_id+'_hidden_file_qty').value = countContent;
	        		
	        	}
	        }	
		}
	});
}

// User Lavel
function userLevel(){
	var user_level = $('input[name=user_level]:checked').val();
	$.ajax({
       	url : baseUrl+'manufacture/user_level/'+user_level,
       	type : 'GET',
       	processData: false,  
       	contentType: false,
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
	        if(data != undefined && data != ''){
	        	$('#new_professional_block').html(data);
	        }else{
	    		$('#new_professional_block').html('');
	        }
		}
	});
	$('#suitable_material_block').html('');
	$('#cad-cost-body').html(`
		<small class="text-muted">
			<em>Answer the questions for us to suggest you the right technology and process</em>
		</small>
	`);
}

function processCustom(){
	material_process = $('input[name=material_process]:checked').val();
	if(material_process == '1'){
		var content = `
			<div class="form-group my-2">
				<input type="text" class="form-control" name="material_process_custom" placeholder="Specify manufacturing process">
			</div>
		`;
		$('#material_process_custom_content').html(content);
	}else{
		$('#material_process_custom_content').html('');
	}
	professionalMaterial();	
}

function usecaseCustom(){
	material_usecase = $('input[name=material_usecase]:checked').val();
	if(material_usecase == '1'){
		var content = `
			<div class="form-group my-2">
				<input type="text" class="form-control" name="material_usecase_custom" placeholder="End Usage of the Part">
			</div>
		`;
		$('#material_usecase_custom_content').html(content);
	}else{
		$('#material_usecase_custom_content').html('');
	}
	professionalMaterial();	
}

// Display Material in Popup
$(document).on('click', '.edit-material', function(){
	var technology_id = $(this).attr("id");  
   	$.ajax({  
        url : baseUrl+'manufacture/change_material',
       	type : 'POST',
       	data : {'technology_id':technology_id},
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success:function(data){
            $('.material-list').html(data);  
            $('#materialModal').modal('show');  
        }  
   	});
});

// Edit Material in Popup
function editMaterial(){
	$('#materialModal').modal('hide');
	var requirement_id = $('input[name=requirement_id]:checked').val();
	var priority_id = $('input[name=priority_id]:checked').val();
	var material_id = $('#edit_material_id').val();
	if(requirement_id != '' && requirement_id != undefined 
		&& priority_id != '' && priority_id != undefined){
		$.ajax({
	       	url : baseUrl+'manufacture/edit_material',
	       	type : 'POST',
	       	data : {'requirement': requirement_id, 'priority':priority_id, 'material_id': material_id},
	       	beforeSend: function(){
		        showLoading();
		    },
		    complete: function(){
		        hideLoading();
		    },
	       	success : function(data) {
		       	data = $.trim(data);
	            data = $.parseJSON(data);
	        	if(data != ''){
		       		$('.question-material-block').html(data['material_content']);
					$('.price-body').html(data['cost_content']);
		        	$('.address-block').html('');
		        }			
			}
		});
	}
}

function displayDeliveryAmount1(){
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
       	beforeSend: function(){
	        showLoading();
	    },
	    complete: function(){
	        hideLoading();
	    },
       	success : function(data) {
        	data = JSON.parse(data);
        	$('#delivery_amount_content').html('&#36; '+data.delivery_amount);
			payableAmount();
		}
	});
};