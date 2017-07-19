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
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="bk-clr-one">Existing Villages</th>
                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>Village</th>
                                        <th>User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach($villages as $villitem){?>
                                    <tr>
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo ucfirst(strtolower($villitem->NAME_)); ?></td>
                                        <td><?php echo ucfirst(strtolower($villitem->USERNAME)); ?></td>
                                        <td>
                                        <a href="<?php echo site_url('web/patwariDasboard/village/'.str_replace(' ', '-',$villitem->NAME_).'/'.$villitem->ONEROWID.'/1');?>" class="btn btn-link">
                                        <i class="fa fa-pencil-square-o" style="color:#0066cc; font-size: 18px;"></i>Update</a>
                                         | 
                                        <a href="<?php echo site_url('web/delvillage/'.$villitem->VILLAGEID);?>" class="btn btn-link" style="color: #ff0000" onclick="return confirm('Are you sure you want to delete?')">
                                        <i class="fa fa-times" style="color:#E13300; font-size: 20px;"></i>
                                        Delete</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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

<!-- Trigger the modal with a button -->


<!-- Modal for New Village -->
<div id="myModal" class="modal fade" role="dialog" style="background: rgba(76, 175, 80, 0.8)">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" style="background: #adadad">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Enter New Village Name</h4>
            </div>
            <div class="modal-body">
                <?php $this->load->view('patwari/newvillageentry'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- Modal for update Village -->
<div id="myModal1" class="modal fade" role="dialog" style="background: rgba(76, 175, 80, 0.8)">
    <div class="modal-dialog">

        <!-- Modal content-->

        <div class="modal-content" style="background: #adadad">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Select Village to update</h4>
            </div>
            <div class="modal-body">
                <?php $this->load->view('patwari/updatevillageentry'); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
