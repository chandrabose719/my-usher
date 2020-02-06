$(document).ready(function(){
    
    // Page Loading Animation
    showLoading();
    
    // Remove index.php in URL
	$(function(){
		var base_url = window.location.origin;
    	var url = window.location.pathname;
		var arr = url.split('/');
	    if (arr.includes('index.php')) {
		    for(var i = 0; i < arr.length; i++) {
		        if(arr[i] == 'index.php') {
		            arr.splice(i, 1);
		            break;
		        }
		    }
		    var removedUrl = arr.join('/');
			redirectUrl = base_url + removedUrl;
			window.location.href = redirectUrl;
		}
	});

	// Get URL
    var url = window.location.pathname;
	var array = url.split('/');
	var segmentOne = array[array.length-1];
	var segmentTwo = array[array.length-2];

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
            }, 50, 'easeInOutExpo');
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

    // Fixed Footer
	$(function(){
        if ($(document).height() > $(window).height()) {
            $('.footer').removeClass('fixed-bottom');
        }else{
            $('.footer').addClass('fixed-bottom');
        }
    });

    // End Page Loading Animation
    hideLoading();

});

// Base URL
var baseUrl = 'http://localhost/tdu/ci/usher/';

// Loading Animation
function showLoading(){
	$('#loading-part').css('display', 'block');
}
function hideLoading(){
	$('#loading-part').css('display', 'none');
}

// Privacy Sidebar
$(".privacy-sidebar ul a li").click(function(){
    $('li').removeClass('privacy-active');
    $(this).addClass('privacy-active');
});

// Home Subscription
function subscriptionValidation(){
	var subscription_email = $('#subscription_email').val();
	if(subscription_email == "" || subscription_email.indexOf("@", 0) < 0 || subscription_email.indexOf(".", 0) < 0){
		$('.subscription-email-error').html('<p class="text-warning pl-3">Please enter a valid email</p>');
		return false;
	}
}

// Start Project
$('.start-design').mouseenter(function(){
	$('.start-manufacture').css({'background-color':'rgba(243, 243, 243,0.4)'})
	$('.start-manufacture div h5').css({'opacity':0.5,'transition': 'all 0.5'})	
});

$('.start-design').mouseleave(function(){
	$('.start-manufacture').css({'opacity':1,'background-color':'transparent'})
	$('.start-manufacture div h5').css({'opacity':1,'transition': 'all 0.5'})
});

$('.start-manufacture').mouseenter(function(){
	$('.start-design').css({'background-color':'rgba(243, 243, 243,0.4)'})
	$('.start-design div h5').css({'opacity':0.5,'transition': 'all 0.5'})	
});

$('.start-manufacture').mouseleave(function(){
	$('.start-design').css({'opacity':1,'background-color':'transparent'})
	$('.start-design div h5').css({'opacity':1,'transition': 'all 0.5'})
});
// End Start Project

// Project Form
$(function($) {
    var $window = $(window);
    $window.resize(function resize(){
        if ($window.width() < 767) {
            $('#basic-details').addClass('active').removeClass('fade');
            $('#additional-details').addClass('active').removeClass('fade');
            $('#contact-details').addClass('active').removeClass('fade');
        }
    }).trigger('resize');   
});

// function activateTab(){
//     $('#project-details').addClass('active show d-block');
//     $('#additional-details').addClass('active show');
//     $('#contact-details').addClass('active show');
// }

// if($(window).width()<767){
// 	$('#project-details-link').click(function(){
// 		$(this).css({'background-color':'#5c89bd','color':'#ffffff'});
// 		$('#additional-details-link').css({'background-color':'','color':''});
// 		$('#additional-details-link a').css({'color':'#000000'});
// 		$('#contact-details-link').css({'background-color':'','color':''});
// 	    $('html, body').animate({
// 	        scrollTop: $("#project-details").offset().top - 50 
// 	    }, 100); 
// 	    activateTab();
// 	});
// 	$('#additional-details-link').click(function(){
// 		$(this).css({'background-color':'#5c89bd','color':'#ffffff'});
// 		$('#additional-details-link a').css({'color':'#ffffff'});
// 		$('#project-details-link').css({'background-color':'#5c89bd','color':'#ffffff'});
// 		$('#project-details-link a').css({'color':'#ffffff'});
// 		$('#contact-details-link').css({'background-color':'','color':''});
// 	    $('html, body').animate({
// 	        scrollTop: $("#additional-details").offset().top - 50 
// 	    }, 100);
//         activateTab();     	    	
// 	});
// 	$('#contact-details-link').click(function(){
// 		$(this).css({'background-color':'#5c89bd','color':'#ffffff'});
// 		$('#project-details-link').css({'background-color':'#5c89bd','color':'#ffffff'});
// 		$('#project-details-link a').css({'color':'#ffffff'});
// 		$('#additional-details-link').css({'background-color':'#5c89bd','color':'#ffffff'});
// 		$('#additional-details-link a').css({'color':'#ffffff'});
// 	    $('html, body').animate({
// 	        scrollTop: $("#contact-details").offset().top - 50 
// 	        // scrollTop: $("#contact-details").offset().top
// 	    }, 100);
//         activateTab();	    	
// 	});		 	

$('.basic-details-link').click(function(){
	$(this).css({'background-color':'#5c89bd','color':'#ffffff'});
	$('.additional-details-link, .contact-details-link').css({'background-color':'','color':''});
	$('.additional-details-link a, .contact-details-link a').css({'color':'#000000'});
});
$('.additional-details-link').click(function(){
	$(this, '.basic-details-link').css({'background-color':'#5c89bd','color':'#ffffff'});
	$('.contact-details-link').css({'background-color':'','color':''});
	$('.additional-details-link a, .basic-details-link a').css({'color':'#ffffff'});
	$('.contact-details-link a').css({'color':''});
});
$('.contact-details-link').click(function(){
	$(this).css({'background-color':'#5c89bd','color':'#ffffff'});
	$('.basic-details-link, .additional-details-link').css({'background-color':'#5c89bd','color':'#ffffff'});
	$('.basic-details-link a, .additional-details-link a,  .contact-details-link a').css({'color':'#ffffff'});
});

function basicDetails(){
	$('[href="#basic-details"]').tab('show');	
	$('.basic-details-link').css({'background-color':'#5c89bd','color':'#ffffff'});
	$('.additional-details-link, .contact-details-link').css({'background-color':'','color':''});
	$('.additional-details-link a, .contact-details-link a').css({'color':'#000000'});
}

function additionalDetails(){
	$('[href="#additional-details"]').tab('show');	
	$('.additional-details-link, .basic-details-link').css({'background-color':'#5c89bd','color':'#ffffff'});
	$('.contact-details-link').css({'background-color':'','color':''});
	$('.additional-details-link a, .basic-details-link a').css({'color':'#ffffff'});
	$('.contact-details-link a').css({'color':'#000000'});
}

function contactDetails(){
	$('[href="#contact-details"]').tab('show');
	$('.contact-details-link, .basic-details-link, .additional-details-link').css({'background-color':'#5c89bd','color':'#ffffff'});
	$('.basic-details-link a, .additional-details-link a, .contact-details-link a').css({'color':'#ffffff'});
}
// End Project Form

function changeStatus(type){
	var status;
	if($('#'+type).is(':checked')){
		status = 'active';
	}else{
		status = 'inactive';
	}
	window.location.href = baseUrl+"dashboard/change_status/"+type+"/"+status;	
}

// ********************
// Register Validation
function registerValidation(){
	var user_name = $('#user_name').val();
	var user_email = $('#user_email').val();
	var user_password = $('#user_password').val();
	var conf_password = $('#conf_password').val();
	if (user_name == '' || user_email == '' || user_password == '' || conf_password == '') {	
		$('#register_error').html(
			`<div class="alert alert-danger alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<small class="text-danger">
				<strong> Error! </strong>Please fill all the fields.</small>
			</div>`
		);
		return false;
	}
};
function nameFocusout(){
	var user_name = $('#user_name').val();
	var regex = /^[a-zA-Z ]+$/i ;
	if(user_name == "" || user_name.length < 3 || user_name.length > 15 || regex.test(user_name) == false){
		$('#name_error').html('Use a minimum of 3 to a maximum of 15 alphabets only');
	}		
}
function emailFocusout(){
	var user_email = $('#user_email').val();
	if(user_email == "" || user_email.indexOf("@", 0) < 0 || user_email.indexOf(".", 0) < 0){
		$('#email_error').html('Invalid Email');
	}
}
function passwordFocusout(){
	var user_password = $('#user_password').val();
	if(user_password == "" || user_password.length < 6 || user_password.length > 16){
		$('#password_error').html('The password should contain at least 6 and at most 16 characters!');
	}	
}
function confPasswordFocusout(){
	var conf_password = $('#conf_password').val();
	if (conf_password != "") {
		if(conf_password !== $('#user_password').val()){
			$('#conf_password_error').html('Passwords do not match!');
		}
	}else{
		$('#conf_password_error').html('Re-enter the password for confirmation');
	}	
}
function registerFocusin(value){
	$(value).next().html('');
	$('#register_error').html('');
}
// End register Validation

// Login Validation
function loginValidation(){
	var login_user_email = $('#login_user_email').val();
	var login_user_password = $('#login_user_password').val();
	if (login_user_email == '' || login_user_password == '') {
		$('#login_error').html(
			`<div class="alert alert-danger alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<small class="text-danger">
					<strong> Error! </strong> Please fill all the fields. 
				</small>
			</div>`
		);
		return false;
	}	
};

function loginEmailFocusout(){
	var login_user_email = $('#login_user_email').val();
	if(login_user_email == "" || login_user_email.indexOf("@", 0) < 0 || login_user_email.indexOf(".", 0) < 0){
		$('#login_email_error').html('Please enter a valid Email address.');
	}
}
function loginFocusin(value){
	$(value).next().html('');
	$('#login_error').html('');
}
// End login validation
// ********************

// ********************
// Contact Page
function disabledSubmit(){
	var contact_name = $('#contact_name').val();
	var contact_email = $('#contact_email').val();
	var contact_mobile = $('#contact_mobile').val();
	if (contact_name != "" && contact_email != "" && contact_mobile != ""
		&& contact_name.length > 3 && contact_name.length < 15 
		&& contact_email.indexOf("@", 0) > 0 && contact_email.indexOf(".", 0) > 0
		&& contact_mobile.length == 10 ) {
		$("#contact_submit").removeAttr("disabled");
	}else{
		$("#contact_submit").attr("disabled", true);
	}
}

function contactNameFocusout(){
	var contact_name = $('#contact_name').val();
	var regex = /^[a-zA-Z ]+$/i ;
	if(contact_name == "" || contact_name.length < 3 || contact_name.length > 15 || regex.test(contact_name) == false){
		$('#contact_name_error').html('Use a minimum of 3 to a maximum of 15 alphabets only');
	}	
	disabledSubmit();	
}

function contactEmailFocusout(){
	var contact_email = $('#contact_email').val();
	if(contact_email == "" || contact_email.indexOf("@", 0) < 0 || contact_email.indexOf(".", 0) < 0){
		$('#contact_email_error').html('Please enter a valid Email ID');
	}
	disabledSubmit()	
}

function contactPhoneFocusout(){
	var contact_mobile = $('#contact_mobile').val();
	if(contact_mobile=="" || contact_mobile.length<10 || contact_mobile.length>10){
		$('#contact_mobile_error').html('Please enter a valid 10 digit number');
	}
	disabledSubmit()			
}

function contactFocusin(value){
	$(value).next().html('');
}
// End Contact Page
// ********************

// ********************
// Overview Address Validation
function checkoutValidation(){
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
	
	var canada_regex = /^[ABCEGHJ-NPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ -]?\d[ABCEGHJ-NPRSTV-Z]\d$/i;
	var uk_regex = /^[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}$/i;

	if (user_mobile == '' || user_mobile == 'undefined' || user_mobile == null || user_mobile.length != '10') {	
		$('#billing-msg').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Phone Number is Invalid!
			</div>`
		);
		return false;
	}else if (billing_address == '' || billing_address == 'undefined' || billing_address == null) {	
		$('#billing-msg').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Address field cannot be empty!
			</div>`
		);
		return false;
	}else if (billing_city == '' || billing_city == 'undefined' || billing_city == null) {
		$('#billing-msg').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Please fill city name. 
			</div>`
		);
		return false;
	}else if (billing_state == '' || billing_state == 'undefined' || billing_state == null) {
		$('#billing-msg').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Please fill state name. 
			</div>`
		);
		return false;
	}else if (billing_country == '' || billing_country == 'undefined' || billing_country == null) {
		$('#billing-msg').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Billing Country is Invalid! 
			</div>`
		);
		return false;
	}else if (billing_zipcode == '' || billing_zipcode == 'undefined' || billing_zipcode == null) {
		$('#billing-msg').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Postal zipcode is Invalid! 
			</div>`
		);
		return false;
	}else if (billing_zipcode.length < '5' || billing_zipcode.length > '6') {
		$('#billing-msg').html(
			`<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong> Error! </strong> Postal zipcode is Invalid! 
			</div>`
		);
		return false;
	} 
	var same_address = false;
	if($("#same_address").is(':checked')){
		same_address = true;
	}
	if (same_address == false) {
		if (shipping_address == '' || shipping_address == 'undefined' || shipping_address == null) {	
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Address field cannot be empty!
				</div>`
			);
			return false;
		}else if (city == '' || city == 'undefined' || city == null) {
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please fill city name. 
				</div>`
			);
			return false;
		}else if (state == '' || state == 'undefined' || state == null) {
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please fill state name. 
				</div>`
			);
			return false;
		}else if (country == '' || country == 'undefined' || country == null) {
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Billing Country is Invalid! 
				</div>`
			);
			return false;
		}else if (pin_code == '' || pin_code == 'undefined' || pin_code == null) {
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Postal zipcode is Invalid! 
				</div>`
			);
			return false;
		}else if ((country == 'India') && ((pin_code.split(' ').join('').split('-').join('').length != 6) || (!isNaN(pin_code)))){
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please enter a valid 6 digit number! 
				</div>`
			);
			return false;
		}else if ((country == 'United States') && ((pin_code.split(' ').join('').split('-').join('').length != 5) || (!isNaN(pin_code)))){
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please enter a valid 6 digit number! 
				</div>`
			);
			return false;
		}else if ((country == 'Canada') && ((pin_code.split(' ').join('').length != 6) || (canada_regex.test(pin_code) == false))){
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please enter a valid 6 digit number! 
				</div>`
			);
			return false;
		}else if ((country == 'United Kingdom') && ((ukValidation(pin_code) == false))){
			$('#shipping-msg').html(
				`<div class="alert alert-warning alert-dismissible fade show">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong> Error! </strong> Please enter a valid postal number! 
				</div>`
			);
			return false;
		}
	}	
};

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

// End Overview Address Validation
// ********************

// ********************
// Dashboard Part
function disableProceed(){
	var checkboxes = document.getElementsByName('file_id[]');
	var selected = [];
	for (var i=0; i<checkboxes.length; i++) {
	    if (checkboxes[i].checked) {
	        selected.push(checkboxes[i].value);
	    }
	}
	if(selected != ''){
		$('.proceed-btn-content').html(
        	'<input type="submit" class="btn btn-primary Pbtn" id="proceed-btn" value="PROCEED" />'
        );
	}else{
		$('.proceed-btn-content').html('');
	}
}

// End Dashboard Part
// ********************


/****************/
/*Calculator Page*/

function calculationResult(){
	var partLength = $('#part_length').val();
	var partBreadth = $('#part_breadth').val();
	var partHeight = $('#part_height').val();
	var partVolume = $('#part_volume').val();
	var partQuantity = $('#part_quantity').val();
	var partDensity = $('#part_density').val();
	var countryCode = $('#country_code').val();
	if(partLength != undefined && partLength != null && partLength != '' 
		&& partBreadth != undefined && partBreadth != null && partBreadth != '' 
		&& partHeight != undefined && partHeight != null && partHeight != '' 
		&& partVolume != undefined && partVolume != null && partVolume != '' 
		&& partQuantity != undefined && partQuantity != null && partQuantity != '' 
		&& partDensity != undefined && partDensity != null && partDensity != ''){
		
		var calcdata = new FormData();
		calcdata.append('partLength', partLength);
		calcdata.append('partBreadth', partBreadth);
		calcdata.append('partHeight', partHeight);
		calcdata.append('partVolume', partVolume);
		calcdata.append('partQuantity', partQuantity);
		calcdata.append('partDensity', partDensity);
		calcdata.append('countryCode', countryCode);
		$.ajax({
			url: baseUrl+'usc-calculation',
			type : 'POST',
	       	data : calcdata,
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
	        	// console.log(data);
	        	$('.usc-output-content').html(data);	        	
	       	}
		});
	}

};

/*End Calculator Page*/
/****************/



