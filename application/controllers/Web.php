<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('my_model', 'mm');
    }

    public function index() {
        $data['menu'] = 1;
        $data['download'] = $this->mm->get_all_downloads();
        $data['news'] = $this->mm->get_newsdetail();
        $data['finalCase'] = $this->mm->get_finalCases();
        $data['pendingCase'] = $this->mm->get_pendingCases();
        $data['desposedCase'] = $this->mm->get_disposedoffcases();
        $data['totalCase'] = $this->mm->get_totalcases();
        $data['todaysCase'] = $this->mm->get_todayscases();
        $data['allcourt'] = $this->mm->get_AllCourt();

        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('home', $data);
        $this->load->view('templates/footer');
    }

    public function touristGallery($id = 0) {
        $data['cat'] = $this->mm->get_all_categories();
        $data['cat_p'] = $this->mm->get_all_categories($id);
        $data['gal'] = $this->mm->get_all_pics();
        $data['gal_p'] = $this->mm->get_all_pics($id);
        $data['Allgal'] = $this->mm->get_all_pics_cat();
        $data['menu'] = 2;
        if ($id == 0) {
            $data['galID'] = 0;
        } else {
            $data['galID'] = 1;
        }
        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('touristGallery', $data);
        $this->load->view('templates/footer');
    }

    public function searchDashboard() {
        //$data['village_name'] = $this->mm->getVillages();
        $data['Tehsil_name'] = $this->mm->getDistinctTehsil_new();
        $data['menu'] = 2;

        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('searchVillage', $data);
        $this->load->view('templates/footer', $data);
    }    

    public function revenue_view() {
       // $data['village_name'] = $this->mm->getVillages();
        $data['Tehsil_name'] = $this->mm->getDistinctTehsil_new();
        $data['menu'] = 2;

        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('revenue-view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function court_view($search = 'x') {
        if ($search == 'x') {
            $data['searchData'] = 'x';
        } else {
            $data['searchData'] = $this->mm->searchCases();
            $data['masterData'] = $this->mm->getMasterCases();
        }
        $data['courtName'] = $this->mm->getCourtName();
        $data['menu'] = 2;

        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('court-view', $data);
        $this->load->view('templates/footer', $data);
    }

    public function searchVillage($villageID = 0) {
        $villageID = $this->mm->getVillageID_Search($villageID);

        $data['village_Data'] = $this->mm->getVillageData($villageID);

        $data['menu'] = 2;

        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('village', $data);
        $this->load->view('templates/footer', $data);
    }

    public function searchVillagebyText() {
        $villageID = $this->mm->getVillageID_forTxtSearch();
        if ($villageID != 0) {
            $data['village_Data'] = $this->mm->getVillageOneRowData_textBox($villageID);
            $data['menu'] = 2;
            $this->load->view('templates/header');
            $this->load->view('templates/menu', $data);
            $this->load->view('village', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('web/index');
        }
    }

    function get_village_by_tehsil($tehsilName) {
        $res_ = $this->mm->get_village_by_tehsil_($tehsilName);
        echo $res_;
    }
    
    function get_village_by_tehsil_forMap($tehsilName) {
        $res_ = $this->mm->get_village_by_tehsil_m($tehsilName);
        echo $res_;
    }
    

    function searchVillageAjax() {
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response  
        $query = $this->mm->searchVillageAjax_($keyword); //Search DB  
        if (!empty($query)) {
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach ($query as $row) {
                $data['message'][] = array(
                    'id' => $row->VILLAGEID,
                    'value' => $row->NAME_,
                    ''
                );  //Add a row to array  
            }
        }
        if ('IS_AJAX') {
            echo json_encode($data); //echo json string if ajax request  
        } else {
            $this->load->view('index', $data); //Load html view of search results  
        }
    }

    function fillMapView($id_) {
        $data_to_ajax = $this->mm->fillMapView_($id_);
        echo $data_to_ajax;
    }

    function todayscases() {
        $data['todayscases'] = $this->mm->todayscases();
        $this->load->view('todayscases', $data);
    }

    public function whos_who() {
        $data['menu'] = 3;
        $data['dept'] = $this->mm->get_whoswhoDept(8, 0);
        $data['dept1'] = $this->mm->get_whoswhoDept(7, 8);
        $data['home'] = $this->mm->get_whoswhohome();
        $data['detail'] = $this->mm->get_whoswhodetail();
        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('who-who', $data);
        $this->load->view('templates/footer', $data);
    }

    public function aboutNainital() {
        $data['menu'] = 0;
        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('aboutNainital', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pdfDownload() {
        $pdfPath = $this->mm->get_pdf_to_download();
        
        $data['urlPath'] = base_url() . 'vp/assets_/pdf_others/'. $pdfPath;
       
        $this->load->view('ePDF', $data);
    }

}
