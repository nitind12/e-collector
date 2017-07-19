<?php if($this->session->userdata('status__') == "ADMIN") { ?>
    <?php 
        if(! isset($_POST)){
            $courtname_ = 'x';
            $actname_ = 'x';
            $section_ = 'x';
            $village_ = 'x';
            $patwariarea_ = 'x';
            $policearea_ = 'x';
        } else {
            $comby = array();
            $i = 0;
            if($courtname_ != 'x'){
                $comby[$i] = "COURT_NAME";
                $i++;
            }
            if($actname_ != 'x'){
                $comby[$i] = "ACT";
                $i++;
            }
            if($section_ != 'x'){
                $comby[$i] = "SECTION";
                $i++;
            }
            if($village_ != 'x'){
                $comby[$i] = "VILLAGE";
                $i++;
            }
            if($patwariarea_ != 'x'){
                $comby[$i] = "PATWARI AREA";
                $i++;
            }   
            if($policearea_ != 'x'){
                $comby[$i] = "POLICE AREA";
            }
        }
    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Reports for DM</title>
    <script type="text/javascript">
        site_url_ = "<?php echo site_url();?>";
        base_path = "<?php echo base_url();?>";
    </script>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url('assets_/css/bootstrap.css');?>" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url('assets_/css/font-awesome.css');?>" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url('assets_/css/style.css');?>" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css" media="print">
        .hide_button{ display: none }
    </style>
    <style type="text/css" media="screen">
        .print_button{ font-family: Arial; border-radius: 5px; float: right; }
    </style>
</head>
<body>
<div class="navbar navbar-inverse set-radius-zero" style="background-color: #4586d6">
    <div class="container">      
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h1 class="head" style="text-align: center">SDM COURT - Reports for DM</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            &nbsp;
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 hide_button">
            <button class="btn btn-danger print_button" onclick="window.print();">Print</button>
        </div>
        <div class="col-sm-12 hide_button">
            <?php echo form_open('sdmcourt/dmsearching', array('name' => 'frmReportsDM', 'id' => 'frmReportsDM', 'role' => 'form', 'class' => 'form-inline')); ?>
                <div class="panel-body">
                    <div class="form-group col-sm-2">
                        <label>COURT<span style="color: #ff0000; font-weight: bold">*</span></label><br />
                        <?php
                            $data = array(
                                'type' => 'text',
                                'class' => 'required form-control hindiFont',
                                'name' => 'txtCourt',
                                'id' => 'txtCourt',
                                'required' => 'required',
                                'value' => '',
                                'style' => 'width: 100%'
                            );
                            $options = array();
                            $options['x'] = "pqusa";
                            foreach($court as $courtitem){
                                $options[$courtitem->COURT_NAME] = $courtitem->COURT_NAME;
                            }
                            
                            echo form_dropdown($data, $options,$courtname_);
                        ?>  
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Act Name</label><br />       
                        <?php
                            $data = array(
                                'type' => 'text',
                                'class' => 'required form-control hindiFont',
                                'name' => 'txtActName',
                                'id' => 'txtActName',
                                'value' => '',
                                'style' => 'width: 100%'
                            );
                            $options = array();
                            $options['x'] = "pqusa";
                            foreach($actname as $actitem){
                                $options[$actitem->ACT_NAME] = $actitem->ACT_NAME;
                            }
                            
                            echo form_dropdown($data, $options,$actname_);
                        ?>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Section Name</label><br />
                        <?php
                            $data = array(
                                'type' => 'text',
                                'class' => 'required form-control hindiFont',
                                'name' => 'txtSection',
                                'id' => 'txtSection',
                                'value' => '',
                                'style' => 'width: 100%'
                            );
                            $options = array();
                            $options['x'] = "pqusa";
                            foreach($section as $sectionitem){
                                $options[$sectionitem->SECTION] = $sectionitem->SECTION;
                            }
                            
                            echo form_dropdown($data, $options,$section_);
                        ?>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Village</label><br />
                        <?php
                            $data = array(
                                'type' => 'text',
                                'class' => 'required form-control hindiFont',
                                'name' => 'txtVillage',
                                'id' => 'txtVillage',
                                'value' => '',
                                'style' => 'width: 100%'
                            );
                            $options = array();
                            $options['x'] = "pqusa";
                            foreach($village as $villageitem){
                                $options[$villageitem->VILLAGE] = $villageitem->VILLAGE;
                            }
                            
                            echo form_dropdown($data, $options,$village_);
                        ?>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Patwari Area</label><br />
                        <?php
                            $data = array(
                                'type' => 'text',
                                'class' => 'required form-control hindiFont',
                                'name' => 'txtPatwariArea',
                                'id' => 'txtPatwariArea',
                                'value' => '',
                                'style' => 'width: 100%'
                            );
                            $options = array();
                            $options['x'] = "pqusa";
                            foreach($patwariarea as $patwariareaitem){
                                $options[$patwariareaitem->PATWARI_AREA] = $patwariareaitem->PATWARI_AREA;
                            }
                            
                            echo form_dropdown($data, $options,$patwariarea_);
                        ?>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Police Area</label><br />
                        <?php
                            $data = array(
                                'type' => 'text',
                                'placeholder' => 'Type For',
                                'class' => 'required form-control hindiFont',
                                'name' => 'txtPoliceArea',
                                'id' => 'txtPoliceArea',
                                'value' => '',
                                'style' => 'width: 100%'
                            );
                            $options = array();
                            $options['x'] = "pqusa";
                            foreach($policearea as $policeareaitem){
                                $options[$policeareaitem->POLICE_AREA] = $policeareaitem->POLICE_AREA;
                            }
                            
                            echo form_dropdown($data, $options,$policearea_);
                        ?>
                    </div>
                    <div class="col-sm-12">&nbsp;</div>
                    <div class="form-group col-sm-6" style="color: #ff0000; font-size: 12px">
                        <b>Note</b>: Minimum two items should be selected to view any data with court as one of the item as compulsory.
                    </div>
                    <div class="form-group col-sm-6">
                        <button type="submit" class="btn btn-primary col-sm-3" style="float: right;" name="search_submit"><span class="glyphicon glyphicon-check"></span> Show Data </button>
                    </div>
                </div>
            <?php echo form_close(); ?>
        </div>
        <div class="col-sm-12">
            <div>
                            <table class="table table-striped table-bordered table-hover" style="width:100%; border:#000000 solid 1px">
                                <thead>
                                    <tr>
                                        <th colspan="19">
                                            <table style="width:100%; border:0px" border="0">
                                            <tr class="bk-clr-three" style="font-size: 22px; background: #04af40">
                                                <th style="color: #ffffff;padding: 5px">
                                                <span style="color: #ffffff; padding: 5px; float: left">
                                                Cases according to (
                                                    <?php 
                                                        if(count($comby) == 1){
                                                            echo $comby[0];
                                                        } else if(count($comby) > 1){
                                                            for($j=0; $j<count($comby);$j++){
                                                                if($j==0){
                                                                    echo $comby[$j] . " - ";
                                                                } else if($j==count($comby)-1) {
                                                                    echo $comby[$j];
                                                                } else {
                                                                    echo $comby[$j] . " - ";
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                )
                                                </span>
                                                <span style="color: #ffffff; padding: 5px; float: right"><?php echo date('d/M/Y'); ?></span>
                                                </th>
                                            </tr>
                                            </table>
                                        </th>
                                    </tr>
                                    <tr align="left">
                                        <th>SNO</th>
                                        <th>COURT</th>
                                        <th>Case No.</th>
                                        <th>First Party</th>
                                        <th>Second Party</th>
                                        <th>Act Name</th>
                                        <th>Section</th>
                                        <th>Village</th>
                                        <th>Patwari Area</th>
                                        <th>Police Area</th>
                                        <th>Sub Division</th>
                                        <th>Tehsil</th>
                                        <th>Final Order Date</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach($searching as $caseitem){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <?php 
                                                $case = explode('-', $caseitem->CASENO);
                                            ?>
                                            <td class="hindiFont"><?php echo $caseitem->COURT_NAME; ?></td>
                                            <td><?php echo $case[1];?></td>
                                            <!--td><?php echo $caseitem->REG_DATE; ?></td-->
                                            <td class="hindiFont"><?php echo $caseitem->FIRST_PARTY; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->SECOND_PARTY; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->ACT_NAME; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->SECTION; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->VILLAGE; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->PATWARI_AREA; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->POLICE_AREA; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->SUB_DIVISION; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->TEHSIL; ?></td>
                                            <td>
                                                <?php 
                                                    if($caseitem->FINAL_ORDER_DATE == ''){
                                                        echo "-"; 
                                                    } else {
                                                        echo date("d-m-Y", strtotime($caseitem->FINAL_ORDER_DATE));     
                                                    }
                                                    
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </body>
</html>
<?php } ?>