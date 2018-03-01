<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('my_model', 'mm');
        $this->load->model('My_court_model', 'mcm');
    }

    function index() {
        $this->check_login();

        $this->load->view('templates/header');
        $this->load->view('home');
        $this->load->view('templates/footer');
    }

    function check_login() {
        if (!$this->session->userdata('user__')) {
            redirect(_ROOT_URL_);
        }
    }

    function login() {
        $this->check_login();
        redirect('web');
        //$this->load->view('templates/header');
        //$this->load->view('login');
        //$this->load->view('templates/footer');
    }

    function checkAuthentication() {
        $this->form_validation->set_rules('g-recaptcha-response', 'Captcha', 'callback_recaptcha');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('_msgall_', '1The CAPTCHA field is telling me that you are a robot. Please check the recaptcha field and try again?');
            $page_ = 'web/login';
        } else {
            $result = $this->mm->authenticate();

            if ($result['res_'] == true) {
                $page_ = $result['path_'];
            } else {
                $page_ = $result['path_'];
                $this->session->set_flashdata('_msgall_', 'X: Please fill login credentials correctly !!! ');
            }
        }
        echo $this->session->flashdata('_msgall_');
        echo $page_;
        die();
        redirect($page_);
    }
    
    public function recaptcha($str = '') {
        $google_url = "https://www.google.com/recaptcha/api/siteverify";
        $secret = '6Ld4VkEUAAAAAIoOQLj8Kpn8Kr7GddShpU-0yKVw';
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = $google_url . "?secret=" . $secret . "&response=" . $str . "&remoteip=" . $ip;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
        $res = curl_exec($curl);
        curl_close($curl);
        $res = json_decode($res, true);
        //reCaptcha success check
        if ($res['success']) {
            return TRUE;
        } else {
            $this->session->set_flashdata('_msgall_', 'The CAPTCHA field is telling me that you are a robot. Please check the recaptcha field and try again?');
            return FALSE;
        }
    }


    function logout() {
        $this->session->unset_userdata('user__');
        $this->session->unset_userdata('status__');
        $this->session->set_flashdata('_msgall_', 'Successfully Logged Out !!');
        redirect(_ROOT_URL_);
    }

    function patwariDasboard($page_ = 'dashboard', $data_ = '', $id = 'x', $active = 'x') {
        $this->check_login();
        if ($data_ != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $data_;
            $data['villageData'] = $this->mm->getVillageOneRowData($id);
            if (count($data['villageData']) == 0) {
                redirect('web/patwariDasboard');
            }
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $id;

            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 3) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 3) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            if ($active == '1') {
                $data['active_administration'] = 'active';
            } else if ($active == '2') {
                $data['pensioners'] = 'active';
            } else if ($active == '3') {
                $data['education_'] = 'active';
            } else if ($active == '4') {
                $data['tour'] = 'active';
            } else if ($active == '5') {
                $data['other_'] = 'active';
            }
        } else {
            $data['village_name'] = '';
        }

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/' . $page_, $data);
        $this->load->view('templates/footer');
    }

    function newVillageEntry() {
        $res_data = $this->mm->newVillageEntry();
        if ($res_data['res_'] == true) {
            $village_name = $this->input->post('txtNewVillageName');
            $page_ = 'village';
        } else {
            $data = '';
            $page_ = 'dashboard';
        }
        redirect('web/patwariDasboard/' . $page_ . "/" . str_replace(' ', '-', $village_name) . '/' . $res_data['id'] . "/" . '1');
    }

    function updatedm($villagename, $detailid) {
        $result = $this->mm->updatedm($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function updatesdm($villagename, $detailid) {
        $result = $this->mm->updatesdm($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function updatetehsil($villagename, $detailid) {
        $result = $this->mm->updatetehsil($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function updatediffareaundertehsil($villagename, $detailid) {
        $result = $this->mm->updatediffareaundertehsil($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function updategrampanchayat($villagename, $detailid) {
        $result = $this->mm->updategrampanchayat($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function updatelanddetail($villagename, $detailid) {
        $result = $this->mm->updatelanddetail($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function updatepopulation($villagename, $detailid) {
        $result = $this->mm->updatepopulation($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function nearesthealthfacility($villagename, $detailid) {
        $result = $this->mm->nearesthealthfacility($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function election($villagename, $detailid) {
        $result = $this->mm->election($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function pdsroaddetail($villagename, $detailid) {
        $result = $this->mm->pdsroaddetail($detailid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    // Dynamic Below
    function checkPensionNumber($pensionNo) {
        $result = $this->mm->checkPensionNumber(trim($pensionNo));
        if ($result == true) {
            $bool = "yes";
        } else {
            $bool = "no";
        }
        echo $bool;
    }

    function enterpensioner($villagename, $detailid) {
        $result = $this->mm->enterpensioner();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '2');
    }

    function updatepensioner($villagename, $detailid, $pdetid) {
        $result = $this->mm->updatepensioner($pdetid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '2');
    }

    function editPensionDetail($villagename, $detailid, $pdetid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['pensioners'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editpensiondetail'] = $this->mm->editPensionDetail($pdetid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function delPensionDetail($villagename, $detailid, $pdetid) {
        $result = $this->mm->delPensionDetail($pdetid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '2');
    }

    function enterprimaryschool($villagename, $detailid) {
        $result = $this->mm->enterprimaryschool();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function editprimaryschool($villagename, $detailid, $schid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['education_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editprimary'] = $this->mm->editprimaryschool($schid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updateprimaryschool($villagename, $detailid, $schid) {
        $result = $this->mm->updateprimaryschool($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function delprimaryschool($villagename, $detailid, $schid) {
        $result = $this->mm->delprimaryschool($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function entermiddleschool($villagename, $detailid) {
        $result = $this->mm->entermiddleschool();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function editmiddleschool($villagename, $detailid, $schid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['education_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editmiddle'] = $this->mm->editmiddleschool($schid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updatemiddleschool($villagename, $detailid, $schid) {
        $result = $this->mm->updatemiddleschool($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function delmiddleschool($villagename, $detailid, $schid) {
        $result = $this->mm->delmiddleschool($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function enterprivateschool($villagename, $detailid) {
        $result = $this->mm->enterprivateschool();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function editprivateschool($villagename, $detailid, $schid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['education_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editprivate'] = $this->mm->editprivateschool($schid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updateprivateschool($villagename, $detailid, $schid) {
        $result = $this->mm->updateprivateschool($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function delprivateschool($villagename, $detailid, $schid) {
        $result = $this->mm->delprivateschool($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function entercollege($villagename, $detailid) {
        $result = $this->mm->entercollege();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function editcollege($villagename, $detailid, $schid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['education_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editcollege'] = $this->mm->editcollege($schid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updatecollege($villagename, $detailid, $schid) {
        $result = $this->mm->updatecollege($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function delcollege($villagename, $detailid, $schid) {
        $result = $this->mm->delcollege($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function enteruniversity($villagename, $detailid) {
        $result = $this->mm->enteruniversity();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function edituniv($villagename, $detailid, $schid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['education_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['edituniv'] = $this->mm->edituniv($schid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updateuniversity($villagename, $detailid, $schid) {
        $result = $this->mm->updateuniversity($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function deluniv($villagename, $detailid, $schid) {
        $result = $this->mm->deluniv($schid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '3');
    }

    function entermela($villagename, $detailid) {
        $result = $this->mm->entermela();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '4');
    }

    function editmela($villagename, $detailid, $melaid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['tour'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editmela'] = $this->mm->editmela($melaid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updatemela($villagename, $detailid, $melaid) {
        $result = $this->mm->updatemela($melaid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '4');
    }

    function delmela($villagename, $detailid, $melaid) {
        $result = $this->mm->delmela($melaid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '4');
    }

    function entertourplaces($villagename, $detailid) {
        $result = $this->mm->entertourplaces();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '4');
    }

    function edittourplaces($villagename, $detailid, $tpid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['tour'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['edittourplaces'] = $this->mm->edittourplaces($tpid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updatetourplaces($villagename, $detailid, $tpid) {
        $result = $this->mm->updatetourplaces($tpid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '4');
    }

    function deltourplaces($villagename, $detailid, $tpid) {
        $result = $this->mm->deltourplaces($tpid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '4');
    }

    function enteractivity($villagename, $detailid) {
        $result = $this->mm->enteractivity();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '4');
    }

    function editactivity($villagename, $detailid, $tatid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['tour'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editactivity'] = $this->mm->editactivity($tatid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updateactivity($villagename, $detailid, $tatid) {
        $result = $this->mm->updateactivity($tatid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '4');
    }

    function delactivity($villagename, $detailid, $tatid) {
        $result = $this->mm->delactivity($tatid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '4');
    }

    function enternearesttown($villagename, $detailid) {
        $result = $this->mm->enternearesttown();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function editnearesttown($villagename, $detailid, $nearesttownid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['other_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editnearesttown'] = $this->mm->editnearesttown($nearesttownid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updatenearesttown($villagename, $detailid, $nearesttownid) {
        $result = $this->mm->updatenearesttown($nearesttownid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function delnearesttown($villagename, $detailid, $nearesttownid) {
        $result = $this->mm->delnearesttown($nearesttownid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function enterbankatm($villagename, $detailid) {
        $result = $this->mm->enterbankatm();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function editbankatm($villagename, $detailid, $bankatmid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['other_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editbankatm'] = $this->mm->editbankatm($bankatmid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updatebankatm($villagename, $detailid, $bankatmid) {
        $result = $this->mm->updatebankatm($bankatmid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function delbankatm($villagename, $detailid, $bankatmid) {
        $result = $this->mm->delbankatm($bankatmid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function enterindustry($villagename, $detailid) {
        $result = $this->mm->enterindustry();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function editindustry($villagename, $detailid, $viid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['other_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editindustry'] = $this->mm->editindustry($viid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updateindustry($villagename, $detailid, $viid) {
        $result = $this->mm->updateindustry($viid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function delindustry($villagename, $detailid, $viid) {
        $result = $this->mm->delindustry($viid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function enterhelipad($villagename, $detailid) {
        $result = $this->mm->enterhelipad();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function edithelipad($villagename, $detailid, $phdid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['other_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['edithelipad'] = $this->mm->edithelipad($phdid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updatehelipad($villagename, $detailid, $phdid) {
        $result = $this->mm->updatehelipad($phdid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function delhelipad($villagename, $detailid, $phdid) {
        $result = $this->mm->delhelipad($phdid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function entershelter($villagename, $detailid) {
        $result = $this->mm->entershelter();
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function editshelter($villagename, $detailid, $psdid) {
        if ($villagename != '') {

            $data['active_administration'] = '';
            $data['pensioners'] = '';
            $data['education_'] = '';
            $data['tour'] = '';
            $data['other_'] = '';

            $data['village_name'] = $villagename;
            $data['villageData'] = $this->mm->getVillageOneRowData($detailid);
            $data['villageid'] = $vid = $data['villageData']->VILLAGEID;
            $data['detailid'] = $detailid;
            $data['pensiontype'] = $this->mm->getPensionType();
            $data['toristplacetype'] = $this->mm->gettoristplacetype();
            $data['bankatmtype'] = $this->mm->get_bank_atm_type();
            $data['industrytype'] = $this->mm->get_industrytype();

            if ($this->session->userdata('status__') == 1) {
                $data['pensionerdetail'] = $this->mm->getPension_detail('x', $vid);
            } else {
                $data['pensionerdetail'] = $this->mm->getPension_detail($this->session->userdata('user__'), $vid);
            }
            if ($this->session->userdata('status__') == 1) {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail('x', $vid);
            } else {
                $data['primaryschooldetail'] = $this->mm->getprimaryschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail('x', $vid);
            } else {
                $data['middleschooldetail'] = $this->mm->getmiddleschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail('x', $vid);
            } else {
                $data['privateschooldetail'] = $this->mm->getprivateschool_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['collegedetail'] = $this->mm->getcollege_detail('x', $vid);
            } else {
                $data['collegedetail'] = $this->mm->getcollege_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['univdetail'] = $this->mm->getuniv_detail('x', $vid);
            } else {
                $data['univdetail'] = $this->mm->getuniv_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['localmeladetail'] = $this->mm->getmela_detail('x', $vid);
            } else {
                $data['localmeladetail'] = $this->mm->getmela_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail('x', $vid);
            } else {
                $data['toristplacedetail'] = $this->mm->gettoristplace_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['activitydetail'] = $this->mm->getactivity_detail('x', $vid);
            } else {
                $data['activitydetail'] = $this->mm->getactivity_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail('x', $vid);
            } else {
                $data['nearesttowndetail'] = $this->mm->getnearesttown_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail('x', $vid);
            } else {
                $data['bankatmdetail'] = $this->mm->getbankatm_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['industrydetail'] = $this->mm->getindustry_detail('x', $vid);
            } else {
                $data['industrydetail'] = $this->mm->getindustry_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['helipaddetail'] = $this->mm->gethelipad_detail('x', $vid);
            } else {
                $data['helipaddetail'] = $this->mm->gethelipad_detail($this->session->userdata('user__'), $vid);
            }

            if ($this->session->userdata('status__') == 1) {
                $data['shelterdetail'] = $this->mm->getshelter_detail('x', $vid);
            } else {
                $data['shelterdetail'] = $this->mm->getshelter_detail($this->session->userdata('user__'), $vid);
            }
            $data['other_'] = 'active';
        } else {
            $data['village_name'] = '';
        }
        $data['editshelter'] = $this->mm->editshelter($psdid);

        $data['villages'] = $this->mm->getVillages($this->session->userdata('user__'));
        $this->load->view('templates/header');
        $this->load->view('patwari/village', $data);
        $this->load->view('templates/footer');
    }

    function updateshelter($villagename, $detailid, $psdid) {
        $result = $this->mm->updateshelter($psdid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function delshelter($villagename, $detailid, $psdid) {
        $result = $this->mm->delshelter($psdid);
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '5');
    }

    function updatevillage($villagename, $detailid, $villid) {
        $result = $this->mm->updatevillage($villid);
        if ($result != '-x-') {
            $villagename = $result;
        }
        redirect('web/patwariDasboard/village/' . str_replace(' ', '-', $villagename) . '/' . $detailid . "/" . '1');
    }

    function delvillage($villid) {
        $result = $this->mm->delvillage($villid);
        redirect('web/patwariDasboard/');
    }

    function news() {
        $this->check_login();
        redirect('newsevents');
    }

}
