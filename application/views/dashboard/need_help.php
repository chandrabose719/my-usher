    <div id="faq-part" class="px-5 wrapper-body-padding">    
        <section id="faq">
            <div class="container">
                <div class="row">
                	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">	
                        <div class="faq-content">
                        	<h1><br></h1>
                        </div>    
                	</div>
                </div>
            </div>
        </section>
        <div class="container">
            <hr>    
        </div>
        <section id="faq-form">
            <div class="container">
                <h3>Support</h3>
                <div class="faq-form-content">
                    <form method="post">
                        <div class="row">
                            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12 col-xs-12">    
                                <div class="form-group">    
                                    <textarea class="form-control faq-form-control" name="support_query" id="design_description" placeholder="What kind of issue are you having with this order?" cols="100" rows="7"></textarea>
                                </div>
                            </div>
                            <div class="col-xl-4 offset-xl-6 col-lg-4 offset-lg-6 col-md-4 offset-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="hidden" name="type" value="<?= $type; ?>">
                                    <input type="hidden" name="order_id" value="<?= $order_id; ?>">
                                    <input type="submit" class="form-control btn btn-primary Abtn" name="support-submit" value="Submit">
                                </div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </section>            	
        <section id="faq-item">
            <div class="container">
                <h3>Ongoing Order</h3>
                <div class="faq-item-content">
                    <div id="confidential-accordion">
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#confidentiality">    
                                <div class="card-header">
                                    <p>How do I know my order has been confirmed?</p>
                                </div>
                            </a>
                            <div id="confidentiality" class="collapse" data-parent="#confidential-accordion">
                                <div class="card-body">
                                    <p>You will receive a confirmation email to the registered email ID once the order has been confirmed. Furthermore, you will receive order status updates after your assigned manufacturer starts the manufacturing process.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#IP">    
                                <div class="card-header">
                                    <p>How do I know my order status?</p>
                                </div>
                            </a>
                            <div id="IP" class="collapse" data-parent="#confidential-accordion">
                                <div class="card-body">
									<p>You can know the status of your order by visiting My Account > Manufacturing orders/Design orders.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#3rd_Part">    
                                <div class="card-header">
                                    <p>Can I customize the order after placing it?</p>
                                </div>
                            </a>
                            <div id="3rd_Part" class="collapse" data-parent="#confidential-accordion">
                                <div class="card-body">
									<p>You can customize the order only if it is still in the stage of processing. To do so, email the details to info@3dusher.com with your order ID.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#NDA">    
                                <div class="card-header">
                                    <p>How can I cancel my order?</p>
                                </div>
                            </a>
                            <div id="NDA" class="collapse" data-parent="#confidential-accordion">
                                <div class="card-body">
									<p>You cannot cancel your order if it is still in the ‘Ongoing’ or ‘Shipped’ status. If it is in the stage of processing, then send an email to info@3dusher.com. Payments will be refunded in 15 days.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#Not_Safe">    
                                <div class="card-header">
                                    <p>How can I change my shipping address?</p>
                                </div>
                            </a>
                            <div id="Not_Safe" class="collapse" data-parent="#confidential-accordion">
                                <div class="card-body">
									<p>We don’t not have the option to edit the shipping address in our web application as of now. So if your order is in the stage of ‘processing’ or ‘ongoing’, send us an email with the new shipping address at info@3dusher.com.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#Other_Way">    
                                <div class="card-header">
                                    <p>What if I have issues with the order placed?</p>
                                </div>
                            </a>
                            <div id="Other_Way" class="collapse" data-parent="#confidential-accordion">
                                <div class="card-body">
                                    <p>Contact us at info@3dusher.com with your order ID and your related concern and our team will get in touch with you in 24 hours.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <hr>    
                </div>
                <h3>Completed Order</h3>
                <div class="faq-item-content">
                    <div id="order-accordion">
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#Upload_File">    
                                <div class="card-header">
                                    <p>I want an iteration in my order</p>
                                </div>
                            </a>
                            <div id="Upload_File" class="collapse" data-parent="#order-accordion">
                                <div class="card-body">
                                    <p>You can place a design order by Start Project > I will need design services. Once you have submitted details, our designers would work on an updated design.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#File_Type">    
                                <div class="card-header">
                                    <p>I have quality issues.</p>
                                </div>
                            </a>
                            <div id="File_Type" class="collapse" data-parent="#order-accordion">
                                <div class="card-body">
                                    <p>Your design requirements are addressed by the best designers and manufacturers and additionally 3D Usher also runs quality checks on the products. If there are any complaints regarding the quality, send us pictures along with the details to info@3dusher.com.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#track">    
                                <div class="card-header">
                                    <p>Part of my order is not in the shipment received</p>
                                </div>
                            </a>
                            <div id="track" class="collapse" data-parent="#order-accordion">
                                <div class="card-body">
                                    <p>You can seek for a replacement by mailing us with the details at info@3dusher.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a class="collapsed card-link" data-toggle="collapse" href="#Order_Place">    
                                <div class="card-header">
                                    <p>I am not satisfied with the color/fir of the order received.</p>
                                </div>
                            </a>
                            <div id="Order_Place" class="collapse" data-parent="#order-accordion">
                                <div class="card-body">
                                    <p>If the order you’ve received is not what you expected, contact our support team and we will make sure we deliver the right part as per your description.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </section>
    </div>