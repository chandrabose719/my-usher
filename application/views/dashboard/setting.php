	<div class="setting-part">
		<div class="setting-content">
	        <div class="row">
	            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-0 col-xs-12">
	                <h3><?= $this->lang->line('setting_header'); ?></h3>
	            </div>
	        </div>    
	        <form method="post">
	            <div class="row">
	                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">
	                    <div class="form-group">
	                        <label><?= $this->lang->line('name'); ?>: <span class="text-danger">*</span></label>
	                        <input type="text" class="form-control" name="user_name" id="user_name" value="<?= $user_data->user_name; ?>">
	                    </div>
	                </div>    
	            </div>
	            <div class="row">
	                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">
	                    <div class="form-group">
	                        <label><?= $this->lang->line('email'); ?>:</label>
	                        <input type="text" class="form-control" name="user_email" id="user_email" value="<?= $user_data->user_email; ?>" readonly>
	                    </div>
	                </div>
	                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12">
	                    <div class="form-group">
	                        <label><?= $this->lang->line('phone'); ?>: <span class="text-danger">*</span></label>
	                        <input type="number" class="form-control" name="user_mobile" id="user_mobile" value="<?= $user_data->user_mobile; ?>">
	                    </div>
	                </div>    
	            </div>
	            <div class="row">
	                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
	                    <div class="form-group">
	                        <label><?= $this->lang->line('billing'); ?>: <span class="text-danger">*</span></label>
	                        <input type="text" class="form-control" name="billing_address" id="billing_address" placeholder="<?= $this->lang->line('address_one'); ?>" value="<?= $user_data->billing_address; ?>">
	                    </div>
	                </div>    
	            </div>
	            <div class="row">
	                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
	                    <div class="form-group">
	                        <input type="text" class="form-control" name="billing_address1" id="billing_address1" placeholder="<?= $this->lang->line('address_two'); ?>" value="<?= $user_data->billing_address1; ?>">
	                    </div>
	                </div>    
	            </div>
	            <div class="row">
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
	                        <input type="number" class="form-control" name="billing_zipcode" id="billing_zipcode" placeholder="<?= $this->lang->line('zipcode'); ?>" value="<?= $user_data->billing_zipcode; ?>">
	                    </div>
	                </div>    
	            </div>
	            <div class="row">
	                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">
	                    <div class="form-group">
	                        <input type="text" class="form-control" name="billing_city" id="billing_city" placeholder="<?= $this->lang->line('city'); ?>" value="<?= $user_data->billing_city; ?>">
	                    </div>
	                </div>
	                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12">
	                    <div class="form-group">
	                        <input type="text" class="form-control" name="billing_state" id="billing_state" placeholder="<?= $this->lang->line('state'); ?>" value="<?= $user_data->billing_state; ?>">
	                    </div>
	                </div>    
	            </div>
	            <div class="row">
	                <div class="col-xl-5 offset-xl-6 col-lg-5 offset-lg-6 col-md-5 offset-md-6 col-sm-5 offset-sm-6 col-xs-12">
	                    <div class="form-group">
	                        <input type="submit" class="btn btn-primary Abtn" name="setting-submit" value="<?= $this->lang->line('submit'); ?>">
	                    </div>
	                </div>
	            </div>        
	        </form>
	        <hr>
	        <div class="row">
	            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-0 col-xs-12">
		            <div class="notification-content">
		            	<?php
				    		$notifi_array['user_id'] = $usher_id;
							$notifi_data = $this->Usher_m->get($notifi_array, TRUE);
				    		if(!empty($notifi_data)){
				    	?>
		            	<h3>Notifications</h3>
		            	<h4 class="text-left">Marketing:</h4>
		            	<ul class="list-group">
					    	<li class="list-group-item d-flex justify-content-between">
					      		<label>Promotions and Competition News</label>
							    <label class="switch">
						            <input type="checkbox" name="promotion" id="promotion" onchange="changeStatus('promotion')" <?php if($notifi_data->promotion == 'active') echo 'checked' ?> >
						            <span class="slider"></span>
						        </label>
					    	</li>
					    	<li class="list-group-item d-flex justify-content-between">
					      		<label>Project and Technical Newsletter</label>
							    <label class="switch">
						            <input type="checkbox" name="technical" id="technical" onchange="changeStatus('technical')" <?php if($notifi_data->technical == 'active') echo 'checked' ?> >
						            <span class="slider"></span>
						        </label>	
					    	</li>
					    	<li class="list-group-item d-flex justify-content-between">
					      		<label>Event Updates</label>
							    <label class="switch">
						            <input type="checkbox" name="event" id="event" onchange="changeStatus('event')" <?php if($notifi_data->event == 'active') echo 'checked' ?> >
						            <span class="slider"></span>
						        </label>	
					    	</li>
		            	</ul>
		            	<h4 class="text-left">Product:</h4>
		            	<ul class="list-group">
					    	<li class="list-group-item d-flex justify-content-between">
					      		<label>Website new features and update notifications</label>
							    <label class="switch">
						            <input type="checkbox" name="newfeature" id="newfeature" onchange="changeStatus('newfeature')" <?php if($notifi_data->newfeature == 'active') echo 'checked' ?> >
						            <span class="slider"></span>
						        </label>
					    	</li>
					    	<li class="list-group-item d-flex justify-content-between">
					      		<label>Blog update</label>
							    <label class="switch">
						            <input type="checkbox" name="blogupdate" id="blogupdate" onchange="changeStatus('blogupdate')" <?php if($notifi_data->blogupdate == 'active') echo 'checked' ?> >
						            <span class="slider"></span>
						        </label>	
					    	</li>
		            	</ul>
		            	<?php
	            			}
	            		?>
	            	</div>
	            </div>
	        </div>    
	    </div>
	</div>