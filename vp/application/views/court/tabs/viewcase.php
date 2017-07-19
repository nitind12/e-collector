<?php if(isset($links)){?>
<div class="row">
    <div class="col-sm-12">
        <p> <?php echo $links; ?></p>       
    </div>                           
</div>
<?php } else {
        $forLoop = 0;
    }?>
<?php $loop1=1;?>

<div class="panel-group" id="accordion">
    <?php $count = $forLoop+1; ?>
    <?php if (isset($mastercases)){?>
        <?php $founddata = $mastercases ?>
    <?php } else { ?>
        <?php $founddata = $casewise ?>
    <?php } ?>
    <?php if (count($founddata) != 0) { ?>
        <?php foreach ($founddata as $case_item) { ?>
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #4f7295;">
                    <span style="color: #ffffff; font-weight: bold; font-size: 20px; border: #ffffff solid 0px; border-radius: 10px; padding: 5px; width: 80px"><?php echo $count . ")"; ?></span>
                    <a data-toggle="collapse" data-parent="#accordion" href="#case<?php echo $loop1; ?>" style="color: #ffffff">
                        <?php
                        $case = explode("-", $case_item->CASENO);
                        echo "Case No. " . " - " . $case[1];
                        ?>
                    </a>
                    <?php
                    if ($case_item->REG_DATE != "") {
                        $dt = date("d-m-Y", strtotime($case_item->REG_DATE));
                    } else {
                        $dt = '00/00/0000';
                    }
                    ?>
                    <span style="color: #ffff00; margin-left: 50px"><span class='hindiFont'><?php echo $case_item->FIRST_PARTY . "</span>&nbsp;&nbsp;-&nbsp;&nbsp;<span class='hindiFont'>" . $case_item->SECOND_PARTY . "</span>&nbsp;&nbsp;-&nbsp;&nbsp;<span class='hindiFont'>" . $case_item->ACT_NAME . "</span>&nbsp;&nbsp;-&nbsp;&nbsp;<span class='hindiFont'>" . $case_item->SECTION . "</span>"; ?>
                        </span>
                        <div style="float: right; margin-top:-3px"> 
                            <?php if ($case_item->DISMISS_IN_DEFAULT == 'Activate DD') { ?>
                                <button class="btn btn-danger" style="border-radius: 15px">Disposed off</button>
                            <?php } else { ?>
                                <?php if ($case_item->FINAL_ORDER_DATE != '') { ?>
                                    <button class="btn btn-success" style="border-radius: 15px">Case Final</button>
                                <?php } else { ?>
                                    <a class="btn btn-info" href="<?php echo site_url('sdmcourt/index/newupdate/dashboard/x/' . $case_item->SNO); ?>" style=" color: #ffffff; border-radius: 8px">New Entry for Case 
                                    </a>
                                <?php } ?>
                            <?php } ?>
                    <!--a class="btn btn-danger" href="<?php //echo site_url('sdmcourt/deletewholecase/' . $case_item->SNO);  ?>" onclick="return confirm('This record will never be recovered if deleted. Are you sure you want to delete it?')" style="padding: 5px 8px;color: #ffffff; border-radius: 20px"> <span class="glyphicon glyphicon-remove-circle" style="font-size: 20px; color: #ffffff"></span>
                    </a-->
                        </div>                                
                </div>
                <div id="case<?php echo $loop1; ?>" class="panel-collapse collapse">
                    <?php $data['_SNO_'] = $case_item->SNO; ?>    
                    <div class="panel-body">
                        <?php $this->load->view('court/tabs/case_steps', $data); ?>
                    </div>
                </div>
            </div>
            <?php $loop1++;
            $count++; ?>
        <?php } ?>
<?php } else { ?>
        <div class="col-sm-12" style="color: #ff0000; text-align: center; font-weight: bold">
            No case Found. Please try again.
        </div>
<?php } ?>    
</div>
<?php if(isset($links)){?>
<div class="row">
    <div class="col-sm-12">
        <p> <?php echo $links; ?></p>       
    </div>                           
</div>
<?php } ?>
