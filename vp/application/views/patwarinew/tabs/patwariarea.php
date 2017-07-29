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
                <div class="col-sm-12" style="overflow: auto; height: 450px; width: 100%" id="patwari_list_for_patwariArea_here">
                </div>
            </div>
            <div style="clear: both; padding: 5px"></div>
        </div>
        <div class="col-sm-4">
            <label>Patwari Area List <span id="palist_"></span></label>
            <div id="load_here_edit_patwari" style="float: right"></div>
            <hr />
            <div class="input-group" style="width: 100%; font-weight: bold; padding: 3px; text-align: right">
                <button type="button" class="btn btn-default btn-xs updatePatwariArea" style="float:right; border-radius: 3px" id="newPatwariArea">New</button>
            </div>
            <div style="clear: both; padding: 3px"></div>
            <div class="input-group" style="width: 100%">
                <div class="col-sm-12" style="overflow: auto; height: 450px; width: 100%; padding: 0px" id="patwari_area_list_here">
                </div>
            </div>
            <div style="clear: both; padding: 5px"></div>
        </div>
        <div class="col-sm-4" id="villageEntryPlace">
            <label class="dark_">Enter Patwari Area</label>
            <hr />
            <?php
                $data = array(
                    'name' => 'frmPatwariArea', 
                    'id' => 'frmPatwariArea', 
                    'role' => 'form', 
                    'class' => 'form-group'
                    );
                echo form_open('', $data);
            ?>
            <div class="input-group">
                <?php
                    $data = array(
                        'type' => 'hidden',
                        'placeholder' => 'PID',
                        'required' => 'required',
                        'name' => 'txtPatwariID_',
                        'id' => 'txtPatwariID_',
                        'value' => '',
                    );?>
                <?php
                    echo form_input($data);
                ?>
                <?php
                    $data = array(
                        'type' => 'hidden',
                        'placeholder' => 'PAID',
                        'required' => 'required',
                        'name' => 'txtPatwariAreaID',
                        'id' => 'txtPatwariAreaID',
                        'value' => '',
                    );?>
                <?php
                    echo form_input($data);
                ?>
                <label style="min-width: 82px; color: #000090">Patwari </label>
                <label style="color: #dd0379" id="patwari_name_for_patwariArea">| -</label>
            </div>
            <div style="clear: both; padding: 5px"></div>
            <div class="input-group">
                <?php
                    $data = array(
                        'type' => 'text',
                        'class' => 'required form-control disableInputpatwariArea',
                        'disabled'=>'disabled',
                        'required' => 'required',
                        'name' => 'txtPatwariArea',
                        'id' => 'txtPatwariArea',
                        'value' => '',
                    );?>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i>&nbsp;&nbsp;Patwari Area </span>
                <?php
                    echo form_input($data);
                ?>
            </div>
            <div style="clear: both; padding: 5px"></div>
            <hr />
            <div class="input-group" style="width: 100%;">
                <div style="float: right">
                <input type="submit" class="btn btn-success villageBtn" value="Submit" id="cmbPASubmit" name="cmbPASubmit" />
                <input type="reset" class="btn btn-default" value="Cancel" id="cmbPAReset" name="cmbPAReset" />
                </div>
                <div id="this_msg_for_patwari_area" style="float: left;color: #ff0000; font-weight: bold; font-style: italic; padding: 0px; width: auto; border:#ff0000 solid 0px"></div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>