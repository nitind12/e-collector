<div class="table-responsive" style="overflow: auto; max-height: 700px;">
                            <table class="table table-striped table-bordered table-hover" style="width:1500px; font-size: 10px;">
                                <thead>
                                    <tr>
                                        <th colspan="19" class="bk-clr-two" style="color: #ffffff">CASE DETAIL</th>
                                    </tr>
                                    <tr>
                                        <th>Action</th>
                                        <th>#</th>
                                        <!--th>SNO</th-->
                                        <th>Registration Date</th>
                                        <th>Sub Division</th>
                                        <th>Tehsil</th>
                                        <th>Patwari Area</th>
                                        <th>Police Area</th>
                                        <th>Act Name</th>
                                        <th>Section</th>
                                        <th>First Party</th>
                                        <th>Second Party</th>
                                        <th>Next Date</th>
                                        <th>Scheduled for</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach($sdmcourtcases as $caseitem){?>
                                        <?php if($_SNO_ == $caseitem->REF_SNO) {?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo site_url('sdmcourt/index/edit/dashboard/x/'.$caseitem->SNO);?>">Edit</a>
                                                 | 
                                                <a href="<?php echo site_url('sdmcourt/deletecaserecord/'.$caseitem->SNO);?>" style="color: #ff0000" onclick="return confirm('Are you sure you want to delete?')">
                                                Del
                                                </a>
                                            </td>
                                            <td><?php echo $i++;?></td>
                                            <!--td><?php echo $caseitem->SNO;?></td-->
                                            <td><?php echo date("d-m-Y", strtotime($caseitem->REG_DATE)); ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->SUB_DIVISION; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->TEHSIL; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->PATWARI_AREA; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->POLICE_AREA; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->ACT_NAME; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->SECTION; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->FIRST_PARTY; ?></td>
                                            <td class="hindiFont"><?php echo $caseitem->SECOND_PARTY; ?></td>
                                            <td>
                                                <?php
                                                    if($caseitem->NEXT_DATE != ''){
                                                        echo date("d-m-Y", strtotime($caseitem->NEXT_DATE)); 
                                                    } else {
                                                        echo "-";
                                                    }
                                                ?>
                                                
                                            </td>
                                            <td class="hindiFont"><?php echo $caseitem->SCHEDULED_FOR; ?></td>
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>