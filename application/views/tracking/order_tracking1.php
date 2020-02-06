    <div id="tracking-part1" class="px-5 wrapper-body-padding">    
        <section id="tracking-block1">
            <div class="container">
                <div class="tracking-header">
                    <!-- <form method="post" action="<?= base_url('tracking-submit'); ?>"> -->
                    <form method="get">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"> 
                                <h3 class="text-left py-1">Order Tracking</h3>                            
                            </div>    
                            <div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-xs-12"> 
                                <div class="form-group">
                                    <input type="text" class="form-control" name="tracking_id" id="tracking_id" value="<?= $tracking_id; ?>" placeholder="Tracking Number...">
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12"> 
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary Pbtn" value="SUBMIT">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>        
                <hr>
                <?php if(!empty($tracking_data)){ ?>
                    <div class="product-block">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12"> 
                                <div class="client-detail">
                                    <div class="form-group">
                                        <p class="light-custom font-sm">Client Name:</p>
                                        <p class="font-sm"><?= $tracking_data->client_name; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <p class="light-custom font-sm">Company Name:</p>
                                        <p class="font-sm"><?= $tracking_data->company_name; ?></p>
                                    </div>
                                    <div class="form-group">
                                        <p class="light-custom font-sm">Shipping Address:</p>
                                        <?php if(!empty($tracking_data->shipping_address)){ ?>
                                        <p class="font-sm"><?= $tracking_data->shipping_address; ?>,</p>
                                        <p class="font-sm"><?= $tracking_data->shipping_city; ?>, <?= $tracking_data->shipping_state; ?>,</p>
                                        <p class="font-sm"><?= $tracking_data->shipping_country; ?> - <?= $tracking_data->shipping_pincode; ?></p>
                                        <?php } ?>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-xs-12"> 
                                <h4 class="text-left text-custom"><?= $tracking_data->order_id; ?> - <?= $tracking_data->project_name; ?></h4>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-industry"></i> Manufacturing Process:</p>
                                        <p class="font-sm"><?= $tracking_data->manufacturing_process; ?></p>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-puzzle-piece"></i> Post Process:</p>
                                        <p class="font-sm"><?= $tracking_data->post_process; ?></p>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-memory"></i> Material:</p>
                                        <p class="font-sm"><?= $tracking_data->material; ?></p>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-coins"></i> Quantity:</p>
                                        <p class="font-sm"><?= $tracking_data->quantity; ?> Unit</p>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-memory"></i> Ordered On:</p>
                                        <p class="font-sm"><?= $tracking_data->order_date; ?></p>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-coins"></i> Completion Date:</p>
                                        <p class="font-sm"><?= $tracking_data->completion_date; ?></p>
                                    </div>
                                    <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-file-download"></i> File:</p>
                                        <p class="">
                                            <a class="font-sm text-danger" href="">Long File Name</a>
                                        </p>
                                    </div> -->
                                </div> 
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="tracking-status">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <p class="light-custom font-sm">Contact Us:</p>
                                    <?php
                                        $contact_array = unserialize($tracking_data->contact_id);
                                        foreach ($contact_array as $key => $value) {
                                            $contact_arr['contact_id'] = $value;
                                            $contact_value = $this->TContact_m->get($contact_arr, TRUE);
                                    ?>
                                    <div class="pt-1">
                                        <p><?= $contact_value->contact_name; ?></p>
                                        <p class="font-sm py-0 light-custom"><?= $contact_value->contact_number; ?> - <?= $contact_value->contact_email; ?></p>
                                    </div>
                                    <?php 
                                        }
                                    ?>
                                </div>
                            </div>    
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-memory"></i> Shipping Type:</p>
                                        <p class="font-sm"><?= $tracking_data->shipping_type; ?></p>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-coins"></i> Shipping ID:</p>
                                        <p class="font-sm"><?= $tracking_data->shipping_id; ?></p>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 py-2">
                                        <p class="light-custom font-sm"><i class="fas fa-file-download"></i> Shipping Link:</p>
                                        <p class="">
                                            <?php 
                                                if(!empty($tracking_data->shipping_link)){
                                                    $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                                                    $text = $tracking_data->shipping_link;
                                                    if(preg_match($reg_exUrl, $text, $url)) {
                                                        echo preg_replace(
                                                            $reg_exUrl, 
                                                            "<a class='text-danger' href=".$url[0]." target='_blank'>".$url[0]."</a> ", 
                                                            $text
                                                        );
                                                    }else{
                                                        echo $text;
                                                    }
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>        
                        <nav class="mt-3 breadcrumb justify-content-center">
                            <p class="breadcrumb-item">
                                Order Placed  
                                <i class="fas fa-check text-success"></i>
                            </p>
                            <p class="breadcrumb-item">
                                Processing 
                                <i class="fas fa-check text-success"></i>
                            </p>
                            <p class="breadcrumb-item">
                                Shipped 
                                <i class="fas fa-sync text-custom"></i>
                            </p>
                            <p class="breadcrumb-item active">
                                Delivered

                            </p>
                        </nav>
                    </div>
                <?php }else{ ?>    
                    <div class="tracking-info-message py-5">
                        <h4 class="m-0 py-4">Please enter order ID and get your order information</h4>
                    </div>                      
                <?php } ?>    
            </div>        
        </section>  
    </div>