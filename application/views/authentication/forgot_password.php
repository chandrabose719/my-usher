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
                    <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-xs-12">
                        <form id="register" method="post">
                            <div class="authentication-content">
                                <h3>Forgot Password</h3>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary Abtn" name="forgot-password-submit" value="SUBMIT">
                                </div>
                                <div class="form-group">
                                    <p><a class="text-info" href="<?= base_url('log-in'); ?>">Click</a> here to log in instead</p>
                                </div>    
                            </div>        
                        </form>
                    </div>
                </div>    
            </div>
            <div class="fixed-bottom authentication-footer">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-xs-12">
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