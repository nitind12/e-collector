<div class="navbar navbar-inverse set-radius-zero" style="background-color: #C36464">
    <div class="container">      
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <h1 class="head"><?php echo $page_head; ?></h1>
            </div>
            <div class="col-md-2" style="margin-top: 30px; text-align: right">
                <a href="<?PHP echo site_url('web'); ?>">
                    <span class="glyphicon glyphicon-home" style="font-size: 20px;color: #fff"></span>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="container">
<div id="wrapper">
    <!-- Navigation -->
    <?php //$this->load->view('templates/navigation'); ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12" style="color: #ff0000; padding: 0px; text-align: center; border: #ff0000 solid 0px">
                <?php echo $this->session->flashdata('_msg_'); ?>
            </div>
            <div style="clear: both; padding: 10px"></div>
        </div>
        <div class="row">
            <?php $data['style_'] = ' style="height: 400px; overflow: auto"'; ?>
            <?php $this->load->view($folder_ . '/' . $page__, $data); ?>
        </div>

        <div class="row">
            <?php if (isset($view1)) { ?>
            <?php $this->load->view($folder_ . '/' . $view1, $data); ?>
            <?php } ?>
            <?php if (isset($view2)) { ?>
                <?php $this->load->view($folder_ . '/' . $view2, $data); ?>
            <?php } ?>
        </div>
        
        <?php if (isset($view3)) { ?>
            <div class="row">
                <?php $this->load->view($folder_ . '/' . $view3, $data); ?>
            </div>
        <?php } ?>
    </div>
</div>
</div>