<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">            
            <h1><a href="#">Revenue Court</a></h1>
        </div>
    </div>
</div>
<div class="technology">
    <div class="container">
        <div class="col-md-4">
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4 class="side-title-head">Search Your Case</h4>
                    <?php echo form_open('web/court_view/case', array('name' => 'frmSelect', 'id' => 'frmSelect', 'role' => 'form', 'class' => 'form-inline')); ?>                    
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'cmbCourtName',
                        'id' => 'cmbCourtName',
                        'required' => 'required',
                        'class' => 'hindiFont required form-control col-sm-12',
                        'style' => 'width:100%; height:37px;'
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
                    <p style="height:30px;">&nbsp;</p>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'txtCaseNumber',
                        'id' => 'txtCaseNumber',
                        'required' => 'required',
                        'style' => 'width:100%',
                        'class' => 'required form-control col-sm-12',
                        'placeholder' => 'CASE NUMBER',
                    );

                    echo form_input($data);
                    ?>
                    <p style="height:30px;">&nbsp;</p>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'txtYear',
                        'id' => 'txtYear',
                        'placeholder' => 'Year (YYYY)',
                        'style' => 'width:100%',
                        'class' => 'required form-control col-sm-12',
                        'required' => 'required',
                    );
                    echo form_input($data);
                    ?>
                    <p style="height:30px;">&nbsp;</p>
                    <input type="submit" value="SEARCH" class='btn btn-primary' style='float:right;'>
                    <?php echo form_close(); ?>
                    <div class="clearfix"></div>                   
                </div>  
                <div class="tech-btm">
                    <h4>Today's Cases</h4>
                    <?php echo form_open('web/todayscases', array('name' => 'frmCases', 'id' => 'frmCases', 'role' => 'form', 'class' => 'form-inline', 'target' => '_blank')); ?>                    
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'cmbCourt',
                        'id' => 'cmbCourt',
                        'required' => 'required',
                        'class' => 'hindiFont required form-control col-sm-12',
                        'style' => 'width:100%; height:37px;'
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
                    <p style="height:30px;">&nbsp;</p>
                    <input type="submit" class="btn btn-primary" value="Todays Cases"></a>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>
        <div class="col-md-8">
            <div class="tech-no">
                <!-- technology-top -->
                <?php if ($searchData != 'x') { ?>
                    <div class="col-sm-12">
                        <div class="row clear-fix">
                            <div class="col-md-12">                                    
                                <?php
                                if (!empty($masterData)) {
                                    ?>
                                    <div id="myCarousel1" class="carousel slide" data-ride="carousel" data-interval="false">
                                        <!-- Indicators -->
                                        <ol class="carousel-indicators">
                                            <?php
                                            $i = 0;
                                            foreach ($masterData as $mData) {
                                                ?>
                                                <li data-target="#myCarousel1" data-slide-to="<?php echo $i; ?>" class="<?php
                                                if ($i == 0) {
                                                    echo 'active';
                                                }
                                                ?>"></li>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>                                          
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <?PHP
                                            $i = 1;
                                            foreach ($masterData as $mData) {
                                                ?>
                                                <div class="<?php
                                                if ($i == 1) {
                                                    echo 'item active';
                                                } else {
                                                    echo 'item';
                                                }
                                                ?>">
                                                    <div class='col-sm-12' style="background: #4586d6; padding: 10px; color:#fff; font-weight:bold;">
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
                                                            echo "<span class='hindiFont'>" . $mData->TYPE_ . "</span>";
                                                            ?>                                                                
                                                        </div>
                                                        <div class='col-md-3'>
                                                            <?php
                                                            echo "<span class='hindiFont'>" . $mData->VILLAGE . "</span>";
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-12' style="background: #fff; text-align: center;padding:20px;">
                                                        <table class="table table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th colspan='2' class="bk-clr-two">CASE DETAIL</th>
                                                                </tr>
                                                            </thead> 
                                                            <tbody>
                                                                <?php $i = 1; ?>
                                                                <?php foreach ($searchData as $caseitem) { ?>
                                                                    <?php
                                                                    if ($mData->SNO == $caseitem->REF_SNO) {
                                                                        $i++
                                                                        ?>
                                                                        <tr>
                                                                            <td>Sub Division</td>
                                                                            <td class='hindiFont'><?php echo $caseitem->SUB_DIVISION; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tehsil</td>
                                                                            <td class='hindiFont'><?php echo $caseitem->TEHSIL; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Patwari Area</td>
                                                                            <td class='hindiFont'><?php echo $caseitem->PATWARI_AREA; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Police Area</td>
                                                                            <td class='hindiFont'><?php echo $caseitem->POLICE_AREA; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Act Name</td>
                                                                            <td class='hindiFont'><?php echo $caseitem->ACT_NAME; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Section</td>
                                                                            <td class='hindiFont'><?php echo $caseitem->SECTION; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>First Party</td>
                                                                            <td class='hindiFont'><?php echo $caseitem->FIRST_PARTY; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Second Party</td>
                                                                            <td class='hindiFont'><?php echo $caseitem->SECOND_PARTY; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Next Date</td>
                                                                            <td><?php echo date("d-m-Y", strtotime($caseitem->NEXT_DATE)) ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Scheduled for</td>
                                                                            <td class='hindiFont'><?php echo $caseitem->SCHEDULED_FOR; ?></td>  
                                                                        </tr>
                                                                        <tr>    
                                                                            <td>Final Order Date</td>
                                                                            <?php
                                                                            $x = date_parse($caseitem->FINAL_ORDER_DATE);
                                                                            ?>
                                                                            <td><?php
                                                                                if ($x['year'] == 0) {
                                                                                    echo "Pending";
                                                                                }
                                                                                ?></td>
                                                                        </tr>
                                                                        <tr>    
                                                                            <td>File Dispatched</td>
                                                                            <?php
                                                                            $x = date_parse($caseitem->FILE_DISPATCHED_TO_RECORD_ROOM);
                                                                            ?>
                                                                            <td>
                                                                                <?php
                                                                                if ($x['year'] == 0) {
                                                                                    echo "Pending";
                                                                                };
                                                                                ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> <?php } ?>                                                      
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class='col-md-12' style="background: #F94C4C; border:1px #F94C4C solid; border-radius: 8px; color:#fff; padding:5px;">
                                        <i class="fa fa-info-circle fa-2x" aria-hidden="true"></i> NO DATA FOUND PLEASE SEARCH AGAIN WITH DIFFERENT CRITERIA
                                    </div>
    <?php } ?>                                              
                            </div>
                        </div>                                                
                    </div>
<?php } else { ?>
                    <div class="col-sm-12" id="displayCourt" style="min-height:450px;">
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
                <div class="clearfix"></div>                
            </div>
        </div>
        <div class="col-md-12">
            <div class="tech-no">
                <div class="wthree">
                    <p align="justify" style="font-size: 12px;"><i><b>Disclaimer:</b> For more details and order copy contact concerned Revenue Authority</i></p>                    
                </div>
            </div>
        </div>
        <!-- technology-right -->
    </div>
</div>
