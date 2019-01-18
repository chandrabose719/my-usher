	<section id="cart-part" class="mx-5">
		<div class="container">
			<h3>Manufacturing Technology &amp; Material</h3>
			<form method="post">	
				<div class="row">
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-12">	
						<div class="cad-content">
							<div id="accordion">
								<?php 
									$sno = 1;
									foreach($file_data_result as $file) { 
										$apidata = json_decode($file['cad_result']);		
								?>
								<div class="card">
							    	<?php if ($sno == 1){ ?>
							    		<a class="card-link" data-toggle="collapse" href=<?= '#'.$file['file_id']; ?>>
							    	<?php }else{ ?>
							    		<a class=" card-link" data-toggle="collapse" href=<?= '#'.$file['file_id']; ?>>
							    	<?php } ?>
							    			<div class="card-header">
							        			<h4><?= $file['file_name']; ?> </h4>
							        			<p> 
							        			<?= 
							        				number_format($apidata->DimensionX, 2); ?> * <?= number_format($apidata->DimensionY, 2); ?> * <?= number_format($apidata->DimensionZ, 2); ?> 
							        			<!-- <?php	
							        				echo" <select class='form-control' id='".$file['file_id']."_file_unit' name='".$file['file_id']."_file_unit'>
															<option>mm</option>
														  	<option>cm</option>
														  	<option>in</option>
														</select>
							        				";
							        			?> -->	
							        			</p>		
							        		</div>
							        	</a>
							      	<?php if ($sno == 1){ ?>	
							      		<div id="<?= $file['file_id']; ?>" class="collapse show" data-parent="#accordion">
							      	<?php }else{ ?>
							      		<div id="<?= $file['file_id']; ?>" class="collapse show" data-parent="#accordion">
							      	<?php } ?>	
							        	<div class="card-body">
							          		<div class="row">
												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
													<div class="cad-view">
														<iframe src="<?= $apidata->HtmlFile; ?>"></iframe>
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12">	
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
									?>
									<div class="row">
										<?php	
											$width = 10;
	                            			$trunk_file_name = $file['file_name'];
	                            			$trunk_file_name = preg_replace ("~^(.{{$width}})(.+)~", '\\1…', $trunk_file_name);
	                            			if($file['file_amount'] != 0){
										?>	
											<div class="col-sm-7">
												<h4><?= $trunk_file_name; ?></h4>
											</div>
											<div class="col-sm-5">
												<?php $file_cost = $file['file_amount']; ?>
												<h4>&#36; <?= number_format($file_cost, 2); ?> </h4>
											</div>
										<?php
										}else{	
										?>
											<div class="col-sm-7">
												<h4><?= $trunk_file_name; ?></h4>
											</div>
											<div class="col-sm-5">
												<div id="<?= $price_file_id.'-price-content'; ?>"></div>
											</div>	
										<?php
										}	
										?>			
									</div>
									<?php
										}
									?>
									<div class="row">
										<div class="col-sm">
											<div class="form-group">
												<input type="submit" class="form-control btn btn-primary Abtn" name="cart-submit" value="PROCEED">
											</div>
										</div>		
									</div>
								</div>
							</div>
							<small class="form-text text-muted" style="font-style:italic;">
					    		3D Usher instant quote tool currently supports ABS, PLA, PETG, PEEK, Nylon, TPU and Standard Resin materials. Please <a href="mailto:info@3dusher.com">email us</a> your files for any other material or technology.
					    	</small>
					    </div>	
					</div>
				</div>	
			</form>
		</div>
	</section>