	<section id="cart-part" class="mx-5 wrapper-body-margin">
		<div class="container">
			<div class="upload-file-content">
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-xs-12">
						<?php if (!empty($usher_id)) { ?>
							<div class="my-2 upload-btn" ondrop="dragUploadFile(event)" ondragover="return false">
		                        <input id='upload' name="upload[]" type="file" multiple="multiple" onchange="cadUploadFile()" class="form-control hide" />
		                        <label for="upload" class="form-control btn btn-large"> 
			                    	<?php if (empty($file_data_result)) { ?>
			                    		<h4 class="text-primary">UPLOAD 3D DESIGN FILES</h4> 
			                    	<?php }else{ ?>
			                    		<h4 class="text-primary">ADD MORE FILES</h4>
			                    	<?php } ?>	
			                    	<small class="form-text text-muted">
		                                We currently support .stl, .stp (.step) 
		                                <br class="d-xl-none d-lg-none d-md-block d-sm-block d-block"> 
		                                and .iges (.igs) files up to 100MB
		                                <i class="fa fa-info-circle" data-toggle="tooltip" title="Upload up to 20 files at once"></i>
		                            </small>
		                            <small class="text-success">
		                            	Files that you upload are secure and 
		                            	<br class="d-xl-none d-lg-none d-md-block d-sm-block d-block">
		                            	confidential, protecting your 
		                            	<br class="d-xl-none d-lg-none d-md-none d-sm-none d-block">
		                            	intellectual property
		                            </small>
			                   	</label>
		                    </div>
		                <?php }else{ ?>	
		                	<div class="upload-btn">
		                        <a class="" href="#" data-toggle="modal" data-target="#loginModal">
			                        <label for="upload" class="form-control btn btn-large"> 
				                    	<h4 class="text-primary">LOGIN &amp; UPLOAD</h4> 
				                    	<small class="form-text text-muted">
		                                    Please login or create an account to
		                                    <br class="d-xl-none d-lg-none d-md-block d-sm-none d-block">
		                                    upload your 3D model files. <br> We accept 3D model files in
		                                    <br class="d-xl-none d-lg-none d-md-block d-sm-none d-block">
		                                    STL, STEP and IGES formats.
		                                </small>
				                   	</label>
				                </a>   	
		                    </div>
		                <?php } ?>    
	                </div>    
	                <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12">
						<div class="upload-info">
	                        <small class="form-text text-center text-muted my-2">For file sizes above 100MB, you can email it to us and we will get back to you with the quotation.</small> 
		                    <a class="btn btn-primary Abtn" href="mailto:info@3dusher.com">EMAIL</a>
		                    <small class="form-text text-center text-muted">OR</small>
		                    <a class="btn btn-primary Abtn" href="<?= base_url('contact-us'); ?>">CONTACT SALES</a>
	                    </div>
	                </div>
				</div>
			</div>				
			<?php if(!empty($usher_id) && !empty($file_data_result)){ ?>
				<form method="post">	
					<div class="row">
						<div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-xs-12">	
							<div class="cad-content">
								<div id="accordion">
									<?php 
										$sno = 1;
										foreach($file_data_result as $file) { 
											$apidata = json_decode($file['cad_result']);		
									?>
									<div class="card">
								    	<div class="card-header">
								        	<div class="row">
								    			<div class="col-8 col-xs-12">		
								        			<h4><?= $file['file_name']; ?> </h4>
								        			<p>
								        				<span id="<?= $file['file_id']; ?>-unit-content">
								        					<?= number_format($apidata->DimensionX, 2); ?> X <?= number_format($apidata->DimensionY, 2); ?> X 
								        					<?= number_format($apidata->DimensionZ, 2); ?>
								        				</span>
								        				<select id="<?= $file['file_id'].'_file_unit' ?>" onchange="changeUnit(<?= $file['file_id']; ?>, <?= $apidata->DimensionX; ?>, <?= $apidata->DimensionY; ?>, <?= $apidata->DimensionZ; ?>)">
															<option>mm</option>
															<option>cm</option>
															<option>in</option>
														</select>
								        			</p>		
								        		</div>
								        		<div class="col-4 col-xs-12">	
											    	<a class="float-right mt-2 mx-1 py-2 px-3 btn btn-sm btn-light rounded-circle" href="<?= base_url('manufacture-delete/'.$file['file_id']); ?>" onclick="return deleteManufacture()" data-toggle='tooltip' title="Delete File">X</a>
											    	<?php if ($sno == 1){ ?>
											    		<a class="float-right mt-2 p-2 btn btn-sm btn-light rounded-circle collapse-btn" data-toggle="collapse" href=<?= '#'.$file['file_id']; ?>></a>
											    	<?php }else{ ?>
											    		<a class="float-right mt-2 p-2 btn btn-sm btn-light rounded-circle collapse-btn" data-toggle="collapse" href=<?= '#'.$file['file_id']; ?>></a>
											    	<?php } ?>
											    </div>
								        	</div>
										</div>        	
								      	<?php if ($sno == 1){ ?>	
								      		<div id="<?= $file['file_id']; ?>" class="collapse show" data-parent="#accordion">
								      	<?php }else{ ?>
								      		<div id="<?= $file['file_id']; ?>" class="collapse show" data-parent="#accordion">
								      	<?php } ?>	
								        	<div class="card-body">
								          		<div class="row">
								          			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
														<div class="cad-view">
															<iframe src="<?= $apidata->HtmlFile; ?>"></iframe>
														</div>
													</div>
													<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
														<div class="cad-info">
															<div class="row">
																<div class="col-sm-12">
																	<div class="cad-input">
																		<div class="form-group">
															    			<label class="float-left">MATERIAL</label>
															    			<?php
																				$file_volume = intval($apidata->Volume);
																				$mat_array['status'] = 'active';
																				$mat_result = $this->Material_m->get($mat_array);
																				echo " <select class='form-control' id='".$file['file_id']."_material_id' name='".$file['file_id']."_material_id' onchange='displayColorProcess(".$file['file_id'].")'> 
																					<option value='0'>Select Material</option>";
																				foreach ($mat_result as $mat_data){
								                                                    if($mat_data->min_volume < $file_volume && $mat_data->max_volume > $file_volume){	
																						echo "<option value='".$mat_data->material_id."'>".$mat_data->material_name." (".$mat_data->technology_name.")</option>";
																					}
								                                                }
																				echo "</select>";
																			?>
																		</div>
																	</div>
																</div>
															</div>
															<div id=<?= $file['file_id']."-color-layer-process-content"; ?>>
																
															</div>	
														</div>
													</div>
												</div>
								        	</div>
								      	</div>
								    </div>
								    <?php
								    	$sno += 1;
								    	}	
								    ?>
								</div>    
							</div>
						</div>	
						<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12">	
							<div class="sticky-top sticky-offset">	
								<div class="cart-content">
									<div class="cart-header">
										<h4>Price Details</h4>
									</div>
									<div class="cart-body">
										<?php
											foreach($file_data_result as $file) {
												$apidata = json_decode($file['cad_result']);
												$price_file_id = $file['file_id'];
												$width = 10;
		                            			$trunk_file_name = $file['file_name'];
		                            			$trunk_file_name = preg_replace ("~^(.{{$width}})(.+)~", '\\1…', $trunk_file_name);
										?>
										<div class="row">
											<div class="col-sm-7">
												<h4><?= $trunk_file_name; ?></h4>
											</div>
											<div class="col-sm-5">
												<div id="<?= $price_file_id.'-price-content'; ?>"><h4>&#36; <?= number_format($file['file_amount'], 2); ?> </h4></div>
											</div>			
										</div>
										<?php
											}
										?>
										<div class="row">
											<div class="col-sm">
												<div class="form-group">
													<input type="submit" class="form-control btn btn-primary Pbtn" name="cart-submit" value="PROCEED">
												</div>
											</div>		
										</div>
									</div>
								</div>
								<small class="form-text text-muted" style="font-style:italic;">
						    		Please <a href="mailto:info@3dusher.com">email us</a> your files for any other material or technology.
						    	</small>
						    </div>	
						</div>
					</div>	
				</form>
			<?php } ?>	
		</div>
	</section>
	<!-- Modal Part -->
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content login-content">
                <form method="post" id="design-login" name="design-login" action="<?= base_url('login-operation'); ?>">
                    <div class="modal-body">
                        <div class="row">
                        	<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-6 offset-3">
                        		<img class="img-fluid" src="<?= base_url('assets/images/3dusher-logo.png'); ?>">	
                        	</div>
                        </div>	
                        <hr>
                        <div class="form-group">
                            <input type="email" class="form-control" id="login_user_email" name="login_user_email" placeholder="<?= $this->lang->line('email'); ?>" value="<?= set_value('login_user_email'); ?>" onfocusin="loginFocusin(this)" onfocusout="loginEmailFocusout()">
                            <small id="login_email_error" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="login_user_password" name="login_user_password" placeholder="<?= $this->lang->line('password'); ?>" value="<?= set_value('login_user_password'); ?>">
                        </div>
                        <div class="row">
	                        <div class="col">    
	                            <a href="<?= base_url('forgot-password'); ?>" target="_blank" class="text-primary float-right"><?= $this->lang->line('forgot_password'); ?></a>
	                        </div>
	                    </div>
                        <div id="login_error">
                        
                        </div>
	                    <div class="form-group">
                            <input type="hidden" id="redirect_login" name="redirect_login" value="manufacture-details">
                            <input type="hidden" id="current_login" name="current_login" value="manufacture-details">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary Pbtn" name="login-submit" onclick="return loginValidation()" value="<?= $this->lang->line('login_btn'); ?>">
                        </div>
                        <div class="row">
			                <div class="col"><hr></div>
			                <div class="col-auto my-auto">OR</div>
			                <div class="col"><hr></div>
			            </div>
			            <div class="row">
			                <div class="col">
		                        <div class="form-group">
		                            <a href="<?= $this->google->get_login_url(); ?>"class="form-control btn btn-primary Pbtn google-btn"><i class="fab fa-google"></i> GOOGLE LOG IN</a>
		                        </div>
		                    </div>
		                    <div class="col">    
		                        <div class="form-group">
		                            <a href="<?= $this->facebook->login_url(); ?>"class="form-control btn btn-primary Pbtn fb-btn"><i class="fab fa-facebook"></i> FACEBOOK LOGIN</a>
		                        </div>
		                    </div>    
		                </div>        
			            <div class="row">
			                <div class="col">
			                	<div class="text-center">
                            		<p class="text-center">
                            			<?= $this->lang->line('register_info'); ?> <br/>
                            			<a href="#" class="text-primary text-center" data-toggle="modal" data-dismiss="modal" data-target="#registerModal"><?= $this->lang->line('register'); ?></a>
                            		</p>
			                	</div>
			                </div>
			            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Register Modal -->
    <div class="modal fade" id="registerModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content register-content">
                <form method="post" id="design-register" name="design-register" action="<?= base_url('register-operation'); ?>">
                    <div class="modal-body">
                        <div class="row">
                        	<div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-6 offset-3">
                        		<img class="img-fluid" src="<?= base_url('assets/images/3dusher-logo.png'); ?>">	
                        	</div>
                        </div>	
                        <hr>
                        <div class="form-group">
                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?= set_value('user_name'); ?>" placeholder="<?= $this->lang->line('name'); ?>" onfocusin="registerFocusin(this)" onfocusout="nameFocusout()">
                            <small id="name_error" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="user_email" name="user_email" value="<?= set_value('user_email'); ?>" placeholder="<?= $this->lang->line('email'); ?>" onfocusin="registerFocusin(this)" onfocusout="emailFocusout()">
                            <small id="email_error" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="user_password" name="user_password" value="<?= set_value('user_password'); ?>" placeholder="<?= $this->lang->line('password'); ?>" onfocusin="registerFocusin(this)" onfocusout="passwordFocusout()">
                            <small id="password_error" class="text-danger"></small>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="conf_password" name="conf_password" value="<?= set_value('conf_password'); ?>" placeholder="<?= $this->lang->line('conf_password'); ?>" onfocusin="registerFocusin(this)" onfocusout="confPasswordFocusout()">
                            <small id="conf_password_error" class="text-danger"></small>
                        </div>
                        <div id="register_error">
                            
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="redirect_register" name="redirect_register" value="manufacture-details">
                            <input type="hidden" id="current_register" name="current_register" value="manufacture-details">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary Pbtn" name="register-submit" onclick="return registerValidation()" value="<?= $this->lang->line('register_btn'); ?>">
                        </div>
                        <div class="row">
			                <div class="col"><hr></div>
			                <div class="col-auto my-auto">OR</div>
			                <div class="col"><hr></div>
			            </div>
                        <div class="row">
			                <div class="col">
			                	<div class="text-center">
                            		<p class="text-center">
                            			<a href="#" class="text-primary" data-toggle="modal" data-dismiss="modal" data-target="#loginModal"><?= $this->lang->line('login_header'); ?></a>
                            		</p>
			                	</div>
			                </div>
			            </div>    
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Part -->
