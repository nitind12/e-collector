<?php
	if(isset($updateNewCaseRecord)){
		$sno = $updateNewCaseRecord->SNO;
		$ref_sno = $updateNewCaseRecord->REF_SNO;
		$caseno = $updateNewCaseRecord->CASENO;
		$x = explode("-",$updateNewCaseRecord->REG_DATE);
		$regDate = $x[0]."-".$x[1]."-".$x[2];
		$year = $updateNewCaseRecord->YEAR_;
		$month = $updateNewCaseRecord->MONTH;
        if($updateNewCaseRecord->TYPE_ == 'Criminal' || $updateNewCaseRecord->TYPE_ == 'Revenue'){
            $typecombo = $updateNewCaseRecord->TYPE_;
            $typetext = $updateNewCaseRecord->TYPE_;
        } else {
            $typecombo = 'Other';
            $typetext = $updateNewCaseRecord->TYPE_;
        }
        $court = $updateNewCaseRecord->COURT_NAME;
        $Village = $updateNewCaseRecord->VILLAGE;
		$subdiv = $updateNewCaseRecord->SUB_DIVISION;
		$tehsil = $updateNewCaseRecord->TEHSIL;
		$patwariarea = $updateNewCaseRecord->PATWARI_AREA;
		$policearea = $updateNewCaseRecord->POLICE_AREA;
		$actname = $updateNewCaseRecord->ACT_NAME;
		$section = $updateNewCaseRecord->SECTION;
		$firstparty = $updateNewCaseRecord->FIRST_PARTY;
		$secondparty = $updateNewCaseRecord->SECOND_PARTY;
		$nextdate = $updateNewCaseRecord->NEXT_DATE;
		$scheduledfor = $updateNewCaseRecord->SCHEDULED_FOR;

		$finalorderdate = $updateNewCaseRecord->FINAL_ORDER_DATE;
		

		$filedispatched = $updateNewCaseRecord->FILE_DISPATCHED_TO_RECORD_ROOM;
		
		$dd = $updateNewCaseRecord->DISMISS_IN_DEFAULT;
?>
<div class="row">
    <div class="col-sm-12">
            <div class="panel-body">
                <?php echo form_open('sdmcourt/updatecaseNewrecord/'.$sno."/".$ref_sno, array('name' => 'frmDM', 'id' => 'frmDM', 'role' => 'form', 'class' => 'form-inline')); ?>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Case No.</label><br />
                    <?php
                    $data = array(
                        'type' => 'hidden',
                        'class' => 'required form-control',
                        'name' => 'txtCaseNo',
                        'id' => 'txtCaseNo',
                        'style' => 'font-size: 18px; width: 185px; color: #ff0000',
                        'value' => $caseno
                    );
                    echo form_input($data);
                    echo "<div style='float: left; border-radius: 5px; background: #DDDDDD; border: #AAAAAA solid 1px; padding: 2px 3px; min-width: 40%'>".$caseno."</div>";
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Registration Date</label><br />
                    <?php
                    $data = array(
                        'type' => 'date',
                        'class' => 'required form-control',
                        'disabled' => 'disabled',
                        'name' => 'txtRegDate',
                        'id' => 'txtRegDate',
                        'value' => $regDate
                    );
                    echo form_input($data);
                    ?>
                </div>
                <!--div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Year</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control',
                        'disabled' => 'disabled',
                        'name' => 'txtYear',
                        'id' => 'txtYear',
                        'value' => $year
                    );
                    $options = array();
                    $options[''] = "Select";
                    for($i=date('Y'); $i>=2005; $i--){
                        $options[$i] = $i;
                    }
                    echo form_dropdown($data, $options, $year);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Month</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control',
                        'disabled' => 'disabled',
                        'name' => 'txtMonth',
                        'id' => 'txtMonth',
                        'value' => $month
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

                    echo form_dropdown($data, $options, $month);
                    ?>
                </div-->
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                <label>Type</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'disabled' => 'disabled',
                        'required' => 'required',
                        'name' => 'txtnewupdateType',
                        'id' => 'txtnewupdateType',
                        'value' => $typetext
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Court</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'disabled' => 'disabled',
                        'name' => 'txtCourt',
                        'id' => 'txtCourt',
                        'value' => $court
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
                        'disabled' => 'disabled',
                        'name' => 'txtVillage',
                        'id' => 'txtVillage',
                        'value' => $Village
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Sub Division</label><br />
                    <?php
                    $data = array(
                        'type' => 'hidden',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtSubDivision',
                        'id' => 'txtSubDivision',
                        'value' => $subdiv
                    );
                    echo form_input($data);
                    echo "<div style='float: left; border-radius: 5px; background: #DDDDDD; border: #AAAAAA solid 1px; padding: 2px 3px; min-width: 60%'>".$subdiv."</div><br />";
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Tehsil</label><br />
                    <?php
                    $data = array(
                        'type' => 'hidden',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtTehsil',
                        'id' => 'txtTehsil',
                        'value' => $tehsil
                    );
                    echo form_input($data);
                    echo "<div style='float: left; border-radius: 5px; background: #DDDDDD; border: #AAAAAA solid 1px; padding: 2px 3px; min-width: 60%'>".$tehsil."</div><br />";
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
                        'value' => $patwariarea
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
                        'value' => $policearea
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Act Name</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtActName',
                        'id' => 'txtActName',
                        'value' => $actname
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Section</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtSection',
                        'id' => 'txtSection',
                        'value' => $section
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
                        'value' => $firstparty
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
                        'value' => $secondparty
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
                        'value' => $nextdate
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
                        'value' => $scheduledfor
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
                        'value' => $finalorderdate
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
                        'value' => $filedispatched
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
                        'value' => $filedispatched
                    );
                    $options = array();
                    $options[''] = "Select";
                    $options['Activate DD'] = 'Activate DD';
                    $options['Deactivate DD'] = 'Deactivate DD';

                    echo form_dropdown($data, $options, $dd);
                    ?>
                </div>
                <div class="col-sm-12"><hr></div>
                <div class="form-group col-md-6 col-lg-6 col-xs-12"></div>
                <div class="form-group col-sm-6" style="margin-top:10px;right:55px;">
                    <a href="<?php echo site_url('sdmcourt/index/view'); ?>" class="btn btn-primary" style="float: right">Cancel</a>
                    <button type="submit" class="btn btn-danger" style="float: right; width:auto"><span class="glyphicon glyphicon-check"></span> Update New Record
                    </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <?php } ?>