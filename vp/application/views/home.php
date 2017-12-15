<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">      
        <div class="row">
            <?php if($this->session->userdata('status__') == "ADMIN") { ?>
            <div class="col-md-6 col-xs-12">
                <h1 class="head">DM OFFICE - NAINITAL</h1>
            </div>
            <div class="col-md-2" style="margin-top: 30px; text-align: right">
                 <a href="<?PHP echo site_url('web/news'); ?>" style="font-size: 20px;color: #fff">
                    <i class="fa fa-newspaper-o"></i> News
                </a>
            </div>
            <div class="col-md-1" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('createsdm'); ?>">
                    <span class="glyphicon glyphicon-user" style="font-size: 20px;color: #fff"></span>
                </a>
            </div>
            <div class="col-md-1" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('c_pwd'); ?>">
                    <span class="glyphicon glyphicon-wrench" style="font-size: 20px;color: #fff"></span>
                </a>
            </div>
            <div class="col-md-2" style="margin-top: 30px; text-align: right">
                 <a href="<?PHP echo site_url('web/logout'); ?>" style="font-size: 20px;color: #fff">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </div>
            <?php } else if($this->session->userdata('status__') == "SDM"){ ?>
            <div class="col-md-8 col-xs-12">
                <h1 class="head">SDM OFFICE</h1>
            </div>
            <div class="col-md-1" style="margin-top: 30px; text-align: right">
                <!--a href="<?PHP echo site_url('Createuser'); ?>">
                    <span class="glyphicon glyphicon-user" style="font-size: 20px;color: #fff"></span>
                </a-->
                
            </div>
            <div class="col-md-1" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('c_pwd'); ?>">
                    <span class="glyphicon glyphicon-wrench" style="font-size: 20px;color: #fff"></span>
                </a>
            </div>
            <div class="col-md-2" style="margin-top: 30px; text-align: right">
                 <a href="<?PHP echo site_url('web/logout'); ?>" style="font-size: 20px;color: #fff">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </div>
            <?php } else { ?>
            <div class="col-md-9 col-xs-12">
                <h1 class="head"><?php if($this->session->userdata('status__') == 'ADMIN'){?>DM OFFICE - NAINITAL<?php } else {?>SDM OFFICE<?php }?></h1>
            </div>
            <div class="col-md-1" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('c_pwd'); ?>">
                    <span class="glyphicon glyphicon-wrench" style="font-size: 20px;color: #fff"></span>
                </a>
            </div>
            <div class="col-md-2" style="margin-top: 30px; text-align: right">
                 <a href="<?PHP echo site_url('web/logout'); ?>" style="font-size: 20px;color: #fff">
                    <i class="fa fa-sign-out"></i> Logout
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">ADMIN PANEL <span style="font-size: 14px; color: #0000ff; float: right"><span style="color:#000000">User:</span> <?php echo $this->session->userdata('user__'); ?></span></h4>
            </div>
        </div>        
        <div class="row">
            <?php if($this->session->userdata('status__') && $this->session->userdata('status__') == 'ADMIN'){?>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="dashboard-div-wrapper bk-clr-two">
                    <i  class="fa fa-institution dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>

                    </div>
                    <h4>Revenue Court</h4>
                    <a href="<?PHP echo site_url('sdmcourt/index/view');?>" class="btn btn-default">ENTER</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="dashboard-div-wrapper bk-clr-four">
                    <i  class="fa fa-camera dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h4>Tourist Places</h4>
                    <a href="<?PHP echo site_url('gallery');?>" class="btn btn-default">ENTER</a>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="dashboard-div-wrapper bk-clr-three">
                    <i  class="fa fa-book dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h4>Who's Who</h4>
                    <a href="<?PHP echo site_url('whoswho');?>" class="btn btn-default">ENTER</a>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="dashboard-div-wrapper bk-clr-one">
                    <i  class="fa fa-book dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h4>Downloads</h4>
                    <a href="<?PHP echo site_url('PdfUp/up/3');?>" class="btn btn-default">ENTER</a>
                </div>
            </div>
            <?php } else if($this->session->userdata('status__') && $this->session->userdata('status__') == 'SDM') { ?>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="dashboard-div-wrapper bk-clr-four">
                    <i  class="fa fa-book dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h4>PATWARI BASTA</h4>
                    <a href="<?PHP echo site_url('village');?>" class="btn btn-default">ENTER</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="dashboard-div-wrapper bk-clr-two">
                    <i  class="fa fa-institution dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>

                    </div>
                    <h4>REVENUE COURT</h4>
                    <a href="<?PHP echo site_url('sdmcourt/index/view');?>" class="btn btn-default">ENTER</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="dashboard-div-wrapper bk-clr-three">
                    <i  class="fa fa-map-marker dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>

                    </div>
                    <h4>REVENUE MAP</h4>
                    <a href="<?PHP echo site_url('revenue/');?>" class="btn btn-default">ENTER</a>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="dashboard-div-wrapper bk-clr-four">
                    <i  class="fa fa-book dashboard-div-icon" ></i>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        </div>
                    </div>
                    <h4>PATWARI BASTA</h4>
                    <a href="<?PHP echo site_url('web/patwariDasboard');?>" class="btn btn-default">ENTER</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    This platform is administered by SDM-Nainital to administrate Village, DM/SDM Court Cases, and Other existing Links.
                </div>
                <hr />
            </div>
        </div>
    </div>
</div>
