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
                            <td rowspan="3" width="150px"><img src="<?PHP echo base_url() . 'vp/assets_/patwari_pics/' . $homedata->PHOTO_; ?>" alt="<?php echo $homedata->NAME_; ?>" style="max-width: 140px;"></td>  
                            <td><b>PATWARI NAME - </b><?php echo $homedata->pNAME; ?></td>
                        </tr>
                        <tr>
                            <td><b>PATWARI CONTACT - </b><?php echo $homedata->PHONE_; ?></td>
                        </tr>                        
                        <tr>
                            <td><b>PATWARI AREA - </b><?php echo $homedata->PATWARIAREA; ?></td>
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
                            <td style="color: #540000; width:50%; font-size:14px;font-weight: bold;">DISTRICT</td><td><?php echo $homedata->DISTRICT; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000; font-size:14px;font-weight: bold;">TEHSIL AREA</td><td><?php echo $homedata->TEHSIL; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000; font-size:14px;font-weight: bold;">KANOONGO AREA</td><td><?php echo $homedata->KANOONGO_AREA; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000; font-size:14px;font-weight: bold;">GRAM PANCHAYAT</td><td><?php echo $homedata->GRAM_PANCHAYAT; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;font-weight: bold;">NYAY PANCHAYAT</td><td><?php echo $homedata->NYAY_PANCHAYAT; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;font-weight: bold;">VAN PANCHAYAT</td><td><?php echo $homedata->VAN_PANCHAYAT; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;font-weight: bold;">PARLIAMENTARY CONSTITUENCY</td><td><?php echo $homedata->PARLIAMENTARY_CONS; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;font-weight: bold;">ASSEMBLY CONSTITUENCY</td><td><?php echo $homedata->ASSEMBLY_CONS; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;font-weight: bold;">POLLING BOOTH</td><td><?php echo $homedata->POLLING_BOOTH; ?></h4></td>                            
                        </tr>
                        <tr>
                            <td style="color: #540000;font-size:14px;font-weight: bold;">REGULAR/ REVENUE POLICE</td><td><?php echo $homedata->REGULAR_REVENUE_POLICE; ?></h4></td>                            
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