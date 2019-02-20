	<!-- Header Part -->
	<div id="header-part">
    	<nav class="navbar navbar-dark navbar-custom navbar-expand-md fixed-top" id="mainNav">
	      	<div class="container">
	        	<a class="navbar-brand" href="<?= base_url(); ?>"><img src="<?= base_url('assets/images/3dusher-logo.png'); ?>"  class="img-fluid" alt="3D Usher - 3D Design and Manufacturing"></a>
	        	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
	          		<i class="fas fa-bars"></i>
	        	</button>
		        <div class="collapse navbar-collapse justify-content-md-center" id="navbarResponsive">
			        <ul class="navbar-nav ml-auto">
		            	<li class="nav-item">
		              		<?php
		              			if(current_url() != base_url()){
		              				echo '<a class="nav-link" href="https://3dusher.com/#how-it-works">HOW IT WORKS</a>';
		              			}	
		              		?>
		              	</li>
	            		<li class="nav-item">
		            		<a class="nav-link" href="<?= base_url('resources'); ?>">RESOURCES</a>
			        	</li>
			        	<?php 
			        		if(!empty($usher_name)){ 
			        			$trunk_user_name = $usher_name;
                				if(strlen($trunk_user_name) > 10){
									$trunk_user_name = mb_strimwidth($usher_name, 0, 10, "...");
                				}
						?>
			        		<li class="nav-item dropdown mb-2">
						    	<a class="nav-link user-nav-link dropdown-tog" href="#" id="navbardrop" data-toggle="dropdown">
						        	<span>Hello,</span><br/>
						        	<?= strtoupper($trunk_user_name); ?>
						      		<i class="fa fa-caret-down"></i>
						      	</a>
						      	<div class="dropdown-menu dropdown-menu-right mt-4">
						        	<a class="nav-link" href="<?= base_url('account'); ?>">MY ACCOUNT</a>
						        	<a class="nav-link" href="<?= base_url('signout'); ?>">SIGNOUT</a>
						      	</div>
						    </li>
			        	<?php } else { ?>
							<li class="nav-item">
	                            <?php if(current_url('design-order-overview') == base_url('design-order-overview')){ ?>		
	                            	<a class="nav-link" href="#" data-toggle="modal" data-backdrop="static" data-target="#loginModal">SIGN IN</a>
	                        	<?php }else{ ?>
	                        		<a class="nav-link" href="<?= base_url('log-in'); ?>">SIGN IN</a>
	                        	<?php } ?>
	                        </li>
						<?php } ?>                    
                    	<li class="nav-item">
                       		<a class="btn btn-primary Pbtn" href="<?= base_url('start-project'); ?>">START PROJECT&nbsp;&nbsp;<i class="fas fa-external-link-alt"></i></a>
                    	</li>
			        </ul>
		        </div>
	      	</div>
	    </nav> 
	</div>
	<!-- End Header Part -->