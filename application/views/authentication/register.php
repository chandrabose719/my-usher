    <div id="register-part">
        <div class="register-image">
            <img class="img-fluid" src="<?= base_url('assets/images/bg-register.png'); ?>">
        </div>    
        <div class="register-content">
            <div class="container-fluid">
                <div class="register-detail">
                    <div class="row">    
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="register-detail-image">
                                <img class="img-fluid text-center" src="<?= base_url('assets/images/3dusher-logo.png'); ?>">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3><?= $this->lang->line('register_header'); ?></h3>
                        </div>
                        <div class="col-xl-8 offset-xl-2 col-lg-8 offset-xl-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
                            <form id="register" method="post" action="<?= base_url('register-operation'); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="user_name" name="user_name" value="<?= set_value('user_name'); ?>" placeholder="<?= $this->lang->line('name'); ?>" onfocusin="registerFocusin(this)" onfocusout="nameFocusout()">
                                    <small id="name_error" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="user_email" name="user_email" value="<?= set_value('user_email'); ?>" placeholder="<?= $this->lang->line('email'); ?>" onfocusin="registerFocusin(this)" onfocusout="emailFocusout()">
                                    <small id="email_error" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="user_password" name="user_password" value="<?= set_value('user_password'); ?>" placeholder="<?= $this->lang->line('password'); ?>" onfocusin="registerFocusin(this)" onfocusout="passwordFocusout()">
                                    <small id="password_error" class="text-danger"></small>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="conf_password" name="conf_password" value="<?= set_value('conf_password'); ?>" placeholder="<?= $this->lang->line('conf_password'); ?>" onfocusin="registerFocusin(this)" onfocusout="confPasswordFocusout()">
                                    <small id="conf_password_error" class="text-danger"></small>
                                </div>
                                <div id="register_error">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="redirect_register" name="redirect_register" value="account">
                                    <input type="hidden" id="current_register" name="current_register" value="register">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary Abtn" name="register-submit" onclick="return registerValidation()" value="<?= $this->lang->line('register_btn'); ?>">
                                </div>
                                <div class="form-group">
                                    <p class="text-center"><?= $this->lang->line('login_info'); ?><a class="text-info" href="<?= base_url('log-in'); ?>"><?= $this->lang->line('login_link'); ?></a></p>
                                </div>
                                <div class="form-group text-center">
                                    <p class="text-muted text-center"><?= $this->lang->line('privacy_policy'); ?>
                                        <a class="text-info" href="<?= base_url('terms-of-use'); ?>" target="_blank"><?= $this->lang->line('terms_link'); ?></a> 
                                        and 
                                        <a class="text-info" href="<?= base_url('privacy-policy'); ?>" target="_blank"><?= $this->lang->line('privacy_link'); ?></a>
                                    </p>
                                </div>        
                            </form>   
                        </div>
                    </div>        
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="register-footer">    
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
    </div>

