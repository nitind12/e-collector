<div class="navbar navbar-inverse set-radius-zero" style="background-color: #4586d6">
    <div class="container">      
        <div class="row">
            <div class="col-md-9 col-xs-12">
                <h1 class="head">PATWARI DASHBOARD</h1>
            </div>
            <div class="col-md-3" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('web'); ?>" style="font-size: 16px;color: #fff">
                        Back to Dashboard <i class="fa fa-sign-out"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Welcome to Your Dashboard</h4>
            </div>
        </div>
        <?php if($this->session->flashdata('_msgall_')){ ?>
            <div class="col-sm-12" style="color: #ff0000; background: #ffff00; text-align: center">
                <?php echo $this->session->flashdata('_msgall_'); ?></h6>
            </div>
            <div class="col-sm-12" style="padding: 10px"></div>
        <?php } ?>
        <div class="row">    
            <?php if($this->session->userdata('status__') && $this->session->userdata('status__') == 'SDM'){?>
                <div class="col-md-12">
                    <!--div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="dashboard-div-wrapper bk-clr-one">
                            <i  class="fa fa-home dashboard-div-icon" ></i>
                            <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                </div>
                            </div>
                            <h4>NEW VILLAGE</h4>
                            <button type="button" class="btn btn-google btn-lg" data-toggle="modal" data-target="#myModal">Enter</button>
                        </div>
                    </div-->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive" style="overflow: auto; max-height: 300px">
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
                        </div>
                    </div>
            </div>
                </div>
            <?php } else { ?>    
            <div class="col-md-6">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="fa fa-home dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                        <h4>NEW VILLAGE</h4>
                        <button type="button" class="btn btn-google btn-lg" data-toggle="modal" data-target="#myModal">Enter</button>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class="fa fa-edit dashboard-div-icon" ></i>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                            </div>
                        </div>
                        <h4>UPDATE VILLAGE</h4>
                        <button type="button" class="btn btn-primary btn-lg"data-toggle="modal" data-target="#myModal1">Enter</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="alert alert-info">
                    <h4 style="color: #B9B739; font-weight: bold">New Village</h4>
                    <p>Continue with this if you want to enter a new Village Detail.</p>
                    <p>&nbsp;</p>
                    <h4 style="color: #c32f10; font-weight: bold">Update Village</h4>
                    <p>Continue with this if you want to update/edit already entered Village Detail.</p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>