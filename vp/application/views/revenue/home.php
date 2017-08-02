<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">      
        <div class="row">
            <div class="col-md-9">
                <h1 class="head">REVENUE MAP ADMIN PANEL</h1>
            </div>
            <div class="col-md-3" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('web'); ?>" style="font-size: 20px;color: #fff">
                    <i class="fa fa-sign-out"></i> Back to <?php if($this->session->userdata('status__') == 'ADMIN'){?>DM<?php } else {?>SDM<?php }?> Portal
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">UPLOAD REVENUE MAP</h4>
                <div id="__reg_err_msg"></div>
                <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px" id="msg_"><?php echo $this->session->flashdata('feed_msg_'); ?></div>
            </div>
        </div>        
        <div class="row">
            <?php echo form_open_multipart('', array('name' => 'frmRevenue', 'id' => 'frmRevenue', 'role' => 'form', 'class' => 'form-inline', 'enctype' => 'multipart/form-data')); ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Select Village</label>                                            
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'villageName',
                        'class' => 'required form-control',
                        'id' => 'villageName',
                        'style' => 'width:100%',
                        'required' => 'required',
                        'onchange' => 'loadRevenuePDF(this);'
                    );
                    $options = array();
                    $options['0'] = 'Select';
                    foreach ($villages as $villageName) {
                        if ($villageName->NAME_ != 'x') {
                            $options[$villageName->VILLAGEID] = $villageName->NAME_;
                        }
                    }
                    echo form_dropdown($data, $options);
                    ?>
                </div>
                <div class="form-group col-md-2 col-lg-2 col-xs-12">
                    <label>Sheet Number</label><br>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Sheet Number',
                        'class' => 'required form-control',
                        'name' => 'txtSheetNumber',
                        'style' => 'width:100%',
                        'id' => 'txtSheetNumber',
                        'required' => 'required'
                    );
                    echo form_input($data);
                    ?>
                </div>

                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Upload Revenue Map Pdf</label>
                    <?php
                    $data = array(
                        'type' => 'file',
                        'placeholder' => 'Revenue Map',
                        'class' => 'required form-control',
                        'name' => 'RevenuePdf',
                        'id' => 'RevenuePdf',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>                   

                <input type="submit" onclick="upload_pdf();" class="btn btn-primary col-sm-3" style="float:right;margin-top:33px;" value="UPLOAD">

                <?php echo form_close(); ?>
            </div>
        </div>
        <div class="row" id="displayMap" style="min-height: 240px;">
            <div class="col-sm-12">
                <div class="row clear-fix">
                    <div class="col-md-12">
                        <div id="response" style="display: none">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> loading...
                        </div>  
                    </div>
                </div>
                <div class="row clear-fix">
                    <div class="col-md-12">
                        <div style="margin-top: 1%;">
                            <blockquote>
                                <ul class="list-inline" id="gallery">   

                                </ul>
                            </blockquote>
                            <div class="alert alert-info">
                                Uploded pdf Sheets will be displayed here
                            </div>

                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </div>
</div>
