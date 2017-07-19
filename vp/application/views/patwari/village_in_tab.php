<div class="navbar navbar-inverse set-radius-zero" style="background-color: #C36464">
    <div class="container">      
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <h1 class="head">Village - <span style="color:#ff6600;text-shadow: 1px 1px 2px #000"><?php echo str_replace('-', ' ', $village_name); ?></span></h1>
            </div>
            <div class="col-md-2" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('web/login'); ?>">
                    <span class="glyphicon glyphicon-log-out" style="font-size: 20px;color: #fff"></span>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="content-wrapper">
    <div class="container">
        <?php if ($this->session->flashdata('_msgall_')) { ?>
            <div class="col-sm-12" style="color: #ff0000; background: #ffff00; text-align: center; border-radius: 5px;">
                <?php echo $this->session->flashdata('_msgall_'); ?>
            </div>
        <?php } ?>
        <div class="row">            
            <div class="col-md-12 col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Fill the Following Details of <span style="color:#ff6600;"><?php echo str_replace('-', ' ', $village_name); ?></span> Village - For Session 2016-17</h4>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-tabs" style="background: #f2f2f2;">
                            <li class="<?php echo $active_administration; ?>"><a href="#home" data-toggle="tab">ADMINISTRATION</a>
                            </li>
                            <li class="<?php echo $pensioners; ?>"><a href="#pension" data-toggle="tab">PENSIONERS</a>
                            </li>
                            <li class="<?php echo $education_; ?>"><a href="#school" data-toggle="tab">EDUCATION</a>
                            </li>
                            <li class="<?php echo $tour; ?>"><a href="#tourism" data-toggle="tab">TOURISM</a>
                            </li>
                            <li class="<?php echo $other_; ?>"><a href="#other" data-toggle="tab">LAND/OTHER DETAIL</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade<?php if ($active_administration != '') {
            echo " " . $active_administration . " in";
        } ?>" id="home">
                                <h4>&nbsp;</h4>
                                <!---DM Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['district'] = (($villageData->DISTRICT_NAME != 'x') ? $villageData->DISTRICT_NAME : '');
                                        $data['dmname'] = (($villageData->DM_NAME != 'x') ? $villageData->DM_NAME : '');
                                        $data['dmphone'] = (($villageData->DM_PHONE != 'x') ? $villageData->DM_PHONE : '');
                                        $data['dmemail'] = (($villageData->DM_EMAIL != 'x') ? $villageData->DM_EMAIL : '');
                                        $data['dmpic'] = (($villageData->DM_PHOTO != 'x') ? $villageData->DM_PHOTO : '');
                                    } else {
                                        $data['district'] = '';
                                        $data['dmname'] = '';
                                        $data['dmphone'] = '';
                                        $data['dmemail'] = '';
                                        $data['dmpic'] = '';
                                    }
                                    ?>
<?php $this->load->view('patwari/onerow/dmdetail', $data); ?>
                                </div>
                                <!--End DM Detail-->

                                <!--SDM Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['subdivision'] = (($villageData->SDM_SUBDIVISION_AREA != 'x') ? $villageData->SDM_SUBDIVISION_AREA : '');
                                        $data['sdmname'] = (($villageData->SDM_NAME != 'x') ? $villageData->SDM_NAME : '');
                                        $data['sdmphone'] = (($villageData->SDM_PHONE != 'x') ? $villageData->SDM_PHONE : '');
                                        $data['sdmemail'] = (($villageData->SDM_EMAIL != 'x') ? $villageData->SDM_EMAIL : '');
                                        $data['sdmpic'] = (($villageData->SDM_PHOTO != 'x') ? $villageData->SDM_PHOTO : '');
                                    } else {
                                        $data['subdivision'] = '';
                                        $data['sdmname'] = '';
                                        $data['sdmphone'] = '';
                                        $data['sdmemail'] = '';
                                        $data['sdmpic'] = '';
                                    }
                                    ?>
<?php $this->load->view('patwari/onerow/sdmdetail.php', $data); ?>
                                </div>
                                <!--End SDM Detail-->

                                <!--Tehsil Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['tehsilname'] = (($villageData->TEHSIL_NAME != 'x') ? $villageData->TEHSIL_NAME : '');
                                        $data['tehsildar'] = (($villageData->TEHSILDAR_NAME != 'x') ? $villageData->TEHSILDAR_NAME : '');
                                        $data['tehsildarphone'] = (($villageData->TEHSILDAR_PHONE != 'x') ? $villageData->TEHSILDAR_PHONE : '');
                                        $data['tehsildaremail'] = (($villageData->TEHSILDAR_EMAIL != 'x') ? $villageData->TEHSILDAR_EMAIL : '');
                                        $data['tehsildarpic'] = (($villageData->TEHSILDAR_PHOTO != 'x') ? $villageData->TEHSILDAR_PHOTO : '');
                                        $data['nayabtehsildarname'] = (($villageData->NAYAB_TEHSILDAR_NAME != 'x') ? $villageData->NAYAB_TEHSILDAR_NAME : '');
                                        $data['nayabtehsildarphone'] = (($villageData->NAYAB_TEHSILDAR_PHONE != 'x') ? $villageData->NAYAB_TEHSILDAR_PHONE : '');
                                    } else {
                                        $data['tehsilname'] = '';
                                        $data['tehsildar'] = '';
                                        $data['tehsildarphone'] = '';
                                        $data['tehsildaremail'] = '';
                                        $data['tehsildarpic'] = '';
                                        $data['nayabtehsildarname'] = '';
                                        $data['nayabtehsildarphone'] = '';
                                    }
                                    ?>
<?php $this->load->view('patwari/onerow/tehsildetail', $data); ?>
                                </div>
                                <!--End Tehsil Detail-->

                                <!--Different Area Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['kanoongoareaname'] = (($villageData->KANOONGO_AREA_NAME != 'x') ? $villageData->KANOONGO_AREA_NAME : '');
                                        $data['patwariareaname'] = (($villageData->PATWARI_AREA_NAME != 'x') ? $villageData->PATWARI_AREA_NAME : '');
                                        $data['patwariname'] = (($villageData->PATWARI_NAME != 'x') ? $villageData->PATWARI_NAME : '');
                                        $data['patwariphone'] = (($villageData->PATWARI_PHONE != 'x') ? $villageData->PATWARI_PHONE : '');
                                        $data['patwariphoto'] = (($villageData->PATWARI_PHOTO != 'x') ? $villageData->PATWARI_PHOTO : '');
                                        $data['forestrangename'] = (($villageData->FOREST_RANGE_NAME != 'x') ? $villageData->FOREST_RANGE_NAME : '');
                                        $data['faorestrangername'] = (($villageData->FOREST_RANGER_NAME != 'x') ? $villageData->FOREST_RANGER_NAME : '');
                                        $data['forestrangerphone'] = (($villageData->FOREST_RANGER_PHONE != 'x') ? $villageData->FOREST_RANGER_PHONE : '');
                                        $data['blockname'] = (($villageData->BLOCK_NAME != 'x') ? $villageData->BLOCK_NAME : '');
                                        $data['bdoname'] = (($villageData->BDO_NAME != 'x') ? $villageData->BDO_NAME : '');
                                        $data['bdophone'] = (($villageData->BDO_PHONE != 'x') ? $villageData->BDO_PHONE : '');
                                        $data['vanpanchayatname'] = (($villageData->VANPANCHAYAT_NAME != 'x') ? $villageData->VANPANCHAYAT_NAME : '');
                                        $data['sarpanchname'] = (($villageData->SARPANCH_NAME != 'x') ? $villageData->SARPANCH_NAME : '');
                                        $data['sarpanchphone'] = (($villageData->SARPANCH_PHONE != 'x') ? $villageData->SARPANCH_PHONE : '');
                                        $data['totalvanpanchayatarea'] = (($villageData->TOTAL_VANPANCHAYAT_AREA != 'x') ? $villageData->TOTAL_VANPANCHAYAT_AREA : '');
                                        $data['policethanaorrevenuepolicename'] = (($villageData->POLICE_THANA_OR_REVENUE_POLICE_NAME != 'x') ? $villageData->POLICE_THANA_OR_REVENUE_POLICE_NAME : '');
                                        $data['soname'] = (($villageData->SO_NAME != 'x') ? $villageData->SO_NAME : '');
                                        $data['sophone'] = (($villageData->SO_PHONE != 'x') ? $villageData->SO_PHONE : '');
                                        $data['policechawkiorrevenuepolicename'] = (($villageData->POLICE_CHAWKI_OR_REVENUE_POLICE_NAME != 'x') ? $villageData->POLICE_CHAWKI_OR_REVENUE_POLICE_NAME : '');
                                        $data['chawkiinchargename'] = (($villageData->CHAWKI_INCHARGE_NAME != 'x') ? $villageData->CHAWKI_INCHARGE_NAME : '');
                                        $data['chawkiinchargephone'] = (($villageData->CHAWKI_INCHARGE_PHONE != 'x') ? $villageData->CHAWKI_INCHARGE_PHONE : '');
                                        $data['nyaypanchayatname'] = (($villageData->NYAY_PANCHAYAT_NAME != 'x') ? $villageData->NYAY_PANCHAYAT_NAME : '');
                                        $data['anganwadiname'] = (($villageData->ANGANVAADI_NAME != 'x') ? $villageData->ANGANVAADI_NAME : '');
                                        $data['anganwadiworkername'] = (($villageData->ANGANVAADI_WORKER_NAME != 'x') ? $villageData->ANGANVAADI_WORKER_NAME : '');
                                        $data['anganwadiworkerphone'] = (($villageData->ANGANVAADI_WORKER_PHONE != 'x') ? $villageData->ANGANVAADI_WORKER_PHONE : '');
                                    } else {
                                        $data['kanoongoareaname'] = '';
                                        $data['patwariareaname'] = '';
                                        $data['patwariname'] = '';
                                        $data['patwariphone'] = '';
                                        $data['patwariphoto'] = '';
                                        $data['forestrangename'] = '';
                                        $data['faorestrangername'] = '';
                                        $data['forestrangerphone'] = '';
                                        $data['blockname'] = '';
                                        $data['bdoname'] = '';
                                        $data['bdophone'] = '';
                                        $data['vanpanchayatname'] = '';
                                        $data['sarpanchname'] = '';
                                        $data['sarpanchphone'] = '';
                                        $data['totalvanpanchayatarea'] = '';
                                        $data['policethanaorrevenuepolicename'] = '';
                                        $data['soname'] = '';
                                        $data['sophone'] = '';
                                        $data['policechawkiorrevenuepolicename'] = '';
                                        $data['chawkiinchargename'] = '';
                                        $data['chawkiinchargephone'] = '';
                                        $data['nyaypanchayatname'] = '';
                                        $data['anganwadiname'] = '';
                                        $data['anganwadiworkername'] = '';
                                        $data['anganwadiworkerphone'] = '';
                                    }
                                    ?>
                                    <?php $this->load->view('patwari/onerow/differentareaundertehsil', $data); ?>
                                </div>
                                <!--End Different Area Detail-->

                                <!--Gram Panchayat Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['grampanchayatname'] = (($villageData->GRAM_PANCHAYAT_NAME != 'x') ? $villageData->GRAM_PANCHAYAT_NAME : '');
                                        $data['grampradhanname'] = (($villageData->GRAM_PRADHAN_NAME != 'x') ? $villageData->GRAM_PRADHAN_NAME : '');
                                        $data['grampradhanphone'] = (($villageData->GRAM_PRADHAN_PHONE != 'x') ? $villageData->GRAM_PRADHAN_PHONE : '');
                                        $data['gramvikasadhikariname'] = (($villageData->GRAM_VIKAS_ADHIKARI_NAME != 'x') ? $villageData->GRAM_VIKAS_ADHIKARI_NAME : '');
                                        $data['gramvikasadhikariphone'] = (($villageData->GRAM_VIKAS_ADHIKARI_PHONE != 'x') ? $villageData->GRAM_VIKAS_ADHIKARI_PHONE : '');
                                        $data['grampanchayatadhikariname'] = (($villageData->GRAM_PANCHAYAT_ADHIKARI_NAME != 'x') ? $villageData->GRAM_PANCHAYAT_ADHIKARI_NAME : '');
                                        $data['grampanchayatadhikariphone'] = (($villageData->GRAM_PANCHAYAT_ADHIKARI_PHONE != 'x') ? $villageData->GRAM_PANCHAYAT_ADHIKARI_PHONE : '');
                                        $data['numberoftok'] = (($villageData->NUMBER_OF_TOK != 'x') ? $villageData->NUMBER_OF_TOK : '');
                                        $data['namesoftok'] = (($villageData->NAMES_OF_TOK != 'x') ? $villageData->NAMES_OF_TOK : '');
                                    } else {
                                        $data['grampanchayatname'] = '';
                                        $data['grampradhanname'] = '';
                                        $data['grampradhanphone'] = '';
                                        $data['gramvikasadhikariname'] = '';
                                        $data['gramvikasadhikariphone'] = '';
                                        $data['grampanchayatadhikariname'] = '';
                                        $data['grampanchayatadhikariphone'] = '';
                                        $data['numberoftok'] = '';
                                        $data['namesoftok'] = '';
                                    }
                                    ?>
                                    <?php $this->load->view('patwari/onerow/grampanchayat', $data); ?>
                                </div>
                                <!--End Gram Panchayat Detail-->
                                
                                <!--Land Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['totallandholders'] = (($villageData->TOTAL_LAND_HOLDERS != 'x') ? $villageData->TOTAL_LAND_HOLDERS : '');
                                        $data['cultivationarea'] = (($villageData->AGRICULTURE_TOTAL_AREA_UNDER_CULTIVATION_IN_HECTARE != 'x') ? $villageData->AGRICULTURE_TOTAL_AREA_UNDER_CULTIVATION_IN_HECTARE : '');
                                        $data['totalgovtarea'] = (($villageData->TOTAL_GOVT_LAND_UNDER_DIFF_CATEG_IN_HECTARE != 'x') ? $villageData->TOTAL_GOVT_LAND_UNDER_DIFF_CATEG_IN_HECTARE : '');
                                        $data['landlesspeople'] = (($villageData->TOTAL_LANDLESS_PEOPLE != 'x') ? $villageData->TOTAL_LANDLESS_PEOPLE : '');
                                        $data['cropname'] = (($villageData->MAIN_NAME_OF_CROP != 'x') ? $villageData->MAIN_NAME_OF_CROP : '');
                                        $data['totallandareaofvillage'] = (($villageData->TOTAL_LAND_AREA_OF_VILLAGE_IN_HECTARE != 'x') ? $villageData->TOTAL_LAND_AREA_OF_VILLAGE_IN_HECTARE : '');
                                    } else {
                                        $data['totallandholders'] = '';
                                        $data['cultivationarea'] = '';
                                        $data['totalgovtarea'] = '';
                                        $data['landlesspeople'] = '';
                                        $data['cropname'] = '';
                                        $data['totallandareaofvillage'] = '';
                                    }
                                    ?>
                                    <?php $this->load->view('patwari/onerow/landdetail',  $data); ?>
                                </div>
                                <!--End Land Detail-->
                                
                                <!--Population Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['censusyear'] = (($villageData->POPULATION_CENSUS_YEAR != 'x') ? $villageData->POPULATION_CENSUS_YEAR : '');
                                        $data['malepopulation'] = (($villageData->MALE_POPULATION != 'x') ? $villageData->MALE_POPULATION : '');
                                        $data['femalepopulation'] = (($villageData->FEMALE_POPULATION != 'x') ? $villageData->FEMALE_POPULATION : '');
                                        $data['totalpopulation'] = (($villageData->TOTAL_POPULATION != 'x') ? $villageData->TOTAL_POPULATION : '');
                                    } else {
                                        $data['censusyear'] = '';
                                        $data['malepopulation'] = '';
                                        $data['femalepopulation'] = '';
                                        $data['totalpopulation'] = '';
                                    }
                                    ?>
                                    <?php $this->load->view('patwari/onerow/populationdetail', $data); ?>
                                </div>
                                <!--End Population Detail-->

                                <!--Health Facility Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['healthfacilityname'] = (($villageData->HEALTH_FACILITY_NAME != 'x') ? $villageData->HEALTH_FACILITY_NAME : '');
                                        $data['govtprivate'] = (($villageData->HEALTH_FACILITY_GOVT_PRIVATE != 'x') ? $villageData->HEALTH_FACILITY_GOVT_PRIVATE : '');
                                        $data['ashaname'] = (($villageData->ASHA_NAME != 'x') ? $villageData->ASHA_NAME : '');
                                        $data['ashaphone'] = (($villageData->ASHA_PHONE != 'x') ? $villageData->ASHA_PHONE : '');
                                        $data['anmname'] = (($villageData->ANM_NAME != 'x') ? $villageData->ANM_NAME : '');
                                        $data['anmphone'] = (($villageData->ANM_PHONE != 'x') ? $villageData->ANM_PHONE : '');
                                        $data['privateclinicname'] = (($villageData->PRIVATE_CLINIC_NAME != 'x') ? $villageData->PRIVATE_CLINIC_NAME : '');
                                        $data['chemistname'] = (($villageData->CHEMIST_NAME != 'x') ? $villageData->CHEMIST_NAME : '');
                                        $data['hospitalsubcentrename'] = (($villageData->HOSPITAL_SUBCENTRE_NAME != 'x') ? $villageData->HOSPITAL_SUBCENTRE_NAME : '');
                                        $data['hospitalsubcentredistance'] = (($villageData->HOSPITAL_SUBCENTRE_DISTANCE != 'x') ? $villageData->HOSPITAL_SUBCENTRE_DISTANCE : '');
                                    } else {
                                        $data['healthfacilityname'] = '';
                                        $data['govtprivate'] = '';
                                        $data['ashaname'] = '';
                                        $data['ashaphone'] = '';
                                        $data['anmname'] = '';
                                        $data['anmphone'] = '';
                                        $data['privateclinicname'] = '';
                                        $data['chemistname'] = '';
                                        $data['hospitalsubcentrename'] = '';
                                        $data['hospitalsubcentredistance'] = '';
                                    }
                                    ?>
                                    <?php $this->load->view('patwari/onerow/nearesthealthfacility', $data); ?>
                                </div>
                                <!--End Health Facility Detail-->

                                <!--Elective Member Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['parliamentaryconstituency'] = (($villageData->LOKSABHA_PARLIAMENTRY_CONSTITUENCY != 'x') ? $villageData->LOKSABHA_PARLIAMENTRY_CONSTITUENCY : '');
                                        $data['mapname'] = (($villageData->LOKSABHA_MP_NAME != 'x') ? $villageData->LOKSABHA_MP_NAME : '');
                                        $data['assemblyconstituency'] = (($villageData->LOKSABHA_ASSEMBLY_CONSTITUENCY != 'x') ? $villageData->LOKSABHA_ASSEMBLY_CONSTITUENCY : '');
                                        $data['mlaname'] = (($villageData->LOKSABHA_MLA_NAME != 'x') ? $villageData->LOKSABHA_MLA_NAME : '');
                                        $data['polingboothname'] = (($villageData->POLING_BOOTH_NAME != 'x') ? $villageData->POLING_BOOTH_NAME : '');
                                        $data['villagesunderpolingbooth'] = (($villageData->VILLAGES_UNDER_POLING_BOOTH != 'x') ? $villageData->VILLAGES_UNDER_POLING_BOOTH : '');
                                        $data['bloname'] = (($villageData->BLO_NAME != 'x') ? $villageData->BLO_NAME : '');
                                        $data['blophone'] = (($villageData->BLO_PHONE != 'x') ? $villageData->BLO_PHONE : '');
                                    } else {
                                        $data['parliamentaryconstituency'] = '';
                                        $data['mapname'] = '';
                                        $data['assemblyconstituency'] = '';
                                        $data['mlaname'] = '';
                                        $data['polingboothname'] = '';
                                        $data['villagesunderpolingbooth'] = '';
                                        $data['bloname'] = '';
                                        $data['blophone'] = '';
                                    }
                                    ?>
                                    <?php $this->load->view('patwari/onerow/election', $data); ?>
                                </div>
                                <!--End Elective member Detail-->

                                <!--Other Detail-->
                                <div class="panel panel-default">
                                    <?php
                                    if (isset($villageData)) {
                                        $data['pdsshopownernme'] = (($villageData->PDS_SHOP_OWNER_NAME != 'x') ? $villageData->PDS_SHOP_OWNER_NAME : '');
                                        $data['pdsshopownerphone'] = (($villageData->PDS_SHOP_OWNER_PHONE != 'x') ? $villageData->PDS_SHOP_OWNER_PHONE : '');
                                        $data['approachroadname'] = (($villageData->APPROACH_ROAD_NAME != 'x') ? $villageData->APPROACH_ROAD_NAME : '');
                                        $data['constructionagency'] = (($villageData->CONSTRUCTION_AGENCY != 'x') ? $villageData->CONSTRUCTION_AGENCY : '');
                                        $data['pakkakachcha'] = (($villageData->APPROACH_ROAD_PAKKA_KACHCHA != 'x') ? $villageData->APPROACH_ROAD_PAKKA_KACHCHA : '');
                                        $data['trekdistance'] = (($villageData->APPROACH_ROAD_TREK_DISTANCE != 'x') ? $villageData->APPROACH_ROAD_TREK_DISTANCE : '');
                                        $data['landslidezonename'] = (($villageData->LANDSLIDE_ZONE_NAME != 'x') ? $villageData->LANDSLIDE_ZONE_NAME : '');
                                        $data['alternateroutename'] = (($villageData->ALTERNATE_ROUTE_NAME != 'x') ? $villageData->ALTERNATE_ROUTE_NAME : '');
                                        $data['alternateroutetype'] = (($villageData->ALTERNATE_ROUTE_TYPE != 'x') ? $villageData->ALTERNATE_ROUTE_TYPE : '');
                                        $data['alternateroutedistance'] = (($villageData->ALTERNATE_ROUTE_DISTANCE != 'x') ? $villageData->ALTERNATE_ROUTE_DISTANCE : '');
                                        $data['electricity'] = (($villageData->ELECTRICITY != 'x') ? $villageData->ELECTRICITY : '');
                                    } else {
                                        $data['pdsshopownernme'] = '';
                                        $data['pdsshopownerphone'] = '';
                                        $data['approachroadname'] = '';
                                        $data['constructionagency'] = '';
                                        $data['pakkakachcha'] = '';
                                        $data['trekdistance'] = '';
                                        $data['landslidezonename'] = '';
                                        $data['alternateroutename'] = '';
                                        $data['alternateroutetype'] = '';
                                        $data['alternateroutedistance'] = '';
                                        $data['electricity'] = '';
                                    }
                                    ?>
                                    <?php $this->load->view('patwari/onerow/pdsroaddetail', $data); ?>
                                </div>
                                <!--End Other Detail-->
                            </div>
                            <div class="tab-pane fade<?php if ($pensioners != '') {
                                        echo " " . $pensioners . " in";
                                    } ?>" id="pension">
                                <?php $this->load->view('patwari/dynamic/pension'); ?>
                            </div>
                            <div class="tab-pane fade<?php if ($education_ != '') {
                                    echo " " . $education_ . " in";
                                } ?>" id="school">
<?php $this->load->view('patwari/dynamic/education'); ?>
                            </div>
                            <div class="tab-pane fade<?php if ($tour != '') {
    echo " " . $tour . " in";
} ?>" id="tourism">
<?php $this->load->view('patwari/dynamic/tourism'); ?>
                            </div>

                            <div class="tab-pane fade<?php if ($other_ != '') {
    echo " " . $other_ . " in";
} ?>" id="other">
<?php $this->load->view('patwari/dynamic/other'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>