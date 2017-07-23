<body>
    <div class="header" id="ban">
        <div class="container">                
            <div class="header_right wow fadeInLeft animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <nav class="link-effect-7" id="link-effect-7">
                            <ul class="nav navbar-nav">
                                <li class="<?php
                                if ($menu == 1) {
                                    echo "active act";
                                }
                                ?>"><a href="<?PHP echo site_url('web/'); ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#myModalNumber"><i class="fa fa-eye"></i> Disaster Control Room</a></li>
                                <li><a href="<?PHP echo site_url('web/whos_who'); ?>"><i class="fa fa-users"></i> Who's Who</a></li>                                   
                                <li><a href="#" data-toggle="modal" data-target="#myModalContact"><i class="fa fa-phone"></i> Contact</a></li>
                                <li><a href="" data-toggle="modal" data-target="#myModal1"><i class="fa fa-sign-in"></i>  Login</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <div class="nav navbar-nav navbar-right social-icons wow fadeInRight animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInRight; right: 0px;">
                <img src="<?PHP echo base_url() . 'nitnav/images/logo.png'; ?>" alt="Nainital" style="float:right; max-width: 70px; margin-top: -20px;">
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>


    <!-- Modal for update Village -->
    <div id="myModal1" class="modal fade" role="dialog" style="background: rgba(76, 175, 80, 0.8)">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content col-sm-9" style="background: #fff; float:right">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Login with Admin Account</h4>
                </div>
                <div class="modal-body">
                        <?php if ($this->session->flashdata('_msgall_')) { ?>
                        <div class="col-sm-12" style="color: #ff0000; background: #ffff00">
                        <?php echo $this->session->flashdata('_msgall_'); ?>
                        </div>
                    <?php } ?>
                    <br />
                        <?php echo form_open(SUB_ADMIN . '/web/checkAuthentication', array('name' => 'frmLogin', 'id' => 'frmLogin', 'role' => 'form')); ?>
                    <div class="form-group">
                        <label>Username</label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Username please',
                            'class' => 'required form-control',
                            'name' => 'txtUsr',
                            'id' => 'txtUsr',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <?php
                        $data = array(
                            'type' => 'password',
                            'autocomplete' => 'off',
                            'placeholder' => 'Password please',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtPwd',
                            'id' => 'txtPwd',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>
<?php echo form_close(); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div id="myModalContact" class="modal fade" role="dialog" style="background: rgba(76, 175, 80, 0.8)">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content col-sm-12" style="background: #fff; float:right">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 align='center' style="color:#000; font-weight: bold; font-size:24px;">CONTACT US</h4>
                </div>
                <div class="modal-body" style="font-size: 19px;">
                    <p>DM Office,</p>
                    <p>Tallital, Nainital,</p>
                    <p><b>Contact No:</b> 05942 - 235684 (O), <b>email:</b>  dm-nai-ua@nic.in </p>
                    <hr>
                    <p>SDM Office,</p>
                    <p>Tallital, Nainital,</p>
                    <p><b>Contact No:</b> 05946-235542, <b>email:</b> sdm.ntl@gmail.com</p>
                    <hr>
                    <p><b>For any query contact</b></p>
                    <p>Vikas Sharma</p>
                    <p>eDistrict Manager, District Magistrate Office Nainital </p>
                    <p><b>Contact No:</b> +919410376902, +919634759269, <br><b>email:</b> edmnainital@gmail.com  </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div id="myModalNumber" class="modal fade" role="dialog" style="background: rgba(76, 175, 80, 0.8)">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content col-sm-9" style="background: #ff6666; float:right">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 align='center' style="color:#fff; font-weight: bold; font-size:24px;">DISASTER CONTROL ROOM</h4>
                </div>
                <div class="modal-body">
                    <h4 align='center' style="color:#ffEE00; font-weight: bold; font-size: 32px;"><i class="fa fa-phone"></i> 05942-235684/235343</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>