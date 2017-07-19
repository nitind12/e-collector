<h4>&nbsp;</h4>
                                <!--Nearest Town-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        NEAREST TOWN
                                    </div>
                                    <?php 
                                        if(isset($editnearesttown)){
                                            echo form_open('web/updatenearesttown/'.$village_name.'/'.$detailid.'/'.$editnearesttown->NEARESTTOWNID, array('name' => 'frmTown', 'id' => 'frmTown', 'role' => 'form', 'class' => 'form-inline'));
                                            $nearesttown = $editnearesttown->NAME_;
                                            $distance = $editnearesttown->DISTANCE_FROM_VILLAGE;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open('web/enternearesttown/'.$village_name.'/'.$detailid, array('name' => 'frmTown', 'id' => 'frmTown', 'role' => 'form', 'class' => 'form-inline'));
                                            $nearesttown = '';
                                            $distance = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>
                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtNearestTownVillageID" id="txtNearestTownVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-8">
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Nearest Town Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Nearest Town Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtNearestTown',
                                                    'id' => 'txtNearestTown',
                                                    'required' => 'required',
                                                    'value' => $nearesttown
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Distance from Village (KM)</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Distance From Village',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtDistanceFromVillage',
                                                    'id' => 'txtDistanceFromVillage',
                                                    'required' => 'required',
                                                    'value' => $distance
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12" style="margin-top:35px;">
                                                <?php echo $button_;?>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="4">Existing Nearest Town</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Distance from village</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($nearesttowndetail as $nearesttownitem){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $nearesttownitem->NAME_; ?></td>
                                                                <td><?php echo $nearesttownitem->DISTANCE_FROM_VILLAGE; ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('web/editnearesttown/'.$village_name.'/'.$detailid.'/'.$nearesttownitem->NEARESTTOWNID);?>">Edit</a> | 
                                                                    <a href="<?php echo site_url('web/delnearesttown/'.$village_name.'/'.$detailid.'/'.$nearesttownitem->NEARESTTOWNID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Nearest Town Detail-->

                                <!--Bank ATM Detail-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        BANK /ATM DETAIL
                                    </div>
                                    <?php
                                        if(isset($editbankatm)){
                                            echo form_open('web/updatebankatm/'.$village_name.'/'.$detailid.'/'.$editbankatm->BANKATMID, array('name' => 'frmBankAtm', 'id' => 'frmBankAtm', 'role' => 'form', 'class' => 'form-inline')); 
                                            $bank_atm = $editbankatm->TYPE_;
                                            $bank_atm_name = $editbankatm->NAME_;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>'; 
                                        } else {
                                            echo form_open('web/enterbankatm/'.$village_name.'/'.$detailid, array('name' => 'frmBankAtm', 'id' => 'frmBankAtm', 'role' => 'form', 'class' => 'form-inline')); 
                                            $bank_atm = '';
                                            $bank_atm_name = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>
                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtbankatmVillageID" id="txtbankatmVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-8">
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Select Type (BANK/ATM)</label>                                            
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'name' => 'BAType',
                                                    'class' => 'required form-control',
                                                    'id' => 'BAType',
                                                    'required' => 'required'
                                                );
                                                $options = array();
                                                $options[''] = 'Select';
                                                foreach ($bankatmtype as $bankatmtypeitem) {
                                                   $options[$bankatmtypeitem->TYPEID] = $bankatmtypeitem->NAME_;
                                                }
                                                echo form_dropdown($data, $options, $bank_atm);
                                                ?>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Bank/ATM Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtBankAtmName',
                                                    'id' => 'txtBankAtmName',
                                                    'required' => 'required',
                                                    'value' => $bank_atm_name
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
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
                                                            <th colspan="4">Existing Bank/ATM</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Type</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($bankatmdetail as $bankatmitem){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $bankatmitem->TYPE_NAME; ?></td>
                                                                <td><?php echo $bankatmitem->NAME_; ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('web/editbankatm/'.$village_name.'/'.$detailid.'/'.$bankatmitem->BANKATMID);?>">Edit</a> | 
                                                                    <a href="<?php echo site_url('web/delbankatm/'.$village_name.'/'.$detailid.'/'.$bankatmitem->BANKATMID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Bank/ATM Detail-->

                                <!--Industry Detail-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        VILLAGE INDUSTRY DETAIL
                                    </div>
                                    <?php
                                        if(isset($editindustry)){
                                            echo form_open('web/updateindustry/'.$village_name.'/'.$detailid.'/'.$editindustry->VIID, array('name' => 'frmIndustry', 'id' => 'frmIndustry', 'role' => 'form', 'class' => 'form-inline')); 
                                            $industrytype_ = $editindustry->INDUSTRY_TYPE;
                                            $industry = $editindustry->INDUSTRY;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open('web/enterindustry/'.$village_name.'/'.$detailid, array('name' => 'frmIndustry', 'id' => 'frmIndustry', 'role' => 'form', 'class' => 'form-inline')); 
                                            $industrytype_ = '';
                                            $industry = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>

                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtindustryVillageID" id="txtindustryVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-8">
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Select Industry Type</label>                                            
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'name' => 'industryType',
                                                    'class' => 'required form-control',
                                                    'id' => 'industryType',
                                                    'required' => 'required'
                                                );
                                                $options = array();
                                                $options[''] = 'Select';
                                                foreach($industrytype as $industrytypeitem){
                                                    $options[$industrytypeitem->TYPEID] = $industrytypeitem->NAME_;
                                                }
                                                echo form_dropdown($data, $options, $industrytype_);
                                                ?>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Industry Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Industry Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtIndustryName',
                                                    'id' => 'txtIndustryName',
                                                    'required' => 'required',
                                                    'value' => $industry
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
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
                                                            <th colspan="4">Existing Industry</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Type</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($industrydetail as $industrydetailitem){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $industrydetailitem->TYPE_NAME; ?></td>
                                                                <td><?php echo $industrydetailitem->INDUSTRY; ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('web/editindustry/'.$village_name.'/'.$detailid.'/'.$industrydetailitem->VIID);?>">Edit</a> | 
                                                                    <a href="<?php echo site_url('web/delindustry/'.$village_name.'/'.$detailid.'/'.$industrydetailitem->VIID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Bank/ATM Detail-->

                                <!--Proposed Helipad-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        PROPOSED HELIPAD SITE
                                    </div>
                                    <?php
                                        if(isset($edithelipad)){
                                            echo form_open('web/updatehelipad/'.$village_name.'/'.$detailid.'/'.$edithelipad->PHDID, array('name' => 'frmProposedHelipad', 'id' => 'frmProposedHelipad', 'role' => 'form', 'class' => 'form-inline')); 
                                            $ownername = $edithelipad->LAND_OWNER_NAME_;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open('web/enterhelipad/'.$village_name.'/'.$detailid, array('name' => 'frmProposedHelipad', 'id' => 'frmProposedHelipad', 'role' => 'form', 'class' => 'form-inline')); 
                                            $ownername = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>
                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txthelipadVillageID" id="txthelipadVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-8">
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Land-Owner Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Land-Owner Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtLandOwnerName',
                                                    'id' => 'txtLandOwnerName',
                                                    'required' => 'required',
                                                    'value' => $ownername
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
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
                                                            <th colspan="3">Existing Land-Owner</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Land Owner name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($helipaddetail as $helipaddetailitem){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $helipaddetailitem->LAND_OWNER_NAME_; ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('web/edithelipad/'.$village_name.'/'.$detailid.'/'.$helipaddetailitem->PHDID);?>">Edit</a> | 
                                                                    <a href="<?php echo site_url('web/delhelipad/'.$village_name.'/'.$detailid.'/'.$helipaddetailitem->PHDID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Proposed Helipad Detail-->

                                <!--Shelter Town-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        PROPOSED SHELTER PLACE
                                    </div>
                                    <?php 
                                        if(isset($editshelter)){
                                            echo form_open('web/updateshelter/'.$village_name.'/'.$detailid.'/'.$editshelter->PSDID, array('name' => 'frmShelter', 'id' => 'frmShelter', 'role' => 'form', 'class' => 'form-inline')); 
                                            $shelter = $editshelter->SHELTER_NAME;
                                            $capacity = $editshelter->CAPACITY;
                                            $water = $editshelter->WATER;
                                            $electricity = $editshelter->ELECTRICITY;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open('web/entershelter/'.$village_name.'/'.$detailid, array('name' => 'frmShelter', 'id' => 'frmShelter', 'role' => 'form', 'class' => 'form-inline')); 
                                            $shelter = '';
                                            $capacity = '';
                                            $water = '';
                                            $electricity = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>

                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtshelterVillageID" id="txtshelterVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-8">
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Shelter Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Shelter Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtShelterName',
                                                    'id' => 'txtShelterName',
                                                    'required' => 'required',
                                                    'value' => $shelter
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Capacity</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Capacity',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtCapacity',
                                                    'id' => 'txtCapacity',
                                                    'required' => 'required',
                                                    'value' => $capacity
                                                );
                                                echo form_input($data);
                                                ?>
                                            </div>
                                            <div style="clear: both; padding: 5px"></div>
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Water?</label>   
                                                <br />                                         
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'name' => 'txtWater_yes_no',
                                                    'class' => 'required form-control',
                                                    'id' => 'txtWater_yes_no',
                                                    'required' => 'required'
                                                );
                                                $options = array();
                                                $options[''] = 'Select';
                                                $options['YES'] = 'YES';
                                                $options['NO'] = 'NO';
                                                echo form_dropdown($data, $options, $water);
                                                ?>
                                            </div>
                                            <div class="form-group col-md-12 col-lg-4 col-xs-12">
                                                <label>Electricity?</label>   
                                                <br />                                         
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'name' => 'txtelectricity_yes_no',
                                                    'class' => 'required form-control',
                                                    'id' => 'txtelectricity_yes_no',
                                                    'required' => 'required'
                                                );
                                                $options = array();
                                                $options[''] = 'Select';
                                                $options['YES'] = 'YES';
                                                $options['NO'] = 'NO';
                                                echo form_dropdown($data, $options, $electricity);
                                                ?>
                                            </div>
                                            <div class="form-group col-sm-4 col-xs-12" style="margin-top:35px;">
                                                <?php echo $button_;?>
                                            </div>
                                            <?php echo form_close(); ?>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="4">Existing Shelter Place</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Shelter Name</th>
                                                            <th>Capacity</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($shelterdetail as $shelterdetailitem){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $shelterdetailitem->SHELTER_NAME; ?></td>
                                                                <td><?php echo $shelterdetailitem->CAPACITY; ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('web/editshelter/'.$village_name.'/'.$detailid.'/'.$shelterdetailitem->PSDID);?>">Edit</a> | 
                                                                    <a href="<?php echo site_url('web/delshelter/'.$village_name.'/'.$detailid.'/'.$shelterdetailitem->PSDID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Nearest Town Detail-->