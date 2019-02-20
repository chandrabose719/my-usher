    <div id="authentication-part">    
        <div class="container-fluid">
            <div class="authentication-block">
                <div class="row">
                    <div class="col-xl-5 offset-xl-3 col-lg-5 offset-lg-3 col-md-5 offset-md-3 col-sm-12 col-xs-12">
                        <div class="authentication-image">
                            <a href="<?= base_url(); ?>">    
                                <img class="img-fluid" src="<?= base_url('assets/images/3dusher-logo.png'); ?>">
                            </a>
                        </div>
                    </div>
                </div>        
                <div class="row">
                    <div class="col-xl-5 offset-xl-3 col-lg-5 offset-lg-3 col-md-5 offset-md-3 col-sm-12 col-xs-12">
                        <form id="login" method="post" action="<?= base_url('login-operation'); ?>">
                            <div class="authentication-content">
                                <h3><?= $this->lang->line('login_header'); ?></h3>
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
                <!-- <div class="row">
                    <div class="col-xl-5 offset-xl-3 col-lg-5 offset-lg-3 col-md-5 offset-md-3 col-sm-12 col-xs-12">
                        <div class="authentication-content">
                            <div class="row">
                                <div class="col-6 col-xs-12">
                                    <div class="form-group">
                                        <a href="<?= $google_login_url; ?>"class="form-control btn btn-primary Pbtn google-btn"><i class="fab fa-google"></i> GOOGLE LOGIN</a>
                                    </div>        
                                </div>
                                <div class="col-6 col-xs-12">    
                                    <div class="form-group">
                                        <a href="<?= $this->facebook->login_url(); ?>"class="form-control btn btn-primary Pbtn fb-btn"><i class="fab fa-facebook"></i> FACEBOOK LOGIN</a>
                                    </div>
                                </div>    
                            </div>
                        </div>    
                    </div>    
                </div> -->
                <div class="row">
                    <div class="col-xl-5 offset-xl-3 col-lg-5 offset-lg-3 col-md-5 offset-md-3 col-sm-12 col-xs-12">
                        <div class="authentication-content">
                            <p class="text-center">
                                <?= $this->lang->line('register_info'); ?>
                                <br/>
                                <a class="text-info" href="<?= base_url('register'); ?>"><?= $this->lang->line('register_link'); ?></a>
                            </p>
                        </div>
                    </div>
                </div>                    
            </div>    
            <div class="fixed-bottom authentication-footer">
                <div class="row">
                    <div class="col-xl-5 offset-xl-3 col-lg-5 offset-lg-3 col-md-5 offset-md-3 col-sm-12 col-xs-12">
                        <div class="footer-content">
                            <p><?= $this->lang->line('footer_header'); ?></p>
                            <p>
                                <a class="text-info" href="<?= base_url('terms-of-use'); ?>" target="_blank"><?= $this->lang->line('terms_link'); ?></a> 
                                | 
                                <a class="text-info" href="<?= base_url('privacy-policy'); ?>" target="_blank"><?= $this->lang->line('privacy_link'); ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    

