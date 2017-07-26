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
<div class="container" id="mycontainer">
<div class="row">
    <div class="col-sm-12">&nbsp;</div>
    <div class="container">
            <div class="col-md-12">
                <h4 class="page-head-line">Manage <?php echo $title_;?></h4>
                <div style="overflow: hidden; color: #ff0000; font-weight: bold; font-style: italic; padding: 5px" id="__reg_err_msg"></div>
            </div>
            <?php echo form_open_multipart('pdfUp/', array('name' => 'frmpdfUp', 'id' => 'frmpdfUp', 'role' => 'form')); ?>
            <?php
                $data = array(
                	'type' => 'hidden',
                    'required' => 'required',
                    'class' => 'required form-control',
                    'name' => 'txtTip',
                    'id' => 'txtTip',
                    'style' => 'width: 50px',
                    'value' => $this->session->userdata('opt')
                );
                echo form_input($data);
            ?>
            <?php
                if(count($forcombo) != 0){ 
                    $r = $forcombo[0]; 
                    $name_ = $r->NAME_;
                    $pdfid = $r->PDFID;
                } else {
                    $name_ = '';
                    $pdfid = '';
                }
            ?>
            <?php
                        $data = array(
                            'type' => 'hidden',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtID',
                            'id' => 'txtID',
                            'style' => 'width: 50px',
                            'value' => $pdfid
                        );
                        echo form_input($data);
                    ?>
            <?php if($this->session->userdata('opt') == '1' || $this->session->userdata('opt') == '2'){?>
            <div class="col-md-2">
                <div class="input-group">
                    <?php
                        $data = array(
                        	'type' => 'text',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'pdfName',
                            'id' => 'pdfName',
                            'value' => $name_
                        );
                        ?>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-circle"></i></span>
                        <?php
                        echo form_input($data);
                    ?>
                </div>
            </div>
            <?php } else { ?>
            <div class="col-md-2">
                <div class="input-group">
                    <?php
                        $data = array(
                            'required' => 'required',
                            'class' => 'required form-control',
                            'placeholder'=>'Pdf Name',
                            'name' => 'cmbpdfName',
                            'id' => 'cmbpdfName',
                            'value' => ''
                        );
                        $options = array();
                        $options[''] = "Select";
                        foreach ($forcombo as $item) {
                            $options[$item->PDFID."~".$item->NAME_] = $item->NAME_;
                        }
                        $options["New~New"] = "New...";
                        $options["ALL~ALL"] = "ALL...";
                        ?>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
                        <?php
                        echo form_dropdown($data, $options);
                    ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group">
                    <?php
                        $data = array(
                        	'type' => 'text',
                            'required' => 'required',
                            'placeholder'=>'Pdf Name',
                            'class' => 'required form-control',
                            'name' => 'pdfName',
                            'id' => 'pdfName',
                            'value' => ''
                        );
                        ?>
                        <span class="input-group-addon"><i class="glyphicon glyphicon-ok-circle"></i></span>
                        <?php
                        echo form_input($data);
                    ?>
                </div>
            </div>
            <?php } ?>
            <div class="col-sm-4">
            	<div class="input-group">
					<?php
						$data = array(
	                        'type' => 'file',
	                        'placeholder' => 'Contact',
	                        'class' => 'required form-control',
	                        'name' => 'txtpdffile',
	                        'id' => 'txtpdffile',
	                        'value' => '',
	                        'class'=>"form-control"
	                    );?>
	                    <span class="input-group-addon"><i class="glyphicon glyphicon-cloud-upload"></i></span>
	                    <?php
	                    echo form_input($data);
	                ?>
				</div>
            </div>
            <?php if($this->session->userdata('opt') == '1' || $this->session->userdata('opt') == '2'){?>
            <div class="col-sm-6">
            	<div class="form-group" style="text-align: right">
                    <div style="float: left">
                    <input type="submit" class="btn btn-success" value="Update" id="cmbpdfSubmit" id="cmbpdfSubmit" />
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <?php } else { ?>
            <div class="col-sm-3">
            	<div class="form-group" style="text-align: right">
                    <div style="float: left">
                    <input type="submit" class="btn btn-success" value="Update" id="cmbpdfSubmit" id="cmbpdfSubmit" />
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php echo form_close(); ?>
            <div class="col-sm-12" style="clear: both; padding: 5px"></div>
            <div class="col-md-12" style="padding: 10px 10px 0px 10px">
            	<label>PDF(s) for the seleted Item</label>
            	<div class="form-group" id="pdf_here">
            		Show PDF here...
            	 </div>
            </div>
            </div>
            <div class="col-md-12"><hr /></div>

            </div>
        </div>
    </div>
</div>
<?php } else { ?>
	<center style="color: #ff0000; font-size: 25px; margin: 50px">You are not authorized to see this page.</center>
<?php }?>