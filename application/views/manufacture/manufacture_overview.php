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
							// Material Name
							$material_query['material_id'] = $order_data_result['material_id'];
							$material_data = $this->IMaterial_m->get($material_query, TRUE);
							$material_name = $material_data->material_name;
							// Technology Name
							$tech_query['technology_id'] = $order_data_result['technology_id'];
							$tech_data = $this->ITechnology_m->get($tech_query, TRUE);
							$technology_name = $tech_data->technology_name;
						
					?>
					<div class="summary-content summary-body">
						<div class="row">
							<div class="col-xl col-lg col-md col-sm col-xs">
								<p><?= $sno; ?>. <?= $cadkey; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<p>Technology: <?= $technology_name; ?></p>
								<p>Material: <?= $material_name; ?></p>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<div class="cad-quantity">
									<input type="number" class="form-control p-2 h-25 w-50" name="<?= $cadvalue['file_id']; ?>_hidden_file_qty" id="<?= $cadvalue['file_id']; ?>_hidden_file_qty" onfocusout="changeCount(<?= $cadvalue['file_id']; ?>)" value="<?= $cadvalue['file_qty']; ?>">
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<h4 id="<?= $cadvalue['file_id'] ?>-product-amount-content">
									&dollar; <?= number_format($cadvalue['file_qty'] * $cadvalue['file_amount'], 2); ?>
								</h4>	
							</div>
							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<a class="btn btn-outline-light rounded-circle" href="javascript:;" onclick="return deleteManufactureOverview('<?= $cadvalue['file_id']; ?>', '<?= $cadvalue['file_name']; ?>')" data-toggle="tooltip" title="Remove <?= $cadvalue['file_name']; ?>"><i class="far fa-trash-alt text-danger"></i></a>
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
					<!-- Mode of Communication -->
					<div class="summary-content summary-header">
						<div class="row">
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-xs-12">
								<h4>Mode of Communication</h4>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">	
								
							</div>
						</div>
					</div>
					<div class="summary-content summary-body">
						<div class="row">
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="form-radio py-3">
									<label class="radio-label m-0">Email
								  		<input type="radio" class="radio-input" name="communication_mode" id="communication_mode" onclick="changeCommunicationMode()" value="email" <?php if($order_data_result['communication_mode'] == 'email'){echo "checked";}?>>
								  		<span class="radio-round"></span>
									</label>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
								<div class="form-radio py-3">
									<label class="radio-label m-0">Phone
								  		<input type="radio" class="radio-input" name="communication_mode" id="communication_mode" onclick="changeCommunicationMode()" value="phone" <?php if($order_data_result['communication_mode'] == 'phone'){echo "checked";}?>>
								  		<span class="radio-round"></span>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>		
				<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12">
					<div class="sticky-top sticky-offset">	
						<div class="price-content">
							<div class="price-header">
								<h4>Price Details</h4>
							</div>
							<?php
								$total_file_count = count($file_data_result);
								$total_file_amount = 0;
								foreach ($file_data_result as $file_data_value) {
									$total_file_amount += $file_data_value['file_amount'] * $file_data_value['file_qty'];
								}
								$delivery_type = $order_data_result['delivery_type'];
								$delivery_amount = $order_data_result['delivery_amount'];
								$discount_amount = $order_data_result['discount_amount'];
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
								<!-- <div class="row">
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
								</div> -->
								<?php if(empty($discount_amount)){ ?>		
								<hr>
								<div class="row">
									<div class="col-sm-12">
										<form method="post" action="<?= base_url('manufacture-discount'); ?>">
											<div class="input-group">
												<input type="text" class="form-control" name="discount_code" id="discount_code" placeholder="Coupon Code">
												<div class="input-group-append w-50">
											    	<input type="submit" class="btn btn-primary Pbtn" name="discount-submit" value="APPLY">
											  	</div>
											</div>
										</form>	
									</div>
								</div>
								<?php }else{ ?>
									<div class="row">
										<div class="col-sm-7">
											<h4>Discount Amount</h4>
										</div>
										<div class="col-sm-5">
											<h4 id="delivery_amount_content">
												&#36; 
												<?= number_format($discount_amount, 2); ?>
												<a class="text-danger" href="javascript:;" onclick="deleteDiscount()" data-toggle="tooltip" title="Remove Discount">
													<i class="fas fa-times-circle"></i>	
												</a>
											</h4>
										</div>
									</div>
								<?php } ?>
								<hr>
								<div class="row">
									<div class="col-sm-7">
										<h4>Payable Amount</h4>
									</div>
									<div class="col-sm-5">
										<?php
											if(!empty($discount_amount)){
												$payable_amount = ($total_file_amount - $discount_amount) + $delivery_amount;
											}else{
												$payable_amount = $total_file_amount + $delivery_amount;	
											}
										?>
										<h4 id="payable_amount_content">
											&dollar; <?= number_format($payable_amount, 2); ?>
										</h4>
									</div>		
								</div>
								<div class="row">
									<?php
										$total_stripe_amount = $payable_amount;
										$total_stripe_amount = $total_stripe_amount * 100;
										if (empty($user_data->shipping_address) || empty($user_data->city) || empty($user_data->billing_address) || empty($user_data->billing_city)) {	
									?>
									<div class="col-sm-12">	
										<button type="button" class="btn btn-primary Abtn" data-toggle="modal" data-backdrop="static" data-target="#addressModal">ADD SHIPPING ADDRESS</button>
									</div>	
									<?php
										}else{
											// Stripe Publish Key
											$publishableKey = $this->config->item('publishableKey');
									?>
									<div class="col-sm-12">
										<div class="checkout-btn-content">
											<?php 
												$calc_defualt = $this->CDetails_m->get()[0];
												$max_shipping_data = $this->CCost_m->get_last_row();
												$max_shipping_doller = number_format(($max_shipping_data->total_doller/$calc_defualt->dollar_conversion), 2);
												if($delivery_amount < $max_shipping_doller){ 
											?>
											<div class="checkout-payment-btn">
												<form method="POST" action="<?= base_url('manufacture-payment'); ?>">
													<input type="hidden" id="stripe_amount" name="stripe_amount" value="<?= $total_stripe_amount; ?>">
													<script
												    	src="https://checkout.stripe.com/checkout.js" 
												    	class="stripe-button"
												    	data-key="<?= $publishableKey; ?>"
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
											<?php }else{ ?>
											<div class="checkout-manual-quote-btn">
												<a class="form-control btn btn-primary Abtn" href="<?= base_url('manufacture-request'); ?>">REQUEST FOR MANUAL QUOTE</a>
											</div>
											<?php } ?>
										</div>
									</div>		
									<?php
										}
									?>	
								</div>	
							</div>
						</div>
						<small class="form-text text-muted font-italic">
				    		<?php if($delivery_amount < $max_shipping_doller){ ?>
				    			Order confirmation will be sent to <?= $user_data->user_email; ?>
				    		<?php }else{ ?>
				    			Final quote will be sent for approval within 1 business day
				    		<?php } ?>
				    	</small>
				    </div>
				</div>	
			</div>
			<!-- Address Modal -->
			<div class="modal fade" id="addressModal">
			    <div class="modal-dialog modal-lg modal-dialog-centered">
			      	<div class="modal-content">
				      	<form method="post" action="<?= base_url('manufacture-address'); ?>">
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
												<input type="hidden" id="redirect_address" name="redirect_address" value="manufacture-overview">
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
		

