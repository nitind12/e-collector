<?php if($this->session->userdata('status__') == "ADMIN") { ?>
<div class="navbar navbar-inverse set-radius-zero" style="background-color: #4586d6">
    <div class="container">      
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <h1 class="head">DM NEWS PORTAL (<?php echo $this->session->userdata('user__'); 
                ?>)</h1>
            </div>
            <div class="col-md-4" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('web/'); ?>" style="font-size: 16px;color: #fff">
                        Back to DM Portal <i class="fa fa-sign-out"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container" id="wrapper">

    <!-- Navigation -->
    <?php //$this->load->view('templates/navigation'); ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
            
                <h1 class="page-header">
                Feed News <span style="font-size: 17px">(<?php echo $this->session->userdata('user__'); 
                ?>)</span> 
                <div style="font-size: 18px; float: right; color: #ff0000; padding: 15px 0px 0px 0px; text-align: center">
                <?php echo $this->session->flashdata('error_msg_'); ?>
            </div>
                </h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <?php $data['style_'] = ' style="height: 370px; overflow: auto"'; ?>
                <?php $this->load->view('newsevents/feednews', $data); ?>
            </div>
            <div class="col-lg-6">
                <?php $this->load->view('newsevents/viewnews_active', $data); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
            <?php $this->load->view('newsevents/viewnews_deactive', $data); ?>
            </div>
        </div>
    </div>
</div>
<?php } else { ?>
<?php redirect(_ROOT_URL_); ?>
<?php } ?>