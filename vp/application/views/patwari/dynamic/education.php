<h4>&nbsp;</h4>
                                <!--Primary School Detail-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        PRIMARY SCHOOL
                                    </div>
                                    <?php
                                        if(isset($editprimary)){
                                            $primaryschool = $editprimary->SCHOOL_NAME;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            $primaryschool = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>
                                    <?php 
                                        if(isset($editprimary)){
                                            echo form_open('web/updateprimaryschool/'.$village_name.'/'.$detailid.'/'.$editprimary->SCHID, array('name' => 'frmPrimary', 'id' => 'frmPrimary', 'role' => 'form', 'class' => 'form-inline'));
                                        } else {
                                            echo form_open('web/enterprimaryschool/'.$village_name.'/'.$detailid, array('name' => 'frmPrimary', 'id' => 'frmPrimary', 'role' => 'form', 'class' => 'form-inline'));
                                        }
                                    ?>
                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtEducationVillageID" id="txtEducationVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-6">
                                            <div class="form-group col-md-12 col-lg-8 col-xs-12">
                                                <label>Primary School Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Primary School Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtPrimarySchool',
                                                    'id' => 'txtPrimarySchool',
                                                    'value' => $primaryschool
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
                                                            <th colspan="3">Existing Primary School</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($primaryschooldetail as $primaryschoolitem){?>
                                                            <tr>
                                                                <td><?php echo $i++;?></td>
                                                                <td><?php echo $primaryschoolitem->SCHOOL_NAME; ?></td>
                                                                <td>
                                                            <a href="<?php echo site_url('web/editprimaryschool/'.$village_name.'/'.$detailid.'/'.$primaryschoolitem->SCHID);?>">Edit</a> | 
                                                            <a href="<?php echo site_url('web/delprimaryschool/'.$village_name.'/'.$detailid.'/'.$primaryschoolitem->SCHID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
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

                                <!--Middle School Detail-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        MIDDLE SCHOOL
                                    </div>
                                    <?php 
                                    if(isset($editmiddle)){
                                        echo form_open('web/updatemiddleschool/'.$village_name.'/'.$detailid. '/'.$editmiddle->SCHID, array('name' => 'frmmiddle', 'id' => 'frmmiddle', 'role' => 'form', 'class' => 'form-inline'));
                                    } else {
                                        echo form_open('web/entermiddleschool/'.$village_name.'/'.$detailid, array('name' => 'frmmiddle', 'id' => 'frmmiddle', 'role' => 'form', 'class' => 'form-inline'));
                                    } ?>
                                    <?php
                                        if(isset($editmiddle)){
                                            $middleschool = $editmiddle->SCHOOL_NAME;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            $middleschool = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>
                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtEducationmiddleVillageID" id="txtEducationmiddleVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-6">
                                            <div class="form-group col-md-12 col-lg-8 col-xs-12">
                                                <label>Middle School Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Middle School Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtMiddleSchool',
                                                    'id' => 'txtMiddleSchool',
                                                    'value' => $middleschool
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
                                                            <th colspan="3">Existing Middle School</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($middleschooldetail as $middleschoolitem){ ?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $middleschoolitem->SCHOOL_NAME; ?></td>
                                                            <td><a href="<?php echo site_url('web/editmiddleschool/'.$village_name.'/'.$detailid.'/'.$middleschoolitem->SCHID);?>">Edit</a> | 
                                                            <a href="<?php echo site_url('web/delmiddleschool/'.$village_name.'/'.$detailid.'/'.$middleschoolitem->SCHID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
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

                                <!--Private School Detail-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        PRIVATE SCHOOL
                                    </div>
                                    <?php
                                        if(isset($editprivate)){ 
                                            echo form_open('web/updateprivateschool/'.$village_name.'/'.$detailid.'/'.$editprivate->SCHID, array('name' => 'frmPrivate', 'id' => 'frmPrivate', 'role' => 'form', 'class' => 'form-inline')); 
                                            $privateschool = $editprivate->SCHOOL_NAME;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open('web/enterprivateschool/'.$village_name.'/'.$detailid, array('name' => 'frmPrivate', 'id' => 'frmPrivate', 'role' => 'form', 'class' => 'form-inline')); 
                                            $privateschool = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }   
                                    ?>
                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtEducationprivateVillageID" id="txtEducationprivateVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-6">
                                            <div class="form-group col-md-12 col-lg-8 col-xs-12">
                                                <label>Private School Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Private School Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtPrivateSchool',
                                                    'id' => 'txtPrivateSchool',
                                                    'value' => $privateschool
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
                                                            <th colspan="3">Existing Private School</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($privateschooldetail as $privatechoolitem){ ?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $privatechoolitem->SCHOOL_NAME; ?></td>
                                                            <td><a href="<?php echo site_url('web/editprivateschool/'.$village_name.'/'.$detailid.'/'.$privatechoolitem->SCHID);?>">Edit</a> | 
                                                            <a href="<?php echo site_url('web/delprivateschool/'.$village_name.'/'.$detailid.'/'.$privatechoolitem->SCHID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Private School Detail-->

                                <!--Higher Education Detail-->
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        COLLEGE
                                    </div>
                                    <?php 
                                        if(isset($editcollege)){
                                            echo form_open('web/updatecollege/'.$village_name.'/'.$detailid.'/'.$editcollege->SCHID, array('name' => 'frmCollage', 'id' => 'frmCollage', 'role' => 'form', 'class' => 'form-inline')); 
                                            $college = $editcollege->COLLEGE_NAME;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open('web/entercollege/'.$village_name.'/'.$detailid, array('name' => 'frmCollage', 'id' => 'frmCollage', 'role' => 'form', 'class' => 'form-inline')); 
                                            $college = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>
                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtEducationcollegeVillageID" id="txtEducationcollegeVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-6">
                                            <div class="form-group col-md-12 col-lg-8 col-xs-12">
                                                <label>Collage Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'Collage Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtCollege',
                                                    'id' => 'txtCollege',
                                                    'value' => $college
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
                                                            <th colspan="3">Existing Collages</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($collegedetail as $collegeitem){ ?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $collegeitem->COLLEGE_NAME; ?></td>
                                                            <td><a href="<?php echo site_url('web/editcollege/'.$village_name.'/'.$detailid.'/'.$collegeitem->SCHID);?>">Edit</a> | 
                                                            <a href="<?php echo site_url('web/delcollege/'.$village_name.'/'.$detailid.'/'.$collegeitem->SCHID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background: #ffffcc; font-weight: bold; height:50px;">
                                        UNIVERSITY
                                    </div>
                                    <?php 
                                        if(isset($edituniv)){
                                            echo form_open('web/updateuniversity/'.$village_name.'/'.$detailid.'/'.$edituniv->SCHID, array('name' => 'frmUniv', 'id' => 'frmUniv', 'role' => 'form', 'class' => 'form-inline')); 
                                            $univname = $edituniv->UNIV_NAME;
                                            $button_ = '<button type="submit" class="btn btn-danger col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Update </button>';
                                        } else {
                                            echo form_open('web/enteruniversity/'.$village_name.'/'.$detailid, array('name' => 'frmUniv', 'id' => 'frmUniv', 'role' => 'form', 'class' => 'form-inline')); 
                                            $univname = '';
                                            $button_ = '<button type="submit" class="btn btn-primary col-sm-12" style="float: right;"><span class="glyphicon glyphicon-check"></span> Submit </button>';
                                        }
                                    ?>
                                    <input type="hidden" style="float: right" value="<?php echo $villageid; ?>" name="txtEducationunivVillageID" id="txtEducationunivVillageID" />
                                    <div class="panel-body"> 
                                        <div class="col-sm-6">
                                            <div class="form-group col-md-12 col-lg-8 col-xs-12">
                                                <label>University Name</label><br>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'placeholder' => 'University Name',
                                                    'class' => 'required form-control',
                                                    'name' => 'txtUniv',
                                                    'id' => 'txtUniv',
                                                    'value' => $univname
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
                                                            <th colspan="3">Existing University</th>
                                                        </tr>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; ?>
                                                        <?php foreach($univdetail as $univitem){ ?>
                                                        <tr>
                                                            <td><?php echo $i++;?></td>
                                                            <td><?php echo $univitem->UNIV_NAME; ?></td>
                                                            <td><a href="<?php echo site_url('web/edituniv/'.$village_name.'/'.$detailid.'/'.$univitem->SCHID);?>">Edit</a> | 
                                                            <a href="<?php echo site_url('web/deluniv/'.$village_name.'/'.$detailid.'/'.$univitem->SCHID);?>"  onclick="return confirm('Are you sure you want to delete?')">Del</a>
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