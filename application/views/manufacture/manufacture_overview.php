	<section id="summary-part" class="mx-5 wrapper-body-margin">
		<div class="container">
			<h3>Overview</h3>
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-xs-12">
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
								<p>Technology: <?= $technology_name; ?></p>
								<p>Layer Height: <?= $layer_height_name; ?></p>	
								<!-- <p>Color: <?= $color_name; ?></p> -->
								<!-- <p>Post Process: <?= $post_process_name; ?></p> -->
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<p>Material: <?= $material_name; ?></p>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
								<div class="cad-quantity">
									<ul class="pagination pagination-sm">
							    		<li class="page-item">
							    			<a class="page-link rounded-circle" id="dec-btn" href="javascript:;" onclick="changeCount('dec',<?= $cadvalue['file_id']; ?>)">
							      				<i class="fas fa-minus"></i>
							      			</a>
							    		</li>
							    		<li class="page-item disabled">
							    			<input type="hidden" id="<?= $cadvalue['file_id']; ?>_hidden_file_qty">
							    			<a class="page-link page-link-none" href="javascript:;">
							    				<span id="<?= $cadvalue['file_id'] ?>-product-count-content">
							    					<?= $cadvalue['file_qty']; ?>
							    				</span>
							    			</a>
							    		</li>
							    		<li class="page-item">
							    			<a class="page-link rounded-circle" href="javascript:;" onclick="changeCount('inc',<?= $cadvalue['file_id']; ?>)">
							    				<i class="fas fa-plus"></i>
							    			</a>
							    		</li>
							  		</ul>
							  	</div>	
								<h4 id="<?= $cadvalue['file_id'] ?>-product-amount-content">
									&dollar; <?= number_format($cadvalue['file_qty'] * $cadvalue['file_amount'], 2); ?>
								</h4>	
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
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">	
								<button type="button" class="btn btn-outline-dark rounded-circle" data-toggle="modal" data-backdrop="static" data-target="#addressModal">
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
								</button>
							</div>
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
				<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12">
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
										<span id="total-count-content">
											<h4>Price (<?= $total_file_count; ?> Part)</h4>	
										</span>
									</div>
									<div class="col-sm-5">
										<span id="total-amount-content">
											<h4>&dollar; <?= number_format($total_file_amount, 2); ?></h4>
										</span>
									</div>		
								</div>
								<div class="row">
									<div class="col-sm-7">
										<h4>Shipping: </h4>
									</div>
									<div class="col-sm-5">
										<h4 id="delivery_amount_content">
											&#36; 
											<?= number_format($delivery_amount, 2); ?>
										</h4>
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
										<h4 id="payable_amount_content">
											&dollar; <?= number_format($payable_amount, 2); ?>
										</h4>
									</div>		
								</div>
								<div class="row">
									<?php
										$total_stripe_amount = $payable_amount;
										$total_stripe_amount = number_format($total_stripe_amount, 2);
										$total_stripe_amount = $total_stripe_amount * 100;
										if (empty($user_data->shipping_address) || empty($user_data->city) || empty($user_data->billing_address) || empty($user_data->billing_city)) {	
									?>
									<div class="col-sm-12">	
										<button type="button" class="btn btn-primary Abtn" data-toggle="modal" data-backdrop="static" data-target="#addressModal">ADD SHIPPING ADDRESS</button>
									</div>	
									<?php
										}else{
											$total_stripe_amount = $payable_amount;
											$total_stripe_amount = number_format($total_stripe_amount, 2);
											$total_stripe_amount = $total_stripe_amount * 100;
									?>
									<div class="col-sm-12">
										<form method="POST" action="<?= base_url('manufacture-payment'); ?>">
											<input type="hidden" id="stripe_amount" name="stripe_amount" value="<?= $total_stripe_amount; ?>">
											<script
										    	src="https://checkout.stripe.com/checkout.js" 
										    	class="stripe-button"
										    	data-key="<?= $this->config->item('publishableKey'); ?>"
										    	data-name="<?= 'Welcome '.$user_data->user_name; ?>"
										    	data-description=""
										    	data-image="https://3dusher.com/assets/images/favicon.png"
										    	data-locale="auto">
										  	</script>
										</form>
									</div>
									<div class="col-4 offset-4 my-2">
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
						<small class="form-text text-muted font-italic">
				    		Order confirmation will be sent to <?= $user_data->user_email; ?>
				    	</small>
				    </div>
				</div>	
			</div>
			<!-- Address Modal -->
			<div class="modal fade" id="addressModal">
			    <div class="modal-dialog modal-lg modal-dialog-centered">
			      	<div class="modal-content">
				      	<form method="post">
							<div class="modal-header">
					        	<h3 class="modal-title"></h3>
					        	<input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="X">
					        </div>
					        <div class="modal-body">
								<div class="checkout-content">
									<div class="row">
										<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
											<h4>BILLING ADDRESS:</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
											<div id="billing-msg">
										</div>
									</div>
									<div class="row">
										<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Address Line 1" name="billing_address" id="billing_address" value="<?= $user_data->billing_address; ?>">
											</div>
										</div>
										<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">				
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Address Line 2" name="billing_address1" id="billing_address1" value="<?= $user_data->billing_address1; ?>">
											</div>
										</div>
										<div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">				
											<div class="form-group">
											<?php
					                            $cnt_array['status'] = 'active';
					                            $country_data = $this->Country_m->get($cnt_array);
					                            foreach ($country_data as $country) {
					                                $array[$country->country_code] = $country->country_name;
					                            }
					                            echo form_dropdown("billing_country", $array, set_value("billing_country", $user_data->billing_country), "id='billing_country' class='form-control'");
					                        ?>		
											</div>
										</div>
										<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12">				
											<div class="form-group">
												<!-- <div id="billing-display-state"></div> -->
												<input type="text" class="form-control" placeholder="State" id="billing_state" name="billing_state" value="<?= $user_data->billing_state; ?>">
											</div>
										</div>
										<div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="City" name="billing_city" id="billing_city" value="<?= $user_data->billing_city; ?>">
											</div>
										</div>
										<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12">				
											<div class="form-group">
												<input type="number" class="form-control" placeholder="Postal/Zip Code" name="billing_zipcode" id="billing_zipcode" value="<?= $user_data->billing_zipcode; ?>">
											</div>
										</div>
										<div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">				
											<div class="form-group">
												<input type="number" class="form-control" placeholder="Mobile Number" name="user_mobile" id="user_mobile" value="<?= $user_data->user_mobile; ?>">
											</div>
										</div>	
									</div>
								</div><br/>
								<div class="checkout-content" id="shipping-content">
									<div class="row">
										<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
											<h4>SHIPPING ADDRESS:</h4>
											<div class="text-left m-2">
												<label class="checkbox-inline">
													<input type="checkbox" name="same_address" id="same_address" onclick="sameAddress()"> Same as Billing Address
												</label>
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
											<div id="shipping-msg">
										</div>
									</div>
									<div class="row">
										<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">				
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Address Line 1" name="shipping_address" id="shipping_address" value="<?= $user_data->shipping_address; ?>">
											</div>
										</div>
										<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">				
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Address Line 2" name="shipping_address1" id="shipping_address1" value="<?= $user_data->shipping_address1; ?>">
											</div>
										</div>
										<div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">				
											<div class="form-group">
											<?php
					                            $cnt_array['status'] = 'active';
					                            $country_data = $this->Country_m->get($cnt_array);
					                            foreach ($country_data as $country) {
					                                $array[$country->country_code] = $country->country_name;
					                            }
					                            echo form_dropdown("country", $array, set_value("country", $user_data->country), "id='country' class='form-control'");
					                        ?>
											</div>
										</div>
										<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12">				
											<div class="form-group">
												<!-- <div id="shipping-display-state"></div> -->
												<input type="text" class="form-control" placeholder="State" id="state" name="state" value="<?= $user_data->state; ?>">
											</div>
										</div>
										<div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="City" name="city" id="city" value="<?= $user_data->city; ?>">
											</div>
										</div>
										<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12">				
											<div class="form-group">
												<input type="number" class="form-control" placeholder="Postal/Zip Code" name="pin_code" id="pin_code" value="<?= $user_data->pin_code; ?>">
											</div>
										</div>
										<div class="col-xl-5 offset-xl-6 col-lg-5 offset-lg-6 col-md-5 offset-md-6 col-sm-5 offset-sm-6 col-xs-12">				
											<div class="form-group">
												<input type="submit" class="form-control btn btn-primary Abtn" name="checkout-submit" onclick="return checkoutValidation()" value="Submit">
											</div>
										</div>
									</div>
								</div>
							</div>
					        <div class="modal-footer">
							    
					        </div>	
						</form>
			        </div>
			    </div>
			</div>
			<!-- End Address Modal -->
		</div>
	</section>
		

