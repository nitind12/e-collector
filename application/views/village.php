<?php foreach ($village_Data as $vill_Data) { ?>
    <div class="main-body" style="background-color:rgba(255, 255, 255, 0.8);">
        <div class="wrap">
            <div class="col-lg-4 col-xs-12 col-sm-12 col-md-12 content-left">
                <div class="first_half">
                    <div class="newsletter">
                        <h1 class="side-title-head">Who's Who</h1>
                        <!-------------------------------------------------------------->
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#dm">
                                        <h4 class="panel-title">DM </h4></a>
                                </div>
                                <div id="dm" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr style="text-align: center">
                                                    <td rowspan="4">
                                                        <?php if ($vill_Data->DM_PHOTO != 'x') { ?>
                                                            <img src="<?php echo base_url('vp/assets_/pics/' . $vill_Data->DM_PHOTO); ?>" style="max-width: 100px" class="img-responsive" />
                                                        <?php } else { ?>
                                                            <img src="<?php echo base_url('vp/assets_/pics/default.png'); ?>" style="max-width: 100px" class="img-responsive" />
                                                        <?php } ?>
                                                        <b><?php echo $vill_Data->DM_NAME; ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>District Name:</b> <?php echo $vill_Data->DISTRICT_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->DM_PHONE; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email-ID:</b> <?php echo $vill_Data->DM_EMAIL; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#sdm">
                                        <h4 class="panel-title">SDM </h4></a>
                                </div>
                                <div id="sdm" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr style="text-align: center">
                                                    <td rowspan="4">
                                                        <?php if ($vill_Data->SDM_PHOTO != 'x') { ?>
                                                            <img src="<?php echo base_url('vp/assets_/pics/' . $vill_Data->SDM_PHOTO); ?>" style="max-width: 100px" class="img-responsive" />
                                                        <?php } else { ?>
                                                            <img src="<?php echo base_url('vp/assets_/pics/default.png'); ?>" style="max-width: 100px" class="img-responsive" />
                                                        <?php } ?>
                                                        <b><?php echo $vill_Data->SDM_NAME; ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Sub Division Name:</b> <?php echo $vill_Data->SDM_SUBDIVISION_AREA; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->SDM_PHONE; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email-ID:</b> <?php echo $vill_Data->SDM_EMAIL; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#tehsildar">
                                        <h4 class="panel-title">TEHSILDAR </h4></a>
                                </div>
                                <div id="tehsildar" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr style="text-align: center">
                                                    <td rowspan="4">
                                                        <?php if ($vill_Data->TEHSILDAR_PHOTO != 'x') { ?>
                                                            <img src="<?php echo base_url('vp/assets_/pics/' . $vill_Data->TEHSILDAR_PHOTO); ?>" style="max-width: 100px" class="img-responsive" />
                                                        <?php } else { ?>
                                                            <img src="<?php echo base_url('vp/assets_/pics/default.png'); ?>" style="max-width: 100px" class="img-responsive" />
                                                        <?php } ?>
                                                        <b><?php echo $vill_Data->TEHSILDAR_NAME; ?></b>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Tehsil Name:</b> <?php echo $vill_Data->TEHSIL_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->TEHSILDAR_PHONE; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email-ID:</b> <?php echo $vill_Data->TEHSILDAR_EMAIL; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#ntehsildar">
                                        <h4 class="panel-title">NAYAB TEHSILDAR </h4></a>
                                </div>
                                <div id="ntehsildar" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Name:</b> <?php echo $vill_Data->NAYAB_TEHSILDAR_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->NAYAB_TEHSILDAR_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#patwari">
                                        <h4 class="panel-title">PATWARI </h4></a>
                                </div>
                                <div id="patwari" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr style="text-align: center">
                                                    <td rowspan="3">
                                                        <?php if ($vill_Data->PATWARI_PHOTO != 'x') { ?>
                                                            <img src="<?php echo base_url('vp/assets_/pics/' . $vill_Data->PATWARI_PHOTO); ?>" style="max-width: 100px" class="img-responsive" />
                                                        <?php } else { ?>
                                                            <img src="<?php echo base_url('vp/assets_/pics/default.png'); ?>" style="max-width: 100px" class="img-responsive" />
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Name:</b> <?php echo $vill_Data->PATWARI_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->PATWARI_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#forestRange">
                                        <h4 class="panel-title">FOREST RANGER </h4></a>
                                </div>
                                <div id="forestRange" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Forest Range:</b> <?php echo $vill_Data->FOREST_RANGE_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Forest Ranger Name:</b> <?php echo $vill_Data->FOREST_RANGER_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->FOREST_RANGER_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#bdo">
                                        <h4 class="panel-title">BDO</h4></a>
                                </div>
                                <div id="bdo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Block Name:</b> <?php echo $vill_Data->BLOCK_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>BDO Name:</b> <?php echo $vill_Data->BDO_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->BDO_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#sarpanch">
                                        <h4 class="panel-title">SARPANCH</h4></a>
                                </div>
                                <div id="sarpanch" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Name:</b> <?php echo $vill_Data->SARPANCH_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->SARPANCH_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#pradhan">
                                        <h4 class="panel-title">GRAM PRADHAN</h4></a>
                                </div>
                                <div id="pradhan" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Name:</b> <?php echo $vill_Data->GRAM_PRADHAN_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contcat Number:</b> <?php echo $vill_Data->GRAM_PRADHAN_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#vikasadhikari">
                                        <h4 class="panel-title">GRAM VIKASH ADHIKARI</h4></a>
                                </div>
                                <div id="vikasadhikari" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Name:</b> <?php echo $vill_Data->GRAM_VIKAS_ADHIKARI_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->GRAM_VIKAS_ADHIKARI_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#panchayatadhikari">
                                        <h4 class="panel-title">GRAM PANCHAYAT ADHIKARI</h4></a>
                                </div>
                                <div id="panchayatadhikari" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Name:</b> <?php echo $vill_Data->GRAM_PANCHAYAT_ADHIKARI_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->GRAM_PANCHAYAT_ADHIKARI_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#so">
                                        <h4 class="panel-title">SO</h4></a>
                                </div>
                                <div id="so" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Police Thana/ Revenue Police Name:</b> <?php echo $vill_Data->POLICE_THANA_OR_REVENUE_POLICE_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>SO Name:</b> <?php echo $vill_Data->SO_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->SO_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#chauki">
                                        <h4 class="panel-title">CHAUKI INCHARGE</h4></a>
                                </div>
                                <div id="chauki" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Police Chauki/ Revenue Police Name:</b> <?php echo $vill_Data->POLICE_CHAWKI_OR_REVENUE_POLICE_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Chauki Incharge Name:</b> <?php echo $vill_Data->CHAWKI_INCHARGE_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->CHAWKI_INCHARGE_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#asha">
                                        <h4 class="panel-title">ASHA</h4></a>
                                </div>
                                <div id="asha" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>Asha Name:</b> <?php echo $vill_Data->ASHA_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->ASHA_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#anm">
                                        <h4 class="panel-title">ANM</h4></a>
                                </div>
                                <div id="anm" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>ANM Name:</b> <?php echo $vill_Data->ANM_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Contact Number:</b> <?php echo $vill_Data->ANM_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#blo">
                                        <h4 class="panel-title">BLO</h4></a>
                                </div>
                                <div id="blo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover">
                                                <tr>
                                                    <td><b>BLO Name:</b> <?php echo $vill_Data->BLO_NAME; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>BLO Number:</b> <?php echo $vill_Data->BLO_PHONE; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!-------------------------------------------------------------->
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xs-12 col-sm-12 col-md-12 side-bar" style="margin-top: 12px;">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <ul class="nav nav-tabs" style="background: #f2f2f2;">
                            <li class="active"><a href="#administration" data-toggle="tab">ADMINISTRATION</a></li>
                            <li class=""><a href="#land" data-toggle="tab">LAND</a></li>
                            <li class=""><a href="#facilities" data-toggle="tab">FACILITIES/RESOURCES</a></li>
                        </ul>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="administration" aria-labelledby="home-tab">
                            <!-------------------------------------------------------------->
                            <div class="panel-group" id="accordion1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#area">
                                            <h4 class="panel-title">DIFFERENT ADMINISTRATIVE AREA</h4></a>
                                    </div>
                                    <div id="area" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td><b>Kanoongo Area Name:</b> <?php echo $vill_Data->KANOONGO_AREA_NAME; ?></td>
                                                        <td><b>Patwari Area Name:</b> <?php echo $vill_Data->PATWARI_AREA_NAME; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Van Panchayat Name:</b> <?php echo $vill_Data->VANPANCHAYAT_NAME; ?></td>
                                                        <td><b>Van Panchayat Total Area:</b> <?php echo $vill_Data->TOTAL_VANPANCHAYAT_AREA; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nyay Panchayat Name:</b> <?php echo $vill_Data->NYAY_PANCHAYAT_NAME; ?></td>
                                                        <td><b>Aganwadi Name:</b> <?php echo $vill_Data->ANGANVAADI_NAME; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Aganwadi Worker Name:</b> <?php echo $vill_Data->ANGANVAADI_WORKER_NAME; ?></td>
                                                        <td><b>Aganwadi Worker Phone Number:</b> <?php echo $vill_Data->ANGANVAADI_WORKER_PHONE; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#gramPanchayat">
                                            <h4 class="panel-title">GRAM PANCHAYAT </h4></a>
                                    </div>
                                    <div id="gramPanchayat" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td><b>Gram Panchayat Name:</b> <?php echo $vill_Data->GRAM_PANCHAYAT_NAME; ?></td>
                                                        <td><b>Number of Hamlet:</b> <?php echo $vill_Data->NUMBER_OF_TOK; ?></td>
                                                        <td><b>Names of Hamlet:</b> <?php echo $vill_Data->NAMES_OF_TOK; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#population">
                                            <h4 class="panel-title">POPULATION </h4></a>
                                    </div>
                                    <div id="population" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td><b>Census Year:</b> <?php echo $vill_Data->POPULATION_CENSUS_YEAR; ?></td>
                                                        <td><b>Male Population:</b> <?php echo $vill_Data->MALE_POPULATION; ?></td>
                                                        <td><b>Female Population:</b> <?php echo $vill_Data->FEMALE_POPULATION; ?></td>
                                                        <td><b>Total Population:</b> <?php echo $vill_Data->TOTAL_POPULATION; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#election">
                                            <h4 class="panel-title">ELECTION</h4></a>
                                    </div>
                                    <div id="election" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td><b>Parliamentry Constituency:</b> <?php echo $vill_Data->LOKSABHA_PARLIAMENTRY_CONSTITUENCY; ?></td>
                                                        <td><b>MP Name:</b> <?php echo $vill_Data->LOKSABHA_MP_NAME; ?></td>
                                                        <td><b>Assembly Constituency:</b> <?php echo $vill_Data->LOKSABHA_ASSEMBLY_CONSTITUENCY; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>MLA Name:</b> <?php echo $vill_Data->LOKSABHA_MLA_NAME; ?></td>
                                                        <td><b>Polling Booth Name:</b> <?php echo $vill_Data->POLING_BOOTH_NAME; ?></td>
                                                        <td><b>Village under Polling Booth:</b> <?php echo $vill_Data->VILLAGES_UNDER_POLING_BOOTH; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#mela">
                                            <h4 class="panel-title">LOCAL MELA</h4></a>
                                    </div>
                                    <div id="mela" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($mela)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>MELA NAME</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($mela as $melaitem) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $melaitem->MELA_NAME; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#tourist">
                                            <h4 class="panel-title">TOURIST PLACES</h4></a>
                                    </div>
                                    <div id="tourist" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="form-group col-md-12 col-lg-12 col-xs-12">
                                                <label>SELECT TOURIST PLACES TYPE </label>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'name' => 'placesType',
                                                    'class' => 'required form-control',
                                                    'id' => 'placesType',
                                                    'required' => 'required',
                                                    'onChange' => 'fillToursitPlaces(this,' . $vill_Data->VILLAGEID . ');',
                                                );
                                                $options = array();
                                                $options[0] = 'Select';
                                                foreach ($placesType as $ptype) {
                                                    $options[$ptype->TPTID] = ucwords(strtolower($ptype->TOURIST_PLACE_TYPE));
                                                }
                                                echo form_dropdown($data, $options);
                                                ?>
                                            </div>

                                            <div class="table" id="touristPlacesData">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion1" href="#tourActivity">
                                            <h4 class="panel-title">TOURISM ACTIVITY PERFORMED</h4></a>
                                    </div>
                                    <div id="tourActivity" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($activityType)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>ACTIVITY NAME</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($activityType as $activityitem) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $activityitem->ACTIVITY_NAME_; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                -->
                                
                            </div>
                            <!-------------------------------------------------------------->
                        </div>                                                                    
                        
                        
                        <div role="tabpanel" class="tab-pane fade" id="land" aria-labelledby="land-tab">
                            <!-------------------------------------------------------------->
                            <div class="panel-group" id="accordion3">                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion3" href="#land1">
                                            <h4 class="panel-title">LAND </h4></a>
                                    </div>
                                    <div id="land1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td><b>Total Land Holders:</b> <?php echo $vill_Data->TOTAL_LAND_HOLDERS; ?></td>
                                                        <td><b>Total Area Under Cultivation (Hectare):</b> <?php echo $vill_Data->AGRICULTURE_TOTAL_AREA_UNDER_CULTIVATION_IN_HECTARE; ?></td>
                                                        <td><b>Total Government Land (Hectare):</b> <?php echo $vill_Data->TOTAL_GOVT_LAND_UNDER_DIFF_CATEG_IN_HECTARE; ?></td>
                                                    </tr>

                                                    <tr>
                                                        <td><b>Total Landless People:</b> <?php echo $vill_Data->TOTAL_LANDLESS_PEOPLE; ?></td>
                                                        <td><b>Name of The Crop:</b> <?php echo $vill_Data->MAIN_NAME_OF_CROP; ?></td>
                                                        <td><b>Total Land Area of Village(Hectare):</b> <?php echo $vill_Data->TOTAL_LAND_AREA_OF_VILLAGE_IN_HECTARE; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                            <!-------------------------------------------------------------->
                        </div>
                        
                        
                        <div role="tabpanel" class="tab-pane fade" id="facilities" aria-labelledby="facilities-tab">
                            <!-------------------------------------------------------------->
                            <div class="panel-group" id="accordion4">                        
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#pds">
                                            <h4 class="panel-title">PDS & ROAD</h4></a>
                                    </div>
                                    <div id="pds" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td><b>PDS Shop Owner Name:</b> <?php echo $vill_Data->PDS_SHOP_OWNER_NAME; ?></td>
                                                        <td><b>PDS Shop Owner Phone Number:</b> <?php echo $vill_Data->PDS_SHOP_OWNER_PHONE; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Approach Road Name:</b> <?php echo $vill_Data->APPROACH_ROAD_NAME; ?></td>
                                                        <td><b>Construction Agency:</b> <?php echo $vill_Data->CONSTRUCTION_AGENCY; ?></td>
                                                        <td><b>Pakka/kachcha:</b> <?php echo $vill_Data->APPROACH_ROAD_PAKKA_KACHCHA; ?></td>
                                                        <td><b>Trek Distance:</b> <?php echo $vill_Data->APPROACH_ROAD_TREK_DISTANCE; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Landslide Zone Name(On the Road):</b> <?php echo $vill_Data->LANDSLIDE_ZONE_NAME; ?></td>
                                                        <td><b>Alternate Route Name:</b> <?php echo $vill_Data->ALTERNATE_ROUTE_NAME; ?></td>
                                                        <td><b>Alternate Route Type:</b> <?php echo $vill_Data->ALTERNATE_ROUTE_TYPE; ?></td>
                                                        <td><b>Alternate Route Distance:</b> <?php echo $vill_Data->ALTERNATE_ROUTE_DISTANCE; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Electricity in Village:</b> <?php echo $vill_Data->ELECTRICITY; ?></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#health">
                                            <h4 class="panel-title">NEAREST HEALTH FACILITY </h4></a>
                                    </div>
                                    <div id="health" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <tr>
                                                        <td><b>Health Facility Name:</b> <?php echo $vill_Data->HEALTH_FACILITY_NAME; ?></td>
                                                        <td><b>Mode:</b> <?php echo $vill_Data->HEALTH_FACILITY_GOVT_PRIVATE; ?></td>
                                                        <td><b>Private Clinic Name:</b> <?php echo $vill_Data->PRIVATE_CLINIC_NAME; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Chemist Name:</b> <?php echo $vill_Data->CHEMIST_NAME; ?></td>
                                                        <td><b>Hospital/Sub-Center Name:</b> <?php echo $vill_Data->HOSPITAL_SUBCENTRE_NAME; ?></td>
                                                        <td><b>Hospital/Sub-Center Distance:</b> <?php echo $vill_Data->HOSPITAL_SUBCENTRE_DISTANCE; ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#primary">
                                            <h4 class="panel-title">PRIMARY SCHOOL</h4></a>
                                    </div>
                                    <div id="primary" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($primarySchool)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>SCHOOL NAME</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($primarySchool as $pschool) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $pschool->SCHOOL_NAME; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#middle">
                                            <h4 class="panel-title">MIDDLE SCHOOL</h4></a>
                                    </div>
                                    <div id="middle" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($middleSchool)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>SCHOOL NAME</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($middleSchool as $mschool) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $mschool->SCHOOL_NAME; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#private">
                                            <h4 class="panel-title">PRIVATE SCHOOL</h4></a>
                                    </div>
                                    <div id="private" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($privateSchool)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>SCHOOL NAME</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($privateSchool as $prschool) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $prschool->SCHOOL_NAME; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#collage">
                                            <h4 class="panel-title">COLLEGE</h4></a>
                                    </div>
                                    <div id="collage" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($collage)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>COLLEGE NAME</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($collage as $clg) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $clg->COLLEGE_NAME; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#university">
                                            <h4 class="panel-title">UNIVERSITY</h4></a>
                                    </div>
                                    <div id="university" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($university)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>UNIVERSITY NAME</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($university as $uni) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $uni->UNIV_NAME; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#town">
                                            <h4 class="panel-title">NEAREST TOWN</h4></a>
                                    </div>
                                    <div id="town" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($nearestTown)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>TOWN NAME</b></td>
                                                            <td><b>DISTANCE FROM VILLAGE</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($nearestTown as $nTown) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $nTown->NAME_; ?></td>
                                                                <td><?php echo $nTown->DISTANCE_FROM_VILLAGE; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#bank">
                                            <h4 class="panel-title">BANK/ ATM</h4></a>
                                    </div>
                                    <div id="bank" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="form-group col-md-12 col-lg-12 col-xs-12">
                                                <label>SELECT TYPE (BANK/ATM)</label>
                                                <?php
                                                $data = array(
                                                    'type' => 'text',
                                                    'name' => 'placesType',
                                                    'class' => 'required form-control',
                                                    'id' => 'placesType',
                                                    'required' => 'required',
                                                    'onChange' => 'fillBankDetail(this,' . $vill_Data->VILLAGEID . ');',
                                                );
                                                $options = array();
                                                $options[0] = 'Select';
                                                foreach ($bankType as $btype) {
                                                    $options[$btype->TYPEID] = ucwords(strtolower($btype->NAME_));
                                                }
                                                echo form_dropdown($data, $options);
                                                ?>
                                            </div>

                                            <div class="table" id="bankData">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#helipad">
                                            <h4 class="panel-title">PROPOSED HELIPAD SITE</h4></a>
                                    </div>
                                    <div id="helipad" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($helipadSite)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>LAND OWNER NAME</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($helipadSite as $helipad) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $helipad->LAND_OWNER_NAME_; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion4" href="#shelter">
                                            <h4 class="panel-title">PROPOSED SHELTER PLACE</h4></a>
                                    </div>
                                    <div id="shelter" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <?php if (!empty($shelter)) { ?>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td><b>SR NO</b></td>
                                                            <td><b>SHELTER NAME</b></td>
                                                            <td><b>CAPACITY</b></td>
                                                            <td><b>WATER</b></td>
                                                            <td><b>ELECTRICITY</b></td>
                                                        </tr>
                                                        <?php
                                                        $loop = 1;
                                                        foreach ($shelter as $shel) {
                                                            ?>
                                                            <tr>
                                                                <td><b><?php echo $loop; ?></b></td>
                                                                <td><?php echo $shel->SHELTER_NAME; ?></td>
                                                                <td><?php echo $shel->CAPACITY; ?></td>
                                                                <td><?php echo $shel->WATER; ?></td>
                                                                <td><?php echo $shel->ELECTRICITY; ?></td>
                                                            </tr>
                                                            <?php
                                                            $loop++;
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                            } else {
                                                echo "No Data Found";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-------------------------------------------------------------->
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
<?php } ?>
<!-- content-section-ends-here -->