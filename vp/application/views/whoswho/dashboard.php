<?php if($this->session->userdata('status__') == "ADMIN") { ?>
<?php //echo date('d-m-Y g:i:s a', strtotime(date('H:i:s'))); ?>
<div class="navbar navbar-inverse set-radius-zero" style="background-color: #4586d6">
    <div class="container">      
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <h1 class="head"><?php if($this->session->userdata('status__') == 'ADMIN'){?>DM Who's who<?php }?> DASHBOARD</h1>
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
    <div class="container">
            <div class="col-md-12">
                <h4 class="page-head-line">Manage Who's Who Detail</h4>
                <div id="__reg_err_msg"></div>
                <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px" id="msg_"><?php echo $this->session->flashdata('_msg_'); ?></div>
            </div>
            <?php echo form_open_multipart('whoswho/updatewhoswhodetail', array('name' => 'frmWhoswho', 'id' => 'frmWhoswho', 'role' => 'form')); ?>
            <div class="col-md-6" style="padding: 10px 10px 0px 10px">
                <div class="form-group">
                    <label>Select Department</label>
                    <?php
                        $data = array(
                            'placeholder' => 'Departments',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtWhoswhoDepartments',
                            'id' => 'txtWhoswhoDepartments',
                            'size' => '7',
                            'style'=>'background: transparent; color: #000000; border: none',
                            'value' => ''
                        );
                        $options = array();
                        foreach ($whos_who1 as $item) {
                            $options[$item->WW1ID] = $item->DEPARTMENT;
                        }
                        echo form_dropdown($data, $options);
                    ?>
                </div>
            </div>
            <div class="col-md-6" style="padding: 10px 10px 0px 10px">
                <div class="form-group">
                    <label>Select Post</label>
                    <select name="txtWhoswhome" id="txtWhoswhome" required="required" class="required form-control" size="7" style="background:  transparent; color: #000000; border: none">

                    </select>
                </div>
            </div>
            <div class="col-md-12"><hr /></div>
            <div class="col-md-6" style="padding: 10px 10px 0px 10px">
                <div class="form-group">
                    <label style="min-width: 120px; color: #000090">Department Name </label>
                    <label style="color: #dd0379" id="dept_name">| -</label>
                    <br />
                    <label style="min-width: 120px; color: #000090">Post Name </label>
                    <label style="color: #c5026b" id="post_name">| -</label>
                    <br />
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <?php
                        $data = array(
                            'type' => 'text',
                            'placeholder' => 'Name here',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtName_',
                            'id' => 'txtName_',
                            'value' => ''
                        );
                        echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label>Contact</label>
                    <?php
                        $data = array(
                            'type' => 'text',
                            'placeholder' => 'Contact here',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtContact',
                            'id' => 'txtContact',
                            'value' => ''
                        );
                        echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <?php
                        $data = array(
                            'type' => 'text',
                            'placeholder' => 'Email here',
                            'class' => 'required form-control',
                            'name' => 'txtEmail',
                            'id' => 'txtEmail',
                            'value' => ''
                        );
                        echo form_input($data);
                    ?>
                </div>
            </div>
            <div class="col-md-6" style="padding: 10px 10px 0px 10px">

                <div class="form-group">
                <div style="float: right; padding: 5px" id="photo_"></div>
                    <label>Photo</label>
                    <?php
                        $data = array(
                            'type' => 'file',
                            'placeholder' => 'Contact here',
                            'class' => 'required form-control',
                            'name' => 'txtPhoto',
                            'id' => 'txtPhoto',
                            'style'=>'width: 300px',
                            'value' => ''
                        );
                        echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label>Discription (if any)</label>
                    <?php
                        $data = array(
                            'placeholder' => 'Description here (if any)',
                            'class' => 'required form-control',
                            'name' => 'txtDesc_',
                            'id' => 'txtDesc_',
                            'style'=>'height:150px',
                            'value' => ''
                        );
                        echo form_textarea($data);
                    ?>
                </div>
                <div class="form-group" style="text-align: right">
                    <div id="this_msg" style="float: left;color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"></div>
                    <div style="float: right">
                    <input type="submit" class="btn btn-success" value="Update" id="cmbWhoswhoSubmit" id="cmbWhoswhoSubmit" />
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-md-12"><hr /></div>

            </div>
        </div>
    </div>
</div>

<?php } else { ?>
<?php }?>