<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="<?= base_url('assets/images/favicon.png'); ?>" rel="shortcut icon" type="image/x-icon">
	<title><?= $title; ?></title>
	<meta name="description" content="<?= $description; ?>">
	<meta name="keyword" content="<?= $keyword; ?>">
    <meta name="copyright" content="3D Usher Inc">
    <meta name="google-site-verification" content="">
	
	<!-- Bootstrap Core CSS -->
    <link href="<?= base_url('assets/library/bootstrap-four/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/library/bootstrap-four/css/fontawesome-all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/library/bootstrap-four/css/animate.min.css'); ?>" rel="stylesheet" type="text/css">
	
	<!-- Nice Scroll Content	 -->
	<link href="<?= base_url('assets/library/scrollbar/css/mCustomScrollbar.min.css'); ?>" rel="stylesheet" type="text/css">
	<!-- Datepicker Content	 -->
	<link href="<?= base_url('assets/library/datepicker/css/datepicker.min.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Font Family -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
    <!-- Usher Custom CSS -->
	<link href="<?= base_url('assets/library/custom/css/usher-common.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/library/custom/css/usher-dynamic.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/library/custom/css/usher-static.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/library/custom/css/usher-responsive.css'); ?>" rel="stylesheet" type="text/css">
	<!-- Usher Blog CSS -->
	<link href="<?= base_url('assets/library/custom/css/blog-static.css'); ?>" rel="stylesheet" type="text/css">
	<!-- Usher Location CSS -->
	<link href="<?= base_url('assets/library/custom/css/location-static.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Google Tag Manager -->
	<!-- <script>(function(w,d,s,l,i){
		w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-PXH5KWS');
	</script> -->

	<!-- End Google Tag Manager -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-121242770-1"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());
  		gtag('config', 'UA-121242770-1');
	</script> -->
	<!-- End Google Analytics -->

	<!-- Facebook Pixel Code -->
	<!-- <script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window,document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '139040806725112');
	fbq('track', 'PageView');
	</script>
	<noscript>
	<img height="1" width="1" 
	src="https://www.facebook.com/tr?id=139040806725112&ev=PageView
	https://www.facebook.com/tr?id=139040806725112&ev=PageView&noscript=1"/>
	</noscript> -->
	<!-- End Facebook Pixel Code -->

</head>
<body>
	
	<!-- Google Tag Manager (noscript) -->
	<!-- <noscript>
		<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PXH5KWS" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript> -->
	<!-- End Google Tag Manager (noscript) -->

	<!-- Header Part -->
	<?php 
		if((current_url() == base_url('project')) || (current_url() == base_url('project-confirmation'))){	
			$this->load->view('components/project-header');
		}else{
			$this->load->view('components/header');		
		}		
	?>	
	<!-- End Header Part -->

	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Loading Animation -->
		<div id="loading-part">
		    <div class="loading-content">
		    	<div class="sk-cube sk-cube1"></div>
		        <div class="sk-cube sk-cube2"></div>
		        <div class="sk-cube sk-cube3"></div>
		        <div class="sk-cube sk-cube4"></div>
		        <div class="sk-cube sk-cube5"></div>
		        <div class="sk-cube sk-cube6"></div>
		        <div class="sk-cube sk-cube7"></div>
		        <div class="sk-cube sk-cube8"></div>
		        <div class="sk-cube sk-cube9"></div>
		    </div>
		</div>
		<!-- End Loading Animation -->
		<!-- Alert Content -->
		<div id="alert-message">
			<?php 
				$alert_message = $this->session->flashdata('success');
				if (!empty($alert_message)){ 
					echo' 	
						<div class="alert alert-success alert-dismissible fade show">
					    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    	<strong> Success! </strong>'.$alert_message.'
						</div>
					';	 
				} 
			?>
			<?php 
				$alert_message = $this->session->flashdata('error');
				if (!empty($alert_message)) {
					echo'
						<div class="alert alert-warning alert-dismissible fade show">
					    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					    	<strong> Error! </strong>'.$alert_message.'
						</div>
					';	
				} 
			?>
		</div>
		<div id="validation-message">
	        
	    </div>
		<!-- End Alert Content -->
		
		<!-- Main Body Content -->
		<?php $this->load->view($body);?>
		<!-- End Main Body Content -->

	</div>				
	<!-- End Wrapper -->

	<!-- Footer Part -->
	<?php 
		if((current_url() == base_url('project')) || (current_url() == base_url('project-confirmation'))){	
			$this->load->view('components/project-footer');
		}else{
			$this->load->view('components/footer');		
		}		
	?>
	<!-- End Footer Part -->

	<!-- Bootstrap Core JS -->
	<script src="<?= base_url('assets/library/bootstrap-four/js/jquery.min.js'); ?>"></script>
	<script src="<?= base_url('assets/library/bootstrap-four/js/jquery-ui.js'); ?>"></script>
	<script src="<?= base_url('assets/library/bootstrap-four/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/library/bootstrap-four/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/library/bootstrap-four/js/bootstrap.bundle.min.js'); ?>"></script>

	<!-- JQuery Plugin -->
	<!-- Multiple Tabs -->
    <script src="<?= base_url('assets/library/duplicate-tab/js/duplicate.js'); ?>" type="text/javascript"></script>
	<!-- WOW Content Left Right Animation	 -->
    <script src="<?= base_url('assets/library/wow/js/wow.min.js'); ?>"></script>	
    <!-- Nice Scroll Content	 -->
    <script src="<?= base_url('assets/library/scrollbar/js/mCustomScrollbar.min.js'); ?>"></script>
    <!-- Easing Scroll Content   -->
    <script src="<?= base_url('assets/library/easing/js/easing.min.js'); ?>" type="text/javascript"></script>
	<!-- Datepicker Content   -->
    <script src="<?= base_url('assets/library/datepicker/js/datepicker.min.js'); ?>" type="text/javascript"></script>
    <!-- Bootbox Popup -->
    <script src="<?= base_url('assets/library/bootbox/js/bootbox.min.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/library/bootbox/js/bootbox.locales.min.js'); ?>" type="text/javascript"></script>

	<!-- Custom JS -->
    <script src="<?= base_url('assets/library/custom/js/usher-common.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/library/custom/js/usher-manufacture.js'); ?>" type="text/javascript"></script>
    <script src="<?= base_url('assets/library/custom/js/usher-design.js'); ?>" type="text/javascript"></script>

    <!-- Start of HubSpot Embed Code -->
	<script type='text/javascript' id='hs-script-loader' async defer src='//js.hs-scripts.com/4831911.js'></script>
	<!-- End of HubSpot Embed Code -->

	<!-- Begin WebTrax -->
	<!-- <script type="text/javascript">
		var wto = wto || [];
		wto.push(['setWTID', 'wt-8fdd9ce3-c163-4cf7-8e27-f88e99e0ea5c']);
		wto.push(['webTraxs']);
		(function() {
			var wt = document.createElement('script');
			wt.src = document.location.protocol + '//www.webtraxs.com/wt.php';
			wt.type = 'text/javascript';
			wt.async = true;
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wt, s);
		})();
	</script>

	<noscript>
		<img src="https://www.webtraxs.com/webtraxs.php?id=wt-8fdd9ce3-c163-4cf7-8e27-f88e99e0ea5c&st=img
			https://www.webtraxs.com/webtraxs.php?id=wt-8fdd9ce3-c163-4cf7-8e27-f88e99e0ea5c&st=img
			https://www.webtraxs.com/webtraxs.php?id=wt-8fdd9ce3-c163-4cf7-8e27-f88e99e0ea5c&st=img
			https://www.webtraxs.com/webtraxs.php?id=wt-8fdd9ce3-c163-4cf7-8e27-f88e99e0ea5c&st=img" 
			alt="" />
	</noscript> -->
	<!-- End WebTrax -->
	    
</body>
</html>

