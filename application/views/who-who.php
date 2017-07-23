<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">            
            <h1><a href="#">Who's Who</a></h1>
        </div>
    </div>
</div>
<div class="technology">
    <div class="container">
        <div class="col-md-6">            
            <div style="padding:30px; background: #fff;">
                <div class="panel-group" id="accordion">
                    <?php foreach ($dept as $department) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion" href="#dept<?php echo $department->WW1ID ?>">
                                    <h4><?php echo $department->DEPARTMENT; ?> </h4></a>
                            </div>
                            <div id="dept<?php echo $department->WW1ID ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
                                    foreach ($home as $homedata) {
                                        if ($homedata->WW1ID == $department->WW1ID) {
                                            ?>
                                            <table class="table table-striped table-bordered table-hover" style="background: #ffffde">
                                                <tr style="background: #feffb6">
                                                    <td colspan="3" style="color: #540000; font-weight: bold;"><?php echo $homedata->WHOME; ?></h4></td>
                                                </tr>
                                                <?php
                                                foreach ($detail as $homedetail) {
                                                    if ($homedetail->WW2ID == $homedata->WW2ID) {
                                                        ?>
                                                        <tr>
                                                            <td rowspan="3" width="100px"><img src="<?PHP echo base_url() . 'vp/assets_/post_name_for_department/' . $homedetail->PHOTO_PATH; ?>" alt="<?php echo $homedetail->NAME_; ?>" style="max-width: 90px;"></td>  
                                                            <td><b>NAME - </b><?php echo $homedetail->NAME_; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Contact - </b><?php echo $homedetail->CONTACT; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>EMAIL - </b><?php echo $homedetail->EMAIL; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </table>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>                               
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>     
        <div class="col-md-6">            
            <div style="padding:30px; background: #fff;">
                <div class="panel-group" id="accordion1">
                    <?php foreach ($dept1 as $department) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#new<?php echo $department->WW1ID ?>">
                                    <h4><?php echo $department->DEPARTMENT; ?> </h4></a>
                            </div>
                            <div id="new<?php echo $department->WW1ID ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
                                    foreach ($home as $homedata) {
                                        if ($homedata->WW1ID == $department->WW1ID) {
                                            ?>
                                            <table class="table table-striped table-bordered table-hover" style="background: #ffffde">
                                                <tr style="background: #feffb6">
                                                    <td colspan="3" style="color: #540000; font-weight: bold;"><?php echo $homedata->WHOME; ?></h4></td>
                                                </tr>
                                                <?php
                                                foreach ($detail as $homedetail) {
                                                    if ($homedetail->WW2ID == $homedata->WW2ID) {
                                                        ?>
                                                        <tr>
                                                            <td rowspan="3" width="100px"><img src="<?PHP echo base_url() . 'vp/assets_/post_name_for_department/' . $homedetail->PHOTO_PATH; ?>" alt="<?php echo $homedetail->NAME_; ?>" style="max-width: 90px;"></td>  
                                                            <td><b>NAME - </b><?php echo $homedetail->NAME_; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Contact - </b><?php echo $homedetail->CONTACT; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>EMAIL - </b><?php echo $homedetail->EMAIL; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </table>

                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="clearfix"></div>
            </div>                               
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>
        <div class="col-md-12">
            <div class="tech-no">
                <div class="wthree">
                    <p align="justify" style="font-size: 12px;"><i><b>Disclaimer:</b> The who's who data displayed here is informative in nature and have been prepared with due care in consultation with Departments concerned, however in case of any error or omission, Data available with the Revenue Authority will be considered final. </i></p>                    
                </div>
            </div>
        </div>
        <!-- technology-right -->
    </div>
</div>