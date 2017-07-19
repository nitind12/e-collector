<div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        NEAREST HEALTH FACILITY DETAIL
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open('web/nearesthealthfacility/'.$village_name.'/'.$detailid, array('name' => 'frmHealth', 'id' => 'frmHealth', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Health Facility Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Health Facility Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtHealthFacility',
                                                'id' => 'txtHealthFacility',
                                                'value' => $healthfacilityname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label for="txtGender">Mode</label><br>
                                            <?php if($govtprivate == 'x' || $govtprivate == ''){
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optGovtPvtMode',
                                                        'id' => 'optGovt',
                                                        'value' => 'Government',
                                                    );
                                                    echo form_input($data);
                                                    ?> Government &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optGovtPvtMode',
                                                        'id' => 'optPvt',
                                                        'value' => 'Private',
                                                    );
                                                    echo form_input($data);
                                                    ?> Private 
                                                <?php 
                                                } else if($govtprivate == 'Government'){
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optGovtPvtMode',
                                                        'id' => 'optGovt',
                                                        'value' => 'Government',
                                                        'checked' => 'checked'
                                                    );
                                                    echo form_input($data);
                                                    ?> Government &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optGovtPvtMode',
                                                        'id' => 'optPvt',
                                                        'value' => 'Private',
                                                    );
                                                    echo form_input($data);
                                                    ?> Private 
                                                <?php 
                                                } else if($govtprivate == 'Private') {
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optGovtPvtMode',
                                                        'id' => 'optGovt',
                                                        'value' => 'Government',
                                                    );
                                                    echo form_input($data);
                                                    ?> Government &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optGovtPvtMode',
                                                        'id' => 'optPvt',
                                                        'value' => 'Private',
                                                        'checked' => 'checked'
                                                    );
                                                    echo form_input($data);
                                                    ?> Private 
                                                <?php 
                                                }
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Asha Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Asha Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtAshaName',
                                                'id' => 'txtAshaName',
                                                'value' => $ashaname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Asha Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Asha Phone Number',
                                                'pattern' => '[0-9]*',
                                                'maxlength' => 10,
                                                'oninvalid'=>"setCustomValidity('Plz enter 10 digit Contact Number')",
                                                'onchange'=>"try{setCustomValidity('')}catch(e){}",
                                                'class' => 'required form-control',
                                                'name' => 'txtAshaNumber',
                                                'id' => 'txtAshaNumber',
                                                'value' => $ashaphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>ANM Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'ANM Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtANMName',
                                                'id' => 'txtANMName',
                                                'value' => $anmname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>ANM Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'ANM Phone Number',
                                                'class' => 'required form-control',
                                                'pattern' => '[0-9]*',
                                                'maxlength' => 10,
                                                'oninvalid'=>"setCustomValidity('Plz enter 10 digit Contact Number')",
                                                'onchange'=>"try{setCustomValidity('')}catch(e){}",
                                                'name' => 'txtANMNumber',
                                                'id' => 'txtANMNumber',
                                                'value' => $anmphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Private Clinic Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Private Clinic Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtPrivateClinic',
                                                'id' => 'txtPrivateClinic',
                                                'value' => $privateclinicname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Chemist Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Chemist Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtChemistName',
                                                'id' => 'txtChemistName',
                                                'value' => $chemistname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Hospital/Sub-Center Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Sub-Center Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtHospitalSubCenterName',
                                                'id' => 'txtHospitalSubCenterName',
                                                'value' => $hospitalsubcentrename
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Hospital/Sub-Center Distance</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Sub-Center Distance',
                                                'class' => 'required form-control',
                                                'name' => 'txtHospitalSubCenterDistance',
                                                'id' => 'txtHospitalSubCenterDistance',
                                                'value' => $hospitalsubcentredistance
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-3" style="margin-top:30px;right:55px;">
                                            <button type="submit" class="btn btn-primary col-lg-9 col-sm-2 col-md-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>