<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

    function getVillages() {
        $this->db->where('a.STATUS', 1);
        $this->db->order_by('a.NAME_', 'asc');
        $this->db->from('a1_village a');

        $query = $this->db->get();

        return $query->result();
    }

    function getDistinctTehsil() {
        $this->db->distinct();
        $this->db->select('TEHSIL_NAME');

        $this->db->from('a8_village_one_row_data');

        $query = $this->db->get();
        return $query->result();
    }

    function get_village_by_tehsil_($tehsilName) {
        $this->db->select('a.*');
        $this->db->where('a.STATUS', 1);
        $this->db->where('b.TEHSIL_NAME', $tehsilName);
        $this->db->from('a1_village a');
        $this->db->order_by('a.NAME_', 'asc');
        $this->db->join('a8_village_one_row_data b', 'a.VILLAGEID = b.VILLAGEID');

        $query = $this->db->get();

        $output = "<option value='0'>SELECT VILLAGE</option>";
        foreach ($query->result() as $row) {
            $output .= "<option value='" . $row->VILLAGEID . "'>" . $row->NAME_ . "</option>";
        }
        return $output;
    }

    function getVillageID_Search($villID) {
        if ($villID == 0) {
            $villID = $this->input->post('cmbVillage');
        }
        return $villID;
    }

    function getVillageOneRowData($villID) {
        if ($villID == 0) {
            $villID = $this->input->post('cmbVillage');
        }
        $this->db->select('a.NAME_,a.PIC,b.*');
        $this->db->where('b.VILLAGEID', $villID);
        $this->db->from('a8_village_one_row_data b');
        $this->db->join('a1_village a', 'a.VILLAGEID = b.VILLAGEID');

        $query = $this->db->get();
        return $query->result();
    }

    function getVillageID_forTxtSearch() {
        $villName = $this->input->post('id');

        $this->db->where('NAME_', $villName);
        $this->db->from('a1_village');
        $query = $this->db->get();
        if ($query->num_rows() != 0) {
            foreach ($query->result() as $row) {
                $villID = $row->VILLAGEID;
            }
        } else {
            $villID = 0;
        }
        return $villID;
    }

    function getVillageOneRowData_textBox($villID) {
        $this->db->select('a.NAME_,a.PIC,b.*');
        $this->db->where('b.VILLAGEID', $villID);
        $this->db->from('a8_village_one_row_data b');
        $this->db->join('a1_village a', 'a.VILLAGEID = b.VILLAGEID');

        $query = $this->db->get();
        return $query->result();
    }

    function searchVillageAjax_($key) {
        $array = array();
        $this->db->select('*');
        $this->db->like('NAME_', $key);
        $this->db->where('STATUS', 1);
        $this->db->order_by('NAME_', 'asc');
        $this->db->from('a1_village');

        $query = $this->db->get();
        return $query->result();
    }

    function getPension_type() {
        $this->db->where('STATUS', 1);
        $this->db->select('*');
        $this->db->group_by('PENSION_TYPE_NAME');
        $this->db->from('a2_pension_pension_type');

        $query = $this->db->get();
        return $query->result();
    }

    function getPension_Detail_($id_, $villID) {
        $data_ = '<table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Pensioner Name</th>
                                                <th>Father/Husband</th>
                                                <th>Father/Husband Name</th>
                                                <th>Caste</th>
                                                <th>Age</th>
                                                <th>Pension Number</th>
                                                <th>Approval Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

        $this->db->where('PTID', $id_);
        $this->db->where('VILLAGEID', $villID);
        $this->db->where('STATUS', 1);
        $rs = $this->db->get('a2_pension_pensioner_detail');
        $pensionloop = 1;

        if ($rs->num_rows() != 0) {
            foreach ($rs->result() as $pensionitem) {
                $data_ .= "<tr>";
                $data_ .= "<td>$pensionloop</td>";
                $data_ .= "<td>" . $pensionitem->NAME_ . "</td>";
                $data_ .= "<td>" . $pensionitem->FH_TYPE . "</td>";
                $data_ .= "<td>" . $pensionitem->FATHER_HUSBAND_NAME_ . "</td>";
                $data_ .= "<td>" . $pensionitem->CAST_ . "</td>";
                $data_ .= "<td>" . $pensionitem->DOB_AGE . "</td>";
                $data_ .= "<td>" . $pensionitem->PENSION_NUMBER . "</td>";
                $data_ .= "<td>" . $pensionitem->APPROVAL_DATE . "</td>";
                $data_ .= "<td>" . $pensionitem->AMOUNT . "</td>";
                $data_ .= "</tr>";
            }
        } else {
            $data_ = "NO DATA IN THIS HEAD. PLEASE SELECT OTHER PENSION TYPE";
        }
        $data_.="</table>";
        return $data_;
    }

    function getPrimarySchool($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a5_school_primary');

        $query = $this->db->get();
        return $query->result();
    }

    function getMiddleSchool($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a5_school_middle');

        $query = $this->db->get();
        return $query->result();
    }

    function getPrivateSchool($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a5_school_private');

        $query = $this->db->get();
        return $query->result();
    }

    function getCollage($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a5_school_higher_education_college');

        $query = $this->db->get();
        return $query->result();
    }

    function getUniversity($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a5_school_higher_education_university');

        $query = $this->db->get();
        return $query->result();
    }

    function getMela($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a4_local_mela');

        $query = $this->db->get();
        return $query->result();
    }

    function getTouristPlaceType() {
        $this->db->where('STATUS', 1);
        $this->db->from('a3_tourism_tourist_places_type');

        $query = $this->db->get();
        return $query->result();
    }

    function getTouristPlaceDetail_villID($villID) {
        $this->db->where('VILLAGEID', $villID);
        $this->db->where('STATUS', 1);
        $query = $this->db->get('a3_tourism_tourist_places');

        return $query->result();
    }

    function getTourist_Places_Detail_($id_, $villID) {
        $data_ = '<table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

        $this->db->where('TPTID', $id_);
        $this->db->where('VILLAGEID', $villID);
        $this->db->where('STATUS', 1);
        $rs = $this->db->get('a3_tourism_tourist_places');
        $touristloop = 1;

        if ($rs->num_rows() != 0) {
            foreach ($rs->result() as $touristitem) {
                $data_ .= "<tr>";
                $data_ .= "<td>$touristloop</td>";
                $data_ .= "<td>" . $touristitem->TOURIST_PLACE . "</td>";
                if ($touristitem->PIC != 'x') {
                    $data_ .= "<td><img src=" . base_url('vp/assets_/pics/' . $touristitem->PIC) . " style='max-width: 150px' class='img-responsive' /></td>";
                } else {
                    $data_ .= "<td><img src=" . base_url('vp/assets_/pics/tourplace.jpg') . " style='max-width: 150px' class='img-responsive' /></td>";
                }
                $data_ .= "</tr>";
            }
        } else {
            $data_ = "NO DATA IN THIS HEAD. PLEASE SELECT OTHER TOURIST TYPE";
        }
        $data_.="</table>";
        return $data_;
    }

    function getTourismActivity($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a3_tourism_tourism_activity_type');

        $query = $this->db->get();
        return $query->result();
    }

    function getNearestTown($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a4_nearest_town');

        $query = $this->db->get();
        return $query->result();
    }

    function getBankType() {
        $this->db->from('a6_bank_atm_type');

        $query = $this->db->get();
        return $query->result();
    }

    function getBank_Detail_($id_, $villID) {
        $data_ = '<table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

        $this->db->where('TYPE_', $id_);
        $this->db->where('VILLAGEID', $villID);
        $this->db->where('STATUS', 1);
        $rs = $this->db->get('a6_bank_atm');
        $bankloop = 1;

        if ($rs->num_rows() != 0) {
            foreach ($rs->result() as $bankitem) {
                $data_ .= "<tr>";
                $data_ .= "<td>$bankloop</td>";
                $data_ .= "<td>" . $bankitem->NAME_ . "</td>";
                $data_ .= "</tr>";
            }
        } else {
            $data_ = "NO DATA IN THIS HEAD. PLEASE SELECT OTHER TYPE";
        }
        $data_.="</table>";
        return $data_;
    }

    function getIndustryType() {
        $this->db->from('a7_village_industry_type');

        $query = $this->db->get();
        return $query->result();
    }

    function getIndustry_Detail_($id_, $villID) {
        $data_ = '<table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Industry Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

        $this->db->where('INDUSTRY_TYPE', $id_);
        $this->db->where('VILLAGEID', $villID);
        $this->db->where('STATUS', 1);
        $rs = $this->db->get('a7_village_industry');
        $indloop = 1;

        if ($rs->num_rows() != 0) {
            foreach ($rs->result() as $inditem) {
                $data_ .= "<tr>";
                $data_ .= "<td>$indloop</td>";
                $data_ .= "<td>" . $inditem->INDUSTRY . "</td>";
                $data_ .= "</tr>";
            }
        } else {
            $data_ = "NO DATA IN THIS HEAD. PLEASE SELECT OTHER TOURIST TYPE";
        }
        $data_.="</table>";
        return $data_;
    }

    function getHelipadDetail($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a7_proposed_halipad_detail');

        $query = $this->db->get();
        return $query->result();
    }

    function getShelter($villid) {
        $this->db->where('VILLAGEID', $villid);
        $this->db->where('STATUS', 1);
        $this->db->from('a7_proposed_shelter_detail');

        $query = $this->db->get();
        return $query->result();
    }

    function fillMapView_($id_) {
        $data_ = '';
        $uploadpath = base_url() . 'vp/assets_/revenueMap/';

        $this->db->where('VILLAGEID', $id_);
        $rs = $this->db->get('b1_revenue_map');

        if ($rs->num_rows() != 0) {
            foreach ($rs->result() as $row) {
                $src = $uploadpath . $row->MAP_PATH;
                $alt = $row->SHEETNO;
                $lid = $row->MAPID . 'g';
                $data_ = $data_ . "<li class='thumbnail' id='$lid' style='margin-right:4px;'>";
                $data_ = $data_ . "<a href='$src' target='_blank'><span id='$row->MAPID' class='btn btn-info btn-block btn-active'>SHEET NO $alt <i style='color:#DC143C;' class='fa fa-file-pdf-o fa-1x' aria-hidden='true'></i></span></a>";
            }
        } else {
            $data_ = "<li class='thumbnail' style='color:red'>
                           No Revenue Map PDF have been added to this Village</li>";
        }
        return $data_;
    }

    function getAct() {
        $this->db->distinct();
        $this->db->select('ACT_NAME');
        $this->db->from('a97_sdm_court_detail');

        $query = $this->db->get();
        return $query->result();
    }

    function getSection() {
        $this->db->distinct();
        $this->db->select('SECTION');
        $this->db->from('a97_sdm_court_detail');

        $query = $this->db->get();
        return $query->result();
    }

    function searchCases() {
        $courtName = trim($this->input->post('cmbCourtName'));
        $caseNo = trim($this->input->post('txtCaseNumber'));
        $year = trim($this->input->post('txtYear'));

        $this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.DISMISS_IN_DEFAULT, a.FINAL_ORDER_DATE, a.FINAL_ORDER_ATTACH, a.FILE_DISPATCHED_TO_RECORD_ROOM, a.USERNAME, b.*');
        $this->db->from('a96_sdm_court a');
        $this->db->join('a97_sdm_court_detail b', 'a.SNO = b.REF_SNO');

        $this->db->where("COURT_NAME", $courtName);
        $this->db->where("YEAR(STR_TO_DATE(a.REG_DATE, '%Y-%m-%d'))=", $year);
        $this->db->where('SUBSTRING_INDEX(a.CASENO, "-", -1)=', $caseNo);

        $query = $this->db->get();
        return $query->result();
    }

    function getMasterCases() {
        $courtName = trim($this->input->post('cmbCourtName'));
        $caseNo = trim($this->input->post('txtCaseNumber'));
        $year = trim($this->input->post('txtYear'));

        $case = $year . '-' . $caseNo;

        $this->db->where("COURT_NAME", $courtName);
        $this->db->where('YEAR_', $year);
        $this->db->where('CASENO', $case);

        $query = $this->db->get('a96_sdm_court');
        return $query->result();
    }

    function todayscases() {
        $courtName = trim($this->input->post('cmbCourt'));

        $this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, b.*');
        $this->db->from('a96_sdm_court a');
        $this->db->where('a.COURT_NAME', $courtName);
        $this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
        $this->db->where('b.NEXT_DATE', date('Y-m-d'));
        $this->db->where('a.FINAL_ORDER_DATE', "");
        $this->db->where('a.DISMISS_IN_DEFAULT', "Deactivate DD");

        $this->db->order_by('a.REG_DATE');
        $this->db->order_by('a.SNO', 'asc');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function getCourtName() {
        $this->db->distinct();
        $this->db->select('COURT_NAME');

        $this->db->from('a96_sdm_court');

        $query = $this->db->get();
        return $query->result();
    }

    function get_all_categories($id=0) {
        if ($id != 0) {
            $this->db->where('CATEG_ID', $id);
        }
        $this->db->where('STATUS', 1);
        $this->db->order_by('CATEG_ID', 'desc');
        $query = $this->db->get('c1_gallery_category');
        return $query->result();
    }

    function get_all_pics($id=0) {
                
        if ($id != 0) {
            $this->db->where('CATEG_ID', $id);
        }
        $this->db->where('STATUS', 1);
        $this->db->order_by('CATEG_ID', 'desc');
        $query = $this->db->get('c2_gallery_picture');
        return $query->result();
    }
    function get_all_pics_cat(){
        $this->db->select('a.*, b.*');
        $this->db->from('c1_gallery_category a');        
        $this->db->join('c2_gallery_picture b', 'a.CATEG_ID = b.CATEG_ID');
        
        $this->db->where('a.STATUS', 1);
        $this->db->order_by('a.CATEG_ID', 'desc');
        $query = $this->db->get();
        
        //echo $query->num_rows();
        //exit(0);
        return $query->result();
    }
    
    function get_whoswhoDept($limit, $start) {        
        $this->db->where('STATUS', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by('WW1ID', 'ASC');
        $query = $this->db->get('a0_whoswho1_department');
        return $query->result();
    }
    function get_whoswhohome() {        
        $this->db->where('STATUS', 1);
        $this->db->order_by('WW2ID', 'ASC');
        $query = $this->db->get('a0_whoswho2_whome');
        return $query->result();
    }
    function get_whoswhodetail() {        
        $this->db->where('STATUS_', 1);
        $this->db->order_by('WW3ID', 'ASC');
        $query = $this->db->get('a0_whoswho3_whome_detail');
        return $query->result();
    }        

}
