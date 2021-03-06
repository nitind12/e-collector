<div class="col-lg-12">
    <div class="panel panel-default"<?php echo $style_; ?>>
        <div class="panel-heading">
            Feed News &amp; Events here...
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open_multipart('newsevents/feedNews', array('name' => 'frmNewsEvents', 'id' => 'frmNewsEvents', 'role' => 'form')); ?>
                    <div class="form-group">
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'subject of Detailed News/ Event',
                            'class' => 'required form-control',
                            'name' => 'txtSubject',
                            'id' => 'txtSubject',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        $data = array(
                            'rows' => '3',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'News/ Event',
                            'class' => 'required form-control',
                            'name' => 'txtNews',
                            'id' => 'txtNews',
                            'value' => ''
                        );
                        echo form_textarea($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>File input <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[ .doc| .docx| .pdf| .jpg| .png ]</b> are allowed</span></label>
                        <?php
                        $data = array(
                            'type' => 'file',
                            'autocomplete' => 'off',
                            'class' => 'required form-control',
                            'name' => 'txtInputFile',
                            'id' => 'txtInputFile',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <button type="submit" class="btn btn-primary"> Submit </button>
                    <button type="reset" class="btn btn-flickr"> Reset </button>
                    <?php echo form_close(); ?>
                    <div style="color: #ff0000; font-size: 12px; font-weight: bold; font-style: italic; padding: 0px"><?php echo $this->session->flashdata('feed_msg_'); ?></div>
                </div>
            </div>
        </div>
    </div>
</div>