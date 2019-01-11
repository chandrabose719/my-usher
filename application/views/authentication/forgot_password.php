    <div id="authentication-part" class="mx-5">    
        <div class="container">
            <div class="row">
                <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-xs-12">
                    <form id="register" method="post">
                        <div class="authentication-content">
                            <h3>Forgot Password</h3>
                            <div class="form-group">
                                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Primary Email ID">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary Abtn" name="forgot-password-submit" value="SUBMIT">
                            </div>
                            <div class="form-group">
                                <p><a class="text-info" href="<?= base_url('register'); ?>">Click</a> here to signin instead</p>
                            </div>    
                        </div>        
                    </form>
                </div>
            </div>    
        </div>
    </div>