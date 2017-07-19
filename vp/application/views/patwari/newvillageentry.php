<?php echo form_open_multipart('web/newVillageEntry', array('name' => 'frmNewVillage', 'id' => 'frmNewVillage', 'role' => 'form')); ?>
                <div class="form-group"> 
                    <label>Village Name</label>                  
                    <?php
                    $data = array(
                        'type' => 'text',
                        'autocomplete' => 'off',
                        'required' => 'required',
                        'placeholder' => 'Village Name',
                        'class' => 'required form-control',
                        'name' => 'txtNewVillageName',
                        'id' => 'txtNewVillageName',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="form-group">
                    <label>Village Picture</label>
                        <?php
                        $data = array(
                            'type' => 'file',
                            'placeholder' => 'DM Photo',
                            'class' => 'required form-control',
                            'name' => 'villagePicture',
                            'id' => 'villagePicture',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                </div>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span> &nbsp;SUBMIT </button>
                <?php echo form_close(); ?>
                <!--div class="alert alert-info">
                    <h4 style="color: #c32f10; font-weight: bold; border-bottom: #909090 solid 1px">Existing Village(s)</h4>
                    <div style="width: auto; height: 150px; overflow: auto">
                    <ul>
                        <?php foreach($villages as $villitem){?>
                            <li style="color:#000000">
                                <?php //echo ucfirst(strtolower($villitem->NAME_)); ?>  
                                <a href="<?php //echo site_url('web/patwariDasboard/village/'.str_replace(' ', '-',$villitem->NAME_).'/'.$villitem->ONEROWID.'/1');?>" class="btn btn-link"><span class="glyphicon glyphicon-edit"></span> Update Village</a>
                            </li>
                        <?php } ?>
                    </ul>
                    </div>
                </div-->