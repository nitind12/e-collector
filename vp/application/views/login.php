<div class="navbar navbar-inverse set-radius-zero" style="background-color: #C36464">
    <div class="container">      
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <h1 class="head">VILLAGE-PORTAL</h1>
            </div>
            <div class="col-md-2" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('web'); ?>">
                    <span class="glyphicon glyphicon-home" style="font-size: 20px;color: #fff"></span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">Please Login To Enter </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Login with <strong>Admin (SDM)/Patwari Account  :</strong></h4>
                <?php if($this->session->flashdata('_msgall_')){ ?>
                    <div class="col-sm-12" style="color: #ff0000; background: #ffff00">
                        <?php echo $this->session->flashdata('_msgall_'); ?>
                    </div>
                <?php } ?>
                <br />
                <?php echo form_open('web/checkAuthentication', array('name' => 'frmLogin', 'id' => 'frmLogin', 'role' => 'form')); ?>
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
            <div class="col-md-6">
                <div class="alert alert-info">
                    This is a Login page for Admin(SDM)/Patwari. 
                    <br />
                    <strong> Some of its features are given below :</strong>
                    <ul>
                        <li>
                            Admin (SDM) can create/update/delete Account for Patwari
                        </li>
                        <li>
                            Patwari can Manage Village (Add/Update) data.
                        </li>
                        <li>
                            Patwari can Login at any time and update the details of Village.
                        </li>
                    </ul>

                </div>
                <div class="alert alert-success">
                    <strong> Instructions To Use:</strong>
                    <ul>
                        <li>
                            Admin (SDM) creates the username and password for the Patwari.
                        </li>
                        <li>
                            After Login creation the same(username & password) should be provided to Patwari.
                        </li>
                        <li>
                            Now Patwari can login and Add/Update their Village data.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
