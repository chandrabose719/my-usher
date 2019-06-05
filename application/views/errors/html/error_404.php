<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<link href="https://3dusher.com/assets/images/favicon.png" rel="shortcut icon" type="image/x-icon">
	<title>Page Not Found | 3D Usher</title>
	<meta name="description" content="3Dusher is the online 3D Design Printing Service Company Provides 3D Design &Manufacturing Solutions for your Industry. If you are looking for Custom Parts 3d Printing in New York and Bangalore Contact us today!!">
	<meta name="keyword" content="Online 3D Design Printing Service, Custom Parts 3d Printing New York, Additive Manufacturing Companies in Bangalore">
    <meta name="copyright" content="3D Usher Inc">
    <meta name="google-site-verification" content="">
	
	<!-- Bootstrap Core CSS -->
    <link href="https://3dusher.com/assets/library/bootstrap-four/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://3dusher.com/assets/library/bootstrap-four/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
    <link href="https://3dusher.com/assets/library/bootstrap-four/css/animate.min.css" rel="stylesheet" type="text/css">

	<!-- Font Family -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<body>
	<style>
		body{
			font-family: 'Roboto', sans-serif;
		}
		.btn-primary:hover,.btn-primary:focus,.btn-primary:active, 
		.btn-primary:active:focus:not(:disabled):not(.disabled),
		.btn:focus, .btn:active, .btn:hover{
		    box-shadow: none!important;
		    outline: 0;
		}
		.Pbtn, .Pbtn:active, .Pbtn:focus, 
		.Pbtn:visited, .Pbtn:focus-within,
		.Pbtn:not(:disabled):not(.disabled).active, 
		.Pbtn:not(:disabled):not(.disabled):active{
			font-size: 14px;
		    font-weight: 500;
		    font-style: normal;
		    padding: 10px 10px;
		    border-radius: 5px;
		    letter-spacing: 0.4px;
		    color: #ffffff;
		    border-color: #5c98bd;
		    background-color: #5c98bd;
		}
		.Pbtn:hover{
		    color: #5c98bd;
		    border-color: #5c98bd;
		    background: transparent;
		}
		#error-part .error-image{
			background-color: #dcdcdc;
			height: 300px;
		}		
		@media (max-width:767px){
			#error-part .error-image{
				height: 150px;
			}
		}
	</style>
	<div id="error-part">
		<div class="container-fluid">
			<div class="row">
				<div class="d-flex justify-content-center w-100 error-image">
					<img class="img-fluid" src="https://3dusher.com/assets/images/404.png">
				</div>
			</div>
			<div class="row">
				<div class="d-flex flex-column justify-content-center w-100 p-2">
					<h2 class="text-center pt-5 pb-2">Sorry, there's been a disconnect</h2>
					<small class="text-center py-2">We cannot find the page you're looking for. Please verify the link and try again</small>
					<div class="col-4 offset-4 text-center">	
						<a href="https://3dusher.com" class="btn btn-primary Pbtn my-2">BACK TO HOME</a>
					</div>	
				</div>
			</div>
		</div>	
	</div>
</body>
</html>



