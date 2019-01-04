$(document).ready(function(){
    
    // Page Loading Animation
    showLoading();
    
    // Tooltip
	$('[data-toggle="tooltip"]').tooltip();

    // Content WOW 
    wow = new WOW({}).init();

    // Easy Scroll
	$(function(){
          $('.page-scroll a').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
              scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
          });
    });

	// beforeSend: function(){
 //        showLoading();
 //    },
 //    complete: function(){
 //        hideLoading();
 //    }


    // End Page Loading Animation
    hideLoading();
});

function showLoading(){
	$('#loading-part').css('display', 'block');
}
function hideLoading(){
	$('#loading-part').css('display', 'none');
}

// ********************
// Register Page
// Register Validation
function registerValidation(){
	var user_name = $('#user_name').val();
	var user_email = $('#user_email').val();
	var user_mobile = $('#user_mobile').val();
	var user_password = $('#user_password').val();
	var conf_password = $('#conf_password').val();
	var redirect_register = $('#redirect_register').val();
	var message = 'validation-message';
	if (redirect_register == 'register') {
		message = 'validation-message';
	}else if(redirect_register == 'manufacture' || redirect_register == 'design-order-confirmation'){
		message = 'register-modal-validation';
	}else{
		message = 'modal-validation';
	}
	if (user_name == '' || user_name == 'undefined' || user_name == null 
		|| user_name.length < '3' || user_name.length > '20') {	
		$('#'+message).html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Name field should contain minimum 3 characters!
			</div>`
		);
		return false;
	}
	else if (user_email == '' || user_email == 'undefined' || user_email == null
		|| check_email(user_email) == false) {
		$('#'+message).html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> E-mail ID is Invalid! 
			</div>`
		);
		return false;
	}
	else if (user_mobile == '' || user_mobile == 'undefined' || user_mobile == null 
		|| user_mobile.length != '10') {	
		$('#'+message).html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Phone number field is Invalid! 
			</div>`
		);
		return false;
	}
	else if (user_password == '' || user_password == 'undefined' || user_password == null 
		|| user_password.length < '6' || user_password.length > '15') {	
		$('#'+message).html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Password should contain minimum 6 characters! 
			</div>`
		);
		return false;
	}else if (conf_password == '' || conf_password == 'undefined' || conf_password == null 
		|| conf_password.length < '6' || conf_password.length > '15') {	
		$('#'+message).html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Confirm Password should contain minimum 6 characters! 
			</div>`
		);
		return false;
	}else if ((user_password != conf_password) || (user_password.length != conf_password.length)) {	
		$('#'+message).html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Passwords do not match! 
			</div>`
		);
		return false;
	}
};

// Login Validation
function loginValidation(){
	var login_user_email = $('#login_user_email').val();
	var login_user_password = $('#login_user_password').val();
	var redirect_login = $('#redirect_login').val();
	var message = 'validation-message';
	if (redirect_login == 'account') {
		message = 'validation-message';
	}else if(redirect_login == 'manufacture' || redirect_login == 'design-order-confirmation'){
		message = 'login-modal-validation';
	}else{
		message = 'modal-validation';
	}

	if (login_user_email == '' || login_user_email == 'undefined' || login_user_email == null
		|| check_email(login_user_email) == false) {
		$('#'+message).html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> E-mail ID is Invalid!
			</div>`
		);
		return false;
	}
	else if (login_user_password == '' || login_user_password == 'undefined' || login_user_password == null 
		|| login_user_password.length < '6' || login_user_password.length > '15') {	
		$('#'+message).html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Password is Incorrect! 
			</div>`
		);
		return false;
	}
};

// Check Email
function check_email(email){
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(email.match(mailformat)){
		return true;
	}
	else{
		return false;
	}
}
// End Register Page
// ********************