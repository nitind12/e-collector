<div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        PDS &amp; Road Details
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open('web/pdsroaddetail/'.$village_name.'/'.$detailid, array('name' => 'frmOther', 'id' => 'frmOther', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>PDS Shop Owner Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'PDS Shop Owner Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtPDSName',
                                                'id' => 'txtPDSName',
                                                'value' => $pdsshopownernme
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>PDS Shop Owner Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'PDS Shop Owner Phone Number',
                                                'pattern' => '[0-9]*',
                                                'maxlength' => 10,
                                                'oninvalid'=>"setCustomValidity('Plz enter 10 digit Contact Number')",
                                                'onchange'=>"try{setCustomValidity('')}catch(e){}",
                                                'class' => 'required form-control',
                                                'name' => 'txtShopPhoneNumber',
                                                'id' => 'txtShopPhoneNumber',
                                                'value' => $pdsshopownerphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Approach Road Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Approach Road Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtApproachName',
                                                'id' => 'txtApproachName',
                                                'value' => $approachroadname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Construction Agency</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Construction Agency Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtConsAgency',
                                                'id' => 'txtConsAgency',
                                                'value' => $constructionagency
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label for="txtGender">Pakka/kachcha</label><br>
                                            <?php
                                            if($pakkakachcha == 'x' || $pakkakachcha == ''){
                                                $data = array(
                                                'type' => 'radio',
                                                'required' => 'required',
                                                'name' => 'optpakkkachcha',
                                                'id' => 'pakka',
                                                'value' => 'Pakka',
                                            );
                                            echo form_input($data);
                                            ?> Pakka &nbsp;&nbsp;&nbsp;
                                            <?php
                                            $data = array(
                                                'type' => 'radio',
                                                'required' => 'required',
                                                'name' => 'optpakkkachcha',
                                                'id' => 'kachcha',
                                                'value' => 'Kachcha',
                                            );
                                            echo form_input($data);
                                            ?> Kachcha 
                                            <?php
                                            } else if($pakkakachcha == 'Pakka') {
                                                $data = array(
                                                'type' => 'radio',
                                                'required' => 'required',
                                                'name' => 'optpakkkachcha',
                                                'id' => 'pakka',
                                                'value' => 'Pakka',
                                                'checked' => 'checked'
                                            );
                                            echo form_input($data);
                                            ?> Pakka &nbsp;&nbsp;&nbsp;
                                            <?php
                                            $data = array(
                                                'type' => 'radio',
                                                'required' => 'required',
                                                'name' => 'optpakkkachcha',
                                                'id' => 'kachcha',
                                                'value' => 'Kachcha',
                                                
                                            );
                                            echo form_input($data);
                                            ?> Kachcha 
                                            <?php
                                            } else if($pakkakachcha == 'Kachcha'){
                                                $data = array(
                                                'type' => 'radio',
                                                'required' => 'required',
                                                'name' => 'optpakkkachcha',
                                                'id' => 'pakka',
                                                'value' => 'Pakka',
                                            );
                                            echo form_input($data);
                                            ?> Pakka &nbsp;&nbsp;&nbsp;
                                            <?php
                                            $data = array(
                                                'type' => 'radio',
                                                'required' => 'required',
                                                'name' => 'optpakkkachcha',
                                                'id' => 'kachcha',
                                                'value' => 'Kachcha',
                                                'checked' => 'checked'
                                            );
                                            echo form_input($data);
                                            ?> Kachcha 
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Trek Distance</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Trek Distance',
                                                'class' => 'required form-control',
                                                'name' => 'txtTrekDistance',
                                                'id' => 'txtTrekDistance',
                                                'value' => $trekdistance
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Landslide Zone Name(On the Road)</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Landslide Zone Name(On the Road)',
                                                'class' => 'required form-control',
                                                'name' => 'txtLandSlideZone',
                                                'id' => 'txtLandSlideZone',
                                                'value' => $landslidezonename
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Alternate Route Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Alternate Route Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtAlternateRouteName',
                                                'id' => 'txtAlternateRouteName',
                                                'value' => $alternateroutename
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Alternate Route Type</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Alternate Route Type',
                                                'class' => 'required form-control',
                                                'name' => 'txtAlternateRouteType',
                                                'id' => 'txtAlternateRouteType',
                                                'value' => $alternateroutetype
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Alternate Route Distance</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Alternate Route Distance',
                                                'class' => 'required form-control',
                                                'name' => 'txtAlternateRouteDistance',
                                                'id' => 'txtAlternateRouteDistance',
                                                'value' => $alternateroutedistance
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label for="txtGender">Electricity in Village</label><br>
                                            <?php
                                                if($electricity == 'x' || $electricity == ''){
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optElectricity',
                                                        'id' => 'electricityyes',
                                                        'value' => 'Yes'
                                                    );
                                                    echo form_input($data);
                                                    ?> Yes &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optElectricity',
                                                        'id' => 'electricityno',
                                                        'value' => 'No',
                                                    );
                                                    echo form_input($data);
                                                    ?> No
                                                    <?php
                                                } else if($electricity == 'Yes'){
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optElectricity',
                                                        'id' => 'electricityyes',
                                                        'value' => 'Yes',
                                                        'checked' => 'checked',
                                                    );
                                                    echo form_input($data);
                                                    ?> Yes &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optElectricity',
                                                        'id' => 'electricityno',
                                                        'value' => 'No',
                                                    );
                                                    echo form_input($data);
                                                    ?> No
                                                    <?php
                                                } else if($electricity == 'No'){
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optElectricity',
                                                        'id' => 'electricityyes',
                                                        'value' => 'Yes',
                                                    );
                                                    echo form_input($data);
                                                    ?> Yes &nbsp;&nbsp;&nbsp;
                                                    <?php
                                                    $data = array(
                                                        'type' => 'radio',
                                                        'required' => 'required',
                                                        'name' => 'optElectricity',
                                                        'id' => 'electricityno',
                                                        'value' => 'No',
                                                        'checked' => 'checked',
                                                    );
                                                    echo form_input($data);
                                                    ?> No
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-9" style="margin-top:30px;right:55px;">
                                            <button type="submit" class="btn btn-primary col-lg-3 col-sm-3 col-md-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>