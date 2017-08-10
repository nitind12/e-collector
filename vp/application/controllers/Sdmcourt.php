<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sdmcourt extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_court_model', 'mcm');
    }

    function check_login() {
        if (!$this->session->userdata('user__')) {
            redirect(_ROOT_URL_);
        }
    }

    function index($active = 'x', $page_ = 'dashboard', $data_ = 'x', $id = 'x', $count = 'x') {
        $this->check_login();

        $data['view'] = '';
        $data['new'] = '';
        $data['newupdate'] = '';
        $data['edit'] = '';
        // Master Data
        $data['act_'] = $this->mcm->get_acts();
        $data['court_'] = $this->mcm->get_court();
        $data['section_'] = $this->mcm->get_section();
        $data['tehsil_'] = $this->mcm->get_tehsil();
        // -----------
        $data['totalcases'] = $this->mcm->count_master_cases();
        $data['sdmcourtcases'] = $this->mcm->getCases($this->session->userdata('user__'));
        $data['pendingcases'] = $this->mcm->pendingcases();

        // Pagination
            $config = array();
            $config["base_url"] = base_url() . "index.php/sdmcourt/index/view/dashboard";
            $config["total_rows"] = count($this->mcm->total_master_cases());
            $config["per_page"] = 25;
            $config["uri_segment"] = 5;
            $choice = $config["total_rows"] / $config["per_page"];

            $config["num_links"] = round($choice);
            $config['full_tag_open'] = '<ul class="pagination pagination-md">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $pageseg = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

            $data['forLoop']=$pageseg;
            $data['mastercases'] = $this->mcm->getMasterCases_pagination($config["per_page"], $pageseg);
            $data["links"] = $this->pagination->create_links(); 
        // ----------
        if ($active == "view") {
            if ($count != 'x') {                
               $data['mastercases'] = $this->mcm->getMasterCases('x', $count);
            }
            $data['view'] = 'active';
        } else if ($active == "new") {
            $config["per_page"] = 2;
            if ($count != 'x') {
                $data['mastercases'] = $this->mcm->getMasterCases('x', $count);
            } else {
                $data['mastercases'] = $this->mcm->getMasterCases();
            }
            $data['new'] = 'active';
        } else if ($active == "newupdate") {
            $config["per_page"] = 2;
            $data['mastercases'] = $this->mcm->getMasterCases('x', 1);
            $data['updateNewCaseRecord'] = $this->mcm->updateNewCaseRecord($id);
            $data['newupdate'] = 'active';
        } else if ($active == "edit") {
            $config["per_page"] = 2;
            $data['mastercases'] = $this->mcm->getMasterCases('x', 1);
            $data['editCaseRecord'] = $this->mcm->editCaseRecord($id);
            $data['edit'] = 'active';
        } else {
            redirect('sdmcourt/index/view');
        }

        $this->load->view('templates/header');
        $this->load->view('court/' . $page_, $data);
        $this->load->view('templates/footer');
    }

    function searchcase($active = 'x', $page_ = 'dashboard', $data_ = '', $id = 'x') {
        $this->check_login();

        // Master Data
        $data['act_'] = $this->mcm->get_acts();
        $data['court_'] = $this->mcm->get_court();
        $data['section_'] = $this->mcm->get_section();
        $data['tehsil_'] = $this->mcm->get_tehsil();
        // -----------

        if ($this->input->post('txtCaseNo')) {
            $caseno_ = $this->input->post('txtCaseNo');
            $data['view'] = '';
            $data['new'] = '';
            $data['newupdate'] = '';
            $data['edit'] = '';
            $data['totalcases'] = $this->mcm->count_master_cases();
            $data['casewise'] = $this->mcm->getCase($caseno_);
            $data['sdmcourtcases'] = $this->mcm->getCases($this->session->userdata('user__'), 'x', $caseno_);
            $data['pendingcases'] = $this->mcm->pendingcases();

            if ($active == "view") {
                $data['view'] = 'active';
            } else if ($active == "new") {
                $data['new'] = 'active';
            } else if ($active == "newupdate") {
                $data['updateNewCaseRecord'] = $this->mcm->updateNewCaseRecord($id);
                $data['newupdate'] = 'active';
            } else if ($active == "edit") {
                $data['editCaseRecord'] = $this->mcm->editCaseRecord($id);
                $data['edit'] = 'active';
            }

            $this->load->view('templates/header');
            $this->load->view('court/' . $page_, $data);
            $this->load->view('templates/footer');
        } else {
            redirect('sdmcourt/index/view');
        }
    }

    function submitnewcase() {
        $this->check_login();
        $this->mcm->submitnewcase($this->session->userdata('user__'));
        redirect('sdmcourt/index/view');
    }

    function updatecaserecord($sno, $ref_sno) {
        $this->check_login();
        $this->mcm->updatecaserecord($sno, $ref_sno, $this->session->userdata('user__'));
        redirect('sdmcourt/index/view');
    }

    function updatecaseNewrecord($sno, $ref_sno) {
        $this->check_login();
        $this->mcm->updatecaseNewrecord($sno, $ref_sno, $this->session->userdata('user__'));
        redirect('sdmcourt/index/view');
    }

    function deletecaserecord($sno) {
        $this->check_login();
        $this->mcm->deletecaserecord($sno);
        redirect('sdmcourt/index/view');
    }

    function deletewholecase($sno) {
        $this->check_login();
        $this->mcm->deletewholecase($sno);
        redirect('sdmcourt/index/view');
    }

    function pendingcases() {
        $this->check_login();
        $data['pendingcases'] = $this->mcm->pendingcases();
        $this->load->view('court/direct/pendingcases', $data);
    }

    function todayscases() {
        $this->check_login();
        $data['todayscases'] = $this->mcm->todayscases();
        $this->load->view('court/direct/todayscases', $data);
    }

    function disposedoffcases() {
        $this->check_login();
        if ($this->input->post('txtStartDate')) {
            $stdt = $this->input->post('txtStartDate');
        } else {
            $stdt = date('Y-m-d');
        }
        if ($this->input->post('txtEndDate')) {
            $enddt = $this->input->post('txtEndDate');
        } else {
            $enddt = date('Y-m-d');
        }
        $data['disposedoffcases'] = $this->mcm->disposedoffcases($stdt, $enddt);

        $data['_start_'] = date("d/M/Y", strtotime($stdt));
        $data['_end_'] = date("d/M/Y", strtotime($enddt));

        $this->load->view('court/direct/disposedoffcases', $data);
    }

    function finalcases() {
        $this->check_login();
        if ($this->input->post('txtStartDate')) {
            $stdt = $this->input->post('txtStartDate');
        } else {
            $stdt = date('Y-m-d');
        }
        if ($this->input->post('txtEndDate')) {
            $enddt = $this->input->post('txtEndDate');
        } else {
            $enddt = date('Y-m-d');
        }
        $data['finalcases'] = $this->mcm->finalcases($stdt, $enddt);

        $data['_start_'] = date("d/M/Y", strtotime($stdt));
        $data['_end_'] = date("d/M/Y", strtotime($enddt));

        $this->load->view('court/direct/finalcases', $data);
    }

    function searching() {
        $this->check_login();
        // Master Data
        $data['act_'] = $this->mcm->get_acts();
        $data['court_'] = $this->mcm->get_court();
        $data['section_'] = $this->mcm->get_section();
        $data['tehsil_'] = $this->mcm->get_tehsil();
        // -----------

        if (isset($_POST['search_submit'])) {
            $data['actname_'] = $this->input->post('txtActName');
            $data['section_'] = $this->input->post('txtSection');
            $data['village_'] = $this->input->post('txtVillage');
            $data['patwariarea_'] = $this->input->post('txtPatwariArea');
            $data['policearea_'] = $this->input->post('txtPoliceArea');
        } else {
            $data['actname_'] = 'x';
            $data['section_'] = 'x';
            $data['village_'] = 'x';
            $data['patwariarea_'] = 'x';
            $data['policearea_'] = 'x';
        }

        $data['actname'] = $this->mcm->fetch_act();
        $data['section'] = $this->mcm->fetch_section();
        $data['village'] = $this->mcm->fetch_village();
        $data['patwariarea'] = $this->mcm->fetch_patwariarea();
        $data['policearea'] = $this->mcm->fetch_policearea();

        $data['searching'] = $this->mcm->searching();
        $this->load->view('court/direct/search', $data);
    }

    function dmsearching() {
        $this->check_login();
        // Master Data
        $data['act_'] = $this->mcm->get_acts();
        $data['court_'] = $this->mcm->get_court();
        $data['section_'] = $this->mcm->get_section();
        $data['tehsil_'] = $this->mcm->get_tehsil();
        // -----------
        if (isset($_POST['search_submit'])) {
            $data['courtname_'] = $this->input->post('txtCourt');
            $data['actname_'] = $this->input->post('txtActName');
            $data['section_'] = $this->input->post('txtSection');
            $data['village_'] = $this->input->post('txtVillage');
            $data['patwariarea_'] = $this->input->post('txtPatwariArea');
            $data['policearea_'] = $this->input->post('txtPoliceArea');
        } else {
            $data['courtname_'] = 'x';
            $data['actname_'] = 'x';
            $data['section_'] = 'x';
            $data['village_'] = 'x';
            $data['patwariarea_'] = 'x';
            $data['policearea_'] = 'x';
        }
        $data['court'] = $this->mcm->fetch_court_dm();
        $data['actname'] = $this->mcm->fetch_act_dm();
        $data['section'] = $this->mcm->fetch_section_dm();
        $data['village'] = $this->mcm->fetch_village_dm();
        $data['patwariarea'] = $this->mcm->fetch_patwariarea_dm();
        $data['policearea'] = $this->mcm->fetch_policearea_dm();

        $data['searching'] = $this->mcm->dmsearching();
        $this->load->view('court/direct/dmsearch', $data);
    }

}
