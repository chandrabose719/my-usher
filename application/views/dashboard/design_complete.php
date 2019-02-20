    <div class="design-part">    
        <h3><?= $this->lang->line('design_header'); ?></h3>
        <?php
            if (!empty($design_result)) {
                foreach ($design_result as $design_data) {
                    // Short Name
                    $width = 10;
                    $short_name = $design_data->design_name;
                    $short_name = preg_replace ("~^(.{{$width}})(.+)~", '\\1…', $short_name);
                    // Industry Name
                    $ind_array['industry_id'] = $design_data->industry_id;  
                    $ind_data = $this->Industry_m->get($ind_array, TRUE);
        ?>
        <div class="design-content">
            <div class="design-header">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="btn-group float-left float-xs-none">
                            <h4><?= $this->lang->line('order_id'); ?>: <?= $design_data->order_id; ?></h4>    
                        </div>
                    </div>
                    <div class="col-xl-4 offset-xl-5 col-lg-4 offset-lg-5 col-md-4 offset-md-5 col-sm-4 offset-sm-5 col-xs-12">
                        <div class="btn-group float-sm-right float-xs-none need-help">    
                            <a class="btn btn-primary Pbtn" href="need-help/design/<?= $design_data->design_id; ?>"><?= $this->lang->line('need_help'); ?></a>        
                        </div>
                    </div>
                </div>
            </div>    
            <div class="design-body">  
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <h4 class="pl-2 manu-design"><?= $this->lang->line('project_details'); ?></h4>
                        <p class="pl-2"> <?= $this->lang->line('project_name'); ?>: <?= $short_name; ?> <p>    
                        <p class="pl-2"> <?= $this->lang->line('industry'); ?>: <?= $ind_data->industry_name; ?> </p>    
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <h4 class="manu-design"> <?= $this->lang->line('end_usage'); ?> </h4>
                        <?php
                            // Design Temperature
                            if ($design_data->design_temperature != '1') {
                                $temp_array['temperature_id'] = $design_data->design_temperature;  
                                $temp_data = $this->Temperature_m->get($temp_array, TRUE);
                                $temp_name = $temp_data->temperature_name;
                            }else{
                                $temp_name = $design_data->design_temperature_custom;;
                            }
                            // Design Assembly
                            $ass_array['assembly_id'] = $design_data->design_assembly;
                            $ass_data = $this->Assembly_m->get($ass_array, TRUE);        
                        ?>
                        <p><?= $design_data->design_usage; ?></p>
                        <p><?= $temp_name; ?></p>
                        <p><?= $ass_data->assembly_name; ?></p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <h4 class="manu-design"> <?= $this->lang->line('preferences'); ?> </h4>
                        <?php
                            // Design Material
                            if ($design_data->design_material != '1') {
                                $mat_array['design_material_id'] = $design_data->design_material;  
                                $material_data = $this->DMaterial_m->get($mat_array, TRUE);
                                $material_name = $material_data->design_material_name;
                            }else{
                                $material_name = $design_data->design_material_custom;
                            }    
                            // Design Precision
                            $pre_array['precision_id'] = $design_data->design_precision;
                            $precision_data = $this->Precision_m->get($pre_array, TRUE);
                            $precision_name = $precision_data->precision_name;
                            // Design Finishing
                            if ($design_data->design_finishing != '1') {
                                $fin_array['finishing_id'] = $design_data->design_finishing;
                                $finishing_data = $this->Finishing_m->get($fin_array, TRUE);
                                $finishing_name = $finishing_data->finishing_name;
                            }else{
                                $finishing_name = $design_data->design_finishing_custom;
                            }            
                        ?>
                        <p><?= $this->lang->line('material'); ?>: <?= $material_name; ?> </p>
                        <p><?= $this->lang->line('precision'); ?>: <?= $precision_name; ?> </p>
                        <p><?= $this->lang->line('finishing'); ?>: <?= $finishing_name; ?> </p>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <h4> <?= $this->lang->line('status'); ?> </h4>
                        <h4 class="message-span"><?= $design_data->order_status; ?></h4>
                    </div>
                </div>        
            </div>
            <div class="design-footer">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="btn-group float-left float-xs-none">
                            <?php
                                $timestamp = $design_data->design_date;
                                $design_date = date('d M \'y', $timestamp);
                            ?>
                            <h4><span><?= $this->lang->line('design_date'); ?> </span><?= $design_date; ?></h4>
                        </div>
                    </div>
                    <div class="col-xl-4 offset-xl-5 col-lg-4 offset-lg-5 col-md-4 offset-md-5 col-sm-4 offset-sm-5 col-xs-12">
                        <div class="btn-group float-right float-xs-none">    
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <?php
                }
            }else{
                echo '
                    <div class="design-content">
                        <h4><span class="message-span">'.$this->lang->line("design_msg_header").'</span></h4>
                        <p class="text-center">'.$this->lang->line("design_msg_content").'</p> 
                        <br/>
                        <div class="col-xl-4 offset-xl-4 col-lg-4 offset-lg-4 col-md-4 offset-md-4 col-sm-4 offset-sm-4 col-xs-12">    
                            <a class="btn btn-primary Pbtn" href="'.base_url("describe-project").'">DESCRIBE PROJECT</a>
                        </div>
                    </div>
                ';    
            }        
        ?>                                
    </div>