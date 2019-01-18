	<section id="summary-part" class="mx-5">
		<div class="container">
			<h3>Overview</h3>
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="summary-content summary-header">
						<div class="row">
							<div class="col-xl col-lg col-md col-sm col-xs">
								<h4>Order Summary</h4>
							</div>
						</div>
					</div>	
					<?php
						$sno = 1;
						$total_product_count = 0;
						$total_file_amount = 0;
						foreach ($file_data_result as $cadkey => $cadvalue) {
							// Material ID
							$material_query['material_id'] = $cadvalue['material_id'];
							$material_data = $this->Material_m->get($material_query, TRUE);
							$material_name = $material_data->material_name;
							$technology_name = $material_data->technology_name;
							// Layer Height ID
							$layer_height_query['layer_height_id'] = $cadvalue['layer_height_id'];
							$layer_height_data = $this->LayerHeight_m->get($layer_height_query, TRUE);
							$layer_height_name = $layer_height_data->layer_height_name;
							// Color ID
							if(!empty($cadvalue['color_id'])){
								$color_query['color_id'] = $cadvalue['color_id'];
								$color_data = $this->Color_m->get($color_query, TRUE);
								$color_name = $color_data->color_name;
							}else{
								$color_name = $cadvalue['color_id'];
							}
							// Post Process
							if(!empty($cadvalue['post_process_id'])){
								$post_process_query['post_process_id'] = $cadvalue['post_process_id'];
								$post_process_data = $this->PostProcess_m->get($post_process_query, TRUE);
								$post_process_name = $post_process_data['post_process_name'];
							}else{
								$post_process_name = $cadvalue['post_process_id'];
							}	
					?>
					<div class="summary-content summary-body">
						<div class="row">
							<div class="col-xl col-lg col-md col-sm col-xs">
								<p><?= $sno; ?>. <?= $cadkey; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<p>Technology: <?= $material_name; ?></p>
								<p>Color: <?= $color_name; ?></p>
								<p>Post Process: <?= $post_process_name; ?></p>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<p>Material: <?= $material_name; ?></p>
								<p>Layer Height: <?= $layer_height_name; ?></p>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="cad-quantity">
									<ul class="pagination pagination-sm">
							    		<li class="page-item">
							      		<?php if ($cadvalue['file_qty'] == 1) {?>
							      			<a class="page-link rounded-circle" href="<?= base_url('manufacture/file_qty/decreament/'.$cadvalue['file_id']); ?>" onclick="return false;" style="cursor:default;">
							      		<?php }else{?>
							      			<a class="page-link rounded-circle" href="<?= base_url('manufacture/file_qty/decreament/'.$cadvalue['file_id']); ?>">
							      		<?php }?>		
							      				<i class="fas fa-minus"></i>
							      			</a>
							    		</li>
							    		<li class="page-item disabled">
							    			<a class="page-link page-link-none" href="#">
							    				<?= $cadvalue['file_qty']; ?>	
							    			</a>
							    		</li>
							    		<li class="page-item">
							    			<a class="page-link rounded-circle" href="<?= base_url('manufacture/file_qty/increament/'.$cadvalue['file_id']); ?>">
							    				<i class="fas fa-plus"></i>
							    			</a>
							    		</li>
							  		</ul>
							  	</div>	
								<?php
									$file_amount = $cadvalue['file_amount'] * $cadvalue['file_qty'];
								?>
								<h4>&dollar; <?= number_format($file_amount, 2); ?></h4>	
							</div>
						</div>	
					</div>
					<?php
						$sno += 1;
						}
						if (empty($user_data->shipping_address) || empty($user_data->city) || empty($user_data->billing_address) || empty($user_data->billing_city)) {
							$spg_addr = false;
						}else{
							$spg_addr = true;
						}
					?>
					<div class="summary-content summary-header">
						<div class="row">
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-xs-12">
								<h4>Shipping Address</h4>
							</div>
							<!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">	
								<a class="btn btn-outline-dark rounded-circle" href="#" data-id="<?= $user_data->user_id;?>" data-toggle="modal" data-backdrop="static" data-target="#addressModal">
								<?php
									if ($spg_addr == true) {
										echo '
											<i class="fas fa-edit"></i>
										';
									}else{
										echo '
											<i class="fas fa-plus"></i>
										';	
									}
								?>
								</a>
							</div> -->
						</div>
					</div>
					<?php
						if ($spg_addr == true) {
					?>
					<div class="summary-content summary-body">
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<p>Address 1: <?= $user_data->shipping_address; ?></p>
								<p>Address 2: <?= $user_data->shipping_address1; ?></p>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<p>City: <?= $user_data->city; ?></p>
								<p>State: <?= $user_data->state; ?></p>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<?php
									$country_query['country_code'] = $user_data->country;
									$country_data = $this->Country_m->get($country_query, TRUE);
								?>
								<p>Country: <?= $country_data->country_name; ?></p>
								<p>Pincode: <?= $user_data->pin_code; ?></p>
							</div>		
						</div>
					</div>
					<?php
						}
					?>
				</div>		
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="sticky-top sticky-offset">	
						<div class="price-content">
							<div class="price-header">
								<h4>Price Details</h4>
							</div>
							<?php
								$total_file_count = 0;
								$total_file_amount = 0;
								foreach ($file_data_result as $ckey => $cvalue) {
									$file_amount = $cvalue['file_amount'] * $cvalue['file_qty'];
									$total_file_amount += $file_amount;
									$total_file_count += 1;
								}
								$delivery_type = $order_data_result['delivery_type'];
								$delivery_amount = $order_data_result['delivery_amount'];
							?>
							<div class="price-body">
								<div class="row">
									<div class="col-sm-7">
										<h4>Price (<?= $total_file_count; ?> Part)</h4>
									</div>
									<div class="col-sm-5">
										<h4>&dollar; <?= number_format($total_file_amount, 2); ?></h4>
									</div>		
								</div>
								<div class="row">
									<div class="col-sm-7">
										<h4>Shipping: </h4>
									</div>
									<div class="col-sm-5">
										<h4>&#36; <?= number_format($delivery_amount, 2); ?></h4>
									</div>
								</div>
								<div class="row">
									<div class="col-5 offset-1">
										<label class="radio-inline">	
					    					<input type="radio" name="delivery_type" id="delivery_type" value="Normal" onclick="displayDeliveryAmount()" <?php if($delivery_type == 'Normal'){echo "checked";}?> >
					    					Normal
					    				</label>
									</div>
									<div class="col-5">
										<label class="radio-inline">
									    	<input type="radio" name="delivery_type" id="delivery_type" value="Express" onclick="displayDeliveryAmount()" <?php if($delivery_type == 'Express'){echo "checked";}?> > 
									    	Express
									    </label>
									</div>
								</div><hr>
								<div class="row">
									<div class="col-sm-7">
										<h4>Payable Amount</h4>
									</div>
									<div class="col-sm-5">
										<?php
											$payable_amount = $total_file_amount + $delivery_amount;
										?>
										<h4>&dollar; <?= number_format($payable_amount, 2); ?></h4>
									</div>		
								</div>
								<div class="row">
									<?php
										$total_stripe_amount = $payable_amount;
										$total_stripe_amount = number_format($total_stripe_amount, 2);
										$total_stripe_amount = $total_stripe_amount * 100;
										if (empty($user_data->shipping_address) || empty($user_data->city) || empty($user_data->billing_address) || empty($user_data->billing_city)) {	
									?>
									<div class="col-sm">	
										<form method="POST" action="<?= base_url('manufacture-payment'); ?>">
											<input type="hidden" name="stripe_amount" value="<?= $total_stripe_amount; ?>">
											<script
										    	src="https://checkout.stripe.com/checkout.js" 
										    	class="stripe-button"
										    	data-key="<?= $this->config->item('publishableKey'); ?>"
										    	data-amount="<?= $total_stripe_amount; ?>"
										    	data-name="<?= 'Welcome '.$user_data->user_name; ?>"
										    	data-description=""
										    	data-image="<?= base_url('assets/images/favicon.png'); ?>"
										    	data-locale="auto">
										  	</script>
										</form>
										<!-- <a class="btn btn-primary Abtn" href="#" data-id="<?= $user_data->user_id;?>" data-toggle="modal" data-backdrop="static" data-target="#addressModal">ADD SHIPPING ADDRESS</a> -->
									</div>	
									<?php
										}else{
											$total_stripe_amount = $payable_amount;
											$total_stripe_amount = number_format($total_stripe_amount, 2);
											$total_stripe_amount = $total_stripe_amount * 100;
									?>
									<div class="col-sm">
										<form method="POST" action="<?= base_url('manufacture-payment'); ?>">
											<input type="hidden" name="stripe_amount" value="<?= $total_stripe_amount; ?>">
											<script
										    	src="https://checkout.stripe.com/checkout.js" 
										    	class="stripe-button"
										    	data-key="<?= $this->config->item('publishableKey'); ?>"
										    	data-amount="<?= $total_stripe_amount; ?>"
										    	data-name="<?= 'Welcome '.$user_data->user_name; ?>"
										    	data-description=""
										    	data-image="<?= base_url('assets/images/favicon.png'); ?>"
										    	data-locale="auto">
										  	</script>
										</form>
									</div>
									<div class="col-4 offset-4">
										<div class="stripe-logo">
											<img class="img-fluid" src="<?= base_url('assets/images/stripe-logo.png'); ?>">	
										</div>
									</div>	
									<?php
										}
									?>	
								</div>	
							</div>
						</div>
						<small class="form-text text-muted" style="font-style:italic;">
				    		Order confirmation will be sent to <?= $user_data->user_email; ?>
				    	</small>
				    </div>
				</div>	
			</div>
		</div>
	</section>