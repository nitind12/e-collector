<?php
    if(isset($userdetail)){
        echo $name_ = $userdetail->NAME_;
        $user_ = $userdetail->USERNAME;
        $pwd = $userdetail->PASSWORD;
        if($userdetail->STATUS == '1'){
            $status = "yes";
        } else {
            $status = 'no';
        }
        $button_='<button type="submit" class="btn btn-danger"> Update </button>';
    } else {
        $name_ = '';
        $user_ = '';
        $pwd = '';
        $status = 'no';
        $button_='<button type="submit" class="btn btn-primary"> Submit </button>';
    }
?>
<div class="col-sm-6">
    <div class="panel panel-default" style="height:auto;overflow: auto">
        <div class="panel-heading" style="background: #eeee00;">
            Create SDM login here...
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open('createsdm/create_sdm', array('name' => 'frmCreateSDM', 'id' => 'frmCreateSDM', 'role' => 'form')); ?>
                    <div class="form-group">
                        <label>Name of User</label>
                        <?php
                        $data = array(
                            'type'  => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Name of SDM',
                            'class' => 'required form-control',
                            'name' => 'txtName',
                            'id' => 'txtName',
                            'value' => $name_
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <?php
                        $data = array(
                            'type'  => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Username',
                            'class' => 'required form-control',
                            'name' => 'txtUsername',
                            'id' => 'txtUsername',
                            'value' => $user_
                        );
                        echo form_input($data);
                        ?>
                    </div>  
                    <div class="form-group">
                        <label>Password</label>
                        <?php
                        $data = array(
                            'type'  => 'password',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Password',
                            'class' => 'required form-control',
                            'name' => 'txtpwd',
                            'id' => 'txtpwd',
                            'value' => $pwd
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label style="color: #900000">Status</label>
                        <?php
                        if($status == 'yes'){
                            $data = array(
                                'type'  => 'checkbox',
                                'autocomplete' => 'off',
                                'placeholder' => 'Status',
                                'class' => 'required form-control',
                                'name' => 'chkStatus',
                                'id' => 'chkStatus',
                                'checked' => 'checked',
                                'style' => 'text-align: left; width: 36px;'

                            );
                        } else {
                            $data = array(
                                'type'  => 'checkbox',
                                'autocomplete' => 'off',
                                'placeholder' => 'Status',
                                'class' => 'required form-control',
                                'name' => 'chkStatus',
                                'id' => 'chkStatus',
                                'style' => 'text-align: left; width: 36px;'

                            );
                        }
                        echo form_input($data);
                        ?>
                        <?php
                        $data = array(
                            'type'  => 'hidden',
                            'autocomplete' => 'off',
                            'class' => 'required form-control',
                            'name' => 'txtStatus',
                            'id' => 'txtStatus',
                            'value' => '1',
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <?php echo $button_; ?>
                    <button type="reset" class="btn btn-flickr"> Reset </button>
                    <?php echo form_close(); ?>
                    <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"><?php echo $this->session->flashdata('feed_msg_'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--div class="col-sm-5" id="editCat" style="display:none; position:absolute;">
    <div class="panel panel-default" style="height:350px;overflow: auto">
        <div class="panel-heading" style="background:#E13300; color:#ffffff">
            <b>Edit Annual Report here...</b>
        </div>
    </div>
</div-->

<div class="col-lg-6">
    <div class="panel panel-default" style="height:300px;overflow:auto">
        <div class="panel-heading" style="background: #eeee00;">
            <b>Existing SDM(s)</b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-hover tableSection">
                        <tbody>
                            <?php
                            $attrib_ = array(
                                'class' => 'form-horizontal',
                                'name' => 'frmManageSDMs',
                                'id' => 'frmManageSDMs'
                            );
                            ?>
                            <?php echo form_open('createsdm/modify/', $attrib_); ?>
                            <?php if (count($users_) != 0) { ?>
                                <?php foreach ($users_ as $item_) { ?>
                                    <tr>
                                        <td style="width:5%">
                                            <?php if ($item_->STATUS == 1) { ?>
                                                <a href="#" class="modify_user" id="<?php echo $item_->USERNAME."~".'0';?>"><img src="<?php echo base_url('assets_/img/active.png'); ?>"></a>
                                            <?php } else { ?>
                                                <a href="#" class="modify_user" id="<?php echo $item_->USERNAME.'~'.'1';?>"><img src="<?php echo base_url('assets_/img/inactive.png'); ?>"></a>
                                            <?php } ?>
                                        </td>
                                        <td style="width:25%"><a href="#" target="_blank"><?php echo $item_->USERNAME; ?></a></td>
                                        <td style="width:50%"><a href="#" target="_blank"><?php echo $item_->NAME_; ?></a></td>
                                        <td align="right" style="width:20%">
                                            <a href="#" id="<?php echo $item_->USERNAME."~".'del';?>" class="btn btn-danger modify_user"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php
                                    $data = array(
                                        'type'  => 'hidden',
                                        'autocomplete' => 'off',
                                        'required' => 'required',
                                        'class' => 'required form-control',
                                        'name' => 'txtHidden',
                                        'id' => 'txtHidden'
                                    );
                                    echo form_input($data);
                                ?>
                            <?php } else { ?>
                                <tr>
                                    <th style="color: #0000ff">No data found...</th>
                                </tr>
                            <?php } ?>
                        <?php echo form_close(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"><?php echo $this->session->flashdata('msg_delete_'); ?></div>
</div>