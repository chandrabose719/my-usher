    <div id="authentication-part" class="mx-5">    
        <div class="container">
            <div class="row">
                <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">
                    <form id="register" method="post" action="<?= base_url('registeration'); ?>">
                        <div class="authentication-content">
                            <h3><?= $this->lang->line('register_header'); ?></h3>
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
                                <input type="hidden" id="redirect_register" name="redirect_register" value="account">
                                <input type="hidden" id="current_register" name="current_register" value="register">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary Abtn" name="register-submit" onclick="return registerValidation()" value="<?= $this->lang->line('register_btn'); ?>">
                            </div>    
                        </div>        
                    </form>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <form id="login" method="post" action="<?= base_url('login'); ?>">
                        <div class="authentication-content">
                            <h3><?= $this->lang->line('login_header'); ?></h3>
                            <div class="form-group">
                                <input type="email" class="form-control" id="login_user_email" name="login_user_email" placeholder="<?= $this->lang->line('email'); ?>" value="<?= set_value('login_user_email'); ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="login_user_password" name="login_user_password" placeholder="<?= $this->lang->line('password'); ?>" value="<?= set_value('login_user_password'); ?>">
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="redirect_login" name="redirect_login" value="account">
                                <input type="hidden" id="current_login" name="current_login" value="register">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary Abtn" name="login-submit" onclick="return loginValidation()" value="<?= $this->lang->line('login_btn'); ?>">
                            </div>
                            <div class="form-group">
                                <a href="<?= $google_login_url; ?>"class="form-control btn btn-primary Pbtn google-btn"><i class="fab fa-google"></i> GOOGLE LOGIN</a>
                            </div>
                            <div class="form-group">
                                <p><?= $this->lang->line('forgot_password'); ?> <a class="text-info" href="<?= base_url('forgot-password'); ?>"><?= $this->lang->line('click'); ?></a></p>
                            </div>    
                        </div>        
                    </form>        
                </div>
            </div>    
        </div>
    </div>

