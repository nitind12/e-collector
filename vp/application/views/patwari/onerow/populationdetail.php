<div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        POPULATION DETAIL
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open('web/updatepopulation/'.$village_name.'/'.$detailid, array('name' => 'frmPopulation', 'id' => 'frmPopulation', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Census Year</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Census Year',
                                                'class' => 'required form-control',
                                                'name' => 'txtCensus',
                                                'id' => 'txtCensus',
                                                'value' => $censusyear
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Male Population</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Mail Population',
                                                'class' => 'required form-control',
                                                'name' => 'txtMalePopulation',
                                                'id' => 'txtMalePopulation',
                                                'value' => $malepopulation
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Female Population</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Female Population',
                                                'class' => 'required form-control',
                                                'name' => 'txtFemalePopulation',
                                                'id' => 'txtFemalePopulation',
                                                'value' => $femalepopulation
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Total Population</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Total Population',
                                                'class' => 'required form-control',
                                                'name' => 'txtTotalPopulation',
                                                'id' => 'txtTotalPopulation',
                                                'value' => $totalpopulation
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-12" style="margin-top:30px;right:55px;">
                                            <button type="submit" class="btn btn-primary col-lg-2 col-sm-12 col-md-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>