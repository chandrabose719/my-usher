    <div id="design-confirmation-part" class="mx-5">    
        <div class="container">
            <h1><?= $this->lang->line('confirm_header'); ?></h1>
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-8 offset-sm-2 col-xs-12">
                    <div class="design-confirmation-block">
                        <div class="design-confirmation-content">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <h4><?= $this->lang->line('confirm_msg'); ?></h4>
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <p><?= $this->lang->line('confirm_content'); ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 offset-xl-2 col-lg-4 offset-lg-2 col-md-4 offset-md-2 col-sm-6 col-xs-12">    
                                <a class="form-control btn btn-primary Abtn" href="<?= base_url(); ?>"><?= $this->lang->line('confirm_btn_one'); ?></a>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">    
                                <a class="form-control btn btn-primary Abtn" href="<?= base_url('design-orders'); ?>"><?= $this->lang->line('confirm_btn_two'); ?></a>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>            
        </div>
    </div>