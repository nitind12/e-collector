<script type="text/javascript" src="<?PHP echo base_url() . 'nitnav/js/background.cycle.js'; ?>"></script>
<?php
if (!empty($touristPlaces)) {
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("body").backgroundCycle({
                imageUrls: [
                    <?php foreach ($touristPlaces as $tp) {?>
                        '<?php echo base_url('vp/assets_/pics/' . $tp->PIC); ?>',
                    <?php }?>
                        '<?php echo base_url('vp/assets_/pics/' . $tp->PIC); ?>'
                ],
                fadeSpeed: 2000,
                duration: 5000,
                backgroundSize: SCALING_MODE_COVER
            });
        });
    </script>
    <?php
} else {
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("body").backgroundCycle({
                imageUrls: [
                    base_path + '/nitnav/images/1.jpg',
                    base_path + '/nitnav/images/2.jpg',
                    base_path + '/nitnav/images/3.jpg',
                    base_path + '/nitnav/images/4.jpg'
                ],
                fadeSpeed: 2000,
                duration: 5000,
                backgroundSize: SCALING_MODE_COVER
            });
        });
    </script>
<?php } ?>

<body>
    <!-- header-section-starts-here -->
    <div class="header">
        <div class="header-top">
            <div class="wrap">
                <div class="top-menu">
                    <ul style="font-size:18px;">
                        <li><a href="<?PHP echo site_url('web/'); ?>"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="<?PHP echo base_url() . 'nitnav/download/CircleRate-2016.pdf'; ?>" target="_blank"><i class="fa fa-download"></i> Circle Rate</a></li>
                        <li><a href="<?PHP echo base_url() . 'nitnav/download/Whos-Who.pdf'; ?>" target="_blank"><i class="fa fa-users"></i>  Who's Who</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModalNumber"><i class="fa fa-eye"></i>  Disaster Control Room</a></li>
                        <li><a href="http://edistrict.uk.gov.in"><i class="fa fa-certificate"></i> Certificates</a></li>
                        <li><a href="<?PHP echo base_url() . 'nitnav/download/adhar-updated-details.pdf'; ?>" target="_blank"><i class="fa fa-user"></i>  Aadhar Centres</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#myModalContact" ><i class="fa fa-phone"></i> Contact Us</a></li>
                    </ul>
                </div>
                <div class="num">
                    <a href="" data-toggle="modal" data-target="#myModal1" style="color:#fff; font-size: 18px;"><i class="fa fa-sign-in"></i> Login</a> &nbsp;
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="logo text-center" style="text-transform: uppercase">
                <a href="#"><?php
                    foreach ($village_Data as $vill_Data) {
                        echo $vill_Data->NAME_;
                    }
                    ?></a>
            </div>
            </nav>
        </div>
    </div>
    
    <div id="myModalContact" class="modal fade" role="dialog" style="background: rgba(76, 175, 80, 0.8)">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content col-sm-12" style="background: #fff; float:right">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 align='center' style="color:#000; font-weight: bold; font-size:24px;">CONTACT US</h4>
                </div>
                <div class="modal-body" style="font-size: 19px;">
                        <p>DM Office,</p>
                        <p>Tallital, Nainital,</p>
                        <p><b>Contact No:</b> 05942 - 235684 (O), <b>email:</b>  dm-nai-ua@nic.in </p>
                        <hr>
                        <p>SDM Office,</p>
                        <p>Tallital, Nainital,</p>
                        <p><b>Contact No:</b> 05946-235542, <b>email:</b> sdm.ntl@gmail.com</p>
                        <hr>
                        <p><b>For any query contact</b></p>
                        <p>Vikas Sharma</p>
                        <p>eDistrict Manager, District Magistrate Office Nainital </p>
                        <p><b>Contact No:</b> +919410376902, +919634759269, <br><b>email:</b> edmnainital@gmail.com  </p>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    
    <div id="myModalNumber" class="modal fade" role="dialog" style="background: rgba(76, 175, 80, 0.8)">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content col-sm-9" style="background: #ff6666; float:right">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 align='center' style="color:#fff; font-weight: bold; font-size:24px;">DISASTER CONTROL ROOM</h4>
                </div>
                <div class="modal-body">
                    <h4 align='center' style="color:#ffEE00; font-weight: bold; font-size: 32px;"><i class="fa fa-phone"></i> 05942-235684/235343</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>