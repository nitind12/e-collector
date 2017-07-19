                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        LAND DETAILS
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open('web/updatelanddetail/'.$village_name.'/'.$detailid, array('name' => 'frmland', 'id' => 'frmland', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Total Land Holders</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Number of land Holders',
                                                'class' => 'required form-control',
                                                'name' => 'txtLandHolders',
                                                'id' => 'txtLandHolders',
                                                'value' => $totallandholders
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Total Area Under Cultivation (Hectare)</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Number of Total Cultivation Area',
                                                'class' => 'required form-control',
                                                'name' => 'txtCultivationArea',
                                                'id' => 'txtCultivationArea',
                                                'value' => $cultivationarea
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Total Government Land (Hectare)</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Number of Total Govt Land',
                                                'class' => 'required form-control',
                                                'name' => 'txtGovtLand',
                                                'id' => 'txtGovtLand',
                                                'value' => $totalgovtarea
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Total Landless People</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Total Landless People',
                                                'class' => 'required form-control',
                                                'name' => 'txtLandlessPeople',
                                                'id' => 'txtLandlessPeople',
                                                'value' => $landlesspeople
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Name of The Crop</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Van Panchayat Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtNameofCrop',
                                                'id' => 'txtNameofCrop',
                                                'value' => $cropname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Total Land Area of Village(Hectare)</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Total Land Area',
                                                'class' => 'required form-control',
                                                'name' => 'txtLandArea',
                                                'id' => 'txtLandArea',
                                                'value' => $totallandareaofvillage
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-6" style="margin-top:30px;right:55px;">
                                            <button type="submit" class="btn btn-primary col-sm-4" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>