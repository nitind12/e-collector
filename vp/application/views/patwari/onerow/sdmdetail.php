<div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        SDM DETAIL
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open_multipart('web/updatesdm/'.$village_name.'/'.$detailid, array('name' => 'frmSDM', 'id' => 'frmSDM', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Sub Division Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Sub Division Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtSubDivision',
                                                'id' => 'txtSubDivision',
                                                'value' => $subdivision
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>SDM Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'SDM Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtSDM',
                                                'id' => 'txtSDM',
                                                'value' => $sdmname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>SDM Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'SDM Phone Number',
                                                'pattern' => '[0-9]*',
                                                'maxlength' => 10,
                                                'oninvalid'=>"setCustomValidity('Plz enter 10 digit Contact Number')",
                                                'onchange'=>"try{setCustomValidity('')}catch(e){}",
                                                'class' => 'required form-control',
                                                'name' => 'txtSDMPhone',
                                                'id' => 'txtSDMPhone',
                                                'value' => $sdmphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>SDM Email-ID</label>
                                            <?php
                                            $data = array(
                                                'type' => 'email',
                                                'placeholder' => 'SDM E-mail ID',
                                                'class' => 'required form-control',
                                                'name' => 'txtSDMEmail',
                                                'id' => 'txtSDMEmail',
                                                'value' => $sdmemail
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <div class="col-sm-12">
                                                <?php if($sdmpic != ''){ ?>
                                                    <img src="<?php echo base_url('assets_/pics/'.$sdmpic); ?>" style="max-width: 100px" class="img-responsive" />
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets_/pics/default.png'); ?>" style="max-width: 100px" class="img-responsive" />
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>SDM Photo</label>
                                            <?php
                                            $data = array(
                                                'type' => 'file',
                                                'placeholder' => 'SDM Photo',
                                                'class' => 'required form-control',
                                                'name' => 'sdmPic',
                                                'id' => 'sdmPic',
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