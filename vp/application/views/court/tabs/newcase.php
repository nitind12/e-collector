<div class="row">
    <div class="col-sm-12">
            <div class="panel-body">
                <?php echo form_open_multipart('sdmcourt/submitnewcase', array('name' => 'frmCOurtNew', 'id' => 'frmCOurtNew', 'role' => 'form', 'class' => 'form-inline')); ?>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Case No.</label><br />
                    <?php
                    $data = array(
                        'type' => 'hidden',
                        'placeholder' => 'Case Year',
                        'class' => 'required form-control',
                        'name' => 'txtCaseYear',
                        'id' => 'txtCaseYear',
                        'style' => 'font-size: 11px; width: 50px; color: #ff0000',
                        'value' => date('Y')
                    );
                    echo form_input($data);
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Case No',
                        'class' => 'required form-control',
                        'name' => 'txtCaseNo',
                        'required' => 'required',
                        'id' => 'txtCaseNo',
                        'style' => 'font-size: 18px; width: 185px; color: #ff0000',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Registration Date</label><br />
                    <?php
                    $data = array(
                        'type' => 'date',
                        'placeholder' => 'Reg Date',
                        'class' => 'required form-control',
                        'required' => 'required',
                        'name' => 'txtRegDate',
                        'id' => 'txtRegDate',
                        'value' => date('Y-m-d')
                    );
                    echo form_input($data);
                    ?>
                </div>
                <!--div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Year</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Year',
                        'class' => 'required form-control',
                        'name' => 'txtYear',
                        'id' => 'txtYear',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "Select";
                    for($i=date('Y'); $i>=2005; $i--){
                        $options[$i] = $i;
                    }
                    echo form_dropdown($data, $options, date('Y'));
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Month</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Month',
                        'class' => 'required form-control',
                        'name' => 'txtMonth',
                        'id' => 'txtMonth',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "Select";
                    $options[1] = 'January';
                    $options[2] = 'February';
                    $options[3] = 'March';
                    $options[4] = 'April';
                    $options[5] = 'May';
                    $options[6] = 'June';
                    $options[7] = 'July';
                    $options[8] = 'August';
                    $options[9] = 'September';
                    $options[10] = 'October';
                    $options[11] = 'November';
                    $options[12] = 'December';

                    echo form_dropdown($data, $options, date('m'));
                    ?>
                </div-->
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                <label>Type</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Type For',
                        'class' => 'required form-control hindiFont',
                        'style' => 'width: 200px; background: #FFF195',
                        'name' => 'txtForType',
                        'id' => 'txtForType',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "pqusa";
                    $options['QkStnkjh'] = 'QkStnkjh';
                    $options['jktLo okn'] = 'jktLo okn';
                    $options['Other'] = 'vU;';

                    echo form_dropdown($data, $options, '');
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'required' => 'required',
                        'name' => 'txtType',
                        'id' => 'txtType',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Court</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Court',
                        'class' => 'required form-control hindiFont',
                        'style' => 'width: 200px; background: #FFF195',
                        'name' => 'txtForCourt',
                        'id' => 'txtForCourt',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "pqusa";
                    foreach($court_ as $itemCourt){
                        $options[$itemCourt->COURT] = $itemCourt->COURT;
                    }

                    echo form_dropdown($data, $options, '');
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'required' => 'required',
                        'name' => 'txtCourt',
                        'id' => 'txtCourt',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-12 col-lg-12 col-xs-12"></div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Village</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtVillage',
                        'id' => 'txtVillage',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Sub Division</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtSubDivision',
                        'id' => 'txtSubDivision',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Tehsil</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Court',
                        'class' => 'required form-control hindiFont',
                        'style' => 'width: 200px; background: #FFF195',
                        'name' => 'txtForTehsil',
                        'id' => 'txtForTehsil',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "pqusa";
                    foreach($tehsil_ as $itemTehsil){
                        $options[$itemTehsil->TEHSIL] = $itemTehsil->TEHSIL;
                    }

                    echo form_dropdown($data, $options, '');
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtTehsil',
                        'id' => 'txtTehsil',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Patwari Area</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtPatwariArea',
                        'id' => 'txtPatwariArea',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Police Area</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtPoliceArea',
                        'id' => 'txtPoliceArea',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Act Name</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Act',
                        'class' => 'required form-control hindiFont',
                        'style' => 'width: 200px; background: #FFF195',
                        'name' => 'txtForAct_',
                        'id' => 'txtForAct_',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "pqusa";
                    foreach($act_ as $itemAct){
                        $options[$itemAct->ACT] = $itemAct->ACT;
                    }

                    echo form_dropdown($data, $options, '');
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtActName',
                        'id' => 'txtActName',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Section</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Act',
                        'class' => 'required form-control hindiFont',
                        'style' => 'width: 200px; background: #FFF195',
                        'name' => 'txtForSection',
                        'id' => 'txtForSection',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "pqusa";
                    foreach($section_ as $itemSection){
                        $options[$itemSection->SECTION] = $itemSection->SECTION;
                    }

                    echo form_dropdown($data, $options, '');
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtSection',
                        'id' => 'txtSection',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>First Party</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtFirstName',
                        'id' => 'txtFirstName',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Second Party</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtSecondParty',
                        'id' => 'txtSecondParty',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Next Date</label><br />
                    <?php
                    $data = array(
                        'type' => 'date',
                        'placeholder' => 'Next Date',
                        'class' => 'required form-control',
                        'name' => 'txtNextDate',
                        'id' => 'txtNextDate',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Scheduled for</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtScheduledFor',
                        'id' => 'txtScheduledFor',
                        'style' => 'width: 200px; height: 65px',
                        'value' => ''
                    );
                    echo form_textarea($data);
                    ?>
                </div>
                <div class="col-sm-12"><hr></div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Final Order Date</label><br />
                    <?php
                    $data = array(
                        'type' => 'date',
                        'placeholder' => 'Final Order Date',
                        'class' => 'required form-control',
                        'name' => 'txtFinalOrderDate',
                        'id' => 'txtFinalOrderDate',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <!--div class="form-group col-md-4 col-lg-4 col-xs-12">
                    <label>Final Order</label><br />
                    <?php
                    $data = array(
                        'type' => 'file',
                        'placeholder' => 'Final Order',
                        'class' => 'required form-control',
                        'name' => 'txtFinalOrder',
                        'id' => 'txtFinalOrder',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div-->
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>File Dispatched to record room</label><br />
                    <?php
                    $data = array(
                        'type' => 'date',
                        'placeholder' => 'Final Dispatched',
                        'class' => 'required form-control',
                        'name' => 'txtFileDispatchedRecordRoom',
                        'id' => 'txtFileDispatchedRecordRoom',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label style="color: #ff0000">Dismiss in Default</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Activate or Deactivate',
                        'class' => 'required form-control',
                        'name' => 'txtDismissInDefault',
                        'id' => 'txtDismissInDefault',
                        'value' => 'Activate DD'
                    );
                    $options = array();
                    $options[''] = "Select";
                    $options['Activate DD'] = 'Activate DD';
                    $options['Deactivate DD'] = 'Deactivate DD';

                    echo form_dropdown($data, $options, 'Deactivate DD');
                    ?>
                </div>
                <div class="col-sm-12"><hr></div>
                <div class="form-group col-md-6 col-lg-6 col-xs-12"></div>
                <div class="form-group col-sm-6" style="margin-top:10px;right:55px;">
                    <a href="<?php echo site_url('sdmcourt/index/view/dashboard/x/x/25'); ?>" class="btn btn-danger" style="float: right">Cancel</a>
                    <button type="submit" class="btn btn-primary col-sm-3" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>