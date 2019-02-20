	<section id="summary-part" class="mx-5 wrapper-body-margin">
		<div class="container">
			<h3>Overview</h3>
			<div class="row" ng-app="usherApp">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-12">
					<div class="summary-content summary-header">
						<div class="row">
							<div class="col-xl col-lg col-md col-sm col-xs">
								<h4>Order Summary</h4>
							</div>
						</div>
					</div>
					<div ng-controller="manufactureOverview" ng-init="manufactureData()" ng-cloak>
						<div ng-repeat="file_value in file_data">
							<div class="summary-content summary-body">
								<div class="row">
									<div class="col-xl col-lg col-md col-sm col-xs">
										<p>{{$index + 1}}. {{file_value.file_name}}</p>
									</div>
								</div>
								<div class="row" ng-init="manufactureName(file_value.material_id, file_value.layer_height_id, file_value.color_id, file_value.post_process_id)">
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<p>Technology: {{ matrial_data.technology_name }}</p>
										<p>Layer Height: {{ layer_height_data.layer_height_name }}</p>
										<p>Post Process: {{ post_process_data.post_process_name }}</p>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<p>Material: {{ matrial_data.material_name }}</p>
										<p>Color: {{ color_data.color_name }}</p>
									</div>
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
										<div class="cad-quantity">
											<ul class="pagination pagination-sm">
									    		<li class="page-item">
										      		<div ng-if="file_value.file_qty == 1">
										      			<a class="page-link rounded-circle" href="" onclick="return false;" style="cursor:default;">
										      				<i class="fas fa-minus"></i>
										      			</a>
										      		</div>
										      		<div ng-if="file_value.file_qty != 1">
										      			<a class="page-link rounded-circle" href="" ng-click="qtyDecreament(file_value.file_id)">
										      				<i class="fas fa-minus"></i>
										      			</a>
										    		</div>
									    		</li>
									    		<li class="page-item disabled">
									    			<a class="page-link page-link-none" href="#">
									    				{{file_value.file_qty}}	
									    			</a>
									    		</li>
									    		<li class="page-item">
									    			<a class="page-link rounded-circle" href="" ng-click="qtyIncreament(file_value.file_id)">
									    				<i class="fas fa-plus"></i>
									    			</a>
									    		</li>
									  		</ul>
									  	</div>	
										<h4>
											&dollar; {{file_value.file_amount * file_value.file_qty | number : 2}}
										</h4>	
									</div>
								</div>	
							</div>	
						</div>		
					</div>
					<?php
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
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<div class="sticky-top sticky-offset">	
						<div class="price-content">
							<div class="price-header">
								<h4>Price Details</h4>
							</div>
							<div class="price-body">
								<div ng-controller="manufactureOverview" ng-init="manufactureData()" ng-cloak>
									<div class="row">
										<div class="col-sm-7">
											<h4>Price ( {{ totalCount }} Part )</h4>
										</div>
										<div class="col-sm-5">
											<h4>&dollar; {{ totalAmount | number : 2 }}</h4>
										</div>		
									</div>
									<div class="row">
										<div class="col-sm-7">
											<h4>Shipping: </h4>
										</div>
										<div class="col-sm-5">
											<h4>&#36; {{ order_data.delivery_amount | number : 2 }}</h4>
										</div>
									</div>
									<div class="row">
										<div class="col-5 offset-1">
											<label class="radio-inline">
												<input type="radio" name="delivery_type" id="delivery_type" value="Normal" ng-model="delivery_type" ng-click="shippingMethod('Normal')" ng-checked ="(order_data.delivery_type == 'Normal')"> Normal
						    				</label>
										</div>
										<div class="col-5">
											<label class="radio-inline">
						    					<input type="radio" name="delivery_type" id="delivery_type" value="Express" ng-click="shippingMethod('Express')" ng-checked ="(order_data.delivery_type == 'Express')"> Express
										    </label>
										</div>
									</div><hr>
									<div class="row">
										<div class="col-sm-7">
											<h4>Payable Amount</h4>
										</div>
										<div class="col-sm-5">
											<h4>&dollar; {{ payableAmount() | number : 2 }}</h4>
										</div>		
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div ng-if="user_data.shipping_address =='' || user_data.city =='' || user_data.state =='' || user_data.country =='' || user_data.pin_code ==''">
											<button type="button" class="btn btn-primary Abtn" data-toggle="modal" data-backdrop="static" data-target="#addressModal">ADD SHIPPING ADDRESS</button>	
										</div>
										<div ng-if="user_data.shipping_address !='' && user_data.city !='' && user_data.state !='' && user_data.country !='' && user_data.pin_code !=''">
											<button type="button" class="btn btn-primary Abtn" id="strip-btn" ng-click="stripeCheckoutPayment()">PAY NOW</button>
										</div>
									</div>		
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
		

