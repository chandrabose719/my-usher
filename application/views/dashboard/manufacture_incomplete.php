    <div class="manufacturing-part">
        <div class="manufacturing-content">    
            <form method="post" action="<?= base_url("manufacturing-incomplete-store-session"); ?>">
                <div class="row">
                    <div class="col-xl-5 offset-xl-1 col-lg-5 offset-lg-1 col-md-5 offset-md-1 col-sm-5 offset-sm-1 col-xs-12">
                        <h3><?= $this->lang->line('incomplete_header'); ?></h3>        
                    </div>
                    <div class="col-xl-3 offset-xl-2 col-lg-3 offset-lg-2 col-md-3 offset-md-2 col-sm-3 offset-sm-2 col-xs-12">
                        <div class="proceed-btn-content">
                            
                        </div>
                    </div>    
                </div>        
                <?php
                    if (!empty($file_result)) {
                        
                ?>
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-12">
                        <div class="order-content">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Date</th>
                                    <th>File Name</th>
                                    <th>Dimensions</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                    foreach ($file_result as $file_data) {
                                        $apidata = json_decode($file_data->cad_result);
                                        $width = 10;
                                        $short_name = $file_data->file_name;
                                        $short_name = preg_replace ("~^(.{{$width}})(.+)~", '\\1…', $short_name);
                                ?>
                                <tr>
                                    <td><?= date('d-M-Y', $file_data->cur_date); ?></td>
                                    <td><?= $short_name; ?></td>
                                    <td>
                                        <?php 
                                            if(empty($apidata) || $apidata == 'undefined'){   
                                                echo "";
                                            }else{
                                                echo 
                                                    number_format($apidata->DimensionX, 2).' x '. 
                                                    number_format($apidata->DimensionY, 2).' x '. 
                                                    number_format($apidata->DimensionZ, 2).'mm'
                                                ;
                                            }    
                                        ?>
                                    </td>
                                    <td>
                                        <!-- <form id="incomplete_form" name="incomplete_form">         -->
                                            <input type="checkbox" name="file_id[]" value="<?= $file_data->file_id; ?>" onclick="disableProceed()">
                                        <!-- </form> -->
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </form>    
            <?php
                }else{
                    echo '
                        <div class="manufacturing-content">              
                            <h4><span class="message-span">'.$this->lang->line('incomplete_msg_header').'</span></h4>
                            <p class="text-center">'.$this->lang->line('incomplete_msg_content').'</p>
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