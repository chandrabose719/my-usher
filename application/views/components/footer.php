    <!-- Footer Part -->
    <footer id="footer-part">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <h4>COMPANY</h4>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="footer-content">
                                <ul class="list-unstyled">
                                    <?php
                                        if(current_url() == base_url()){
                                            echo '
                                                <li>
                                                    <div class="page-scroll">
                                                        <a class="nav-link" href="#how-it-works">How it Works</a>
                                                    </div>    
                                                </li>
                                            ';
                                        }else{
                                            echo '<li><a href="https://3dusher.com/#how-it-works">How it Works</a></li>';    
                                        }   
                                    ?>  
                                    <li><a href="<?= base_url('about-us'); ?>">About Us</a></li>
                                    <li><a href="<?= base_url('resources'); ?>">Resources</a></li>
                                    <li><a href="<?= base_url('blog'); ?>">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6"> 
                            <div class="footer-content">
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('faq'); ?>">FAQs</a></li>
                                    <li><a href="<?= base_url('contact-us'); ?>">Contact Us</a></li>
                                    <li><a href="<?= base_url('privacy-policy'); ?>">Privacy</a></li>
                                    <li><a href="<?= base_url('terms-of-use'); ?>">Terms</a></li>
                                </ul>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                     <h4>INDUSTRIES</h4>
                     <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="footer-content">
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('aerospace'); ?>">Aerospace</a></li>
                                    <li><a href="<?= base_url('architecture'); ?>">Architecture</a></li>
                                    <li><a href="<?= base_url('automotive'); ?>">Automotive</a></li>
                                    <li><a href="<?= base_url('education'); ?>">Education &amp; Research</a></li>
                                </ul>    
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="footer-content">
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('gifting'); ?>">Gifting</a></li>
        				            <li><a href="<?= base_url('manufacturing'); ?>">Manufacturing</a></li>
                                    <li><a href="<?= base_url('medtech'); ?>">MedTech</a></li>
                                    <li><a href="<?= base_url('product-design-research'); ?>">Product Design</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  	<div class="mt-4 footer-start-make">
                        <form method="post" action="<?= base_url('home/subscription'); ?>">
                            <input type="hidden" name="current_page" value="<?= current_url(); ?>">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control bg-transparent" name="subscription_email" placeholder="Stay Updated" required>
                                <div class="input-group-append">
                                    <input type="submit" class="btn btn-primary Pbtn" name="subscription-submit" value="SUBMIT">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-4 col-md-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="footer-social-content">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://www.linkedin.com/company/3dusher/" target="_blank" title="Linkedin">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.instagram.com/3d_usher/" target="_blank" title="Instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.facebook.com/3dusher/" target="_blank" title="Facebook">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://twitter.com/Usher3d" title="Twitter" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>  
        					<li class="list-inline-item">
                                <a href="mailto:info@3dusher.com">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </li>
                        </ul>
                    </div>     
                </div>
                <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-12 col-xs-12">
                    <div class="copyright-content float-sm-right">    
                        <p>&#169; 3D Usher, Inc.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Part -->
    