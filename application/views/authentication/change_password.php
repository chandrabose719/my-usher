    <div id="authentication-part" class="mx-5 wrapper-body-margin">    
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
                                <h3>Change Password</h3>
                                <div class="form-group">
                                    <p><?= $user_name; ?><br/>
                                    (<?= $user_email; ?>)</p>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="New Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirm New Password">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="user_id" name="user_id" value="<?= $user_id; ?>">
                                    <input type="submit" class="form-control btn btn-primary Abtn" name="change-password-submit" value="SUBMIT">
                                </div>
                                <div class="form-group">
                                    <p>User login <a class="text-info" href="<?= base_url('log-in'); ?>">click</a> here!</p>
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