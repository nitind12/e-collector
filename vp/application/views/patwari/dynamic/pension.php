<?php
    if(isset($editpensiondetail)){
        $choosen = $ptid = $editpensiondetail->PTID; 
        $pdetid = $editpensiondetail->PDETID;
        $pensionername = $editpensiondetail->NAME_;
        $father_husband = $editpensiondetail->FH_TYPE;
        $father_husband_name = $editpensiondetail->FATHER_HUSBAND_NAME_;
        $caste_ = $editpensiondetail->CAST_;
        $age_ = $editpensiondetail->DOB_AGE;
        $pensionNumber = $editpensiondetail->PENSION_NUMBER;
        $approvalDate = $editpensiondetail->APPROVAL_DATE;
        $retirementpost = $editpensiondetail->POST_AT_THE_TIME_OF_RETIREMENT;
        $dept_ = $editpensiondetail->DEPARTMENT;
        $amount_ = $editpensiondetail->AMOUNT;
        $button = '<button type="submit" name="btnSubmitPension" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
    } else {
        $choosen = '';
        $pensionername = '';
        $father_husband = '';
        $father_husband_name = '';
        $caste_ = '';
        $age_ = '';
        $pensionNumber = '';
        $approvalDate = '';
        $retirementpost = '';
        $dept_ = '';
        $amount_ = '';
        $button = '<button type="submit" name="btnSubmitPension" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
    }
?>
<h4>&nbsp;</h4>
                                <!--Pension Detail-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        <?php if(isset($editpensiondetail)){ ?>
                                            <?php echo form_open('web/updatepensioner/'.$village_name.'/'.$detailid.'/'.$pdetid, array('name' => 'frmPension', 'id' => 'frmPension', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <?php } else { ?>
                                            <?php echo form_open('web/enterpensioner/'.$village_name.'/'.$detailid.'/2', array('name' => 'frmPension', 'id' => 'frmPension', 'role' => 'form', 'class' => 'form-inline')); ?>
                                        <?php } ?>
                                        
                                        <div class="form-group col-md-12 col-lg-12 col-xs-12">
                                            <label>SELECT PENSION TYPE </label>                                            
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'name' => 'pensionType', 
                                                'class' => 'required form-control',
                                                'id' => 'pensionType',
                                                'required'=>'required'
                                            );
                                            $options = array();
                                            $options[''] = 'Select';
                                            foreach($pensiontype as $pensiontypeitem){
                                                $options[$pensiontypeitem->PTID] = ucwords(strtolower($pensiontypeitem->PENSION_TYPE_NAME));
                                            }
                                            echo form_dropdown($data, $options, $choosen);
                                            ?>
                                            <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtPensionVillageID" id="txtPensionVillageID" />
                                        </div>
                                    </div>
                                    <div class="panel-body">                                        
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Name</label><br>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Pensioners Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtName',
                                                'id' => 'txtName',
                                                'required'=>'required',
                                                'value' => $pensionername
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Father/Husband? </label>                                            
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'name' => 'father_or_husband',
                                                'class' => 'required form-control',
                                                'id' => 'father_or_husband',
                                            );
                                            $options = array();
                                            $options[''] = 'Select';
                                            $options['FATHER'] = 'FATHER';
                                            $options['HUSBAND'] = 'HUSBAND';
                                            echo form_dropdown($data, $options, $father_husband);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Father/Husband Name</label><br>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Father/Husband Name',
                                                'class' => 'required form-control',
                                                'name' => 'txtFHName',
                                                'id' => 'txtFHName',
                                                'value' => $father_husband_name
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Caste</label><br>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Caste',
                                                'class' => 'required form-control',
                                                'name' => 'txtCaste',
                                                'id' => 'txtCaste',
                                                'value' => $caste_
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Age</label><br>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Age',
                                                'class' => 'required form-control',
                                                'name' => 'txtAge',
                                                'id' => 'txtAge',
                                                'value' => $age_
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="col-sm-12"><hr></div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Pension Number</label><br>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Pension Number',
                                                'class' => 'required form-control',
                                                'name' => 'txtPensionNumber',
                                                'id' => 'txtPensionNumber',
                                                'required'=>'required',
                                                'value' => $pensionNumber
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Approval Date</label><br>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Approval Date',
                                                'class' => 'required form-control',
                                                'name' => 'txtApprovalDate',
                                                'id' => 'txtApprovalDate',
                                                'value' => $approvalDate
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Post at the time of Retirement</label><br>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Post at the time of Retirement',
                                                'class' => 'required form-control',
                                                'name' => 'txtPostRetirement',
                                                'id' => 'txtPostRetirement',
                                                'value' => $retirementpost
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div> 
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Department</label><br>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Department',
                                                'class' => 'required form-control',
                                                'name' => 'txtDept',
                                                'id' => 'txtDept',
                                                'value' => $dept_
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div> 
                                        <div class="form-group col-md-3 col-lg-3 col-xs-12">
                                            <label>Amount</label><br>
                                            <?php
                                            $data = array(
                                                'type' => 'text',
                                                'placeholder' => 'Amount',
                                                'class' => 'required form-control',
                                                'name' => 'txtAmount',
                                                'id' => 'txtAmount',
                                                'value' => $amount_
                                            );
                                            echo form_input($data);
                                            ?>
                                        </div>                                        
                                        <div class="form-group col-sm-3" style="margin-top:30px;">
                                            <?php echo $button; ?>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                                <!--End Pension Detail-->

                                <div class="panel-heading">
                                    <div class="panel-heading" style="background: #ccffff; font-weight: bold;">
                                        Existing Pensioners Detail
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Pensioner Name</th>
                                                        <th>Father/Husband</th>
                                                        <th>Father/Husband Name</th>
                                                        <th>Caste</th>
                                                        <th>Age</th>
                                                        <th>Pension Number</th>
                                                        <th>Approval Date</th>
                                                        <th>Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $pensionloop = 1; ?>
                                                    <?php foreach($pensionerdetail as $pensionitem){?>
                                                    <tr>
                                                        <td><?php echo $pensionloop; ?></td>
                                                        <td><?php echo $pensionitem->NAME_; ?></td>
                                                        <td><?php echo $pensionitem->FH_TYPE; ?></td>
                                                        <td><?php echo $pensionitem->FATHER_HUSBAND_NAME_; ?></td>
                                                        <td><?php echo $pensionitem->CAST_; ?></td>
                                                        <td><?php echo $pensionitem->DOB_AGE; ?></td>
                                                        <td><?php echo $pensionitem->PENSION_NUMBER; ?></td>
                                                        <td><?php echo $pensionitem->APPROVAL_DATE; ?></td>
                                                        <td><?php echo $pensionitem->AMOUNT; ?></td>
                                                        <td>
                                                            <a href="<?php echo site_url('web/editPensionDetail/'.$village_name.'/'.$detailid.'/'.$pensionitem->PDETID);?>">Edit</a> | 
                                                            <a href="<?php echo site_url('web/delPensionDetail/'.$village_name.'/'.$detailid.'/'.$pensionitem->PDETID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                        </td>
                                                    </tr>
                                                    <?php $pensionloop++; ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
