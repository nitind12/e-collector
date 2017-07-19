<div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        TEHSIL DETAIL
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open_multipart('web/updatetehsil/'.$village_name.'/'.$detailid, array('name' => 'frmTehsil', 'id' => 'frmTehsil', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Tehsil Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Tehsil Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtTehsil',
                                                'id' => 'txtTehsil',
                                                'value' => $tehsilname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Tehsildar Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Tehsildar Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtTehsildar',
                                                'id' => 'txtTehsildar',
                                                'value' => $tehsildar
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Tehsildar Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Tehsildar Phone Number',
                                                'pattern' => '[0-9]*',
                                                'maxlength' => 10,
                                                'oninvalid'=>"setCustomValidity('Plz enter 10 digit Contact Number')",
                                                'onchange'=>"try{setCustomValidity('')}catch(e){}",
                                                'class' => 'required form-control',
                                                'name' => 'txtTehsildarPhone',
                                                'id' => 'txtTehsildarPhone',
                                                'value' => $tehsildarphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Tehsildar Email-ID</label>
                                            <?php
                                            $data = array(
                                                'type' => 'email',
                                                'placeholder' => 'Tehsildar E-mail ID',
                                                'class' => 'required form-control',
                                                'name' => 'txtTehsildarEmail',
                                                'id' => 'txtTehsildarEmail',
                                                'value' => $tehsildaremail
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12">&nbsp;</div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <div class="col-sm-12">
                                                <?php if($tehsildarpic != ''){ ?>
                                                    <img src="<?php echo base_url('assets_/pics/'.$tehsildarpic); ?>" style="max-width: 100px" class="img-responsive" />
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets_/pics/default.png'); ?>" style="max-width: 100px" class="img-responsive" />
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Tehsildar Photo</label>
                                            <?php
                                            $data = array(
                                                'type' => 'file',
                                                'placeholder' => 'Tehsildar Photo',
                                                'class' => 'required form-control',
                                                'name' => 'TehsildarPic',
                                                'style' => 'width:250px;',
                                                'id' => 'TehsildarPic',
                                                'value' => ''
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Nayab Tehsildar Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Nayab Tehsildar Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtNTehsildar',
                                                'id' => 'txtNTehsildar',
                                                'value' => $nayabtehsildarname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Nayab Tehsildar Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Nayab Tehsildar Phone Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtNTehsildarPhone',
                                                'id' => 'txtNTehsildarPhone',
                                                'value' => $nayabtehsildarphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-3 " style="margin-top:30px;right:55px;">
                                            <button type="submit" class="btn btn-primary col-sm-10" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>