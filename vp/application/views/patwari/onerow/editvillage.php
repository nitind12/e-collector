<div class="panel-heading" style="background: #ffffff; font-weight: bold;">
                                        <?php echo form_open('web/updatevillage/'.$village_name.'/'.$detailid.'/'.$villageid, array('name' => 'frmDM', 'id' => 'frmDM', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group">
                                            <div style="float:right">
                                            <label>Village Name&nbsp;</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Village Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtVillageName',
                                                'id' => 'txtVillageName',
                                                'value' => $village_name,
                                            );
                                            echo form_input($data);
                                            ?>
                                            </div>
                                        </div>
                                        <div style="clear: both; padding: 2px"></div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-danger col-sm-3" style="width: auto"><span class="glyphicon glyphicon-check"></span> Update </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                        </div>
