$(document).ready(function(){
    
    // Page Loading Animation
    showLoading();
    
    // Tooltip
	$('[data-toggle="tooltip"]').tooltip();

    // Content WOW 
    wow = new WOW({}).init();

    // Dropdown
    $('.dropdown-tog').dropdown();

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

    // Div Redirection
    $(function() {
        var url = document.location.toString();
        if (url.match('#')) {
            $('a[href="#' + url.split('#')[1] + '"]').tab('show');
        }
        $('a[href="#' + url.split('#')[1] + '"]').on('shown', function (e) {
            window.location.hash = e.target.hash;
        });
    });

    // End Page Loading Animation
    hideLoading();

});

// Base URL
var baseUrl = 'http://localhost/tdu/ci/usher/';

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
	var user_password = $('#user_password').val();
	var conf_password = $('#conf_password').val();
	var redirect_register = $('#redirect_register').val();
	var current_register = $('#current_register').val();
	var message = 'validation-register-modal';
	if(redirect_register == 'account'){
		message = 'validation-message';
	}
	if (user_name == '' || user_name == 'undefined' || user_name == null 
		|| user_name.length < '2' || user_name.length > '15') {	
		$('#'+message).html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong></strong> Name field should contain minimum 2 characters but not more than 15 characters.
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
	var current_login = $('#current_login').val();
	var message = 'validation-login-modal';
	if(redirect_login == 'account'){
		message = 'validation-message';
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