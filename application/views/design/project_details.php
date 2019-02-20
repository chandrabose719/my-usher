    <div id="describe-design-part" class="mx-5 wrapper-body-margin">    
        <div class="container">
            <form method="post">
                <h3>DESCRIBE YOUR PROJECT</h3>
                <div id="project-detail-content" class="project-detail-content">
                    <div id="project-detail-content-one">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-0 offset-xs-0 col-xs-12">
                                    <h4>Project Requirement</h4>
                                    <span>Let us know the requirements of your project so we can assign the right designer.</span>
                                </div>
                            </div>
                        </div>        
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                    <p>Name your project: <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control" name="design_name" id="design_name">
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 offset-sm-0 offset-xs-0">
                                    <p>End usage of the part: <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control" name="design_usage" id="design_usage">
                                </div>    
                        	</div>
                        </div>    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                    <p>Describe your requirement: <span class="text-danger">*</span></p>
                                    <span>Help our designers understand your requirements by being as specific as possible.</span>
                                    <div class="textarea-form-group">
                                        <textarea class="form-control" name="design_description" id="design_description" cols="100" rows="7" maxlength="5000" onkeyup="designDescriptionCount()"></textarea>
                                        <div class="text-muted float-right design_description_count" id="design_description_count">0/5000</div>
                                    </div>
                                </div>
                        	</div>
                        </div>    
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">        
                                <hr>
                            </div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-0 offset-xs-0 col-xs-12">
                                <h4>Additional Details</h4>
                                <span>Answer the questions below to help us determine the cost of your project.</span>
                            </div>
                        </div>
                    </div>        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                <p>How many different parts are in the project? <span class="text-danger">*</span></p>
                                <span>Is it a standalone piece, or is it a project with multiple parts?</span>
                                <div class="row">
                                    <?php
                                        $ass_array['status'] = 'active';
                                        $assembly_data = $this->Assembly_m->get($ass_array);
                                        $sno = 1;
                                        foreach ($assembly_data as $row) {
                                    
                                    ?>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                                            <div class="radio-content">
                                                <label>
                                                    <input type="radio" name="design_assembly" value="<?= $row->assembly_id; ?>">
                                                    <img class="img-fluid" src="<?= 'https://admin.3dusher.com/'.$row->image_path; ?>">
                                                    <br/><br/><span><?= $row->assembly_name; ?></span>
                                                </label>
                                            </div>
                                        </div>
                                    <?php
                                            $sno += 1;
                                        }                                        
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                <p>How intricate is your design? <span class="text-danger">*</span></p>
                                <span>Select the image with the closest level of detail you’ll need.</span>
                                <div class="row">
                                    <?php
                                        $pre_array['status'] = 'active';
                                        $pre_data = $this->Precision_m->get($pre_array);
                                        $sno = 1;
                                        foreach ($pre_data as $row) { 
                                    ?>
                                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6">
                                            <div class="radio-content">
                                                <label>
                                                    <input type="radio" name="design_precision" value="<?= $row->precision_id; ?>">
                                                    <img class="img-fluid" src="<?= 'https://admin.3dusher.com/'.$row->precision_image; ?>">
                                                    <br/><br/><span><?= $row->precision_name; ?></span>
                                                </label>
                                            </div>    
                                        </div>
                                    <?php
                                            $sno += 1;
                                        }                                        
                                    ?>
                                </div>        
                            </div>
                        </div>
                    </div>    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                <p>Do you have any surface finish requirements? <span class="text-danger">*</span></p>
                                <span>Select amongst a host of finishing techniques that are available with us.</span>
                            </div>
                        </div>    
                        <div class="row">    
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                <?php
                                    $fin_array['status'] = 'active';
                                    $fin_data = $this->Finishing_m->get($fin_array);
                                    echo " <select class='form-control' id='design_finishing' name='design_finishing' onchange='finishingCustom()'> 
                                        <option value='0'>Select Finishing</option>";
                                    foreach ($fin_data as $row) {
                                        echo "<option value='" . $row->finishing_id ."'>" . $row->finishing_name ."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="finishing-custom">
                                    
                                </div>
                            </div>         
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">        
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-0 offset-xs-0 col-xs-12">
                            <h4>You’re Almost Done!</h4>
                            <span>Give us a few last details, and then submit your order.</span>
                        </div>
                    </div>   
                    <div class="form-group">
                        <div class="row">
                            <div class="col-11 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                <p>Material preference: <span class="text-danger">*</span></p>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                <?php
                                    $mat_array['status'] = 'active';
                                    $mat_data = $this->DMaterial_m->get($mat_array);
                                    echo " <select class='form-control' id='design_material' name='design_material' onchange='materialCustom()'> 
                                        <option value='0'>Select Material</option>";
                                    foreach ($mat_data as $row) {
                                        echo "<option value='" . $row->design_material_id ."'>" . $row->design_material_name ."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="material-custom">
                                    
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-11 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                <p>Environment temperature: <span class="text-danger">*</span></p>
                            </div>
                        </div>
                        <div class="row">    
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                <?php
                                    $temp_array['status'] = 'active';
                                    $temp_data = $this->Temperature_m->get($temp_array);
                                    echo " <select class='form-control' id='design_temperature' name='design_temperature' onchange='temperatureCustom()'> 
                                        <option value='0'>Select Temperature</option>";
                                    foreach ($temp_data as $row) {
                                        echo "<option value='" . $row->temperature_id ."'>" . $row->temperature_name ."</option>";
                                    }
                                    echo "</select>";
                                ?>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="temperature-custom">
                                    
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1 offset-sm-0 offset-xs-0">
                                <p>Upload your reference files:</p>
                                <span>We support .pdf, .docx, .zip, .stl, .stp, .step, .igs, .iges, .JPEG, .JPG and .PNG files up to 10 mb</span>
                                <div class="upload-btn">
                                    <input id='design_resource' name="design_resource[]" type="file" multiple="multiple" onchange="designResource()" class="form-control hide" />
                                    <label for="design_resource" class="btn btn-large"> Choose File </label>
                                </div>
                                <div class="row" id="display-resource">
                                
                                </div>    
                            </div>
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-center">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <input type="hidden" name="industry_id" id="industry_id" value="<?= $industry_id; ?>">
                                <input type="button" class="form-control btn btn-primary Abtn" onclick="return designProjectSubmit()" name="project-detail-submit" value="PROCEED TO CHECKOUT">
                            </div>
                        </div>
                    </div>    
                </div>    
            </form>    
        </div>	
    </div>