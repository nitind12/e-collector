<?php if($this->session->userdata('status__') == "ADMIN" || $this->session->userdata('status__') == "SDM") { ?>
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
    <title>Pending Cases</title>
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
                <h1 class="head" style="text-align: center">SDM COURT - Pending Cases</h1>
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
        <div class="col-sm-12">
                            <table class="table table-striped table-bordered table-hover" style="width:100%; border:#000000 solid 1px">
                                <thead>
                                    <tr>
                                        <th colspan="19">
                                            <table style="width:100%; border:0px" border="0">
                                            <tr class="bk-clr-four" style="font-size: 22px">
                                                <th style="color: #ffffff;padding: 5px">
                                                <span style="color: #ffffff; padding: 5px; float: left">
                                                PENDING CASES
                                                </span>
                                                <span style="color: #ffffff; padding: 5px; float: right">Date: <?php echo date('d-M-Y'); ?></span>
                                                </th>
                                            </tr>
                                            </table>
                                        </th>
                                    </tr>
                                    <tr align="left">
                                        <th width="50">SNO</th>
                                        <th width="100">Reg. Date</th>
                                        <th width="100">Case No.</th>
                                        <th width="150">First Party</th>
                                        <th width="150">Second Party</th>
                                        <th width="100">Village</th>
                                        <!--th>Sub Division</th-->
                                        <th width="100">Tehsil</th>
                                        <th width="100">Patwari Area</th>
                                        <th width="100">Police Area</th>
                                        <th width="120">Act Name</th>
                                        <th width="100">Section</th>
                                        <th width="150">Scheduled for</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach($pendingcases as $caseitem){?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo date("d-m-Y", strtotime($caseitem->REG_DATE)); ?></td>
                                            <?php 
                                                $case = explode('-', $caseitem->CASENO);
                                            ?>
                                            <td><?php echo $case[1];?></td>
                                            <!--td><?php echo $caseitem->REG_DATE; ?></td-->
                                            <td class="hindiFont"><?php echo $caseitem->FIRST_PARTY; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->SECOND_PARTY; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->VILLAGE; ?></td>
                                            <!--td class="hindiFont"><?php echo $caseitem->SUB_DIVISION; ?></td-->
                                            <td class="hindiFont"><?php echo $caseitem->TEHSIL; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->PATWARI_AREA; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->POLICE_AREA; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->ACT_NAME; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->SECTION; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->SCHEDULED_FOR; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </body>
</html>
<?php } ?>