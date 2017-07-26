<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">  
            <?php
            foreach ($village_Data as $homedata) {
                ?>
                <h1><a href="#"><?php echo $homedata->NAME_; ?></a></h1>
            <?php } ?>
        </div>
    </div>
</div>
<div class="technology">
    <div class="container">            
        <div style="padding:30px; background: #fff;">
            <div class="col-md-6">
                <?php
                foreach ($village_Data as $homedata) {
                    ?>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <td style="color: #540000; width:50%; font-size:14px;">KANOONGO AREA</td><td><?php echo $homedata->KANOONGO_AREA; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;">NYAY PANCHAYAT</td><td><?php echo $homedata->NYAY_PANCHAYAT; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;">PARLIAMENTARY CONSTITUENCY</td><td><?php echo $homedata->PARLIAMENTARY_CONS; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;">POLLING BOOTH</td><td><?php echo $homedata->POLLING_BOOTH; ?></h4></td>                            
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <div class="clearfix"></div>
            </div>  
            <div class="col-md-6">
                <?php
                foreach ($village_Data as $homedata) {
                    ?>
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <td style="color: #540000; width:50%;font-size:14px;">GRAM PANCHAYAT</td><td><?php echo $homedata->GRAM_PANCHAYAT; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;">VAN PANCHAYAT</td><td><?php echo $homedata->VAN_PANCHAYAT; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;">ASSEMBLY CONSTITUENCY</td><td><?php echo $homedata->ASSEMBLY_CONS; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;">REGULAR/ REVENUE POLICE</td><td><?php echo $homedata->REGULAR_REVENUE_POLICE	; ?></h4></td>                            
                        </tr>
                    </table>
                    <?php
                }
                ?>
                <div class="clearfix"></div>
            </div> 
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>            
        <div class="col-md-12">
            <div class="tech-no">
                <div class="wthree">
                    <p align="justify" style="font-size: 12px;"><i><b>Disclaimer:</b> The contents of this website are informative in nature and have been prepared with due care in consultation with Departments concerned, however in case of any error or omission, Data available with the Revenue Authority will be considered final. </i></p>                    
                </div>
            </div>
        </div>
        <!-- technology-right -->
    </div>
</div>