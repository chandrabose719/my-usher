<div id="blog-part" class="px-5">
    <section id="blog-item-head" class="blog-item">
        <div class="container">
            <div class="row">
            	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">	
                    <div class="item-head-content">
                    	<h1>Rapid Prototyping for Architecture Models</h1>
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
                        <p>Rapid prototyping is a widely used technique in many areas of research and testing, which involves the use of smaller scale models to analyze product behavior before being made or to realize and display the design before actually making it. This technique has wide-ranging applications such as being used by the automobile industry, making prosthetic models for the medical industry, software testing and making architecture models before starting construction. </p>
                        <p>In relation to the field of architecture, rapid prototyping plays an important role by allowing architects to analyze the architecture concepts before construction actually starts. Even in the early design process, rapid prototyping helps examine several different concepts and put them in comparison of one another. Modern presentation models in this regard are made through Computer Aided Design (CAD) and can help filter out things aren’t needed, and replace them with better design solutions. Although several methods such as Stereo Lithography (SLA), Laminated Object Manufacturing (LOM), and Selective Laser Sintering (SLS) exist as a method of prototyping, the most widely adopted medium for this purpose today is 3D Printing.</p>
                        <p>
                            Additive Manufacturing, or most commonly known as 3D Printing, is the process of creating a three-dimensional object by creating a design on a computer and producing it through a printer known as a ‘3D Printer’. 3D printing allows users the ability to add a new level of detail which was previously not possible. In relation to architecture, designs that represent abstract architecture concepts can be realized as physical models. Before the advent of such modern methods, architects in need of trying to make physical versions of architecture models that they were planning to build had to go through a painstaking process of using handmade methods and relying on craftsmanship to make bold assumptions about how the final outlook of their idea would be. It wasn’t very cost effective either, as opting for more technologically sophisticated alternatives posed a major financial issue for each prototype that had to be made, along with taking up more time to go through this entire process. This all changed when 3D printing practically reshaped the prototyping concept for architects. People have even made 3D printed houses!
                        </p>
                    </div>    
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                    <div class="item-block-content">
                        <p>When using 3D printing to create an architectural model, several factors should be kept in mind. The digital model can be made through a Computer Aided Design (CAD) software such as 3D Max or Autodesk AutoCAD, with both of the software possessing the ability to translate two-dimensional images into three-dimensional models. The scale of the prototype that will be printed should also be considered, with the height of the ceiling, door and window size, and other similar factors being taken into consideration. Other factors to be considered include the property of the material being used, strength and support of the model, detailing the geometry, digital model resolution etc. </p>
                    </div>    
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12"> 
                    <div class="item-block-image">
                        <img class="img-fluid mt-4" src="<?= base_url('assets/images/blog/keychain.png'); ?>">
                    </div>    
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                    <div class="item-block-content">
                        <p>In fact, using 3D printing in rapid prototyping for your architecture models provides an efficient and cost-effective method of understanding what the final product will be before making the final product. </p>
                    </div>    
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-xs-12">
                    <div class="item-block-content">
                        <h4 class="center-align">Tell Us What You're Making</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 offset-xl-1 col-lg-4 offset-lg-1 col-md-4 offset-md-1 col-sm-4 offset-sm-1 col-xs-12">
                    <div class="item-block-content">
                        <a href="<?= base_url('describe-project'); ?>">
                            <img src="<?= base_url('assets/images/blog/design-services.png'); ?>" class="img-fluid">
                            <p class="center-align">I will need Design Services</p>
                        </a>   
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <div class="vr-divider"></div>                  
                </div>
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="item-block-content">
                        <a href="<?= base_url('manufacture'); ?>">
                            <img src="<?= base_url('assets/images/blog/manufacturing-services.png'); ?>" class="img-fluid">
                            <p class="center-align">I have 3D Design</p>
                        </a>        
                    </div>
                </div>
            </div>
            <?php
                if (!empty($usher_id)) {
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