<div class="col-sm-2" style="margin-top:110px;position: absolute;float:right; z-index: 9999; right: 0px; background: #2DBEEA; padding: 10px; border:1px #2DBEEA; border-radius: 10px;">
    <?php echo form_open('web/todayscases', array('name' => 'frmCases', 'id' => 'frmCases', 'role' => 'form', 'class' => 'form-inline', 'target' => '_blank')); ?>                    
    <?php
    $data = array(
        'type' => 'text',
        'name' => 'cmbCourt',
        'id' => 'cmbCourt',
        'required' => 'required',
        'class' => 'hindiFont',
        'style' => 'width:100%'
    );
    $options = array();
    $options['0'] = 'dksVZ pqusa';
    foreach ($courtName as $court) {
        if ($court->COURT_NAME != 'x' && $court->COURT_NAME != '') {
            $options[$court->COURT_NAME] = $court->COURT_NAME;
        }
    }
    echo form_dropdown($data, $options);
    ?>
    <input type="submit" class="btn btn-primary col-sm-12 col-md-12 col-xs-12" style="border-radius: 10px;height:35px;font-size:18px;padding-top:4px;" value="Todays Cases"></a>
    <?php echo form_close(); ?>
</div>
<div class="header-bottom">
    <div class="logo text-center">
        <a href="#">Revenue Court</a>
    </div>
</div>
</div>
<div class="main-body container-fluid">
    <div class="wrap">
        <div class="col-sm-12" style="background-color:rgba(255,255,255,.7); padding-bottom:0px;">
            <div class="row">
                <div class="col-md-10">
                    <div class="newsletter" style="margin-top:20px;">
                        <h1 class="side-title-head col-sm-3" style="margin-top:8px;">Search Your Case</h1>
                        <?php echo form_open('web/court_view/case', array('name' => 'frmSelect', 'id' => 'frmSelect', 'role' => 'form', 'class' => 'form-inline')); ?>                    
                        <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'cmbCourtName',
                            'id' => 'cmbCourtName',
                            'required' => 'required',
                            'class' => 'hindiFont',
                            'style' => 'width:20%'
                        );
                        $options = array();
                        $options['0'] = 'dksVZ pqusa';
                        foreach ($courtName as $court) {
                            if ($court->COURT_NAME != 'x' && $court->COURT_NAME != '') {
                                $options[$court->COURT_NAME] = $court->COURT_NAME;
                            }
                        }
                        echo form_dropdown($data, $options);
                        ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'txtCaseNumber',
                            'id' => 'txtCaseNumber',
                            'required' => 'required',
                            'style' => 'width:20%',
                            'placeholder' => 'CASE NUMBER',
                        );

                        echo form_input($data);
                        ?>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'name' => 'txtYear',
                            'id' => 'txtYear',
                            'placeholder' => 'Year (YYYY)',
                            'style' => 'width:20%',
                            'required' => 'required',
                        );
                        echo form_input($data);
                        ?>
                        <input type="submit" value="SEARCH" style="width:10%">
                        <?php echo form_close(); ?>
                    </div>
                    <!----------------------------------------------------------------------->             
                    <div class="clearfix"></div>
                </div>

                <?php if ($searchData != 'x') { ?>
                    <div class="col-sm-12" id="displayMap" style="min-height: 350px;">
                        <div class="col-sm-12">
                            <div class="row clear-fix">
                                <div class="col-md-12">
                                    <div style="margin-top: 1%;">
                                        <?php
                                        if (!empty($masterData)) {
                                            foreach ($masterData as $mData) {
                                                ?>
                                                <div class="panel-group" id="accordion">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" style='background: #2DBEEA; color: #fff; font-weight: bold; height:60px;font-size:18px;'>
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#dm"></a>
                                                            <div class='col-md-3'>
                                                                <?php
                                                                $case = explode("-", $mData->CASENO);
                                                                echo "CASE NO:  " . $case[1];
                                                                ?>
                                                            </div>
                                                            <div class='col-md-3'>
                                                                <?php
                                                                echo date("d-m-Y", strtotime($mData->REG_DATE));
                                                                ?>
                                                            </div>
                                                            <div class='col-md-3'>
                                                                <?php
                                                                echo "<span  class='hindiFont'>" . $mData->TYPE_ . "</span>";
                                                                ?>                                                                
                                                            </div>
                                                            <div class='col-md-3'>                                                                
                                                                <?php
                                                                echo "<span  class='hindiFont'>" . $mData->VILLAGE . "</span>";
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <div id="dm" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <div class="table-responsive">
                                                                    <div class="table-responsive" style="overflow: auto; max-height: 700px;">
                                                                        <table class="table table-striped table-bordered table-hover" style="width:1500px; font-size: 10px; font-family: verdana">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th colspan="19" class="bk-clr-two" style="color: #ffffff">CASE DETAIL</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>#</th>                                                                                   
                                                                                    <th>Sub Division</th>
                                                                                    <th>Tehsil</th>
                                                                                    <th>Patwari Area</th>
                                                                                    <th>Police Area</th>
                                                                                    <th>Act Name</th>
                                                                                    <th>Section</th>
                                                                                    <th>First Party</th>
                                                                                    <th>Second Party</th>
                                                                                    <th>Next Date</th>
                                                                                    <th>Scheduled for</th>
                                                                                    <th>Final Order Date</th>
                                                                                    <th>File Dispatched</th>
                                                                                </tr>
                                                                            </thead> 
                                                                            <tbody>
                                                                                <?php $i = 1; ?>
                                                                                <?php foreach ($searchData as $caseitem) { ?>
                                                                                    <?php if ($mData->SNO == $caseitem->REF_SNO) { ?>
                                                                                        <tr>
                                                                                            <td><?php echo $i++; ?></td>                                                                                           
                                                                                            <td class='hindiFont'><?php echo $caseitem->SUB_DIVISION; ?></td>
                                                                                            <td class='hindiFont'><?php echo $caseitem->TEHSIL; ?></td>
                                                                                            <td class='hindiFont'><?php echo $caseitem->PATWARI_AREA; ?></td>
                                                                                            <td class='hindiFont'><?php echo $caseitem->POLICE_AREA; ?></td>
                                                                                            <td class='hindiFont'><?php echo $caseitem->ACT_NAME; ?></td>
                                                                                            <td class='hindiFont'><?php echo $caseitem->SECTION; ?></td>
                                                                                            <td class='hindiFont'><?php echo $caseitem->FIRST_PARTY; ?></td>
                                                                                            <td class='hindiFont'><?php echo $caseitem->SECOND_PARTY; ?></td>
                                                                                            <td><?php echo date("d-m-Y", strtotime($caseitem->NEXT_DATE)) ?></td>
                                                                                            <td class='hindiFont'><?php echo $caseitem->SCHEDULED_FOR; ?></td>  
                                                                                            <?php
                                                                                            $x = date_parse($caseitem->FINAL_ORDER_DATE);
                                                                                            ?>
                                                                                            <td><?php
                                                                                                if ($x['year'] == 0) {
                                                                                                    echo "Pending";
                                                                                                }
                                                                                                ?></td>
                                                                                            <?php
                                                                                            $x = date_parse($caseitem->FILE_DISPATCHED_TO_RECORD_ROOM);
                                                                                            ?>
                                                                                            <td><?php
                                                                                                if ($x['year'] == 0) {
                                                                                                    echo "Pending";
                                                                                                };
                                                                                                ?></td>
                                                                                        </tr>
                                                                                    <?php } ?>
                                                                                <?php } ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <div class='col-md-12' style="background: #F94C4C; border:1px #F94C4C solid; border-radius: 8px; color:#fff; padding:5px;">
                                                <i class="fa fa-info-circle fa-2x" aria-hidden="true"></i> NO DATA FOUND PLEASE SEARCH AGAIN WITH DIFFERENT CRITERIA
                                            </div>
                                        <?php } ?>                                            
                                    </div>  
                                </div>
                            </div>                        
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="col-sm-12" id="displayMap" style="min-height: 170px;">
                        <div class="col-sm-12">
                            <div class="row clear-fix">
                                <div class="col-md-12">
                                    <div style="margin-top: 1%;">
                                    </div>  
                                </div>
                            </div>                        
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- content-section-ends-here -->