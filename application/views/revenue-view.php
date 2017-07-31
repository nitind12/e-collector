<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">            
            <h1><a href="#">Revenue Map</a></h1>
        </div>
    </div>
</div>
<div class="technology">
    <div class="container">
        <div class="col-md-4">
            <div class="blo-top1">
                <div class="tech-btm">
                    <h4 class="side-title-head">Search Revenue Map</h4>
                    <p class="sign">Search Revenue map by Selecting Village</p>
                    <?php echo form_open('#', array('name' => 'frmSelect', 'id' => 'frmSelect', 'role' => 'form', 'class' => 'form-inline')); ?>                    
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'cmbTehsil',
                        'class' => 'required form-control col-sm-12',
                        'id' => 'cmbTehsil',
                        'required' => 'required',
                         'style' => 'text-transform:uppercase; width: 100%;margin-bottom:20px;',
                        'onchange' => 'fillVillages(this);'
                    );
                    $options = array();
                    $options[''] = 'SELECT TEHSIL';
                    foreach ($Tehsil_name as $tehsilName) {
                        $options[$tehsilName->TEHSILID] = $tehsilName->TEHSIL;
                    }
                    echo form_dropdown($data, $options);
                    ?>     
                    <p style="height:10px;">&nbsp;</p>
                    <?php
                    $data = array(
                        'name' => 'cmbVillage',
                        'class' => 'required form-control ',
                        'id' => 'cmbVillage',
                        'required' => 'required',
                         'style' => 'text-transform:uppercase; width: 100%;',
                        'onchange' => 'loadgalleryView(this);'
                    );
                    $options = array();
                    echo form_dropdown($data, $options);
                    ?>  
                    <p></p>
                    <input type="submit" value="SEARCH" class='btn btn-primary' style='float:right;'>
                    <?php echo form_close(); ?>                 
                    <div class="clearfix"></div>
                </div>                               
            </div>
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>
        <div class="col-md-8" id="displayMap" style="min-height: 375px;">
            <div class="tech-no">
                <!-- technology-top -->
                
                    <div class="col-md-12 wthree-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
                        <div class="tch-img">   
                            <div class="col-sm-12" id="displayMap" style="min-height: 375px;">
                                <div class="col-sm-12">
                                    <div class="row clear-fix">
                                        <div class="col-md-12">
                                            <div id="response" style="display: none">
                                                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i> loading...
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="row clear-fix">
                                        <div class="col-md-12">
                                            <div style="margin-top: 1%;">
                                                <blockquote>
                                                    <ul class="list-inline" id="galleryView">   

                                                    </ul>
                                                </blockquote>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                    <div class="clearfix"></div>                
            </div>
        </div>
        <div class="col-md-12">
            <div class="tech-no">
                <div class="wthree">
                    <p align="justify" style="font-size: 12px;"><i><b>Disclaimer:</b> The Revenue Maps displayed here are informative in nature and have been prepared with due care in consultation with Departments concerned, however in case of any error or omission, Data available with the Revenue Authority will be considered final. </i></p>                    
                </div>
            </div>
        </div>
        <!-- technology-right -->
    </div>
</div>