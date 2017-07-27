<script type="text/javascript" src="<?PHP echo base_url() . 'nitnav/js/responsiveslides.min.js'; ?>"></script>
<style>  
    .ui-menu {  
        position: absolute;
        float:right;
        list-style:none;  
        padding: 2px;  
        margin: 0;  
        display:block;  
    }  
    .ui-menu .ui-menu {  
        margin-top: -3px;  
    }  
    .ui-menu .ui-menu-item {  
        margin:0;  
        padding: 0;  
        zoom: 1;  
        float: left;  
        clear: left;  
        width: 100%;  
        font-size:80%;  
    }  
    .ui-menu .ui-menu-item a {  
        text-decoration:none;  
        display:block;  
        padding:.2em .4em;  
        line-height:1.5;  
        zoom:1;  
    }  
    .ui-menu .ui-menu-item a.ui-state-hover,  
    .ui-menu .ui-menu-item a.ui-state-active {  
        font-weight: normal;  
        margin: -1px;  
    }  
</style>  
<!--start-main-->
<div class="header-bottom">
    <div class="container">
        <div class="logo wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
            <h1><a href="#">Revenue Village</a></h1>
        </div>
    </div>
</div>
<!-- banner -->
<div class="technology">
    <div class="container">
        <div class="col-md-5">
            <div class="blo-top1"> 
                <div class="tech-btm">                                                                
                    <h4>Search Your Village</h4>
                    <p class="sign">Search Village & its Details by Selecting Tehsil</p>
                    <?php echo form_open('web/searchVillage', array('name' => 'frmSelect', 'id' => 'frmSelect', 'role' => 'form', 'class' => 'form-inline')); ?>                    
                    <?php
                    $data = array(
                        'type' => 'text',
                        'name' => 'cmbTehsil',
                        'class' => 'form-control',
                        'id' => 'cmbTehsil',
                        'required' => 'required',
                        'style' => 'text-transform:uppercase; width: 100%;',
                        'onchange' => 'fillVillages(this);'
                    );
                    $options = array();
                    $options[''] = 'SELECT TEHSIL';
                    foreach ($Tehsil_name as $tehsilName) {
                        $options[$tehsilName->TEHSILID] = $tehsilName->TEHSIL;
                    }
                    echo form_dropdown($data, $options);
                    ?>      
                    <p></p>
                    <?php
                    $data = array(
                        'name' => 'cmbVillage',
                        'class' => 'form-control',
                        'id' => 'cmbVillage',
                        'required' => 'required',
                        'style' => 'text-transform:uppercase; width: 100%;',
                    );
                    $options = array();
                    echo form_dropdown($data, $options);
                    ?>  
                    <p></p>
                    <input type="submit" value="SEARCH" class='btn btn-primary' style='float:right;'>
                    <?php echo form_close(); ?>    
                    <div class="clearfix"></div>
                </div>                
                <div class="tech-btm">                       
                    <h4>Search Your Village by Name</h4>
                    <p class="sign">Search Village & its Details just entering Name</p>
                    <?php echo form_open('web/searchVillagebyText', array('name' => 'frmVillage', 'id' => 'frmVillage', 'role' => 'form', 'class' => 'form-inline')); ?>                    
                    <?php
                    $data = array(
                        'type' => 'text',
                        'placeholder' => 'Village Name',
                        'class' => 'form-control ',
                        'name' => 'id',
                        'id' => 'id',
                        'required' => 'required',
                        'style' => 'width: 75%;',
                        'value' => ''
                    );
                    echo form_input($data);
                    ?>
                    <input type="submit" value="SEARCH" class='btn btn-primary'>
                    <?php echo form_close(); ?>                     
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- technology-right -->
        </div>
        <div class="col-md-7">
            <div class="tech-no">
                <!-- technology-top -->                              
                <div class="wthree">
                    <div class="col-md-12 wthree-left wow fadeInDown"  data-wow-duration=".8s" data-wow-delay=".2s">
                        <div class="tch-img">
                            <div id="myCarousel1" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel1" data-slide-to="1"></li>                                           
                                    <li data-target="#myCarousel1" data-slide-to="2"></li>                                           
                                    <li data-target="#myCarousel1" data-slide-to="3"></li>                                           
                                    <li data-target="#myCarousel1" data-slide-to="4"></li>                                           
                                    <li data-target="#myCarousel1" data-slide-to="5"></li>                                           
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="<?PHP echo base_url() . 'nitnav/images/ban4.jpg'; ?>" alt="Nainital">
                                    </div>
                                    <div class="item">
                                        <img src="<?PHP echo base_url() . 'nitnav/images/ban2.jpg'; ?>" alt="Nainital">
                                    </div> 
                                    <div class="item">
                                        <img src="<?PHP echo base_url() . 'nitnav/images/ban3.jpg'; ?>" alt="Nainital">
                                    </div> 
                                    <div class="item">
                                        <img src="<?PHP echo base_url() . 'nitnav/images/ban1.jpg'; ?>" alt="Nainital">
                                    </div> 
                                    <div class="item">
                                        <img src="<?PHP echo base_url() . 'nitnav/images/ban5.jpg'; ?>" alt="Nainital">
                                    </div> 
                                    <div class="item">
                                        <img src="<?PHP echo base_url() . 'nitnav/images/ban6.jpg'; ?>" alt="Nainital">
                                    </div>
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
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <p style="margin-top: 50px;"><i><b>Disclaimer:</b> The contents of this website are informative in nature and have been prepared with due care in consultation with Departments concerned, however in case of any error or omission, Data available with the Revenue Authority will be considered final.</i></p>
                </div>                  
            </div>
        </div>
        <!-- technology-right -->        
    </div>