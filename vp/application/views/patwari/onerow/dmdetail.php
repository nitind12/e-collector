<div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        DISTRICT DETAIL
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open_multipart('web/updatedm/'.$village_name.'/'.$detailid, array('name' => 'frmDM', 'id' => 'frmDM', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-.'/'.detailid3 col-xs-12">
                                            <label>District Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'District Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtDistrict',
                                                'id' => 'txtDistrict',
                                                'value' => $district
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>DM Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'DM Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtDM',
                                                'id' => 'txtDM',
                                                'value' => $dmname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>DM Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'DM Phone Number',
                                                'class' => 'required form-control',
                                                'pattern' => '[0-9]*',
                                                'maxlength' => 10,
                                                'oninvalid'=>"setCustomValidity('Plz enter 10 digit Contact Number')",
                                                'onchange'=>"try{setCustomValidity('')}catch(e){}",
                                                'name' => 'txtDMPhone',
                                                'id' => 'txtDMPhone',
                                                'value' => $dmphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>DM Email-ID</label>
                                            <?php
                                            $data = array(
                                                'type' => 'email',
                                                'placeholder' => 'DM E-mail ID',
                                                'class' => 'required form-control',
                                                'name' => 'txtDMEmail',
                                                'id' => 'txtDMEmail',
                                                'value' => $dmemail
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <div class="col-sm-12">
                                                <?php if($dmpic != ''){ ?>
                                                    <img src="<?php echo base_url('assets_/pics/'.$dmpic); ?>" style="max-width: 100px" class="img-responsive" />
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets_/pics/default.png'); ?>" style="max-width: 100px" class="img-responsive" />
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>DM Photo</label>
                                            <?php
                                            $data = array(
                                                'type' => 'file',
                                                'placeholder' => 'DM Photo',
                                                'class' => 'required form-control',
                                                'name' => 'dmPic',
                                                'id' => 'dmPic',
                                                'value' => ''
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-6" style="margin-top:30px;right:55px;">
                                            <button type="submit" class="btn btn-primary col-sm-3" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>