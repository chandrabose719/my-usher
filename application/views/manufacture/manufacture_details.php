<div id="manufacture-part" class="mx-5 wrapper-body-margin">
	<div class="container">
		<h3 class="text-left"> 
			<div class="tickmark <?php if(!empty($file_data_result) && !empty($order_data_result)) echo "d-tickmark"; ?>"></div>
			<span>Upload your 3D model & get instant quote</span>
		</h3>
		<!-- Login and File Upload -->
		<?php if(empty($file_data_result) && empty($order_data_result)){ ?>
		<section class="file-upload-component">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-xs-12">
					<div class="file-upload-block">
						<?php if(!empty($usher_id)){ ?>
						<div ondrop="dragUploadFile(event)" ondragover="return false">
						<?php } ?>	
							<img class="img-fluid" src="<?= base_url('assets/images/file-upload.png'); ?>" />
							<?php if(!empty($usher_id)){ ?>
	                        <small class="form-text text-muted">
                                Upload or drag and drop your 
                                <br class="d-xl-none d-lg-none d-md-block d-sm-block d-block"> 
                                file to preview 3D model
                            </small>
	                        <?php }else{ ?>    
	                        <small class="form-text text-muted">
                                Login to upload and 
                                <br class="d-xl-none d-lg-none d-md-block d-sm-block d-block"> 
                                preview your 3D model
                            </small>	
	                        <?php } ?>    
							<div class="file-upload-btn">
								<?php if(!empty($usher_id)){ ?>
			                    <input id='upload' name="upload[]" type="file" multiple="multiple" onchange="cadUploadFile()" class="form-control hide" />
		                        <label for="upload" class="btn btn-large">
		                        	<i class="fas fa-cloud-upload-alt"></i> &nbsp; Upload
		                        </label>
	                        	<?php }else{ ?>    
	                        	<a class="btn btn-large" href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in-alt"></i> &nbsp; Login & Upload</a>
	                        	<?php } ?>
		                    </div>
		                <?php if(!empty($usher_id)){ ?>
		                </div>
		            	<?php } ?>
	                </div>    
				</div>
				<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12">
					<div class="upload-info-block mb-2">
                        <small class="form-text text-center text-muted">
                            We currently support .stl, .stp (.step) 
                            <br class="d-xl-none d-lg-none d-md-block d-sm-block d-block"> 
                            and .iges (.igs) files up to 100MB
                            <i class="fa fa-info-circle" data-toggle="tooltip" title="Upload up to 20 files at once"></i>
                        </small><br/>
                        <small class="form-text text-center text-success">
                        	Files that you upload are secure and 
                        	<br class="d-xl-none d-lg-none d-md-block d-sm-block d-block">
                        	confidential, protecting your 
                        	<br class="d-xl-none d-lg-none d-md-none d-sm-none d-block">
                        	intellectual property
                        </small>
                    </div>
					<div class="upload-info-block">
                        <small class="form-text text-center text-muted my-2">Email us for files above 100 MB size</small> 
	                    <a class="btn btn-primary Abtn" href="mailto:contact@3dusher.com">EMAIL</a>
	                    <small class="form-text text-center text-muted">OR</small>
	                    <a class="btn btn-primary Abtn" href="<?= base_url('contact-us'); ?>">CONTACT SALES</a>
                    </div>
                </div>
			</div>	
		</section>
		<?php } ?>
		<!-- File 3D Model and Details -->
		<?php if(!empty($usher_id) && !empty($file_data_result) && !empty($order_data_result)){ ?>
		<form method="post" action="<?= base_url('manufacture/instant_quote');?>">
			<section class="file-detail-component">
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-xs-12">
						<div class="file-detail-block">
							<div class="row">
								<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 pr-0">
									<div class="file-detail-content">
										<div class="tab-content">
											<?php 
										  		$sno = 1;
												foreach($file_data_result as $file) { 
													$apidata = json_decode($file['cad_result']);		
											?>
											<div class="tab-pane fade <?php if($sno == 1){echo 'show active';} ?>" id="<?= $file['file_id'].'_cad_view_content' ?>" role="tabpanel">
												<div class="cad-view">
													<iframe src="<?= $apidata->HtmlFile; ?>"></iframe>
												</div>
												<div class="cad-detail">
													<div class="row">
														<div class="col-3 pb-3">
															<small class="text-muted">Scale:</small> 
														</div>
														<div class="col-9 pb-3 pl-0">
															<small class="text-left my-1">
																<span id="<?= $file['file_id']; ?>-file-scale">
										        					<?= number_format($apidata->DimensionX, 2); ?> x <?= number_format($apidata->DimensionY, 2); ?> x 
										        					<?= number_format($apidata->DimensionZ, 2); ?>
										        				</span>
																<select class="file-scale-unit" id="<?= $file['file_id'].'-file-scale-unit' ?>" onchange="changeUnit(<?= $file['file_id']; ?>, <?= $apidata->DimensionX; ?>, <?= $apidata->DimensionY; ?>, <?= $apidata->DimensionZ; ?>)">
																	<option <?php if($file['file_unit'] == $this->lang->line('mm')) echo 'selected'; ?>><?= $this->lang->line('mm'); ?></option>
																	<option <?php if($file['file_unit'] == $this->lang->line('cm')) echo 'selected'; ?>><?= $this->lang->line('cm'); ?></option>
																	<option <?php if($file['file_unit'] == $this->lang->line('in')) echo 'selected'; ?>><?= $this->lang->line('in'); ?></option>
																</select>
															</small>
														</div>
														<div class="col-3 pb-3">
															<small class="text-muted">Volume:</small> 
														</div>
														<div class="col-9 pb-3 pl-0">
															<small class="text-left my-1"><?= number_format($apidata->Volume, 2); ?> 
																<span class="file-volume-unit" id="<?= $file['file_id'].'-file-volume-unit' ?>"><?= $file['file_unit']; ?></span>&sup3;
															</small>
														</div>
														<div class="col-3 pb-3">
															<small class="text-muted">Quantity:</small> 
														</div>
														<div class="col-9 pb-3 pl-0">
															<input type="number" class="form-control file-qty" name="<?= $file['file_id']; ?>_file_qty" id="<?= $file['file_id']; ?>-file-qty" onfocusout="fileQtyChange('<?= $file['file_id']; ?>')" value="<?= $file['file_qty']; ?>">
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
								<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12 pl-0">
									<div ondrop="dragUploadFile(event)" ondragover="return false">
										<div class="bg-file-upload <?php if($sno > 3) echo 'd-none'; ?>">
											<img class="img-fluid" src="<?= base_url('assets/images/drag-and-drop.png'); ?>">
										</div>
										<div class="file-name-content">
											<div class="d-flex justify-content-between border-bottom">	
												<h4 class="text-left font-weight-bold mx-3">Files</h4>
												<div class="file-name-header-btn">	
													<input id='upload' name="upload[]" type="file" multiple="multiple" onchange="cadUploadFile()" class="form-control hide fone" />
							                    	<label for="upload" class="btn btn-large my-1" data-toggle="tooltip" title="Add More Files">
							                        	<i class="fas fa-plus text-info"></i>
							                        </label>
							                        <span class=" <?php if($sno <= 3) echo 'd-none'; ?>">|</span>
													<a href="javascript:;" class="btn btn-large my-1 <?php if($sno <= 3) echo 'd-none'; ?>" onclick="deleteAllManufacture()" data-toggle="tooltip" title="Remove All">
														<i class="far fa-trash-alt text-danger"></i>
													</a>
												</div>
											</div>
											<ul class="nav flex-column nav-tabs" role="tablist">
												<?php 
													$sno = 1;
													foreach($file_data_result as $file) { 
														$width = 20;
				                            			$trunk_file_name = $file['file_name'];
				                            			$trunk_file_name = preg_replace ("~^(.{{$width}})(.+)~", '\\1…', $trunk_file_name);
												?>
												<li class="nav-item">
												    <a class="nav-link <?php if($sno == 1) echo 'active'; ?>" data-toggle="tab" href="<?= '#'.$file['file_id'].'_cad_view_content' ?>" role="tab">
												    	<div class="d-flex justify-content-between">
														  	<h4 class="text-muted font-custom"><?= $sno .'. '. $trunk_file_name; ?></h4>
														  	<button type="button" class="delete-btn" onclick="return deleteManufacture('<?= $file['file_id']; ?>', '<?= $file['file_name']; ?>')"><i class="far fa-trash-alt text-danger"></i></button>
														</div>
													</a>
												</li>
												<?php
													$sno += 1;
													}
												?>
											</ul>
										</div>	
									</div>
								</div>
							</div>			    
		                </div>    
					</div>	
					<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12">
						<div class=" additional-upload-btn file-upload-btn">
	                        <input id='upload_from_side_content' name="upload[]" type="file" multiple="multiple" onchange="cadUploadFileFromSideContent()" class="form-control hide ftwo" />
	                        <label for="upload" class="form-control btn btn-large">
	                        	<small class="form-text text-muted">
	                                We currently support .stl, .stp (.step) 
	                                <br class="d-xl-block d-lg-block d-md-block d-sm-block d-block"> 
	                                and .iges (.igs) files up to 100MB
	                                <i class="fa fa-info-circle" data-toggle="tooltip" title="Upload up to 20 files at once"></i>
	                            </small><br/>
	                            <small class="text-success">
	                            	Files that you upload are secure and 
	                            	<br class="d-xl-block d-lg-block d-md-block d-sm-block d-block">
	                            	confidential, protecting your 
	                            	<br class="d-xl-block d-lg-block d-md-block d-sm-block d-block">
	                            	intellectual property
	                            </small>
		                   	</label>
	                    </div>
						<div class="upload-info-block">
	                        <small class="form-text text-center text-muted my-2">Email us for files above 100 MB size</small> 
		                    <a class="btn btn-primary Abtn" href="mailto:contact@3dusher.com">EMAIL</a>
		                    <small class="form-text text-center text-muted">OR</small>
		                    <a class="btn btn-primary Abtn" href="<?= base_url('contact-us'); ?>">CONTACT SALES</a>
	                    </div>
	                </div>
				</div>
			</section>
			<!-- File 3D Model and Details -->
			<section class="preference-component">
				<div class="preference-header-block">
					<h3 class="text-left">
						<div class="tickmark"></div>
						<span>Choose your preferences</span>
					</h3>
				</div>	
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-xs-12">
						<div class="preference-selection-block">
							<p class="text-muted">Select any option to continue placing order</p>
							<ul class="nav nav-tabs nav-justified" role="tablist">
					            <li class="nav-item">
					                <a class="nav-link <?php if($order_data_result['user_level'] == 'DS') echo 'active'; ?>" id="direct-selection-tab" data-toggle="tab" href="#direct-selection" role="tab" aria-selected="false">Choose Technology & Material</a>
					            </li>
					            <li class="nav-item">
					                <a class="nav-link <?php if($order_data_result['user_level'] == 'QA') echo 'active'; ?>" id="question-selection-tab" data-toggle="tab" href="#question-selection" role="tab" aria-selected="true">Recommend Technology</a>
					            </li>
					        </ul>
					    </div>    
					</div>
				</div>	
				<div class="row">	
					<div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 col-xs-12">
						<div class="tab-content">
	          				<div class="tab-pane fade <?php if($order_data_result['user_level'] == 'DS') echo 'show active'; ?>" id="direct-selection" role="tabpanel">
								<div class="direct-selection-block">
									<div class="direct-technology-block">
										<div class="mt-2 direct-technology-div">
											<p class="text-muted">Technology</p>
											<div class="direct-technology-content">
												<div class="row">	
													<?php
														$dtech_array['status'] = 'active';
														$dtech_data = $this->ITechnology_m->get($dtech_array);
														foreach ($dtech_data as $dtech_value) {
															$dtech_mat_check = FALSE;
															$directmat_array['technology_id'] = $dtech_value->technology_id;
															$directmat_array['status'] = 'active';
															$directmat_data = $this->IMaterial_m->get($directmat_array, TRUE);
															if(!empty($directmat_data)){	
																$dtech_mat_check = TRUE;
															}	
															if($dtech_mat_check == TRUE){
													?>
													<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
														<div class="form-radio">
															<label class="radio-label"><?= $dtech_value->technology_name; ?>
														  		<input type="radio" class="radio-input" name="direct_technology" value="<?= $dtech_value->technology_id; ?>" onchange="getDiractMaterial()" <?php if($order_data_result['user_level'] == 'DS' && $order_data_result['technology_id'] == $dtech_value->technology_id) echo 'checked'; ?>>
														  		<span class="radio-round"></span>
															</label>
														</div>
													</div>
													<?php
															}
														}
													?>
												</div>
											</div>
										</div>
									</div>
									<div class="mt-2 direct-material-block">
										<?php
											if(!empty($direct_material)){
												echo $direct_material;
											}
										?>		
									</div>
								</div>	
							</div>
							<div class="tab-pane fade <?php if($order_data_result['user_level'] == 'QA') echo 'show active'; ?>" id="question-selection" role="tabpanel">
								<div class="mt-2 question-selection-block">	
									<div class="my-2 preference-info">
									</div>
									<div class="question-answer-content">
										<div class="row">
											<?php
												$prof_array['question_type'] = 'Q1';
												$prof_array['status'] = 'active';
												$question_value = $this->IQuestion_m->get($prof_array, TRUE);
											?>
											<div class="col-12 question-content">
												<p class="text-muted">
													<?= $question_value->question_id; ?>. <?= $question_value->question_name; ?>
												</p>
											</div>
											<?php
												$ans_array['question_type'] = $question_value->question_type;
												$ans_array['status'] = 'active';
												$ans_data = $this->IAnswer_m->get($ans_array);
												foreach ($ans_data as $ans_value) {
											?>
											<div class="col-3">
												<div class="form-radio">
													<label class="radio-label"><?= $ans_value->answer_name; ?>
												  		<input type="radio" class="radio-input" name="requirement_id" value="<?= $ans_value->answer_id; ?>" onchange="requirementCustom()" <?php if($order_data_result['requirement_id'] == $ans_value->answer_id) echo 'checked'; ?>>
												  		<span class="radio-round"></span>
													</label>
												</div>	
											</div>
											<?php
												}
											?>
											<div class="col-xl-4 offset-xl-8 col-lg-4 offset-lg-8 col-md-4 offset-md-8 col-sm-12 col-xs-12">
												<div class="requirement-custom-content">
													<?php
														if(!empty($order_data['requirement_custom'])){
													?>
													<div class="form-group my-2">
														<input type="text" class="form-control" name="requirement_custom" value="<?= $order_data['requirement_custom']; ?>">
													</div>
													<?php
														}
													?>
												</div>
											</div>	
										</div>
									</div>	
									<div class="question-answer-content">
										<div class="row">
											<?php
												$prof_array['question_type'] = 'Q2';
												$prof_array['status'] = 'active';
												$question_value = $this->IQuestion_m->get($prof_array, TRUE);
											?>
											<div class="col-12 question-content">
												<p class="text-muted">
													<?= $question_value->question_id; ?>. <?= $question_value->question_name; ?>
												</p>
											</div>
											<?php
												$ans_array['question_type'] = $question_value->question_type;
												$ans_array['status'] = 'active';
												$ans_data = $this->IAnswer_m->get($ans_array);
												foreach ($ans_data as $ans_value) {
											?>
											<div class="col-3">
												<div class="form-radio">
													<label class="radio-label"><?= $ans_value->answer_name; ?>
												  		<input type="radio" class="radio-input" name="priority_id" value="<?= $ans_value->answer_id; ?>" onchange="getQuestionTechnology()" <?php if($order_data_result['priority_id'] == $ans_value->answer_id) echo 'checked'; ?>>
												  		<span class="radio-round"></span>
													</label>
												</div>	
											</div>
											<?php
												}
											?>
										</div>
									</div>
								</div>	
								<div class="question-technology-block my-3">
									<?php
										if(!empty($question_technology)){
											echo $question_technology;
										}
									?>
								</div>
								<div class="question-material-block my-3">
									<?php
										if(!empty($question_material)){
											echo $question_material;
										}
									?>
								</div>
							</div>		
						</div>
					</div>
					<div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 col-xs-12">
						<div class="sticky-top sticky-offset">	
							<div class="price-block">
								<div class="price-header">
									<h4 class="text-left m-0">Price Details</h4>
								</div>
								<div class="price-body">
									<?php
										if(!empty($order_data_result['requirement_id']) && !empty($order_data_result['priority_id']) && !empty($order_data_result['material_id'])){
											$pmat_array['material_id'] = $order_data_result['material_id'];
											$pmat_data = $this->IMaterial_m->get($pmat_array, TRUE);
											$width = 5;
	                            			$trunk_file_name = $pmat_data->material_name;
	                            			$material_name = preg_replace ("~^(.{{$width}})(.+)~", '\\1…', $trunk_file_name);
	                            			
											$ptech_array['technology_id'] = $order_data_result['technology_id'];
											$ptech_data = $this->ITechnology_m->get($ptech_array, TRUE);
											$trunk_file_name = $ptech_data->technology_name;
	                            			$technology_name = preg_replace ("~^(.{{$width}})(.+)~", '\\1…', $trunk_file_name);
											$cost = $order_data_result['payment_amount'];
									?>
									<div class="row">
										<div class="col-sm-7">
											<div id="name-content">
												<h4 class="text-left"><?= $material_name .'('.$technology_name.')' ?></h4>
											</div>
										</div>
										<div class="col-sm-5">
											<div id="price-content">
												<h4 class="text-left">&#36; <?= number_format($cost, 2); ?></h4>
											</div>
										</div>			
										<div class="col-sm-12">
											<div class="form-group">
												<input type="submit" class="form-control btn btn-primary Abtn" onclick="return customInputValidation()" name="professional-submit" value="PROCEED">
											</div>
										</div>		
									</div>
									<?php }else{ ?>	
										<small class="text-muted"><em>Choose relevant options for us to suggest technology and material</em></small>
									<?php } ?>
								</div>
							</div>	
							<div class="address-block my-2">
								
							</div>		
						</div>
					</div>
				</div>
			</section>
		</form>
		<?php } ?>
	</div>
</div>
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
                        <div class="col-6">    
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remember_me" value="true">
                                    <p class="text-left text-primary"><?= $this->lang->line('remember_me'); ?></p>
                                </label>
                            </div>
                        </div>
                        <div class="col-6">    
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
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <a href="<?= $this->google->get_login_url(); ?>" class="form-control text-center my-1 google-btn">
                                <img class="img-fluid" src="<?= base_url('assets/images/home/google-login.png'); ?>">&nbsp;&nbsp;<span>Google</span>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">    
                            <a href="<?= $this->facebook->login_url(); ?>" class="form-control text-center my-1 fb-btn">
                                <img class="img-fluid" src="<?= base_url('assets/images/home/fb-login.png'); ?>">&nbsp;&nbsp;<span>Facebook</span>
                            </a>
                        </div>    
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
<!-- End Login Modal -->

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
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <a href="<?= $this->google->get_login_url(); ?>" class="form-control text-center my-1 google-btn">
                                <img class="img-fluid" src="<?= base_url('assets/images/home/google-login.png'); ?>">&nbsp;&nbsp;<span>Google</span>
                            </a>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">    
                            <a href="<?= $this->facebook->login_url(); ?>" class="form-control text-center my-1 fb-btn">
                                <img class="img-fluid" src="<?= base_url('assets/images/home/fb-login.png'); ?>">&nbsp;&nbsp;<span>Facebook</span>
                            </a>
                        </div>    
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
<!-- End Register Modal -->			

<!-- Edit Material Modal -->
<div class="modal fade" id="materialModal">
    <div class="modal-dialog modal-dialog-centered">
      	<div class="modal-content material-modal-content">
      		<div class="modal-header">
	        	<h3 class="modal-title mt-0">Choose Material</h3>
	        	<input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="X">
	        </div>
	        <div class="modal-body">
				<div class="checkout-content">
					<div class="row">
						<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
							<div class="form-group">
								<div class="material-list"></div>
							</div>
						</div>
						<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
							<div class="form-group">
								<input type="submit" class="btn btn-primary Pbtn" onclick="editMaterial()" value="SUBMIT">	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>							
<!-- End Edit Material Modal -->

<!-- Address Modal -->
<?php if(!empty($usher_id) && !empty($file_data_result)){ ?>
<div class="modal fade" id="addressModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      	<div class="modal-content address-modal-content">
	      	<form method="post" action="<?= base_url('manufacture-address'); ?>">
				<div class="modal-body">
					<div class="checkout-content">
						<div class="row">
							<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
								<h4>BILLING ADDRESS:</h4>
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
									<input type="hidden" id="redirect_address" name="redirect_address" value="manufacture-details">
									<input type="button" class="form-control btn btn-primary Abtn" name="checkout-submit" onclick="return shippingAddress()" value="Submit">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
								<div id="address-validation-message"></div>
							</div>
						</div>
					</div>
				</div>
			</form>
        </div>
    </div>
</div>
<?php } ?>
<!-- End Address Modal -->

<!-- End Modal -->



