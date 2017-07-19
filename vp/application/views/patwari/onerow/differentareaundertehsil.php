<div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        DIFFERENT AREA UNDER TEHSIL
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open_multipart('web/updatediffareaundertehsil/'.$village_name.'/'.$detailid, array('name' => 'frmArea', 'id' => 'frmArea', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Kanoongo Area Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Kanoongo Area Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtKanoongoArea',
                                                'id' => 'txtKanoongoArea',
                                                'value' => $kanoongoareaname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Patwari Area Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Patwari Area Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtPatwariArea',
                                                'id' => 'txtPatwariArea',
                                                'value' => $patwariareaname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Patwari Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Patwari Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtPatwari',
                                                'id' => 'txtPatwari',
                                                'value' => $patwariname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Patwari Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Patwari Phone Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtPatwariPhone',
                                                'id' => 'txtPatwariPhone',
                                                'value' => $patwariphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12">&nbsp;</div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <div class="col-sm-12">
                                                <?php if($patwariphoto != ''){ ?>
                                                    <img src="<?php echo base_url('assets_/pics/'.$patwariphoto); ?>" style="max-width: 100px" class="img-responsive" />
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url('assets_/pics/default.png'); ?>" style="max-width: 100px" class="img-responsive" />
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Patwari Photo</label>
                                            <?php
                                            $data = array(
                                                'type' => 'file',
                                                'placeholder' => 'Patwari Photo',
                                                'class' => 'required form-control',
                                                'name' => 'PatwariPic',
                                                'style' => 'width:250px;',
                                                'id' => 'PatwariPic',
                                                'value' => ''
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Forest Range Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Forest Range Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtForestRange',
                                                'id' => 'txtForestRange',
                                                'value' => $forestrangename
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Forest Ranger Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Forest Ranger Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtFRanger',
                                                'id' => 'txtFRanger',
                                                'value' => $faorestrangername
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Forest Ranger Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Forest Ranger Phone Number',
                                                'pattern' => '[0-9]*',
                                                'maxlength' => 10,
                                                'oninvalid'=>"setCustomValidity('Plz enter 10 digit Contact Number')",
                                                'onchange'=>"try{setCustomValidity('')}catch(e){}",
                                                'class' => 'required form-control',
                                                'name' => 'txtFRangerPhone',
                                                'id' => 'txtFRangerPhone',
                                                'value' => $forestrangerphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Block Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Block Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtBlockName',
                                                'id' => 'txtBlockName',
                                                'value' => $blockname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>BDO Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'BDO Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtBDO',
                                                'id' => 'txtBDO',
                                                'value' => $bdoname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>BDO Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'BDO Phone Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtBDOPhone',
                                                'id' => 'txtBDOPhone',
                                                'value' => $bdophone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Van Panchayat Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Van Panchayat Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtVanPanchayat',
                                                'id' => 'txtVanPanchayat',
                                                'value' => $vanpanchayatname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Sarpanch Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Sarpanch Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtSarpanch',
                                                'id' => 'txtSarpanch',
                                                'value' => $sarpanchname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Sarpanch Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Sarpanch Phone Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtSarpanchPhone',
                                                'id' => 'txtSarpanchPhone',
                                                'value' => $sarpanchphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Van Panchayat Total Area</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Van Panchayat Total Area',
                                                'class' => 'required form-control',
                                                'name' => 'txtVanPanchayatArea',
                                                'id' => 'txtVanPanchayatArea',
                                                'value' => $totalvanpanchayatarea
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Police Thana/Revenue Police Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Police Thana Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtPoliceThana',
                                                'id' => 'txtPoliceThana',
                                                'value' => $policethanaorrevenuepolicename
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>SO Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'SO Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtSO',
                                                'id' => 'txtSO',
                                                'value' => $soname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>SO Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'SO Phone Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtSOPhone',
                                                'id' => 'txtSOPhone',
                                                'value' => $sophone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Police Chauki/Revenue Police Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Police Chauki Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtPoliceChauki',
                                                'id' => 'txtPoliceChauki',
                                                'value' => $policechawkiorrevenuepolicename
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Chauki Incharge Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Chauki Incharge Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtChIncharge',
                                                'id' => 'txtChIncharge',
                                                'value' => $chawkiinchargename
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Chauki Incharge Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Chauki Incharge Phone Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtChInchargePhone',
                                                'id' => 'txtChInchargePhone',
                                                'value' => $chawkiinchargephone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Nyay Panchayat Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Nyay Panchayat Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtNyayPanchayat',
                                                'id' => 'txtNyayPanchayat',
                                                'value' => $nyaypanchayatname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Aganwadi Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Aganwadi Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtAganwadi',
                                                'id' => 'txtAganwadi',
                                                'value' => $anganwadiname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Aganwadi Worker Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Aganwadi Worker Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtAganWorker',
                                                'id' => 'txtAganWorker',
                                                'value' => $anganwadiworkername
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Aganwadi Worker Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Aganwadi Worker Phone Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtAganWorkerPhone',
                                                'id' => 'txtAganWorkerPhone',
                                                'value' => $anganwadiworkerphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-12" style="margin-top:30px;right:55px;">
                                            <button type="submit" class="btn btn-primary col-sm-2" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>