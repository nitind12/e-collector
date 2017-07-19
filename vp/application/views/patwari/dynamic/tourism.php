<h4>&nbsp;</h4>
                                <!--Local Mela Detail-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        LOCAL MELA
                                    </div>

                                    <?php
                                        if(isset($editmela)){
                                            echo form_open('web/updatemela/'.$village_name.'/'.$detailid.'/'.$editmela->LOCALMELAID, array('name' => 'frmMela', 'id' => 'frmMela', 'role' => 'form', 'class' => 'form-inline')); 
                                            $melaname = $editmela->MELA_NAME;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open('web/entermela/'.$village_name.'/'.$detailid, array('name' => 'frmMela', 'id' => 'frmMela', 'role' => 'form', 'class' => 'form-inline')); 
                                            $melaname = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>
                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtMelaVillageID" id="txtMelaVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-6">
                                            <div class="form-group col-md-12 col-lg-8 col-xs-12">
                                                <label>Local Mela Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Local Mela Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtLocalMela',
                                                    'id' => 'txtLocalMela',
                                                    'required' => 'required',
                                                    'value' => $melaname
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12" style="margin-top:35px;">
                                                <?php echo $button_; ?>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3">Existing Mela</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($localmeladetail as $localmelaitem){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $localmelaitem->MELA_NAME; ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('web/editmela/'.$village_name.'/'.$detailid.'/'.$localmelaitem->LOCALMELAID);?>">Edit</a> | 
                                                                    <a href="<?php echo site_url('web/delmela/'.$village_name.'/'.$detailid.'/'.$localmelaitem->LOCALMELAID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Local Mela Detail-->

                                <!--Tourist Places Detail-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        TOURIST PLACES
                                    </div>
                                    <?php 
                                        if(isset($edittourplaces)){
                                            echo form_open_multipart('web/updatetourplaces/'.$village_name.'/'.$detailid.'/'.$edittourplaces->TPID, array('name' => 'frmTouristPlaces', 'id' => 'frmTouristPlaces', 'role' => 'form', 'class' => 'form-inline')); 
                                            $tplaces = $edittourplaces->TOURIST_PLACE;
                                            $tptid = $edittourplaces->TPTID;
                                            $tourplacepic = (($edittourplaces->PIC != 'x') ? $edittourplaces->PIC : '');;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open_multipart('web/entertourplaces/'.$village_name.'/'.$detailid, array('name' => 'frmTouristPlaces', 'id' => 'frmTouristPlaces', 'role' => 'form', 'class' => 'form-inline')); 
                                            $tplaces = '';
                                            $tptid = '';
                                            $tourplacepic = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>

                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txttouristplaceVillageID" id="txttouristplaceVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-8">
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Select Tourist Type </label>                                            
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'name' => 'touristType',
                                                    'class' => 'required form-control',
                                                    'id' => 'touristType',
                                                    'required' => 'required'
                                                );
                                                $options = array();
                                                $options[''] = 'Select';
                                                foreach($toristplacetype as $tourplacetypeitem){
                                                    $options[$tourplacetypeitem->TPTID] = $tourplacetypeitem->TOURIST_PLACE_TYPE;
                                                }
                                                echo form_dropdown($data, $options, $tptid);
                                                ?>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Tourist Place Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Tourist Place Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtTouristPlace',
                                                    'id' => 'txtTouristPlace',
                                                    'required' => 'required',
                                                    'value' => $tplaces
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div style="clear:both; padding: 5px"></div>
                                            <div class="form-group col-md-6 col-lg-6 col-xs-12">
                                            <label>Tourist Place Photo</label>
                                                <?php
                                                $data = array(
                                                    'type' => 'file',
                                                    'placeholder' => 'DM Photo',
                                                    'class' => 'required form-control',
                                                    'name' => 'tourPlacePic',
                                                    'id' => 'tourPlacePic',
                                                    'value' => ''
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div style="clear:both; padding: 5px"></div>
                                            <div class="form-group col-md-4 col-lg-4 col-xs-12">
                                                <div class="col-sm-12">
                                                    <?php if($tourplacepic != ''){ ?>
                                                        <img src="<?php echo base_url('assets_/pics/'.$tourplacepic); ?>" style="max-width: 200px" class="img-responsive" />
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url('assets_/pics/tourplace.jpg'); ?>" style="max-width: 200px" class="img-responsive" />
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div style="clear:both; padding: 5px"></div>
                                            <div class="form-group col-sm-4 col-xs-12" style="margin-top:35px;">
                                                <?php echo $button_; ?>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="5">Existing Places</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Pic</th>
                                                            <th>Type</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($toristplacedetail as $toristplaceitem){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <?php if(trim($toristplaceitem->PIC) != 'x' && trim($toristplaceitem->PIC) != ''){?>
                                                                    <td><a href="<?php echo base_url('assets_/pics/'.$toristplaceitem->PIC); ?>" target="_blank"><img src="<?php echo base_url('assets_/pics/'.$toristplaceitem->PIC); ?>" style="max-width: 30px" class="img-responsive" /></a></td>
                                                                <?php } else { ?>
                                                                    <td></td>
                                                                <?php } ?>
                                                                <td><?php echo $toristplaceitem->TOURIST_PLACE_TYPE; ?></td>
                                                                <td><?php echo $toristplaceitem->TOURIST_PLACE; ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('web/edittourplaces/'.$village_name.'/'.$detailid.'/'.$toristplaceitem->TPID);?>">Edit</a> | 
                                                                    <a href="<?php echo site_url('web/deltourplaces/'.$village_name.'/'.$detailid.'/'.$toristplaceitem->TPID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Tourist Places Detail-->

                                <!--Tourism Activity-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        TOURIST ACTIVITY
                                    </div>
                                    <?php
                                        if(isset($editactivity)) {
                                            echo form_open('web/updateactivity/'.$village_name.'/'.$detailid.'/'.$editactivity->TATID, array('name' => 'frmTourismActivity', 'id' => 'frmTourismActivity', 'role' => 'form', 'class' => 'form-inline')); 
                                            $activity = $editactivity->ACTIVITY_NAME_;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open('web/enteractivity/'.$village_name.'/'.$detailid, array('name' => 'frmTourismActivity', 'id' => 'frmTourismActivity', 'role' => 'form', 'class' => 'form-inline')); 
                                            $activity = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>

                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtactivityVillageID" id="txtactivityVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-8">
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Tourist Activity Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Tourist Activity Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtTouristActivity',
                                                    'id' => 'txtTouristActivity',
                                                    'required' => 'required',
                                                    'value' => $activity
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12" style="margin-top:35px;">
                                                <?php echo $button_; ?>
                                            </div>
                                            <?php echo form_close(); ?>
                                            <div class="col-xs-12"  style="margin-top:15px;">
                                                <div class="alert alert-info">
                                                    <p><span class="glyphicon glyphicon-alert"></span> Activities Like Trekking, Paragliding, Boating etc.</p>                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3">Existing Places</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($activitydetail as $activityitem){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $activityitem->ACTIVITY_NAME_; ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('web/editactivity/'.$village_name.'/'.$detailid.'/'.$activityitem->TATID);?>">Edit</a> | 
                                                                    <a href="<?php echo site_url('web/delactivity/'.$village_name.'/'.$detailid.'/'.$activityitem->TATID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Primary School Detail-->