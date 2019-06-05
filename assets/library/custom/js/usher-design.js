// ********************
// Design Project Page
$(document).ready(function(){

	// Project Form Date Picker
	$(function(){
		$('#award_date, #needed_by').fdatepicker({
			initialDate: new Date(),
			format: 'dd-mm-yyyy',
			startDate: new Date(),
			disableDblClickSelection: true,
			leftArrow:'<<',
			rightArrow:'>>',
			closeButton: false
		});
	});

	// Project Form Draggable
	$('#psq').sortable();
});


var resourceFileArray = [];

function designDescriptionCount() {
  	var descLength = $('#design_description').val().length;
  	$('#design_description_count').text(descLength+'/5000');
};

function finishingCustom(){
	var design_finishing = $('#design_finishing').val();
	if (design_finishing == '1') {
		$('#finishing-custom').html(
			`<input type="text" class="form-control" name="design_finishing_custom" id="design_finishing_custom" placeholder="Please specify finishing requirement*">`
		);
	}else{
		$('#finishing-custom').html('');
	}
};
function materialCustom(){
	var design_material = $('#design_material').val();
	if (design_material == '1') {
		$('#material-custom').html(
			`<input type="text" class="form-control" name="design_material_custom" id="design_material_custom" placeholder="Please specify material needed*">`
		);
	}else{
		$('#material-custom').html('');
	}
};
function temperatureCustom(){
	var design_temperature = $('#design_temperature').val();
	if (design_temperature == '1') {
		$('#temperature-custom').html(
			`<input type="text" class="form-control" name="design_temperature_custom" id="design_temperature_custom" placeholder="Please specify the temperature*">`
		);
	}else{
		$('#temperature-custom').html('');
	}
};
function designProjectSubmit(){
	var design_name = $('#design_name').val();
	var design_description = $('#design_description').val();
	var design_usage = $('#design_usage').val();
	var design_assembly = $("input[name='design_assembly']:checked").val();
	var design_precision = $("input[name='design_precision']:checked").val();
	var design_finishing = $('#design_finishing').val();
	var design_finishing_custom = $('#design_finishing_custom').val();
	var design_material = $('#design_material').val();
	var design_material_custom = $('#design_material_custom').val();
	var design_temperature = $('#design_temperature').val();
	var design_temperature_custom = $('#design_temperature_custom').val();
	var industry_id = $('#industry_id').val();

	if (design_finishing_custom != undefined) {
		if (design_finishing_custom == '') {
			$('#validation-message').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong></strong> Please specify finishing needed.
				</div>`
			);
			return false;	
		}
	}else{
		var design_finishing_custom = '';
	}

	if (design_material_custom != undefined) {
		if (design_material_custom == '') {
			$('#validation-message').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong></strong> Please specify material needed.
				</div>`
			);
			return false;	
		}
	}else{
		var design_material_custom = '';
	}

	if (design_temperature_custom != undefined) {
		if (design_temperature_custom == '') {
			$('#validation-message').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong></strong> Please specify the temperature.
				</div>`
			);
			return false;	
		}
	}else{
		var design_temperature_custom = '';
	}
	
	if (design_name == '' || design_name == undefined || design_name == null) {	
		$('#validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Project Name is required!
			</div>`
		);
		return false;
	}else if (design_description == '' || design_description == undefined || design_description == null) {	
		$('#validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Please specify project description!
			</div>`
		);
		return false;
	}else if (design_usage == '' || design_usage == undefined || design_usage == null) {	
		$('#validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Please specify end usage of the part!
			</div>`
		);
		return false;
	}else if (design_assembly == '' || design_assembly == undefined || design_assembly == null
		|| design_assembly == '0') {	
		$('#validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Please select assembly preference for your project!
			</div>`
		);
		return false;
	}else if (design_precision == '' || design_precision == undefined || design_precision == null
		|| design_precision == '0') {	
		$('#validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Please select precision preference for your project!
			</div>`
		);
		return false;
	}else if (design_finishing == '' || design_finishing == undefined || design_finishing == null
		|| design_finishing == '0') {	
		$('#validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Please select finishing preference for your project!
			</div>`
		);
		return false;
	}else if (design_material == '' || design_material == undefined || design_material == null
		|| design_material == '0') {	
		$('#validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Please select material preference for your project!
			</div>`
		);
		return false;
	}else if (design_temperature == '' || design_temperature == undefined || design_temperature == null
		|| design_temperature == '0') {	
		$('#validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Please select environment temperature for your project!
			</div>`
		);
		return false;
	}else{
		var formdata = new FormData();
		formdata.append('design_name', design_name);
		formdata.append('design_description', design_description);
		formdata.append('design_usage', design_usage);
		formdata.append('design_assembly', design_assembly);
		formdata.append('design_precision', design_precision);
		formdata.append('design_finishing', design_finishing);
		formdata.append('design_finishing_custom', design_finishing_custom);
		formdata.append('design_material', design_material);
		formdata.append('design_material_custom', design_material_custom);
		formdata.append('design_temperature', design_temperature);
		formdata.append('design_temperature_custom', design_temperature_custom);
		formdata.append('industry_id', industry_id);
		formdata.append('type', 'design-detail');
		if (resourceFileArray.length > 0 ) {
			for (var i = 0; i < resourceFileArray.length; i++) {
			    formdata.append('design_resource[]', resourceFileArray[i]);
			}
		}else{
			formdata.append('design_resource[]', '');
		}
		$.ajax({
			url: baseUrl+'design-store-session',
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
	        	data = $.trim(data);
	        	console.log(data);
	        	if (data == 'success') {
	        		window.location.href = baseUrl+"design-order-overview";	
	        	}else{
	        		$('#validation-message').html(
						`<div class="alert alert-warning alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong></strong> Error occured, Please try again!
						</div>`
					);
					return false;
	        	}
	       	}
		});
	}
};

function designResource(){
	var resourceFile = document.getElementById('design_resource');
	if (resourceFile.files.length > 0) {
        for (var i = 0; i <= resourceFile.files.length - 1; i++) {
    		var fileValue = resourceFile.value;
    		var reg = /(.*?)\.(pdf|docx|zip|jpeg|jpg|JPEG|JPG|png|stl|STL|stp|step|igs|iges)$/;
	       	if(!fileValue.match(reg)){
	    	   	var alert = `
	    	   		<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Wrong file! </strong> Please upload the file in PDF, docx, JPG, JPEG, PNG or ZIP format.
					</div>
	    	   	`;
	    	   	$('#validation-message').html(alert);
	    	   	return false;
	       	}
	       	var fileName = resourceFile.files[i].name;
	        if(resourceFileArray != ''){
	        	for(var iName in resourceFileArray){
				    if(resourceFileArray[iName]['name'] == fileName){
				    	var alert = `
			    	   		<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong> Warning! </strong> You cannot upload two files with same name.
							</div>
			    	   	`;
			    	   	$('#validation-message').html(alert);
			    	   	return false;    
				    }
				}
			}	
        	var fileSize = resourceFile.files[i].size / 1024 / 1024;
        	if (fileSize > 10) {
	       		var alert = `
	    	   		<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Warning! </strong> File(s) you are trying to upload is more than upload limit 10MB.
					</div>
	    	   	`;
	    	   	$('#validation-message').html(alert);
	    	   	return false;	
	       	}
	    }
        for (var i = 0; i <= resourceFile.files.length - 1; i++) {
        	resourceFileArray.push(resourceFile.files.item(i));
        }
        var displayResource = displayResourceFunc(resourceFileArray);
        $('#display-resource').html(displayResource);
    }
};

function removeResource(name){
	for(var i in resourceFileArray){
	    if(resourceFileArray[i]['lastModified'] == name){
	        resourceFileArray.splice(resourceFileArray[i],1);
	        break;
	    }
	}
	if(resourceFileArray.length >= 1){
		var displayResource = displayResourceFunc(resourceFileArray);
    	$('#display-resource').html(displayResource);
    }else{
    	window.location.reload();
    }	
};

function displayResourceFunc(resourceFileArray){
    displayResource = '';
    for (var i = 0; i < resourceFileArray.length; i++) {
    	var fname = resourceFileArray[i]['name'];
        var fsize = resourceFileArray[i]['size'];
        var flastModified = resourceFileArray[i]['lastModified'];
    	var fsizeMB = (fsize / (1024*1024)).toFixed(2);
		if (resourceFileArray.length > 0) {
    		displayResource += `
			    	<div class="col-6 col-xs-12">
			    		<div class="display-file-content">
			    			<div class="media border p-2">
								<a class="align-self-center" href="#" onclick="removeResource(`+ flastModified +`)">
			    					<i class="fa fa-window-close"></i>
			    				</a>
								<div class="media-body">
							   		<p>` + fname + `</p> 
					    			<p>` + fsizeMB + ` MB </p>
					    		</div>
							</div> 
			    		</div>
			    	</div>	
	    	`;			
    	}
    }
    return displayResource;
};
// End Design Project Page
// ********************

// ********************
// Project Page
// Decsription
function descriptionCount() {
  	var letterCount = $('#project_description').val().length;
  	$('#description_count').text(letterCount+'/5000');
};

// Instructions
function instructionCount() {
  	var letterCount = $('#project_instruction').val().length;
  	$('#instruction_count').text(letterCount+'/5000');
};

// Information
function infoCount() {
  	var letterCount = $('#project_info').val().length;
  	$('#info_count').text(letterCount+'/5000');
};

// Resource File
function selectResource(){
	var resource_type = $('#resource_type').val();
	var content =`	
		<div class="upload-btn">
        	<input id='project_resource' name="project_resource[]" type="file" multiple="multiple" onchange="projectResource()" class="form-control hide" />
        	<label for="project_resource" class="btn btn-large"> Choose File </label>
    	</div>
    	<div class="row" id="project-resource-content">
        
    	</div>
	`;
	if(resource_type == 'YES'){
		var view_content =`	
			<p>Upload your 3D Design files:</p>
			<span>Upload multiple files up to 100 mb</span>
		`;
		view_content += content;	
		$('.upload-btn-content').html(view_content);
	}else if(resource_type == 'NO'){
		var ref_content =`	
			<p>Upload your reference files:</p>
			<span>Upload multiple files up to 100 mb</span>
		`;
		ref_content += content;
		$('.upload-btn-content').html(ref_content);
	}else{
		$('.upload-btn-content').html('');
	}
}

var projectResourceArray = [];
function projectResource(){
	var resourceFile = document.getElementById('project_resource');
	if (resourceFile.files.length > 0) {
        for (var i = 0; i <= resourceFile.files.length - 1; i++) {
    		var fileValue = resourceFile.value;
    		var reg = /(.*?)\.(zip|stl|STL|stp|STP|step|STEP|igs|IGS|iges|IGES|pdf|docx|jpeg|jpg|JPEG|JPG|png|PNG)$/;
	       	if(!fileValue.match(reg)){
		    	var alert = `
	    	   		<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Wrong file! </strong> Please upload the file in zip, stl, stp, step, igs, PDF, docx, JPG, JPEG or PNG format.
					</div>
	    	   	`;
		    	$('#validation-message').html(alert);
	    	   	return false;
	       	}
	       	var fileName = resourceFile.files[i].name;
	        if(projectResourceArray != ''){
	        	for(var iName in projectResourceArray){
				    if(projectResourceArray[iName]['name'] == fileName){
				    	var alert = `
			    	   		<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<strong> Warning! </strong> You cannot upload two files with same name.
							</div>
			    	   	`;
			    	   	$('#validation-message').html(alert);
			    	   	return false;    
				    }
				}
			}	
        	var fileSize = resourceFile.files[i].size / 1024 / 1024;
        	if (fileSize > 100) {
	       		var alert = `
	    	   		<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong> Warning! </strong> File(s) you are trying to upload is more than upload limit 100MB.
					</div>
	    	   	`;
	    	   	$('#validation-message').html(alert);
	    	   	return false;	
	       	}
	    }
        for (var i = 0; i <= resourceFile.files.length - 1; i++) {
        	projectResourceArray.push(resourceFile.files.item(i));
        }
        var displayResource = displayProjectResource(projectResourceArray);
        $('#project-resource-content').html(displayResource);
    }
};

function removeProjectResource(name){
	for(var i in projectResourceArray){
	    if(projectResourceArray[i]['lastModified'] == name){
	        projectResourceArray.splice(projectResourceArray[i],1);
	        break;
	    }
	}
	if(projectResourceArray.length >= 1){
		var displayResource = displayResourceFunc(projectResourceArray);
    	$('#project-resource-content').html(displayResource);
    }else{
    	window.location.reload();
    }	
};

function displayProjectResource(projectResourceArray){
    displayResource = '';
    for (var i = 0; i < projectResourceArray.length; i++) {
    	var fname = projectResourceArray[i]['name'];
        var fsize = projectResourceArray[i]['size'];
        var flastModified = projectResourceArray[i]['lastModified'];
    	var fsizeMB = (fsize / (1024*1024)).toFixed(2);
		if (projectResourceArray.length > 0) {
    		displayResource += `
			    	<div class="col-6 col-xs-12">
			    		<div class="display-file-content">
			    			<div class="media border p-2">
								<a class="align-self-center" href="javascript:;" onclick="removeProjectResource(`+flastModified+`)">
			    					<i class="fa fa-window-close"></i>
			    				</a>
								<div class="media-body">
							   		<p>` + fname + `</p> 
					    			<p>` + fsizeMB + ` MB </p>
					    		</div>
							</div> 
			    		</div>
			    	</div>	
	    	`;			
    	}
    }
    return displayResource;
};
// End Resource File
// Store Session
function projectSubmit(){
	var project_name = $('#project_name').val();
	var project_usage = $('#project_usage').val();
	var project_description = $('#project_description').val();
	var project_technology = $('#project_technology').val();
	var project_finish = $('#project_finish').val();
	var project_tolerance = $('#project_tolerance').val();
	var project_material = $('#project_material').val();
	var project_qty = $('#project_qty').val();
	var project_location = $('#project_location').val();
	var award_date = $('#award_date').val();
	var needed_by = $('#needed_by').val();
	var project_instruction = $('#project_instruction').val();
	var project_info = $('#project_info').val();
	var resource_type = $('#resource_type').val();
	var user_name = $('#user_name').val();
	var user_email = $('#user_email').val();
	var user_company = $('#user_company').val();
	var user_mobile = $('#user_mobile').val();
	var user_address = $('#user_address').val();
	var award_timestamp = new Date(award_date.split("-").reverse().join("-")).getTime();
	var needed_timestamp = new Date(needed_by.split("-").reverse().join("-")).getTime();
	var psq_arr = [];
	var psq = $('#psq :input');
	$(psq).each(function() {
        var input_value = $(this).val();
    	psq_arr.push(input_value);
    });
	var validation = true;
	var basic_content = true;
	var additional_content = true;
	var contact_content = true;
	if (project_name == '' || project_name == undefined || project_name == null) {	
		$('#project_name').addClass('project-form-danger');
		validation = false;
		basic_content = false;
	}
	if (project_usage == '' || project_usage == undefined || project_usage == null) {	
		$('#project_usage').addClass('project-form-danger');
		validation = false;
		basic_content = false;
	}
	if (project_description == '' || project_description == undefined || project_description == null) {	
		$('#project_description').addClass('project-form-danger');
		validation = false;
		basic_content = false;
	}
	if (project_material == '' || project_material == undefined || project_material == null) {	
		$('#project_material').addClass('project-form-danger');
		validation = false;
		additional_content = false;
	}
	if (project_qty == '' || project_qty == undefined || project_qty == null) {	
		$('#project_qty').addClass('project-form-danger');
		validation = false;
		additional_content = false;
	}
	if(award_timestamp > needed_timestamp){
		$('#award_date').addClass('project-form-danger');
		$('#needed_by').addClass('project-form-danger');
		validation = false;
		additional_content = false;
	}
	if (resource_type == '' || resource_type == undefined || resource_type == null
	 || resource_type == '0') {	
		$('#resource_type').addClass('project-form-danger');
		validation = false;
		additional_content = false;
	}
	if (user_name == '' || user_name == undefined || user_name == null) {	
		$('#user_name').addClass('project-form-danger');
		validation = false;
		contact_content = false;
	}
	if (user_email == '' || user_email == undefined || user_email == null) {	
		$('#user_email').addClass('project-form-danger');
		validation = false;
		contact_content = false;
	}
	if (user_company == '' || user_company == undefined || user_company == null) {	
		$('#user_company').addClass('project-form-danger');
		validation = false;
		contact_content = false;
	}
	if (user_address == '' || user_address == undefined || user_address == null) {	
		$('#user_address').addClass('project-form-danger');
		validation = false;
		contact_content = false;
	}
	if(validation == true){
		var formdata = new FormData();
		formdata.append('project_name', project_name);
		formdata.append('project_description', project_description);
		formdata.append('project_usage', project_usage);
		formdata.append('project_technology', project_technology);
		formdata.append('project_finish', project_finish);
		formdata.append('project_tolerance', project_tolerance);
		formdata.append('project_material', project_material);
		formdata.append('project_qty', project_qty);
		formdata.append('project_location', project_location);
		formdata.append('psq', psq_arr);
		formdata.append('award_date', award_date);
		formdata.append('needed_by', needed_by);
		formdata.append('project_instruction', project_instruction);
		formdata.append('project_info', project_info);
		formdata.append('resource_type', resource_type);
		formdata.append('user_name', user_name);
		formdata.append('user_email', user_email);
		formdata.append('user_company', user_company);
		formdata.append('user_mobile', user_mobile);
		formdata.append('user_address', user_address);
		if (projectResourceArray.length > 0 ) {
			for (var i = 0; i < projectResourceArray.length; i++) {
			    formdata.append('project_resource[]', projectResourceArray[i]);
			}
		}else{
			formdata.append('project_resource[]', '');
		}
		$.ajax({
			url: baseUrl+'project-store-session',
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
	        	data = $.trim(data);
	        	console.log(data);
	        	if (data == 'success') {
	        		window.location.href = baseUrl+"project-confirmation";	
	        	}else{
	        		$('#validation-message').html(
						`<div class="alert alert-warning alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong></strong> Error occured, Please try again!
						</div>`
					);
					return false;
	        	}
	       	}
		});
	}else{
		if(basic_content == false){
			basicDetails();
		}else if (additional_content == false) {
			additionalDetails();
		}else{
			contactDetails();
		}
		$('#validation-message').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Please fill all the mandatory fields
			</div>`
		);	
	}
};

// End Project Page
// ********************