        <div id="project-part" class="wrapper-body-margin">    
            <form method="post">
                <div class="container-fluid">
                    <div class="container">
                        <h3>Request for Quotation</h3>
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item" id="project-details-link">
                              <a class="nav-link active text-center" data-toggle="pill" href="#project-details">1.&nbsp;Project Details</a>
                            </li>
                            <li class="nav-item" id="additional-details-link">
                              <a class="nav-link text-center" data-toggle="pill" href="#additional-details">2.&nbsp;Additional Details</a>
                            </li>
                            <li class="nav-item" id="contact-details-link">
                              <a class="nav-link text-center" data-toggle="pill" href="#contact-details">3.&nbsp;Contact Details</a>
                            </li>
                        </ul> 
                    </div>
                </div> 
                <div class="container">    
                <div class="tab-content">
                    <div id="project-details" class="container tab-pane active"><br>
                        <section class="basic-detail">        
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 ">
                                    <!-- 22-April Mayank ends -->
                                        <p>Project Name: <span class="text-danger">*</span></p>
                                        <input type="text" class="form-control" name="project_name" id="project_name">
                                    </div>
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 ">
                                    <!-- 22-April Mayank ends -->
                                        <p>End Usage of the Part: <span class="text-danger">*</span></p>
                                        <input type="text" class="form-control" name="project_usage" id="project_usage">
                                    </div>    
                                </div>
                            </div>    
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->
                                        <p>Scope of the Project: <span class="text-danger">*</span></p>
                                        <span>Help us understand your requirements by being as specific as possible.</span>
                                        <div class="textarea-form-group">
                                            <textarea class="form-control" name="project_description" id="project_description" cols="100" rows="7" maxlength="5000" onkeyup="descriptionCount()"></textarea>
                                            <div class="text-muted float-right description_count" id="description_count">0/5000</div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-xl-2 offset-xl-5 col-lg-2 offset-lg-5 col-md-2 offset-md-4">
                                <input type="button" class="btn btn-primary Pbtn rounded d-xl-block d-lg-block d-md-block d-none d-sm-none" onclick="additionalDetails()" value="Next">
                            </div>       
                        </section>
                    </div>
                    <div id="additional-details" class="container tab-pane fade"><br>
                        <section class="additional-detail">
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->
                                        <!-- 22-April Mayank -->
                                        <p>Technology Preference: <span class="text-danger">*</span></p>
                                        <!-- 22-April Mayank ends -->
                                        <input type="text" class="form-control" name="project_technology" id="project_technology">
                                    </div>
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <!-- 22-April Mayank ends -->
                                        <p>Material Preference: <span class="text-danger">*</span></p>
                                        <input type="text" class="form-control" name="project_material" id="project_material">
                                    </div>    
                                </div>    
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->
                                        <p>Surface Finish:<span class="text-mute">(If required)</span></p>
                                        <input type="text" class="form-control" name="project_finish" id="project_finish">
                                    </div>
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <!-- 22-April Mayank ends -->
                                        <p>Required Quantity: <span class="text-danger">*</span></p>
                                        <input type="number" class="form-control" name="project_qty" id="project_qty">
                                    </div>    
                                </div>    
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->   
                                        <p>Preferred Project Deadline: <span class="text-danger">*</span></p>
                                        <input type="text" class="form-control" name="project_timeline" id="project_timeline">    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->    
                                        <p>Tolerence Requirement <span class="text-mute">(if any):</span></p>
                                        <input type="text" class="form-control" name="project_tolerance" id="project_tolerance">    
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->
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
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->
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
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->
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
                                    <div class="col-xl-10 col-lg-10 col-md-8 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1">
                                        <div class="upload-btn-content">

                                        </div>    
                                    </div>
                                </div>    
                            </div>
                            <div class="col-xl-2 offset-xl-5 col-lg-2 offset-lg-5 col-md-2 offset-md-4">
                                <input type="button" class="btn btn-primary Pbtn rounded d-xl-block d-lg-block d-md-block d-none d-sm-none" onclick="contactDetails()" value="Next">
                            </div>                                        
                        </section>
                    </div>
                    <div id="contact-details" class="container tab-pane fade"><br>
                        <section class="user-detail">
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->
                                        <p>Full Name: <span class="text-danger">*</span></p>
                                        <input type="text" class="form-control" id="user_name" name="user_name">    
                                    </div>
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <!-- 22-April Mayank ends -->
                                        <p>Email ID: <span class="text-danger">*</span></p>
                                        <input type="email" class="form-control" id="user_email" name="user_email">   
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->
                                        <p>Company Name: <span class="text-danger">*</span></p>
                                        <input type="text" class="form-control" id="random1" name="user_name">    
                                    </div>
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-xs-12">
                                    <!-- 22-April Mayank ends -->
                                        <p>Phone Number: <span class="text-danger"></span></p>
                                        <input type="email" class="form-control" id="random2" name="user_email">   
                                    </div>
                                </div>
                            </div>                    
                            <div class="form-group">
                                <div class="row">
                                    <!-- 22-April Mayank -->
                                    <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                    <!-- 22-April Mayank ends -->
                                        <p>Shipping Address: <span class="text-danger">*</span></p>
                                        <div class="textarea-form-group">
                                            <textarea class="form-control custom-textarea" id="user_address" name="user_address" cols="100" rows="7" maxlength="5000"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                <div class="row">

                                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 offset-xl-5 offset-lg-5 offset-md-4">
                                        <input type="button" class="form-control btn btn-primary Pbtn" onclick="return projectSubmit()" name="project-submit" value="SUBMIT">
                                    </div>
                                </div>
                            </div>                             
                        </section>
                    </div>
                </div>                              
                <!-- <section class="basic-detail">
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 ">
                                <p>Project Name: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" name="project_name" id="project_name">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 ">
                                <p>End Usage of the Part: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" name="project_usage" id="project_usage">
                            </div>    
                    	</div>
                    </div>    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                <p>Surface Finish:<span class="text-mute">(If required)</span></p>
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">  
                                <p>Preferred Project Deadline: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" name="project_timeline" id="project_timeline">    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">    
                                <p>Tolerence Requirement <span class="text-mute">(if any):</span></p>
                                <input type="text" class="form-control" name="project_tolerance" id="project_tolerance">    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
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
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
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
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1 offset-md-1">
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
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
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                <p>Company Name: <span class="text-danger">*</span></p>
                                <input type="text" class="form-control" id="random1" name="user_name">    
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <p>Phone Number: <span class="text-danger"></span></p>
                                <input type="email" class="form-control" id="random2" name="user_email">   
                            </div>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 offset-xl-1 offset-lg-1">
                                <p>Shipping Address: <span class="text-danger">*</span></p>
                                <div class="textarea-form-group">
                                    <textarea class="form-control custom-textarea" id="user_address" name="user_address" cols="100" rows="7" maxlength="5000"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
 <!--                <div class="form-group">
                    <div class="row">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 offset-xl-5 offset-lg-5 offset-md-8">
                            <input type="button" class="form-control btn btn-primary Abtn" onclick="return projectSubmit()" name="project-submit" value="SUBMIT">
                        </div>
                    </div>
                </div>  -->   
            </form>    
        </div>	
    </div>