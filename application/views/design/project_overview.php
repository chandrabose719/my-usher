    <div id="design-overview-part" class="mx-5">    
        <div class="container">
            <h3><?= $this->lang->line('overview_header'); ?></h3>
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-6 col-xs-12">
                    <?php
                        // Temperature Details
                        $temp_array['temperature_id'] = $design_data['design_temperature'];  
                        $temp_data = $this->Temperature_m->get($temp_array, TRUE);
                        $temp_name = $temp_data->temperature_name;
                        // Assembly Details
                        $ass_array['assembly_id'] = $design_data['design_assembly'];  
                        $ass_data = $this->Assembly_m->get($ass_array, TRUE);
                        $ass_name = $ass_data->assembly_name;
                        // Material Details
                        $mat_id = $design_data['design_material'];  
                        if($mat_id != '1'){
                            $mat_array['design_material_id'] = $mat_id;
                            $mat_data = $this->DMaterial_m->get($mat_array, TRUE);
                            $mat_name = $mat_data->design_material_name;
                        }else{
                            $mat_name = $design_data['design_material_custom'];
                        }
                        // Precision Details
                        $pre_array['precision_id'] = $design_data['design_precision'];  
                        $pre_data = $this->Precision_m->get($pre_array, TRUE);
                        $pre_name = $pre_data->precision_name;
                        // Finishing Details
                        $fin_id = $design_data['design_finishing'];  
                        if($fin_id != '1'){
                            $fin_array['finishing_id'] = $fin_id;
                            $fin_data = $this->Finishing_m->get($fin_array, TRUE);
                            $fin_name = $fin_data->finishing_name;
                        }else{
                            $fin_name = $design_data['design_finishing_custom'];
                        }
                    ?>
                    <div class="design-overview-block">
                        <div class="design-overview-content">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p><?= $this->lang->line('project_name'); ?>: <?= $design_data['design_name']; ?></p>
                                    <p><?= $this->lang->line('description'); ?>: <?= $design_data['design_description']; ?></p>
                                </div>
                            </div>
                        </div>    
                        <div class="design-overview-content">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p><?= $this->lang->line('application'); ?>: <?= $design_data['design_usage']; ?></p>
                                    <p><?= $this->lang->line('temperature'); ?>: <?= $temp_name; ?></p>
                                    <p><?= $this->lang->line('assembly'); ?>: <?= $ass_name; ?></p>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <p><?= $this->lang->line('material'); ?>: <?= $mat_name; ?></p>
                                    <p><?= $this->lang->line('precision'); ?>: <?= $pre_name; ?></p>
                                    <p><?= $this->lang->line('finishing'); ?>: <?= $fin_name; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="design-overview-content">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <?php if (!empty($usher_id)) { ?>    
                                        <p class="text-info"><?= $this->lang->line('overview_msg_one'); ?></p>
                                    <?php }else{ ?>    
                                        <p class="text-info"><?= $this->lang->line('overview_msg_two'); ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="design-overview-content">
                            <div class="row">
                                <?php if (!empty($usher_id)) { ?>
                                    <div class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-6 col-md-6 offset-md-6 col-sm-6 offset-sm-6 col-xs-12">    
                                        <a class="form-control btn btn-primary Abtn" href="design-order-confirmation"><?= $this->lang->line('confirm_btn'); ?></a>
                                    </div>
                                <?php }else{ ?>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">    
                                        <a class="form-control btn btn-primary Abtn" href="#" data-toggle="modal" data-backdrop="static" data-target="#registerModal"><?= $this->lang->line('register_btn'); ?></a>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">    
                                        <a class="form-control btn btn-primary Abtn" href="#" data-toggle="modal" data-backdrop="static" data-target="#loginModal"><?= $this->lang->line('login_btn'); ?></a>
                                    </div>    
                                    <?php } ?>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <!-- Modal Part -->
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" id="design-login" name="design-login" action="<?= base_url('login'); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title"> <?= $this->lang->line('login_header'); ?> </h3>
                        <input type="button" class="btn btn-outline-secondary" data-dismiss="modal" value="X">
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="email" class="form-control" id="login_user_email" name="login_user_email" placeholder="<?= $this->lang->line('email'); ?>" value="<?= set_value('login_user_email'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="login_user_password" name="login_user_password" placeholder="<?= $this->lang->line('password'); ?>" value="<?= set_value('login_user_password'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="redirect_login" name="redirect_login" value="design-order-confirmation">
                            <input type="hidden" id="current_login" name="current_login" value="design-order-overview">
                        </div>
                        <div id="validation-login-modal">
                        
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary Abtn" name="login-submit" onclick="return loginValidation()" value="<?= $this->lang->line('login_btn'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm">
                            <a href="#" class="text-primary float-left" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-target="#registerModal"><?= $this->lang->line('register_header'); ?></a>
                        </div>
                        <div class="col-sm">    
                            <a href="<?= base_url('forgot-password'); ?>" class="text-primary float-right"><?= $this->lang->line('forgot_password'); ?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Register Modal -->
    <div class="modal fade" id="registerModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" id="design-register" name="design-register" action="<?= base_url('registeration'); ?>">
                    <div class="modal-header">
                        <h3 class="modal-title"> <?= $this->lang->line('register_header'); ?> </h3>
                        <input type="button" class="btn btn-outline-secondary " data-dismiss="modal" value="X">
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="user_name" name="user_name" value="<?= set_value('user_name'); ?>" placeholder="<?= $this->lang->line('name'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="user_email" name="user_email" value="<?= set_value('user_email'); ?>" placeholder="<?= $this->lang->line('email'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="user_password" name="user_password" value="<?= set_value('user_password'); ?>" placeholder="<?= $this->lang->line('password'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="conf_password" name="conf_password" value="<?= set_value('conf_password'); ?>" placeholder="<?= $this->lang->line('conf_password'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="hidden" id="redirect_register" name="redirect_register" value="design-order-confirmation">
                            <input type="hidden" id="current_register" name="current_register" value="design-order-overview">
                        </div>
                        <div id="validation-register-modal">
                                    
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-primary Abtn" name="register-submit" onclick="return registerValidation()" value="<?= $this->lang->line('register_btn'); ?>">
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm">
                            <a href="#" class="text-primary float-left" data-toggle="modal" data-dismiss="modal" data-backdrop="static" data-target="#loginModal"><?= $this->lang->line('login_header'); ?></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Part -->