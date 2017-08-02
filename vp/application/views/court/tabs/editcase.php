<?php
	if(isset($editCaseRecord)){
		$sno = $editCaseRecord->SNO;
		$ref_sno = $editCaseRecord->REF_SNO;
		$caseno = $editCaseRecord->CASENO;
        if($editCaseRecord->REG_DATE != ''){
		$x = explode("-",$editCaseRecord->REG_DATE);
		  $regDate = $x[0]."-".$x[1]."-".$x[2];
        } else {
            $regDate = "";
        }
		$year = $editCaseRecord->YEAR_;
		$month = $editCaseRecord->MONTH;
        if($editCaseRecord->TYPE_ == 'QkStnkjh' || $editCaseRecord->TYPE_ == 'jktLo okn'){
            $typecombo = $editCaseRecord->TYPE_;
            $typetext = $editCaseRecord->TYPE_;
        } else {
            $typecombo = 'Other';
            $typetext = $editCaseRecord->TYPE_;
        }
        $court = $editCaseRecord->COURT_NAME;
        $Village = $editCaseRecord->VILLAGE;
		$subdiv = $editCaseRecord->SUB_DIVISION;
		$tehsil = $editCaseRecord->TEHSIL;
		$patwariarea = $editCaseRecord->PATWARI_AREA;
		$policearea = $editCaseRecord->POLICE_AREA;
		$actname = $editCaseRecord->ACT_NAME;
		$section = $editCaseRecord->SECTION;
		$firstparty = $editCaseRecord->FIRST_PARTY;
		$secondparty = $editCaseRecord->SECOND_PARTY;
        if($editCaseRecord->NEXT_DATE != ''){
            $x = explode("-", $editCaseRecord->NEXT_DATE);
            if(strlen($x[0]) != 4){
                $nextdate = $x[2] . "-" . $x[1] . "-" . $x[0];
            } else {
                $nextdate = $editCaseRecord->NEXT_DATE;
            }
		} else {
            $nextdate = '';
        }
		$scheduledfor = $editCaseRecord->SCHEDULED_FOR;

		$finalorderdate = $editCaseRecord->FINAL_ORDER_DATE;
		

		$filedispatched = $editCaseRecord->FILE_DISPATCHED_TO_RECORD_ROOM;
		
		$dd = $editCaseRecord->DISMISS_IN_DEFAULT;
?>
<div class="row">
    <div class="col-sm-12">
            <div class="panel-body">
                <?php echo form_open('sdmcourt/updatecaserecord/'.$sno."/".$ref_sno, array('name' => 'frmCOurtEdit', 'id' => 'frmCOurtEdit', 'role' => 'form', 'class' => 'form-inline')); ?>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Case No.</label><br />
                    <?php
                    $data = array(
                        'type' => 'hidden',
                        'placeholder' => 'Case No',
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
                        'placeholder' => 'Reg Date',
                        'class' => 'required form-control',
                        'required' => 'required',
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
                        'placeholder' => 'DM Name',
                        'class' => 'required form-control',
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
                        'placeholder' => 'DM Name',
                        'class' => 'required form-control',
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
                        'style' => 'width: 200px; background: #FFF195',
                        'name' => 'txteditForType',
                        'id' => 'txteditForType',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "pqusa";
                    $options['QkStnkjh'] = 'QkStnkjh';
                    $options['jktLo okn'] = 'jktLo okn';
                    $options['Other'] = 'vU;';

                    echo form_dropdown($data, $options, $typecombo);
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Reg Date',
                        'class' => 'required form-control hindiFont',
                        'required' => 'required',
                        'name' => 'txteditType',
                        'id' => 'txteditType',
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
                            'placeholder' => 'Act',
                            'class' => 'required form-control hindiFont',
                            'style' => 'width: 200px; background: #FFF195',
                            'name' => 'txtForCourtEdit',
                            'id' => 'txtForCourtEdit',
                            'value' => ''
                        );
                        $options = array();
                        $options[''] = "pqusa";
                        foreach($court_ as $itemCourt){
                            $options[$itemCourt->COURT] = $itemCourt->COURT;
                        }

                        echo form_dropdown($data, $options, $court);
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'required' => 'required',
                        'name' => 'txtCourtEdit',
                        'id' => 'txtCourtEdit',
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
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtSubDivision',
                        'id' => 'txtSubDivision',
                        'value' => $subdiv
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
                        'name' => 'txtForTehsilEdit',
                        'id' => 'txtForTehsilEdit',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "pqusa";
                    foreach($tehsil_ as $itemTehsil){
                        $options[$itemTehsil->TEHSIL] = $itemTehsil->TEHSIL;
                    }

                    echo form_dropdown($data, $options, $tehsil);
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtTehsilEdit',
                        'id' => 'txtTehsilEdit',
                        'value' => $tehsil
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
                        'placeholder' => 'Act',
                        'class' => 'required form-control hindiFont',
                        'style' => 'width: 200px; background: #FFF195',
                        'name' => 'txtForAct_edit',
                        'id' => 'txtForAct_edit',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "pqusa";
                    foreach($act_ as $itemAct){
                        $options[$itemAct->ACT] = $itemAct->ACT;
                    }

                    echo form_dropdown($data, $options, $actname);
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtActNameEdit',
                        'id' => 'txtActNameEdit',
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
                        'placeholder' => 'Act',
                        'class' => 'required form-control hindiFont',
                        'style' => 'width: 200px; background: #FFF195',
                        'name' => 'txtForSectionEdit',
                        'id' => 'txtForSectionEdit',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "pqusa";
                    foreach($section_ as $itemSection){
                        $options[$itemSection->SECTION] = $itemSection->SECTION;
                    }

                    echo form_dropdown($data, $options, $section);
                    ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control hindiFont',
                        'name' => 'txtSectionEdit',
                        'id' => 'txtSectionEdit',
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
                        'class' => 'required form-control',
                        'required' => 'required',
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
                    <button type="submit" class="btn btn-danger col-sm-3" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    <?php } ?>