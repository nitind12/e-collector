<div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        ELECTION
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open('web/election/'.$village_name.'/'.$detailid, array('name' => 'frmElective', 'id' => 'frmElective', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Parliamentry Constituency</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Parliamentry Constituency Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtParliamentryName',
                                                'id' => 'txtParliamentryName',
                                                'value' => $parliamentaryconstituency
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>MP Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'MP Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtMPName',
                                                'id' => 'txtMPName',
                                                'value' => $mapname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Assembly Constituency</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Assembly Constituency Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtAssemblyName',
                                                'id' => 'txtAssemblyName',
                                                'value' => $assemblyconstituency
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>MLA Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'MLA Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtMLAName',
                                                'id' => 'txtMLAName',
                                                'value' => $mlaname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Polling Booth Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Polling Booth Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtBoothName',
                                                'id' => 'txtBoothName',
                                                'value' => $polingboothname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Village under Polling Booth</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Polling Booth Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtVillagesUnderBooth',
                                                'id' => 'txtVillagesUnderBooth',
                                                'value' => $villagesunderpolingbooth
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>BLO Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'BLO Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtBLOName',
                                                'id' => 'txtBLOName',
                                                'value' => $bloname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>BLO Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'BLO Phone Number',
                                                'pattern' => '[0-9]*',
                                                'maxlength' => 10,
                                                'oninvalid'=>"setCustomValidity('Plz enter 10 digit Contact Number')",
                                                'onchange'=>"try{setCustomValidity('')}catch(e){}",
                                                'class' => 'required form-control',
                                                'name' => 'txtBLOPhoneNumber',
                                                'id' => 'txtBLOPhoneNumber',
                                                'value' => $blophone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-3" style="margin-top:30px;right:55px;">
                                            <button type="submit" class="btn btn-primary col-lg-9 col-sm-12 col-md-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>