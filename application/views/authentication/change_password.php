    <div id="authentication-part" class="mx-5">    
        <div class="container">
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
                                <input type="submit" class="form-control btn btn-primary Abtn" name="change-password-submit" value="SUBMIT">
                            </div>
                            <div class="form-group">
                                <p>Usher signin <a class="text-info" href="<?= base_url('register'); ?>">click</a> here!</p>
                            </div>    
                        </div>        
                    </form>
                </div>
            </div>    
        </div>
    </div>