    <div id="project-part" class="wrapper-body-margin">    
        <div class="container-fluid">
            <div class="container">
                <h3>REQUEST FOR QUOTATION</h3>
                 <div class="d-xl-block d-lg-block d-md-block d-none d-sm-none">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item basic-details-link">
                          <a class="nav-link active text-center" data-toggle="pill" href="#basic-details">Project Details</a>
                        </li>
                        <li class="nav-item additional-details-link">
                          <a class="nav-link text-center" data-toggle="pill" href="#additional-details">Manufacturing Details</a>
                        </li>
                        <li class="nav-item contact-details-link">
                          <a class="nav-link text-center" data-toggle="pill" href="#contact-details">Contact Details</a>
                        </li>
                    </ul>
                </div>     
            </div>
        </div>
        <form method="post">
            <div class="container">    
                <div class="tab-content">
                    <section class="basic-details tab-pane active" id="basic-details">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                    <p>Project Name: <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control" name="project_name" id="project_name">
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 ">
                                    <p>End Usage of the Part: <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control" name="project_usage" id="project_usage">
                                </div>    
                        	</div>
                        </div>    
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                    <p>Scope of the Project: <span class="text-danger">*</span></p>
                                    <span>Help us understand your requirements by being as specific as possible.</span>
                                    <div class="textarea-form-group">
                                        <textarea class="form-control" name="project_description" id="project_description" cols="100" rows="7" maxlength="5000" onkeyup="descriptionCount()"></textarea>
                                        <div class="text-muted float-right description_count" id="description_count">0/5000</div>
                                    </div>
                                </div>
                        	</div>
                        </div>        
                        <div class="col-xl-2 offset-xl-9 col-lg-2 offset-lg-9 col-md-3 offset-md-8">
                            <input type="button" class="btn btn-primary Pbtn-rounded d-xl-block d-lg-block d-md-block d-none d-sm-none" onclick="additionalDetails()" value="NEXT">
                        </div>
                    </section>
                    <section class="additional-details tab-pane fade" id="additional-details">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                    <p>Material Preference: <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control" name="project_material" id="project_material">
                                    <!-- Hidden Fileds -->
                                    <input type="hidden" class="form-control" name="project_technology" id="project_technology">
                                    <input type="hidden" class="form-control" name="project_finish" id="project_finish">
                                    <input type="hidden" class="form-control" name="project_tolerance" id="project_tolerance">
                                    <!-- End Hidden Fileds -->
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <p>Required Quantity: <span class="text-danger">*</span></p>
                                    <input type="number" class="form-control" name="project_qty" id="project_qty">
                                </div>    
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                    <p>Preferred Manufacturing Location(s): <span class="text-danger">*</span></p>
                                    <select class="form-control" name="project_location" id="project_location">
                                        <option>United States</option>
                                        <option>India</option>
                                        <option>Either</option>
                                    </select>
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <p>Order of Importance <span class="text-mute">(drag as per your priority):</span> <span class="text-danger">*</span></p>
                                    <div class="psq-content">
                                        <ul class="list-inline" id="psq">
                                            <li class="list-inline-item">
                                                <input type="hidden" name="psq-qlty" id="psq-qlty" value="Quality">
                                                <label class="btn btn-primary psq-btn" name="psq-qlty" id="psq-qlty">Quality</label>    
                                            </li>
                                            <li class="list-inline-item">
                                                <input type="hidden" name="psq-price" id="psq-price" value="Price">
                                                <label class="btn btn-primary psq-btn" name="psq-price" id="psq-price">Price</label>
                                            </li>
                                            <li class="list-inline-item">
                                                <input type="hidden" name="psq-speed" id="psq-speed" value="Speed">
                                                <label class="btn btn-primary psq-btn" name="psq-speed" id="psq-speed">Speed</label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>    
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                    <p>Project Award Date: <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control" name="award_date" id="award_date">
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <p>Product Needed By: <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control" name="needed_by" id="needed_by">
                                </div>    
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                    <p>Surface Finish & Manufacturing Instructions:</p>
                                    <div class="textarea-form-group">
                                        <textarea class="form-control" name="project_instruction" id="project_instruction" cols="100" rows="7" maxlength="5000" onkeyup="instructionCount()"></textarea>
                                        <div class="text-muted float-right instruction_count" id="instruction_count">0/5000</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                    <!-- <p>Additional Information <span class="text-mute">(Color, Threads, etc):</span></p> -->
                                    <!-- <div class="textarea-form-group">
                                        <textarea class="form-control" name="project_info" id="project_info" cols="100" rows="7" maxlength="5000" onkeyup="infoCount()"></textarea>
                                        <div class="text-muted float-right info_count" id="info_count">0/5000</div>
                                    </div> -->
                                    <input type="hidden" name="project_info" id="project_info">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
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
                                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                    <div class="upload-btn-content">
                                                
                                    </div>    
                                </div>
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="my-1 col-xl-2 offset-xl-1 col-lg-2 offset-lg-1 col-md-3 offset-md-1">
                                    <input type="button" class="btn btn-primary Pbtn-rounded d-xl-block d-lg-block d-md-block d-none d-sm-none" onclick="basicDetails()" value="PREVIOUS">
                                </div>
                                <div class="my-1 col-xl-2 offset-xl-6 col-lg-2 offset-lg-6 col-md-3 offset-md-4">
                                    <input type="button" class="btn btn-primary Pbtn-rounded d-xl-block d-lg-block d-md-block d-none d-sm-none" onclick="contactDetails()" value="NEXT">
                                </div>
                            </div>    
                        </div>    
                    </section>
                    <section class="contact-details tab-pane fade" id="contact-details">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                    <p>Full Name: <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control" id="user_name" name="user_name">    
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <p>Email ID: <span class="text-danger">*</span></p>
                                    <input type="email" class="form-control" id="user_email" name="user_email">   
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-6 col-sm-12 col-xs-12">
                                    <p>Company Name: <span class="text-danger">*</span></p>
                                    <input type="text" class="form-control" id="user_company" name="user_company">
                                </div>
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <p>Phone Number: </p>
                                    <input type="number" class="form-control" id="user_mobile" name="user_mobile">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-xs-12">
                                    <p>Shipping Address: <span class="text-danger">*</span></p>
                                    <div class="textarea-form-group">
                                        <textarea class="form-control custom-textarea" id="user_address" name="user_address" cols="100" rows="7" maxlength="5000"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="my-1 col-xl-2 offset-xl-1 col-lg-2 offset-lg-1 col-md-3 offset-md-1">
                                    <input type="button" class="btn btn-primary Pbtn-rounded d-xl-block d-lg-block d-md-block d-none d-sm-none" onclick="additionalDetails()" value="PREVIOUS">
                                </div>
                                <div class="my-1 col-xl-2 offset-xl-6 col-lg-2 offset-lg-6 col-md-3 offset-md-4 col-sm-12 col-xs-12">
                                    <input type="button" class="form-control btn btn-primary Pbtn-rounded" onclick="return projectSubmit()" name="project-submit" value="SUBMIT">
                                </div>
                            </div>
                        </div>
                    </section>
                </div>    
            </div>
        </form>    
    </div>