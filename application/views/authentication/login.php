    <div id="login-part">    
        <div class="container-fluid">
            <div class="login-block py-0">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-xs-12">
                        <div class="login-image">
                            <a href="<?= base_url(); ?>">
                                <img class="img-fluid" src="<?= base_url('assets/images/3dusher-logo.png'); ?>">
                            </a>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-xs-12">
                        <h3><?= $this->lang->line('login_header'); ?></h3>
                        <div class="login-content">
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
                        </div> 
                        <div class="login-content">
                            <div class="row">    
                                <div class="col-12">
                                    <div class="row my-2">
                                        <div class="col">
                                            <hr class="hr-divider">
                                        </div>
                                        <div class="col-auto m-auto">
                                            OR
                                        </div>
                                        <div class="col">
                                            <hr class="hr-divider">
                                        </div>
                                    </div>
                                </div>    
                            </div> 
                        </div>                           
                    </div>    
                </div>
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-xs-12">
                        <form id="login" method="post" action="<?= base_url('login-operation'); ?>">
                            <div class="login-content">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="login_user_email" name="login_user_email" placeholder="<?= $this->lang->line('email'); ?>" value="<?= set_value('login_user_email'); ?>" onfocusin="loginFocusin(this)" onfocusout="loginEmailFocusout()">
                                    <small id="login_email_error" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="login_user_password" name="login_user_password" placeholder="<?= $this->lang->line('password'); ?>" value="<?= set_value('login_user_password'); ?>">
                                </div>
                                <div id="login_error">
                                
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="redirect_login" name="redirect_login" value="account">
                                    <input type="hidden" id="current_login" name="current_login" value="log-in">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary Abtn" name="login-submit" onclick="return loginValidation()" value="<?= $this->lang->line('login_btn'); ?>">
                                </div>
                                <div class="form-group">
                                    <p class="float-right"><a class="text-info" href="<?= base_url('forgot-password'); ?>"><?= $this->lang->line('forgot_password'); ?></a></p>
                                </div>            
                            </div>        
                        </form>        
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-xs-12">
                        <div class="login-content">
                            <p class="text-center">
                                <?= $this->lang->line('register_info'); ?>
                                <br/>
                                <a class="text-info" href="<?= base_url('register'); ?>"><?= $this->lang->line('register_link'); ?></a>
                            </p>
                        </div>
                    </div>
                </div>                    
            </div>    
            <div class="login-footer footer">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-12 col-xs-12">
                        <div class="footer-content">
                            <p><?= $this->lang->line('footer_header'); ?></p>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    

