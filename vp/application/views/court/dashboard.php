<div class="navbar navbar-inverse set-radius-zero" style="background-color: #4586d6">
    <div class="container">      
        <div class="row">
            <?php if($this->session->userdata('status__') == "ADMIN" || $this->session->userdata('status__') == "SDM") { ?>
            <div class="col-md-8 col-xs-12">
                <h1 class="head"><?php if($this->session->userdata('status__') == 'ADMIN'){?>DM COURT<?php } else {?>SDM COURT<?php }?> DASHBOARD</h1>
            </div>
            <div class="col-md-4" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('web/'); ?>" style="font-size: 16px;color: #fff">
                        Back to <?php if($this->session->userdata('status__') == 'ADMIN'){?>DM OFFICE NAINITAL<?php } else {?>SDM<?php }?> Portal <i class="fa fa-sign-out"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
        <div class="col-sm-12" style="text-align: right">
            <?php if($this->session->userdata('status__') == "ADMIN"){?>
                <a href="<?php echo site_url('sdmcourt/dmsearching');?>" class="btn btn-default" target="_blank">
                    Reports for DM
                </a>
            <?php } else {?>
                <a href="<?php echo site_url('sdmcourt/searching');?>" class="btn btn-default" target="_blank">
                    Reports for DM
                </a>
            <?php } ?>
            <a href="<?php echo site_url('sdmcourt/todayscases');?>" class="btn btn-primary" target="_blank">
                Today's cases
            </a>
            <a href="<?php echo site_url('sdmcourt/pendingcases');?>" class="btn btn-danger" target="_blank">
                Pending cases
            </a>
            <a href="<?php echo site_url('sdmcourt/disposedoffcases');?>" class="btn btn-default" target="_blank">
                Disposed-off cases
            </a>
            <a href="<?php echo site_url('sdmcourt/finalcases');?>" class="btn btn-success"  target="_blank">
                Finally Closed Cases
            </a>
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
                        <li class="<?php if($view == 'active'){ echo 'active'; }?>"><a href="#view" data-toggle="tab"><i class="fa fa-address-card-o"></i> Case View</a>
                        </li>
                        <li class="<?php if($new == 'active'){ echo 'active'; }?>"><a href="#new" data-toggle="tab"><i class="fa fa-desktop"></i> Register New Case</a>
                        </li>
                        <li class="<?php if($newupdate == 'active'){ echo 'active'; }?>"><a href="#newupdate" data-toggle="tab"><i class="fa fa-refresh"></i> New Case Update</a>
                        </li>
                        <li class="<?php if($edit == 'active'){ echo 'active'; }?>"><a href="#edit" data-toggle="tab"><i class="fa fa-pencil"></i> Edit Case</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade<?php if ($view != '') { echo " " . $view . " in"; } ?>" id="view">
                            <h6>&nbsp;</h6>
                            <!---View Case Detail-->

                            <div class="panel panel-default" style="border: 0px">
                            <div class="row">
                                <div class="col-sm-8">
                                    <!--a href="<?php //echo site_url('sdmcourt/index/view/dashboard/x/x/25');?>" class="btn btn-default">Show Some Cases</a>
                                    <a href="<?php //echo site_url('sdmcourt/index/view');?>" class="btn btn-default">Show All Cases <span style="color:#ff0000"> [Total Registered Cases - <?php echo $totalcases->totalcases; ?>] </span></a-->
                                    
                                    <a href="<?php echo site_url('sdmcourt/index/view'); ?>" class="btn btn-default"><span style="color:#ff0000"> [Total Registered Cases - <?php echo $totalcases->totalcases; ?>] </span></a>
                                </div>
                                <div class="col-sm-4">
                                        <?php echo form_open('sdmcourt/searchcase/view', array('name' => 'frmSearch', 'id' => 'frmSearch', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-12 col-lg-12 col-xs-12" style="text-align: right">
                                            <label>Search Case</label>&nbsp;
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Case No',
                                                'class' => 'required form-control',
                                                'required' => 'required',
                                                'name' => 'txtCaseNo',
                                                'id' => 'txtCaseNo',
                                                'style' => 'font-size: 18px; width: 185px; color: #ff0000',
                                                'value' => ''
                                            );
                                            echo form_input($data);
                                            ?>
                                            <button type="submit" class="btn btn-primary" style="float: right;"><span class="glyphicon glyphicon-check"></span> Search </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <div class="col-sm-12">
                                        &nbsp;
                                    </div>
                                </div>
                                <?php $this->load->view('court/tabs/viewcase.php'); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade<?php if ($new != '') { echo " " . $new . " in"; } ?>" id="new">
                            <h6>&nbsp;</h6>
                            <!---New Case Detail-->
                            <div class="panel panel-default">
                                <?php $this->load->view('court/tabs/newcase.php'); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade<?php if ($newupdate != '') { echo " " . $newupdate . " in"; } ?>" id="newupdate">
                            <h6>&nbsp;</h6>
                            <!---Update Case Detail-->
                            <div class="panel panel-default">
                                <?php $this->load->view('court/tabs/newupdateincase.php'); ?>
                            </div>
                        </div>
                        <div class="tab-pane fade<?php if ($edit != '') { echo " " . $edit . " in"; } ?>" id="edit">
                            <h6>&nbsp;</h6>
                            <!---Update Case Detail-->
                            <div class="panel panel-default">
                                <?php $this->load->view('court/tabs/editcase.php'); ?>
                            </div>
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