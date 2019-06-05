    <div id="project-part" class="mx-5 wrapper-body-margin">    
        <div class="container-fluid">
            <div class="container">
                <h3>Request for Quotation</h3>
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item project-details-link">
                      <a class="nav-link active text-center" data-toggle="pill" href="#project-details">1.&nbsp;Project Details</a>
                    </li>
                    <li class="nav-item additional-details-link">
                      <a class="nav-link text-center" data-toggle="pill" href="#additional-details">2.&nbsp;Additional Details</a>
                    </li>
                    <li class="nav-item contact-details-link">
                      <a class="nav-link text-center" data-toggle="pill" href="#contact-details">3.&nbsp;Contact Details</a>
                    </li>
                </ul> 
            </div>
        </div>
        <div class="container">
            <form method="post">
                <div class="tab-content">
                <section class="basic-detail">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-10 col-xs-12">
                                <h4>Project Details</h4>
                                <span></span>
                            </div>
                        </div>
                    </div>        
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                <p>Project Name: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" name="project_name" id="project_name">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <p>End Usage of the Part: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" name="project_usage" id="project_usage">
                            </div>    
                    	</div>
                    </div>    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-1 col-lg-8 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                <p>Scope of the Project: <span class="text-danger">*</span></p>
                                <span>Help us understand your requirements by being as specific as possible.</span>
                                <div class="textarea-form-group">
                                    <textarea class="form-control" name="project_description" id="project_description" cols="100" rows="7" maxlength="5000" onkeyup="descriptionCount()"></textarea>
                                    <div class="text-muted float-right description_count" id="description_count">0/5000</div>
                                </div>
                            </div>
                    	</div>
                    </div>        
                </section>
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">        
                        <hr>
                    </div>
                </div>
                <section class="additional-detail">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-10 col-xs-12">
                                <h4>Additional Details</h4>
                                <span>Answer the questions below to help us determine the cost of your project.</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                <p>Technology Preference: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" name="project_technology" id="project_technology">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <p>Material Preference: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" name="project_material" id="project_material">
                            </div>    
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                <p>Surface Finish: <span class="text-mute">(If required)</span></p>
                                <input type="text" class="form-control" name="project_finish" id="project_finish">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <p>Required Quantity: <span class="text-danger">*</span></p>
                                <input type="number" class="form-control" name="project_qty" id="project_qty">
                            </div>    
                        </div>    
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-6 col-sm-12 col-xs-12">    
                                <p>Preferred Project Deadline: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" name="project_timeline" id="project_timeline">    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                <p>Tolerence Requirement <span class="text-mute">(if any):</span></p>
                                <input type="text" class="form-control" name="project_tolerance" id="project_tolerance">    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-1 col-lg-8 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                <p>Manufacturing Instructions <span class="text-mute">(if any):</span></p>
                                <div class="textarea-form-group">
                                    <textarea class="form-control" name="project_instruction" id="project_instruction" cols="100" rows="7" maxlength="5000" onkeyup="instructionCount()"></textarea>
                                    <div class="text-muted float-right instruction_count" id="instruction_count">0/5000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-1 col-lg-8 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                <p>Additional Information <span class="text-mute">(Color, Threads, etc):</span></p>
                                <div class="textarea-form-group">
                                    <textarea class="form-control" name="project_info" id="project_info" cols="100" rows="7" maxlength="5000" onkeyup="infoCount()"></textarea>
                                    <div class="text-muted float-right info_count" id="info_count">0/5000</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                <p>Do you have 3D Design Files? <span class="text-danger">*</span></p>
                                <select class='form-control' id='resource_type' name='resource_type' onchange='selectResource()'> 
                                    <option value='0'>Select Option</option>
                                    <option value='YES'>Yes</option>
                                    <option value='NO'>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-1 col-lg-8 offset-lg-1 col-md-8 offset-md-1 col-sm-12 col-xs-12">
                                <div class="upload-btn-content">
                                            
                                </div>    
                            </div>
                        </div>    
                    </div>            
                </section>
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">        
                        <hr>
                    </div>
                </div>        
                <section class="user-detail">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-10 col-xs-12">
                                <h4>Fill in your contact details and submit the requirement</h4>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                <p>Full Name: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" id="user_name" name="user_name">    
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <p>Email ID: <span class="text-danger">*</span></p>
                                <input type="email" class="form-control" id="user_email" name="user_email">   
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                <p>Company Name: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" id="user_company" name="user_company">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <p>Phone Number: </p>
                                <input type="number" class="form-control" id="user_mobile" name="user_mobile">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 offset-xl-1 col-lg-8 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                <p>Shipping Address: <span class="text-danger">*</span></p>
                                <div class="textarea-form-group">
                                    <textarea class="form-control custom-textarea" id="user_address" name="user_address" cols="100" rows="7" maxlength="5000"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xl-4 offset-xl-5 col-lg-4 offset-lg-5 col-md-4 offset-md-8 col-sm-12 col-xs-12">
                            <input type="button" class="form-control btn btn-primary Abtn" onclick="return projectSubmit()" name="project-submit" value="SUBMIT">
                        </div>
                    </div>
                </div>    
            </form>    
        </div>	
    </div>