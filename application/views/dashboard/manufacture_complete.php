    <div class="manufacturing-part">
        <div class="manufacturing-content">    
            <h3>Manufacturing Orders</h3>
            <?php
                // $user_id = $_SESSION['user_id'];
                // $user_name = $_SESSION['user_name'];
                // // Order Details
                // $order_query = "SELECT * FROM order_details WHERE user_id = '$user_id' ORDER BY order_id DESC";
                // $order_result = mysqli_query($connection_usher, $order_query);
                // $order_count = mysqli_num_rows($order_result);
                if (!empty($order_result)) {
                    foreach ($order_result as $order_data) {
            ?>
            <div class="order-content">
                <div class="order-header">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="btn-group float-left float-xs-none">    
                                <h4>ORDER ID : <?= $order_data->order; ?></h4>    
                            </div>
                        </div>
                        <div class="col-xl-4 offset-xl-5 col-lg-4 offset-lg-5 col-md-4 offset-md-5 col-sm-4 offset-sm-5 col-xs-12">
                            <div class="float-right float-xs-none">
                                <div class="btn-group">    
                                    <a class="btn btn-primary Pbtn" href="need-help/manufacture/<?= $order_data->order_id; ?>">Need Help?</a>        
                                </div>&nbsp;&nbsp;
                                <!-- <div class="btn-group">
                                    <a class="btn btn-primary Pbtn" href="">Track</a>            
                                </div> -->
                            </div>    
                        </div>
                    </div>
                </div>    
                <?php
                    // Order Details
                    $o_array['order_id'] = $order_data->order_id;
                    $file_result = $this->Manufacture_m->get($o_array);
                    foreach ($file_result as $file_data) {        
                ?>
                <div class="order-body">  
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <h4 class="pl-2 manu-design">FILE DETAILS</h4>
                            <p class="pl-2"> File Name: <?= $file_data->file_name; ?></p>    
                            <p class="pl-2">
                                Qty/Price: 
                                <?= $file_data->product_qty;?> /   
                                &dollar;<?= number_format($file_data->product_amount);  ?> 
                            </p>    
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <h4 class="manu-design"> DIMENSIONS </h4>
                            <?php
                                $apidata = json_decode($file_data->cad_result);     
                            ?>
                            <p> 
                            <?= 
                                number_format($apidata->DimensionX, 2).' x '. 
                                number_format($apidata->DimensionY, 2).' x '. 
                                number_format($apidata->DimensionZ, 2).'mm'
                            ?>     
                            </p>
                            <p> Volume: <?= number_format($apidata->Volume); ?> mm3 </p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <h4 class="manu-design"> MANUFACTURING </h4>
                            <?php
                                // Technology ID
                                $tech_array['technology_id'] = $file_data->technology_id;  
                                $tech_data = $this->Technology_m->get($tech_array, TRUE);
                                // Material ID
                                $mat_array['material_id'] = $file_data->material_id;
                                $mat_data = $this->Material_m->get($mat_array, TRUE);        
                            ?>
                            <p>Technology: <?= $tech_data->technology_name; ?> </p>
                            <p>Material: <?= $mat_data->material_name; ?> </p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <h4> STATUS </h4>
                            <h4 class="message-span text-info"><?= $file_data->file_status; ?></h4>
                        </div>
                    </div>        
                </div>
                <?php
                    }
                ?>
            </div>    
            <?php
                    }
                }else{
                    echo '
                        <div class="manufacturing-content">              
                            <h4><span class="message-span">NO ONGOING ORDERS</span></h4>
                            <h4>Upload your 3D design now and get instant quote.</h4>
                            <br>
                            <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-xs-12">    
                                <a class="btn btn-primary Pbtn" href="manufacture.php">UPLOAD 3D DESIGN</a>
                            </div>
                        </div>
                    ';    
                }        
            ?>                                
        </div>
    </div>    