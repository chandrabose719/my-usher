    <section id="upload-part" class="mx-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 offset-sm-1 col-xs-12"> 
                    <h3>Upload Files</h3>
                    <?php if (!empty($usher_id)) { ?>
                        <div class="upload-content">
                            <div class="form-group upload-btn">
                                <input id='upload' name="upload[]" type="file" multiple="multiple" onchange="displayUploadFile()" class="form-control hide" />
                                <label for="upload" class="btn btn-large"> Choose File </label>
                                <small class="form-text text-muted">
                                    We currently support .stl, .stp (.step) and .iges (.igs) files up to 100MB
                                    <i class="fa fa-info-circle" data-toggle="tooltip" title="Upload up to 20 files at once"></i>
                                </small>
                                <div class="row upload-msg-block">
                                    <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-4 offset-sm-1 col-xs-12">
                                        <div class="upload-msg-content">
                                            <small class="form-text text-muted">Files that you upload are secure and confidential, protecting your intellectual property</small>   
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                        <div class="vr-divider"></div>                  
                                    </div>
                                    <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-4 offset-sm-1 col-xs-12">
                                        <div class="upload-msg-content">
                                            <small class="form-text text-muted">For file sizes above 100MB, you can <a href="mailto:info@3dusher.com">email it</a> to us and we will get back to you with the quotation.</small>       
                                        </div>
                                    </div>
                                </div>    
                            </div>    
                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-xs-12">
                                <div class="display-file">
                                    
                                </div>
                            </div>
                            <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-xs-12">
                                <div class="form-group-content"></div>
                            </div>
                        </div>
                    <?php }else{ ?>
                        <div class="upload-content">
                            <div class="upload-btn">
                                <a class="upload-btn btn btn-large" href="#" data-toggle="modal" data-backdrop="static" data-target="#loginModal">Login &amp; Upload</a>
                                <small class="form-text text-muted">
                                    Please login or create an account to upload your 3D model files.<br>We accept 3D model files in STL, STEP and IGES formats.
                                </small>
                            </div>
                        </div>      
                    <?php } ?>  
                </div>          
            </div>  
        </div>
    </section>
    <!-- Modal Part -->
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" id="design-login" name="design-login" action="<?= base_url('login'); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title"> <?= $this->lang->line('login_header'); ?> </h3>
                        <input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="X">
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="email" class="form-control" id="login_user_email" name="login_user_email" placeholder="<?= $this->lang->line('email'); ?>" value="<?= set_value('login_user_email'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="login_user_password" name="login_user_password" placeholder="<?= $this->lang->line('password'); ?>" value="<?= set_value('login_user_password'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="redirect_login" name="redirect_login" value="manufacture">
                            <input type="hidden" id="current_login" name="current_login" value="manufacture">
                        </div>
                        <div id="validation-login-modal">
                        
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary Abtn" name="login-submit" onclick="return loginValidation()" value="<?= $this->lang->line('login_btn'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm">
                            <a href="#" class="text-primary float-left" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-target="#registerModal"><?= $this->lang->line('register_header'); ?></a>
                        </div>
                        <div class="col-sm">    
                            <a href="<?= base_url('forgot-password'); ?>" class="text-primary float-right"><?= $this->lang->line('forgot_password'); ?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Register Modal -->
    <div class="modal fade" id="registerModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" id="design-register" name="design-register" action="<?= base_url('registeration'); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title"> <?= $this->lang->line('register_header'); ?> </h3>
                        <input type="button" class="btn btn-outline-secondary " data-dismiss="modal" value="X">
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?= set_value('user_name'); ?>" placeholder="<?= $this->lang->line('name'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="user_email" name="user_email" value="<?= set_value('user_email'); ?>" placeholder="<?= $this->lang->line('email'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="user_password" name="user_password" value="<?= set_value('user_password'); ?>" placeholder="<?= $this->lang->line('password'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="conf_password" name="conf_password" value="<?= set_value('conf_password'); ?>" placeholder="<?= $this->lang->line('conf_password'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="redirect_register" name="redirect_register" value="manufacture">
                            <input type="hidden" id="current_register" name="current_register" value="manufacture">
                        </div>
                        <div id="validation-register-modal">
                                    
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary Abtn" name="register-submit" onclick="return registerValidation()" value="<?= $this->lang->line('register_btn'); ?>">
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm">
                            <a href="#" class="text-primary float-left" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-target="#loginModal"><?= $this->lang->line('login_header'); ?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Part -->