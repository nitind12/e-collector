<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('my_model', 'mm');
    }

    public function index() {
        $data['menu'] = 1;
        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('home');
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
        $data['village_name'] = $this->mm->getVillages();
        $data['Tehsil_name'] = $this->mm->getDistinctTehsil();
        $data['menu'] = 2;

        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('searchVillage', $data);
        $this->load->view('templates/footer', $data);
    }

    public function uc() {
        $data['village_name'] = $this->mm->getVillages();
        $data['Tehsil_name'] = $this->mm->getDistinctTehsil();
        $data['menu'] = 0;

        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('uc', $data);
        $this->load->view('templates/footer', $data);
    }

    public function revenue_view() {
        $data['village_name'] = $this->mm->getVillages();
        $data['Tehsil_name'] = $this->mm->getDistinctTehsil();
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

        $data['village_Data'] = $this->mm->getVillageOneRowData($villageID);
        $data['pensionerdetail'] = $this->mm->getPension_type();
        $data['primarySchool'] = $this->mm->getPrimarySchool($villageID);
        $data['middleSchool'] = $this->mm->getMiddleSchool($villageID);
        $data['privateSchool'] = $this->mm->getPrivateSchool($villageID);
        $data['collage'] = $this->mm->getCollage($villageID);
        $data['university'] = $this->mm->getUniversity($villageID);
        $data['mela'] = $this->mm->getMela($villageID);
        $data['placesType'] = $this->mm->getTouristPlaceType();
        $data['touristPlaces'] = $this->mm->getTouristPlaceDetail_villID($villageID);
        $data['activityType'] = $this->mm->getTourismActivity($villageID);
        $data['nearestTown'] = $this->mm->getNearestTown($villageID);
        $data['bankType'] = $this->mm->getBankType();
        $data['industryType'] = $this->mm->getIndustryType();
        $data['helipadSite'] = $this->mm->getHelipadDetail($villageID);
        $data['shelter'] = $this->mm->getShelter($villageID);

        $data['village_name'] = $this->mm->getVillages();

        $this->load->view('templates/header');
        $this->load->view('templates/menu-village', $data);
        $this->load->view('village', $data);
        $this->load->view('templates/footer', $data);
    }

    public function searchVillagebyText() {
        $villageID = $this->mm->getVillageID_forTxtSearch();
        if ($villageID != 0) {
            $data['village_Data'] = $this->mm->getVillageOneRowData_textBox($villageID);
            $data['pensionerdetail'] = $this->mm->getPension_type();
            $data['primarySchool'] = $this->mm->getPrimarySchool($villageID);
            $data['middleSchool'] = $this->mm->getMiddleSchool($villageID);
            $data['privateSchool'] = $this->mm->getPrivateSchool($villageID);
            $data['collage'] = $this->mm->getCollage($villageID);
            $data['university'] = $this->mm->getUniversity($villageID);
            $data['mela'] = $this->mm->getMela($villageID);
            $data['placesType'] = $this->mm->getTouristPlaceType();
            $data['touristPlaces'] = $this->mm->getTouristPlaceDetail_villID($villageID);
            $data['activityType'] = $this->mm->getTourismActivity($villageID);
            $data['nearestTown'] = $this->mm->getNearestTown($villageID);
            $data['bankType'] = $this->mm->getBankType();
            $data['industryType'] = $this->mm->getIndustryType();
            $data['helipadSite'] = $this->mm->getHelipadDetail($villageID);
            $data['shelter'] = $this->mm->getShelter($villageID);

            $data['village_name'] = $this->mm->getVillages();

            $this->load->view('templates/header');
            $this->load->view('templates/menu-village', $data);
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

    function getPension_Detail($id_, $villID) {
        $res_ = $this->mm->getPension_Detail_($id_, $villID);
        echo ($res_);
    }

    function getTourist_Places_Detail($id_, $villID) {
        $res_ = $this->mm->getTourist_Places_Detail_($id_, $villID);
        echo ($res_);
    }

    function getBank_Detail($id_, $villID) {
        $res_ = $this->mm->getBank_Detail_($id_, $villID);
        echo ($res_);
    }

    function getIndustry_Detail($id_, $villID) {
        $res_ = $this->mm->getIndustry_Detail_($id_, $villID);
        echo ($res_);
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
        $data['dept'] = $this->mm->get_whoswhoDept(8,0);
        $data['dept1'] = $this->mm->get_whoswhoDept(7,8);
        $data['home'] = $this->mm->get_whoswhohome();
        $data['detail'] = $this->mm->get_whoswhodetail();
        $this->load->view('templates/header');
        $this->load->view('templates/menu', $data);
        $this->load->view('who-who', $data);
        $this->load->view('templates/footer', $data);
    }

}
