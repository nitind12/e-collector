<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4">
			<label>Enter new Patwari Detail</label>
			<hr />
			<?php
				$data = array(
					'name' => 'frmPatwari', 
					'id' => 'frmPatwari', 
					'role' => 'form', 
					'class' => 'form-group'
					);
				echo form_open('', $data);
			?>
            <div class="input-group">
                <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'btn btn-info dropdown-toggle required form-control',
                        'required' => 'required',
                        'name' => 'cmbTehsilForVillage',
                        'id' => 'cmbTehsilForVillage',
                        'value' => '',
                    );
                    $options = array();
                    $options[''] = "Select Tehsil";
                    foreach ($tehsilEnglish as $tehsilItem) {
                        $options[$tehsilItem->TEHSIL] = $tehsilItem->TEHSIL;
                    }
                    ?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i> Tehsil</span>
                <?php
                    echo form_dropdown($data, $options);
                ?>
            </div>
            <div style="clear: both; padding: 5px"></div>
			<div class="input-group">
				<?php
					$data = array(
                        'type' => 'text',
                        'placeholder' => 'Full Name',
                        'class' => 'required form-control',
                        'required' => 'required',
                        'name' => 'txtpatwariName',
                        'id' => 'txtpatwariName',
                        'value' => '',
                        'class'=>"form-control"
                    );?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?php
                    echo form_input($data);
                ?>
			</div>
			<div style="clear: both; padding: 5px"></div>
			<div class="input-group">
				<?php
					$data = array(
                        'type' => 'text',
                        'placeholder' => 'Contact',
                        'class' => 'required form-control',
                        'required' => 'required',
                        'name' => 'txtpaContact',
                        'id' => 'txtpaContact',
                        'value' => '',
                        'class'=>"form-control"
                    );?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <?php
                    echo form_input($data);
                ?>
			</div>
			<div style="clear: both; padding: 5px"></div>
			<div class="input-group">
				<?php
					$data = array(
                        'type' => 'file',
                        'placeholder' => 'Contact',
                        'class' => 'required form-control',
                        'name' => 'txtpaPhoto',
                        'id' => 'txtpaPhoto',
                        'value' => '',
                        'class'=>"form-control"
                    );?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
                    <?php
                    echo form_input($data);
                ?>
			</div>
			<div style="clear: both; padding: 5px"></div>
			<hr />
			<div class="input-group" style="width: 100%;">
                <div style="float: left">
                <input type="submit" class="btn btn-success" value="Submit" id="cmbPatwariSubmit" name="cmbPatwariSubmit" />
                </div>
                <div style="clear: both"></div>
                <div id="this_msg" style="float: left;color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"></div>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-sm-4">
			<label>Patwari's List</label>
            <div id="load_here_edit_actinact" style="float: right"></div>
			<hr />
			<div class="input-group" style="width: 100%">
				<div class="col-sm-12" style="overflow: auto; height: 200px; width: 100%" id="patwari_list_here">
				</div>
			</div>
			<div style="clear: both; padding: 5px"></div>
		</div>
		<div class="col-sm-4" id="editPatwari" style="color: #e95a0e; display: none">
			<label>Update Patwari Detail</label>
            <div style="float: right; width: auto" id="edit_photo_here"></div>
			<hr />
			<?php
				$data = array(
					'name' => 'frmPatwariUpdate', 
					'id' => 'frmPatwariUpdate', 
					'role' => 'form', 
					'class' => 'form-group'
					);
				echo form_open('', $data);
			?>
            <div class="input-group">
                <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'btn btn-info dropdown-toggle required form-control',
                        'required' => 'required',
                        'name' => 'cmbTehsilForVillage_edit',
                        'id' => 'cmbTehsilForVillage_edit',
                        'value' => '',
                    );
                    $options = array();
                    $options[''] = "Select Tehsil";
                    foreach ($tehsilEnglish as $tehsilItem) {
                        $options[$tehsilItem->TEHSIL] = $tehsilItem->TEHSIL;
                    }
                    ?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-asterisk"></i> Tehsil</span>
                <?php
                    echo form_dropdown($data, $options);
                ?>
            </div>
            <div style="clear: both; padding: 5px"></div>
			<div class="input-group">
				<?php
					$data = array(
                        'type' => 'text',
                        'placeholder' => 'Full Name',
                        'class' => 'required form-control',
                        'required' => 'required',
                        'name' => 'txtpatwariName_edit',
                        'id' => 'txtpatwariName_edit',
                        'value' => '',
                        'style' => 'color:#f55202',
                        'class'=>"form-control"
                    );?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <?php
                    echo form_input($data);
                ?>
			</div>
			<div style="clear: both; padding: 5px"></div>
			<div class="input-group">
				<?php
					$data = array(
                        'type' => 'text',
                        'placeholder' => 'Contact',
                        'class' => 'required form-control',
                        'required' => 'required',
                        'name' => 'txtpaContact_edit',
                        'id' => 'txtpaContact_edit',
                        'style' => 'color:#f55202',
                        'maxlength'=>75,
                        'value' => '',
                        'class'=>"form-control"
                    );?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <?php
                    echo form_input($data);
                ?>
			</div>
			<div style="clear: both; padding: 5px"></div>
			<div class="input-group">
				<?php
					$data = array(
                        'type' => 'file',
                        'placeholder' => 'Contact',
                        'class' => 'required form-control',
                        'name' => 'txtpaPhoto',
                        'id' => 'txtpaPhoto_edit',
                        'style' => 'color:#f55202',
                        'value' => '',
                        'class'=>"form-control"
                    );?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-camera"></i></span>
                    <?php
                    echo form_input($data);
                ?>
                <?php
                    $data = array(
                        'type' => 'hidden',
                        'class' => 'required form-control',
                        'required' => 'required',
                        'name' => 'txtPID',
                        'id' => 'txtPID',
                        'style' => 'color:#f55202',
                        'value' => '',
                        'class'=>"form-control"
                    );
                    echo form_input($data);
                ?>
			</div>
			<div style="clear: both; padding: 5px"></div>
			<hr />
			<div class="input-group" style="width: 100%;">
                <div id="this_msg_update" style="float: left;color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"></div>
                <div style="float: right">
                <input type="reset" class="btn btn-default" value="Cancel" id="cmbPatwariUpdateCancel" name="cmbPatwariUpdateCancel" />
                <input type="submit" class="btn btn-danger" value="Update" id="cmbPatwariUpdate" name="cmbPatwariUpdate" />
                </div>
                <div style="clear: both"></div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>