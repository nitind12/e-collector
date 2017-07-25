<style type="text/css">
    #loader{display: none}
    #preview{display: none}
</style>
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
                <h4 class="page-head-line">UPLOAD TOURIST PLACES</h4>
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
                        'rows' => '5',
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
                <button type="submit" class="btn btn-primary"> Submit </button>
                <?php echo form_close(); ?>
            </div>
            <div class="col-sm-6" id="editCat" style="display:none; background:#ffcccc;height: 320px;">
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
                        'name' => 'txtCategory_edit',
                        'id' => 'txtCategory_edit',
                        'style' => 'color: #ff9000'
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label>Edit Description</label>
                    <?php
                    $data = array(
                        'rows' => '5',
                        'autocomplete' => 'off',
                        'required' => 'required',
                        'placeholder' => 'Tourist Place Description',
                        'class' => 'required form-control',
                        'name' => 'txtDesc_edit',
                        'id' => 'txtDesc_edit',
                        'style' => 'color: #ff9000'
                    );
                    echo form_textarea($data);
                    ?>
                </div>
                <div class="form-group col-sm-6">                   
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
                    <div class="panel-body" style="height:310px;overflow:auto">
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
                                                    <td style="width:20%"><?php echo strtoupper($item_->CATEGORY); ?></td>
                                                    <td style="font-size:11px;"><?php echo strtoupper($item_->DESCR); ?></td>
                                                    <td align="right" style="width:15%">
                                                        <a href="#" id="changeHead_<?php echo $item_->CATEG_ID; ?>" onclick="change_Cat('<?php echo $item_->CATEG_ID; ?>');"><i class="fa fa-pencil-square-o" style="color:#0066cc; font-size: 20px;"></i></a> | 
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
            <!------------------------------------------------------IMAGES------------------------------->
            <div class="col-lg-12" id="my">
                <div class="panel panel-default" style="height:auto;overflow:auto">
                    <div class="panel-heading">
                        <b>Add Images in Selected Tourist Places</b>
                    </div>
                    <!-- .panel-heading -->
                    <div class="panel-body">
                        <div class="row"> 
                            <div class="col-sm-4">
                                <?php echo form_open_multipart('gallery/do_upload', array('name' => 'frmupload', 'id' => 'frmupload', 'role' => 'form', 'enctype' => 'multipart/form-data', 'method' => 'POST')); ?>
                                <div class="col-sm-4"><label style="color:#0066cc; font-weight: bold; font-size:14px;">Choose Place</label></div>
                                <div class="col-sm-8">
                                    <?php
                                    $data = array(
                                        'class' => 'required form-control m-bot8',
                                        'name' => 'txtCategory',
                                        'id' => 'txtCategory',
                                        'required' => 'required',
                                        'onchange' => 'loadgallery(this);'
                                    );
                                    $options = array();
                                    $options[0] = 'Choose Category';
                                    foreach ($existing as $item_) {
                                        $options[$item_->CATEG_ID] = $item_->CATEGORY;
                                    }
                                    echo form_dropdown($data, $options);
                                    ?>
                                </div>

                                <div class="col-sm-12" style="margin-top:40px;">
                                    <div class="form-group">
                                        <?php
                                        $data = array(
                                            'type' => 'file',
                                            'autocomplete' => 'off',
                                            'class' => 'required form-control',
                                            'name' => 'userfile',
                                            'id' => 'userfile',
                                            'value' => ''
                                        );
                                        echo form_input($data);
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-info btn-block" style="width: 200px;" value="Add">
                                    </div>  
                                    <div class="form-group">
                                        <img id="loader" src="<?php echo base_url() ?>_assets_/images/load.GIF" style="height: 30px;">
                                    </div>
                                    <div class="form-group">
                                        <img id="preview" src="#" style="height: 80px;border: 1px solid #DDC; " />
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                            <div class="col-sm-8">
                                <div class="row clear-fix">
                                    <div class="col-md-12">
                                        <div id="response">

                                        </div>  
                                    </div>
                                </div>
                                <div class="row clear-fix">
                                    <div class="col-md-12">
                                        <div style="margin-top: 1%;">
                                            <blockquote>
                                                <ul class="list-inline" id="gallery">

                                                </ul>
                                            </blockquote>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!---------------------------------------------------ACCOMODATION----------------------------------->
            <!--div class="col-lg-12" id="myAcc">
                <div class="panel panel-default" style="height:auto;overflow:auto">
                    <div class="panel-heading">
                        <b>Add Accomodation to Selected Tourist Places</b>
                    </div>
                    <!-- .panel-heading -->
                    <!--div class="panel-body">
                        <div class="row"> 
                            <div class="col-sm-3">
                                <?php echo form_open_multipart('gallery/Add_Accomo', array('name' => 'frmAddAccomo', 'id' => 'frmAddAccomo', 'role' => 'form', 'enctype' => 'multipart/form-data', 'method' => 'POST')); ?>                               
                                <div class="form-group">
                                    <label>Choose Place</label>
                                    <?php
                                    $data = array(
                                        'class' => 'required form-control m-bot8',
                                        'name' => 'txtCategory',
                                        'id' => 'txtCategory',
                                        'required' => 'required',
                                        'onchange' => 'loadAccomo(this);'
                                    );
                                    $options = array();
                                    $options[''] = 'Choose Category';
                                    foreach ($existing as $item_) {
                                        $options[$item_->CATEG_ID] = $item_->CATEGORY;
                                    }
                                    echo form_dropdown($data, $options);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Accomodation</label>
                                    <?php
                                    $data = array(
                                        'type' => 'text',
                                        'autocomplete' => 'off',
                                        'required' => 'required',
                                        'placeholder' => 'Name of Tourist Place',
                                        'class' => 'required form-control',
                                        'name' => 'txtAccomo',
                                        'id' => 'txtAccomo',
                                        'value' => ''
                                    );
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Description (if any)</label>
                                    <?php
                                    $data = array(
                                        'rows' => '5',
                                        'autocomplete' => 'off',                                        
                                        'placeholder' => 'Tourist Place Description',
                                        'class' => 'required form-control',
                                        'name' => 'txtAccDesc',
                                        'id' => 'txtAccDesc',
                                        'value' => ''
                                    );
                                    echo form_textarea($data);
                                    ?>
                                </div>                
                                <button type="submit" class="btn btn-primary"> Submit </button>

                            </div>
                            <?php echo form_close(); ?>
                            <div class="col-sm-9">
                                <div class="row clear-fix">
                                    <div class="col-md-12">
                                        <div id="response">

                                        </div>  
                                    </div>
                                </div>
                                <div class="row clear-fix">
                                    <div class="col-md-12">
                                        <div style="margin-top: 1%;">
                                            <blockquote>
                                                <ul class="list-inline" id="gallery">

                                                </ul>
                                            </blockquote>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div-->
        </div>                
    </div>
</div>