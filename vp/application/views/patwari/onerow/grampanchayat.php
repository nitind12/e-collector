<div class="panel-heading" style="background: #ffffcc; font-weight: bold;">
                                        GRAM PANCHAYAT DETAIL
                                    </div>
                                    <div class="panel-body">
                                        <?php echo form_open('web/updategrampanchayat/'.$village_name.'/'.$detailid, array('name' => 'frmTehsil', 'id' => 'frmTehsil', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Gram Panchayat Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Gram Panchayat Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtGramPanchayat',
                                                'id' => 'txtGramPanchayat',
                                                'value' => $grampanchayatname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Gram Pradhan Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Gram Pradhan Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtGramPradhan',
                                                'id' => 'txtGramPradhan',
                                                'value' => $grampradhanname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Gram Pradhan Phone Number</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Gram Pradhan Phone Number',
                                                'class' => 'required form-control',
                                                'pattern' => '[0-9]*',
                                                'maxlength' => 10,
                                                'oninvalid'=>"setCustomValidity('Plz enter 10 digit Contact Number')",
                                                'onchange'=>"try{setCustomValidity('')}catch(e){}",
                                                'name' => 'txtPradhanPhone',
                                                'id' => 'txtPradhanPhone',
                                                'value' => $grampradhanphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class='col-sm-12'><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Gram Vikas Adhikari Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Gram Vikas Adhikari Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtGramVikasAdhikari',
                                                'id' => 'txtGramVikasAdhikari',
                                                'value' => $gramvikasadhikariname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Gram Vikas Adhikari Phone</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Gram Vikas Adhikari Phone Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtGramVikasAdhikariPhone',
                                                'id' => 'txtGramVikasAdhikariPhone',
                                                'value' => $gramvikasadhikariphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>

                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Gram Panchayat Adhikari Name</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Gram Panchayat Adhikari Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtGramPanchAdhikari',
                                                'id' => 'txtGramPanchAdhikari',
                                                'value' => $grampanchayatadhikariname
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Gram Panchayat Adhikari Phone</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Gram Vikas Adhikari Phone Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtGramPanchAdhikariPhone',
                                                'id' => 'txtGramPanchAdhikariPhone',
                                                'value' => $grampanchayatadhikariphone
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class='col-sm-12'><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Number of Hamlet</label>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Number of Tok',
                                                'class' => 'required form-control',
                                                'name' => 'txtNoOfTok',
                                                'id' => 'txtNoOfTok',
                                                'value' => $numberoftok
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Names of Hamlet</label>
                                            <?php
                                            $data = array(
                                                'placeholder' => 'Names of Tok',
                                                'class' => 'required form-control',
                                                'style' => 'height: 100px',
                                                'name' => 'txtTokNames',
                                                'id' => 'txtTokNames',
                                                'value' => $namesoftok
                                            );
                                            echo form_textarea($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-sm-6" style="margin-top:30px;right:55px;">
                                            <button type="submit" class="btn btn-primary col-sm-4" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>