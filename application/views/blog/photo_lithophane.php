<div id="blog-part" class="px-5 wrapper-body-padding">
    <section id="blog-item-head" class="blog-item lithophane">
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">	
                    <div class="item-head-content">
                    	<h1>3D Printing a selfie or a photo as lithophane </h1>
                    </div>    
            	</div>
            </div>
        </div>
    </section>
    <section id="blog-item-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                    <div class="item-block-content">
                        <p>Art has always been close to mankind. Taking an image or an emotion and eternalizing it. The quest to capture these “moments” have inspired generation after generation of people to work on their craft and dedicate their lives to art.</p>
                        <p>“Lithos” meaning “rock” and “Phaninein” meaning “to cause to appear”. Two Greek words brought together to make the word “Lithophane”.</p>
                        <p>Lithophane is an etched or molded artwork on thin translucent porcelain which can be seen in grey-tones when backlit.</p>
                        <p>Historians argue that lithophane found its roots in China around a thousand years before the Tang Dynasty. Another theory says European lithophanes come from the Chinese Song Dynasty.</p>
                        <p>European lithophanes were initially produced around the same time in countries like France, Prussia, and Germany. Baron Paul is credited for inventing the process of “email ombrant” of lithophanes in 1827 in France. Robert Jones acquired the rights for this method and in 1828 and licensed it out to English factories to make them. Some believe it was Georg Friedrich Christoph of Prussia who perfected the process, while others say the methodology was tuned in Berlin, by German Manufacturers. This German belief led lithophane to also be known as “Berlin Transparency”.</p>
                        <p>By the mid-19 th century, lithophane was being produced throughout Europe. Common themes for lithophane were religion, portraits, genre themes, stories from the bible and some even commemorated events like the opening of the Eiffel Tower.</p>
                        <p>Today lithophanes have evolved with the advent of 3D printing. Today any image can be turned into a 3D image by printing it into lithophanes using various websites, and wouldn’t it be wild to have your selfies turned into an amazingly dramatic, grey-scaled 3D selfie.</p>
                        <p>3D printing has evolved this style of art, if not saved it among all the noise inthe modern world.</p>
                    </div>    
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="project-intro-content">
                        <h4 class="text-center">Tell Us What You're Making</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-12 offset-sm-0 col-12 offset-0">
                    <div class="project-intro-content">
                        <p class="text-center">Have a design or project in mind? <br>Design with 3D Usher</p>
                        <div class="row"> 
                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3">
                                <a href="<?= base_url('describe-project'); ?>" class="btn btn-primary Pbtn">DESCRIBE PROJECT</a>
                            </div>   
                        </div>      
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-12">    
                    <span class="d-md-block vr-divider"></span>
                </div>    
                <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-12 offset-sm-0 col-12 offset-0">
                    <div class="project-intro-content">
                        <p class="text-center">Looking for manufacturing solutions?<br> Upload your 3D Design and get instant quote</p>
                        <div class="row"> 
                            <div class="col-xl-6 offset-xl-3 col-lg-6 offset-lg-3 col-md-6 offset-md-3">    
                                <a href="<?= base_url('manufacture'); ?>" class="btn btn-primary Pbtn">UPLOAD FILES</a>
                            </div>
                        </div>               
                    </div>
                </div>
            </div>
            <div class="row">    
                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 offset-sm-0 col-12 offset-0">
                    <div class="row my-3">
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
            <div class="row">
                <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-12 offset-sm-0 col-12 offset-0">
                    <div class="project-intro-content">
                        <a href="<?= base_url('contact-us'); ?>" class="btn btn-primary Abtn">CONTACT SALES</a>
                    </div>
                </div>
            </div>
            <?php
                if (empty($usher_id)) {
            ?>
            <hr>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="item-block-content">
                        <h4 class="center-align">Register Now</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">    
                    <div class="item-block-content">
                        <p>Design, Manufacture and track you order in single place. Register with 3D Usher to explore more.</p>
                        <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-12 col-xs-12">
                            <a class="btn btn-primary Pbtn" href="<?= base_url('register'); ?>">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>    
        </div>
    </section>
</div>