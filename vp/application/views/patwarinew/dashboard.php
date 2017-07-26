<style>
    .orange{
        color: #900000;
    }
    .tehsil_label{
        font-size:11px; 
        background:#505050; 
        border-top-left-radius:3px; 
        border-bottom-left-radius:3px;  
        color:#ffffff; 
        padding: 3px
    }
    .tehsil_name{
        font-size:11px; 
        border-left: #000000 solid 0px; 
        border-right: #000000 solid 1px; 
        border-top: #000000 solid 1px; 
        border-bottom: #000000 solid 1px; 
        background:transparent; 
        border-top-right-radius:3px; 
        border-bottom-right-radius:3px;  
        color:#000000; 
        padding: 2px
    }
    span{
        color: #ff0000;
    }
</style>
<div class="navbar navbar-inverse set-radius-zero" style="background-color: #4586d6">
    <div class="container">      
        <div class="row">
            <?php if($this->session->userdata('status__') == "SDM") { ?>
            <div class="col-md-8 col-xs-12">
                <h1 class="head"><?php if($this->session->userdata('status__') == 'ADMIN'){?>DM PATWARI BASTA<?php } else {?>SDM PATWARI BASTA<?php }?> DASHBOARD</h1>
            </div>
            <div class="col-md-4" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('web/'); ?>" style="font-size: 16px;color: #fff">
                        Back to SDM Portal <i class="fa fa-sign-out"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <div class="container-fluid">
        <?php if($this->session->flashdata('_msgall_')){ ?>
            <div class="col-sm-12" style="color: #ff0000; background: #ffff00; text-align: center">
                <?php echo $this->session->flashdata('_msgall_'); ?></h6>
            </div>
            <div class="col-sm-12" style="padding: 10px"></div>
        <?php } ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel-body">
                    <ul class="nav nav-tabs" style="background: #f2f2f2; font-size: 17px;">
                        <li class="<?php if($patwari == 'active'){ echo 'active'; }?>"><a href="#patwari" data-toggle="tab"><i class="fa fa-address-card-o"></i> Patwari Section</a>
                        </li>
                        <li class="<?php if($village == 'active'){ echo 'active'; }?>"><a href="#village" data-toggle="tab"><i class="fa fa-desktop"></i> Village Section</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade<?php if ($patwari != '') { echo " " . $patwari . " in"; } ?>" id="patwari">
                            <h6>&nbsp;</h6>
                            <!---View Case Detail-->

                            <div class="panel">
                                <?php $this->load->view('patwarinew/tabs/patwari.php'); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade<?php if ($village != '') { echo " " . $village . " in"; } ?>" id="village">
                            <h6>&nbsp;</h6>
                            <!---New Case Detail-->
                            <div class="panel">
                                <?php $this->load->view('patwarinew/tabs/village.php'); ?>
                            </div>
                        </div>
                </div>
            </div>
            <?php } else {
                redirect('web/');
                } ?>
        </div>
    </div>
</div>