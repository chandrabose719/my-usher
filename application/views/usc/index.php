<div id="usc-part" class="px-5 wrapper-body-padding">    
    <section id="usc-input">
        <div class="container">
            <h3>Usher Shipment Rate Calculator</h3>
            <div class="row">
                <div class="col-xl-4 offset-xl-2 col-lg-4 offset-lg-2 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-3 pr-0">
                                <input type="text" class="form-control" name="part_length" id="part_length" onchange="calculationResult()" required>
                                <label class="pl-3">Length</label>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 pl-2">
                                <p class="my-0 pt-2">x</p>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-3 pl-0 pr-0">
                                <input type="text" class="form-control" name="part_breadth" id="part_breadth" onchange="calculationResult()" required>
                                <label>Breadth</label>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-1 col-1 pl-2">
                                <p class="my-0 pt-2">x</p>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 col-4 pl-0">
                                <input type="text" class="form-control" name="part_height" id="part_height" onchange="calculationResult()" required>
                                <label>Height (cm)</label>
                            </div>
                        </div>        
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="part_volume" id="part_volume" onchange="calculationResult()" required>
                        <label>Part Volume(cm&sup3;)</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 offset-xl-2 col-lg-4 offset-lg-2 col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="part_quantity" id="part_quantity" onchange="calculationResult()" required>
                        <label>Part Quantity (Units)</label>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 pr-0">
                            <div class="form-group">
                                <input type="text" class="form-control" name="part_density" id="part_density" onchange="calculationResult()" required>
                                <label>Part Density (g/cm&sup3;)</label>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                            <div class="form-group form-group-select" style="margin:10px 10px 10px 0px;">
                                <select class="form-control form-control-select" name="country_code" id="country_code" onchange="calculationResult()">
                                    <option value="us">United States</option>
                                    <option value="uk">United Kingdom</option>
                                    <option value="canada">Canada</option>
                                </select>
                            </div>    
                        </div>
                    </div>
                    <div class="text-right">
                		<a href="#" class="text-primary pr-2" data-toggle="modal" data-dismiss="modal" data-target="#materialModal">Material Details</a>
                	</div>
                </div>
            </div>        
        </div>
    </section>
    <section id="usc-output">
        <div class="container">
            <div class="usc-output-content">
                                
            </div>
        </div>        
    </section>
</div>                    

<!-- Material Details Modal -->
<div class="modal fade" id="materialModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      	<div class="modal-content material-modal-content">
      		<div class="modal-header">
	        	<h3 class="modal-title mt-0">Material Details</h3>
	        	<input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="X">
	        </div>
	        <div class="modal-body">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="material-detail-content" style="height:400px;overflow:auto;">
							<?php
								$mat_arr['status'] = 'active';
								$mat_data = $this->IMaterial_m->get($mat_arr);
								if(!empty($mat_data)){
							?>
							<table class="table table-bordered">
						    	<tr>
						        	<th>Material Name</th>
						        	<th>Material Density</th>
						      	</tr>
						    	<?php
						    		foreach ($mat_data as $mat_value) {
						    	?>
							    	<tr>
							        	<td><?= $mat_value->material_name; ?></td>
							        	<td><?= $mat_value->density; ?></td>
							        </tr>
							    <?php
							    	}
							    ?>    
						  	</table>
						  	<?php
						  		}else{
						  			echo "<p>There is NO Material Details</p>";
						  		}
						  	?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>							
<!-- End Material Details Modal -->

