    <!-- Footer Part -->
    <footer id="footer-part">
        <div class="container">
            <hr>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 order-xl-1 order-lg-1 order-md-1 order-sm-1 order-2">
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
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12  order-xl-2 order-lg-2 order-md-2 order-sm-2 order-3">
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
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 order-xl-3 order-lg-3 order-md-3 order-sm-3 order-1">
                  	<h4>CONTACT</h4>
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="footer-content">
                                <ul class="list-unstyled">
                                    <li>
                                        <a onclick="return false;">
                                            <span>
                                                <img src="<?= base_url('assets/images/flag-america.png'); ?>">&nbsp;&nbsp;+1 (646) 498 1909
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a onclick="return false;">
                                            <span>
                                                <img src="<?= base_url('assets/images/flag-india.png'); ?>">&nbsp;&nbsp;+91 959 179 2432
                                            </span>
                                        </a>    
                                    </li>
                                    <li>
                                        <a onclick="return false;">
                                            <i class="fa fa-envelope text-info"></i>&nbsp;&nbsp;
                                            info@3dusher.com
                                        </a>
                                    </li>
                                </ul>    
                            </div>
                        </div>
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
                                <a href="mailto:contact@3dusher.com">
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
    