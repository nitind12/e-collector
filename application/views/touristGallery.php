<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
            <h1><a href="#">Nainital and its Environs</a></h1>
        </div>
    </div>
</div>
<!-- banner -->
<div class="technology">
    <div class="container-fluid">
        <div class="col-md-3">
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4>Tourist Place</h4>
                    <?php echo form_open('#', array('name' => 'frmSelect', 'id' => 'frmSelect', 'role' => 'form', 'class' => 'form-inline')); ?>
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'cmbPlace',
                        'class' => 'form-control',
                        'id' => 'cmbPlace',
                        'required' => 'required',
                        'style' => 'text-transform:uppercase; width: 100%;',
                        'onchange' => 'loadPlaces(this);'
                    );
                    $options = array();
                    $options[''] = 'SELECT PLACE';
                    $options['0'] = 'ALL PLACES';
                    foreach ($cat as $catName) {
                        if ($catName->CATEG_ID != 'x') {
                            $options[$catName->CATEG_ID] = $catName->CATEGORY;
                        }
                    }
                    echo form_dropdown($data, $options);
                    ?>
                    <p style="color:#0099cc" align="center">Select the particular tourist place to read more about it</p>
                    <?php echo form_close(); ?>                    
                    <div class="clearfix"></div>
                </div>

                <?php if ($galID != 0) { ?>
                    <hr>
                    <div class="tech-btm">
                        <h4>Accommodation</h4>
                    </div>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>
        <div class="col-md-9">
            <div class="tech-no">
                <!-- technology-top -->
                <div class="wthree">
                    <div class="col-md-12 wthree-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
                        <div class="tch-img">   
                            <?php if ($galID != 0) { ?>
                                <h3 align="center" style="margin-bottom: 10px; color: #006699; font-weight: bold; text-shadow: 2px 2px 2px #cccccc; font-family: cursive;"> <?php
                                    foreach ($cat_p as $catName) {
                                        echo $catName->CATEGORY;
                                    }
                                    ?></h3>
                            <?php }?>
                            <?php if ($galID == 0) { ?>
                                <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <?php
                                        $i = 0;
                                        foreach ($Allgal as $AllgalPic) {
                                            ?>
                                            <li data-target="#myCarousel1" data-slide-to="<?php echo $i; ?>" class="<?php
                                            if ($i == 0) {
                                                echo 'active';
                                            }
                                            ?>"></li>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <?PHP
                                        $i = 1;
                                        foreach ($Allgal as $AllgalPic) {
                                            ?>
                                            <div class="<?php
                                            if ($i == 1) {
                                                echo 'item active';
                                            } else {
                                                echo 'item';
                                            }
                                            ?>">
                                                <img src="<?PHP echo base_url() . 'vp/assets_/gallery/' . $AllgalPic->PIC_PATH; ?>" alt="" style="width: 100%;">
                                                <div class="carousel-caption">
                                                    <h2 style="color:#f2f2f2; text-shadow: 1px 1px 2px #000;color:#ffff00"><?php echo $AllgalPic->CATEGORY; ?></h2>                                                    
                                                </div>                                                
                                                <div style="position:absolute; right:100px;bottom:80px;">                                                    
                                                    <p style="color:#f2f2f2; fot-size:10px; text-shadow: 1px 1px 2px #000; color:#ffff00">Pic Courtesy: <?php echo $AllgalPic->COURTESY; ?></p>
                                                </div>
                                                <div class="carousel-data" style="margin-bottom:100px;">
                                                    <div style="margin-top: 50px;" id="short"><?php
                                                        if ($AllgalPic->DESCR != '') {
                                                            $string = strip_tags($AllgalPic->DESCR);
                                                            if (strlen($string) > 100) {
                                                                // truncate string
                                                                $stringCut = substr($string, 0, 100);
                                                                // make sure it ends in a word so assassinate doesn't become ass...                                            
                                                                echo $stringCut . "... <span onClick='readMore()' style='color: blue'><br>Select the particular tourist place to read more about it</span>";
                                                            } else{
                                                                echo $string; 
                                                            }                                                           
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?PHP
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->
                                    <ol class="carousel-indicators">
                                        <?php
                                        $i = 0;
                                        foreach ($gal_p as $galPic) {
                                            ?>
                                            <li data-target="#myCarousel1" data-slide-to="<?php echo $i; ?>" class="<?php
                                            if ($i == 0) {
                                                echo 'active';
                                            }
                                            ?>"></li>
                                                <?php
                                                $i++;
                                            }
                                            ?>
                                    </ol>

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <?PHP
                                        $i = 1;
                                        foreach ($gal_p as $galPic) {
                                            ?>
                                            <div class="<?php
                                            if ($i == 1) {
                                                echo 'item active';
                                            } else {
                                                echo 'item';
                                            }
                                            ?>">
                                                <img src="<?PHP echo base_url() . 'vp/assets_/gallery/' . $galPic->PIC_PATH; ?>" alt="" style="width: 100%;">
                                                <div style="position:absolute; right:100px;bottom:10px;">                                                    
                                                    <p style="color:#f2f2f2; fot-size:10px; text-shadow: 1px 1px 2px #000; color:#ffff00">Pic Courtesy: <?php echo $galPic->COURTESY; ?></p>
                                                </div>
                                            </div>
                                            <?PHP
                                            $i++;
                                        }
                                        ?>
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="clearfix"></div>
                        <?php if ($galID != 0) { ?>
                            <div style="margin-top: 50px;" id="short"><?php
                                foreach ($cat_p as $catName) {
                                    $string = strip_tags($catName->DESCR);
                                    if (strlen($string) > 100) {
                                        // truncate string
                                        $stringCut = substr($string, 0, 100);
                                        // make sure it ends in a word so assassinate doesn't become ass...   
                                         echo $stringCut . "... <span onClick='readMore()' style='color: blue'>Read More</span>";
                                    }else{
                                        echo $string;
                                    }
                                   
                                }
                                ?>
                            </div>                                
                            <div id="long" style="display:none;margin-top: 50px;"><?php echo $catName->DESCR; ?></div>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="tech-no">
                <div class="wthree">
                    <p align="justify" style="font-size: 12px;"><i><b>Disclaimer:</b> The contents of this website are informative in nature and have been prepared with due care in consultation with Departments concerned, however in case of any error or omission, Data available with the Revenue Authority will be considered final.</i></p>                    
                </div>
            </div>
        </div>
        <!-- technology-right -->
    </div>
</div>