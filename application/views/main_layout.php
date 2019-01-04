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

	<!-- Font Family -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
    <!-- Usher Custom CSS -->
	<link href="<?= base_url('assets/library/custom/css/usher-common.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/library/custom/css/usher-dynamic.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/library/custom/css/usher-static.css'); ?>" rel="stylesheet" type="text/css">
	<link href="<?= base_url('assets/library/custom/css/usher-responsive.css'); ?>" rel="stylesheet" type="text/css">
	
	<!-- Usher Location CSS -->
	<link href="<?= base_url('assets/library/custom/css/location-static.css'); ?>" rel="stylesheet" type="text/css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121242770-1"></script>
	<script>
  		window.dataLayer = window.dataLayer || [];
  		function gtag(){dataLayer.push(arguments);}
  		gtag('js', new Date());
  		gtag('config', 'UA-121242770-1');
	</script>
	<!-- End Google Analytics -->

</head>
<body>
	
	<!-- Header Part -->
	<?php $this->load->view('components/header'); ?>
	<!-- End Header Part -->

	<!-- Wrapper -->
	<div id="wrapper">
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
	<?php $this->load->view('components/footer'); ?>
	<!-- End Footer Part -->

	<!-- Bootstrap Core JS -->
	<script src="<?= base_url('assets/library/bootstrap-four/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/library/bootstrap-four/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/library/bootstrap-four/js/bootstrap.bundle.min.js'); ?>"></script>

	<!-- JQuery Plugin -->
	<!-- WOW Content Left Right Animation	 -->
    <script src="<?= base_url('assets/library/wow/js/wow.min.js'); ?>"></script>	
    <!-- Nice Scroll Content	 -->
    <script src="<?= base_url('assets/library/scrollbar/js/mCustomScrollbar.min.js'); ?>"></script>
    <!-- Easing Scroll Content   -->
    <script src="<?= base_url('assets/library/easing/js/easing.min.js'); ?>" type="text/javascript"></script>

	<!-- Custom JS -->
    <script src="<?= base_url('assets/library/custom/js/usher-common.js'); ?>"></script>
    <script src="<?= base_url('assets/library/custom/js/usher-manufacture.js'); ?>"></script>
    <script src="<?= base_url('assets/library/custom/js/usher-design.js'); ?>"></script>

    <!-- Start of HubSpot Embed Code -->
	<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4831911.js"></script>
	<!-- End of HubSpot Embed Code -->
    
</body>
</html>

