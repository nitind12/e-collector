<div class="row">
	<div class="col-sm-6">
	</div>	
    <div class="col-sm-6">
    	<div class="panel-body">
                <?php echo form_open('sdmcourt/calleditcaserecord', array('name' => 'frmDM', 'id' => 'frmDM', 'role' => 'form', 'class' => 'form-inline')); ?>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Year</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'DM Name',
                        'class' => 'required form-control',
                        'name' => 'txtYear',
                        'id' => 'txtYear',
                        'value' => ''
                    );
                    $options = array();
                    $options[''] = "Select";
                    for($i=date('Y'); $i>=2005; $i--){
                        $options[$i] = $i;
                    }
                    echo form_dropdown($data, $options, date('Y'));
                    ?>
                </div>
                <div class="form-group col-md-3 col-lg-3 col-xs-12">
                    <label>Case No.</label><br />
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Case No',
                        'class' => 'required form-control',
                        'name' => 'txtCaseNo',
                        'id' => 'txtCaseNo',
                        'style' => 'font-size: 18px; width: 185px; color: #ff0000',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
        </div>
    </div>
</div>