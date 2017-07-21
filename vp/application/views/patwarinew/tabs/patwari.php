<style>
	.orange{
		color: #900000;
	}
	
</style>
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
                        'required' => 'required',
                        'name' => 'txtpaContact',
                        'id' => 'txtpaContact',
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
				<button type="submit" class="btn btn-primary"> Submit </button>
			</div>
			<?php echo form_close(); ?>
		</div>
		<div class="col-sm-4">
			<label>Patwari's List</label>
			<hr />
			<div class="input-group" style="width: 100%">
				<div class="col-sm-12" style="overflow: auto; height: 200px; width: 100%">
					<?php $i=0; ?>
					<?php foreach ($patwaris as $item) { ?>
						<?php 
							if($i == 0){ 
								$color = "#ECFFE4";
								$i=1;
							} else {
								$color = "#FFFFE4";
								$i=0;
							}
						?>
						<div class="col-sm-12" style="background: <?php echo $color; ?>; padding: 3px; border: #f0f0f0 solid 1px; border-radius: 5px">
							<div class="col-sm-2" style="border:#AAAAAA solid 1px; margin: 0px; text-align: left; overflow: hidden; border-radius: 15px; padding: 0px">
								<img src="<?php echo base_url('assets_/patwari_pics/'.$item->PHOTO_);?>" style="float: left" width="55" />
							</div>
							<div class="col-sm-10">
								<div style="float: left; padding: 0px">
									<i class="glyphicon glyphicon-user"></i>&nbsp;<?php echo $item->NAME_; ?>
								</div>
								<div style="clear: both"></div>
								<div style="float: left; padding: 0px; margin-top: 0px">
									<i class="glyphicon glyphicon-earphone"></i>&nbsp;<?php echo $item->PHONE_; ?>
								</div>
							</div>
						</div>
						<div style="clear: both; padding: 5px"></div>
					<?php } ?>
				</div>
			</div>
			<div style="clear: both; padding: 5px"></div>
		</div>
		<div class="col-sm-4" id="editPatwari" style="color: #e95a0e; display: none">
			<label>Update Patwari Detail</label>
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
                        'required' => 'required',
                        'name' => 'txtpaContact',
                        'id' => 'txtpaContact',
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
			<div class="input-group" style="width: 100%; text-align: right">
				<button type="submit" class="btn btn-danger"> Update </button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>