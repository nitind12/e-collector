<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">      
        <div class="row">
            <div class="col-md-9">
                <h1 class="head">TOURIST GALLERY ADMIN PANEL</h1>
            </div>
            <div class="col-md-3" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('web'); ?>" style="font-size: 20px;color: #fff">
                    <i class="fa fa-sign-out"></i> Back to DM Portal
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="page-head-line">UPLOAD TOURIST GALLERY</h4>
                <div id="__reg_err_msg"></div>
                <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px" id="msg_"><?php echo $this->session->flashdata('_msg_'); ?></div>
            </div>
        </div>        
        <div class="row">
            <div class="col-sm-6"id="newCat">
                <?php echo form_open_multipart('gallery/feedCategory', array('name' => 'frmNewsEvents', 'id' => 'frmNewsEvents', 'role' => 'form')); ?>
                <div class="form-group">
                    <label>Place Name</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'autocomplete' => 'off',
                        'required' => 'required',
                        'placeholder' => 'Name of Tourist Place',
                        'class' => 'required form-control',
                        'name' => 'txtPlace',
                        'id' => 'txtPlace',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <?php
                    $data = array(
                        'rows' => '3',
                        'autocomplete' => 'off',
                        'required' => 'required',
                        'placeholder' => 'Tourist Place Description',
                        'class' => 'required form-control',
                        'name' => 'txtDesc',
                        'id' => 'txtDesc',
                        'value' => ''
                    );
                    echo form_textarea($data);
                    ?>
                </div>
                <div class="form-group">
                    <label>Image <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[.jpg | .jpeg ]</b> are allowed</span></label>
                    <?php
                    $data = array(
                        'type' => 'file',
                        'autocomplete' => 'off',
                        'class' => 'required form-control',
                        'name' => 'txtFile',
                        'id' => 'txtFile',
                        'style' => 'color: #ff9000'
                    );
                    echo form_input($data);
                    ?>
                </div>
                <button type="submit" class="btn btn-primary"> Submit </button>
                <?php echo form_close(); ?>
            </div>
            <div class="col-sm-6" id="editCat" style="display:none; background:#ffcccc;">
                <?php echo form_open_multipart('gallery/editCategory', array('name' => 'frmNewsEvents', 'id' => 'frmNewsEvents', 'role' => 'form')); ?>
                <div class="form-group">
                    <label>Edit Place Name</label>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'autocomplete' => 'off',
                        'required' => 'required',
                        'placeholder' => 'Name of Tourist Place',
                        'class' => 'required form-control',
                        'name' => 'txtPlaceEdit',
                        'id' => 'txtPlaceEdit',
                        'style' => 'color: #ff9000'                        
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label>Edit Description</label>
                    <?php
                    $data = array(
                        'rows' => '3',
                        'autocomplete' => 'off',
                        'required' => 'required',
                        'placeholder' => 'Tourist Place Description',
                        'class' => 'required form-control',
                        'name' => 'txtDescEdit',
                        'id' => 'txtDescEdit',
                        'style' => 'color: #ff9000'                        
                    );
                    echo form_textarea($data);
                    ?>
                </div>
                <div class="form-group col-sm-6">
                    <label>Edit Image <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[.jpg | .jpeg ]</b> are allowed</span></label>
                    <?php
                    $data = array(
                        'type' => 'file',
                        'autocomplete' => 'off',
                        'class' => 'form-control',
                        'name' => 'txtFileEdit',
                        'id' => 'txtFileEdit',
                        'style' => 'color: #ff9000;'
                    );
                    echo form_input($data);
                    ?>
                    <?php
                    $data = array(
                        'type' => 'hidden',
                        'autocomplete' => 'off',
                        'required' => 'required',
                        'class' => 'required form-control',
                        'name' => 'txtID_edit',
                        'id' => 'txtID_edit',                        
                    );
                    echo form_input($data);
                    ?>                    
                </div>
                <div class="col-sm-6">
                    <img src="#" id="pic" style="max-width:140px;">                   
                </div>
                <div class="col-sm-12" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-danger"> Update </button>
                    <button type="reset" class="btn btn-info" onclick="hideEdit();"> Cancel </button>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Existing Tourist Places in Gallery</b>
                    </div>
                    <div class="panel-body" style="height:270px;overflow:auto">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover tableSection">
                                    <tbody>
                                        <?php
                                        $attrib_ = array(
                                            'class' => 'form-horizontal',
                                            'name' => 'frmStaticHead_Del',
                                            'id' => 'frmStaticHead_Del',
                                        );
                                        ?>
                                        <?php echo form_open('', $attrib_); ?>
                                        <?php if (count($existing) != 0) { ?>
                                            <?php foreach ($existing as $item_) { ?>
                                                <tr>
                                                    <td>
                                                        <?PHP if ($item_->STATUS != 1) { ?>
                                                            <a href="<?php echo site_url('gallery/active_inactive/' . $item_->CATEG_ID . '/1'); ?>"><img src="<?php echo base_url('assets_/img/inactive.png'); ?>"></a>
                                                        <?PHP } else { ?>
                                                            <a href="<?php echo site_url('gallery/active_inactive/' . $item_->CATEG_ID . '/0'); ?>"><img src="<?php echo base_url('assets_/img/active.png'); ?>"></a>
                                                        <?PHP } ?>
                                                    </td>
                                                    <td style="width:40%"><?php echo strtoupper($item_->CATEGORY); ?></td>
                                                    <td style=""><img src="<?php echo base_url('assets_/gallery/' . $item_->PIC); ?>" style="max-width: 100px;"></td>
                                                    <td align="right">
                                                        <a href="#" id="changeHead_<?php echo $item_->CATEG_ID; ?>" onclick="change_Cat('<?php echo $item_->CATEG_ID; ?>', '<?php echo $item_->CATEGORY; ?>', '<?php echo $item_->DESC; ?>', '<?php echo $item_->PIC; ?>');"><i class="fa fa-pencil-square-o" style="color:#0066cc; font-size: 20px;"></i></a> | 
                                                        <a href="<?php echo site_url('gallery/deleteCat/' . $item_->CATEG_ID); ?>"><i class="fa fa-times" style="color:#E13300; font-size: 20px;"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <tr>
                                                <th>No data found...</th>
                                            </tr>
                                        <?php } ?>
                                        <?php
                                        $data = array(
                                            'type' => 'hidden',
                                            'autocomplete' => 'off',
                                            'required' => 'required',
                                            'class' => 'required form-control',
                                            'name' => 'txtFeeStaticHeadID_del',
                                            'id' => 'txtFeeStaticHeadID_del',
                                            'value' => ''
                                        );
                                        echo form_input($data);
                                        ?>
                                    <div style="padding: 5px"><?php echo $this->session->flashdata('msg_delete_'); ?></div>
                                    <?php echo form_close(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>