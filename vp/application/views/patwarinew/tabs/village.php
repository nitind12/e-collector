<style>
	.orange{
		color: #900000;
	}
	.orange_{
		color: #f55202;
		border: #f55202 solid 1px;
	}
	.dark_{
		color: #000000;	
	}
	.myplaceholder::-webkit-input-placeholder {
	    color: #fdf1fe
	}

</style>
<div class="row">
	<div class="col-sm-12">
		<div class="col-sm-4">
			<label>Patwari's List</label>
			<hr />
			<div class="input-group" style="width: 100%">
				<div class="col-sm-12" style="overflow: auto; height: 450px; width: 100%" id="patwari_list_for_villages_here">
				</div>
			</div>
			<div style="clear: both; padding: 5px"></div>
		</div>
		<div class="col-sm-4">
			<label>Village's List <span id="vlist_"></span></label>
            <div id="load_here_edit_actinact_village" style="float: right"></div>
			<hr />
			<div class="input-group" style="width: 100%; font-weight: bold; padding: 3px; text-align: right">
				<button type="button" class="btn btn-default btn-xs updateVillage" style="float:right; border-radius: 3px" id="newVillage">New</button>
			</div>
			<div style="clear: both; padding: 3px"></div>
			<div class="input-group" style="width: 100%">
				<div class="col-sm-12" style="overflow: auto; height: 450px; width: 100%; padding: 0px" id="village_list_here">
				</div>
			</div>
			<div style="clear: both; padding: 5px"></div>
		</div>
		<div class="col-sm-4" id="villageEntryPlace">
			<label class="dark_">Enter Village Detail</label>
			<hr />
			<?php
				$data = array(
					'name' => 'frmVillage', 
					'id' => 'frmVillage', 
					'role' => 'form', 
					'class' => 'form-group'
					);
				echo form_open('', $data);
			?>
			<input type="hidden" id="patwari_id_for_village" name="patwari_id_for_village" />
			<div class="input-group">
				<?php
					$data = array(
                        'type' => 'hidden',
                        'required' => 'required',
                        'name' => 'txtPatwariID',
                        'id' => 'txtPatwariID',
                        'value' => '',
                    );?>
                <?php
                    echo form_input($data);
                ?>
                <?php
					$data = array(
                        'type' => 'hidden',
                        'required' => 'required',
                        'name' => 'txtVillageID',
                        'id' => 'txtVillageID',
                        'value' => '',
                    );?>
                <?php
                    echo form_input($data);
                ?>
                <?php
					$data = array(
                        'type' => 'hidden',
                        'required' => 'required',
                        'name' => 'txtDistrict',
                        'id' => 'txtDistrict',
                        'value' => 'Nainital',
                    );?>
                <?php
                    echo form_input($data);
                ?>
                <label style="min-width: 60px; color: #000090">Patwari </label>
                <label style="color: #dd0379" id="patwari_name_for_village">| -</label>
                <br />
                <label style="min-width: 60px; color: #000090">Village </label>
                <label style="color: #dd0379" id="village_name_for_village">| -</label>
			</div>
			<div style="clear: both; padding: 5px"></div>
			<div class="input-group">
				<?php
					$data = array(
                        'type' => 'text',
                        'class' => 'required form-control disableInputVillageArea',
                        'disabled'=>'disabled',
                        'required' => 'required',
                        'name' => 'txtVillageName',
                        'id' => 'txtVillageName',
                        'value' => '',
                    );?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i> Village Name</span>
                <?php
                    echo form_input($data);
                ?>
			</div>
			<div style="clear: both; padding: 5px"></div>
			<?php
				$village_master = array(
						array('txtKanoongoArea','Kanoongo Area'),
						array('txtGramPanchayat','Gram Panchayat'),
						array('txtNyayPanchayat','Nyay Panchayat'),
						array('txtVanPanchayat','Van Panchayat'),
						array('txtParliamentaryCons','Parliamentary Constituency'),
						array('txtAssemblyCons','Assembly Constituency'),
						array('txtPollingBoothName','Polling Booth Name'),
						array('txtRegularRevenuePolice','Regular/Revenue Police')
					);
			?>
			<?php for ($i=0; $i<count($village_master);$i++) { ?>
			<div class="input-group">
				<?php
					$data = array(
                        'type' => 'text',
                        'class' => 'required form-control disableInputVillageArea',
                        'disabled'=>'disabled',
                        'name' => $village_master[$i][0],
                        'id' => $village_master[$i][0],
                        'value' => '',
                    );?>
                    <span class="input-group-addon" title="<?php echo $village_master[$i][1];?>" style="text-align: left; font-weight: bold; font-size: 11px;">
                    <?php echo $village_master[$i][1];?></span>
                <?php
                    echo form_input($data);
                ?>
			</div>
			<div style="clear: both; padding: 5px"></div>
			<?php } ?>
			<hr />
			<div class="input-group" style="width: 100%;">
                <div style="float: right">
                <input type="submit" class="btn btn-success villageBtn" value="Submit" id="cmbVillageSubmit" name="cmbVillageSubmit" />
                <input type="reset" class="btn btn-default" value="Cancel" id="cmbVillageReset" name="cmbVillageReset" />
                </div>
                <div id="this_msg_for_village" style="float: left;color: #ff0000; font-weight: bold; font-style: italic; padding: 0px; width: auto; border:#ff0000 solid 0px"></div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>