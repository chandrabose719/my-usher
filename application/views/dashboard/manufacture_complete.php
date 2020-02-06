    <div class="manufacturing-part">
        <div class="manufacturing-content">    
            <h3><?= $this->lang->line('complete_header');?></h3>
            <?php
                if (!empty($order_result)) {
                    foreach ($order_result as $order_data) {
                        if($order_data->order_status == 'PROCESSING'){
            ?>
            <div class="order-content">
                <div class="order-header">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="btn-group float-left float-xs-none">    
                                <h4><?= $this->lang->line('order_id');?>: <?= $order_data->order; ?></h4>    
                            </div>
                        </div>
                        <div class="col-xl-4 offset-xl-5 col-lg-4 offset-lg-5 col-md-4 offset-md-5 col-sm-4 offset-sm-5 col-xs-12">
                            <div class="float-right float-xs-none">
                                <div class="btn-group">    
                                    <a class="btn btn-primary Pbtn" href="need-help/manufacture/<?= $order_data->order_id; ?>"><?= $this->lang->line('need_help');?></a>
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
                    if($user_data->user_mode == 'test'){
                        $file_result = $this->Testmanu_m->get($o_array);
                    }else{
                        $file_result = $this->Manufacture_m->get($o_array);
                    }
                    foreach ($file_result as $file_data) {        
                        $width = 10;
                        $short_name = $file_data->file_name;
                        $short_name = preg_replace ("~^(.{{$width}})(.+)~", '\\1…', $short_name);
                ?>
                <div class="order-body">  
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <h4 class="pl-2 manu-design"><?= $this->lang->line('file_details');?></h4>
                            <p class="pl-2"> <?= $this->lang->line('file_name');?>: <?= $short_name; ?></p>
                            <p class="pl-2">
                                <?= $this->lang->line('qty_price');?>: 
                                <?= $file_data->file_qty;?> /   
                                &dollar;<?= number_format($file_data->file_amount);  ?> 
                            </p>    
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <h4 class="manu-design"> <?= $this->lang->line('dimension');?> </h4>
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
                            <p> <?= $this->lang->line('volume');?>: <?= number_format($apidata->Volume); ?> mm&sup3; </p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <h4 class="manu-design"> <?= $this->lang->line('manufacturing');?> </h4>
                            <?php
                                // Material ID
                                $mat_array['material_id'] = $order_data->material_id;
                                $mat_data = $this->IMaterial_m->get($mat_array, TRUE);
                                $material_name = $mat_data->material_name;
                                $tech_array['technology_id'] = $mat_data->technology_id;
                                $tech_data = $this->ITechnology_m->get($tech_array, TRUE);      
                                $technology_name = $tech_data->technology_name;
                            ?>
                            <p><?= $this->lang->line('technology');?>: <?= $technology_name; ?> </p>
                            <p><?= $this->lang->line('material');?>: <?= $material_name; ?> </p>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <h4> <?= $this->lang->line('status');?> </h4>
                            <h4 class="message-span text-info"><?= $file_data->file_status; ?></h4>
                        </div>
                    </div>        
                </div>
                <?php
                    }
                ?>
                <div class="order-footer">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="btn-group float-left float-xs-none">
                                <?php
                                    $timestamp = $order_data->order_date;
                                    $file_order_date = date('d M \'y', $timestamp);
                                ?>
                                <h4><span><?= $this->lang->line('order_date');?></span> <?= $file_order_date; ?></h4>
                            </div>
                        </div>
                        <div class="col-xl-4 offset-xl-5 col-lg-4 offset-lg-5 col-md-4 offset-md-5 col-sm-4 offset-sm-5 col-xs-12">
                            <div class="btn-group float-right float-xs-none pr-3">    
                                <h4><span><?= $this->lang->line('order_amount');?></span> &dollar;<?= number_format($order_data->payment_amount, 2); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <?php
                        }
                    }
                }else{
                    echo '
                        <div class="manufacturing-content">              
                            <h4><span class="message-span">'.$this->lang->line('complete_msg_header').'</span></h4>
                            <p class="text-center">'.$this->lang->line('complete_msg_content').'</p>
                            <br>
                            <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-xs-12">    
                                <a class="btn btn-primary Pbtn" href="'.base_url('manufacture-details').'">UPLOAD 3D DESIGN</a>
                            </div>
                        </div>
                    ';    
                }        
            ?>                                
        </div>
    </div>    