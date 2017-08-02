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

    function getDistinctTehsil_new() {
        $this->db->distinct();
        $this->db->select('TEHSILID, TEHSIL');
        $this->db->from('a0_patwari');

        $query = $this->db->get();
        return $query->result();
    }

    function get_village_by_tehsil_($tehsilName) {
        $this->db->select('a.*');
        $this->db->from('a0_village a');
        $this->db->join('a0_patwari_area b', 'a.PAID = b.PAID', 'left');
        $this->db->join('a0_patwari c', 'b.PID = c.PID', 'left');
        $this->db->where('c.TEHSILID', $tehsilName);
        $this->db->order_by('a.NAME_', 'asc');

        $query = $this->db->get();
        //$output= $this->db->last_query();
        $output = "<option value=''>SELECT VILLAGE</option>";
        foreach ($query->result() as $row) {
            $output .= "<option value='" . $row->VILLAGEID . "'>" . $row->NAME_ . "</option>";
        }
        return $output;
    }

    function get_village_by_tehsil_m($tehsilName) {
        $this->db->select('a.*');
        $this->db->where('a.STATUS', 1);
        $this->db->where('b.TEHSIL_NAME', $tehsilName);
        $this->db->from('a1_village a');
        $this->db->order_by('a.NAME_', 'asc');
        $this->db->join('a8_village_one_row_data b', 'a.VILLAGEID = b.VILLAGEID');

        $query = $this->db->get();

        $output = "<option value=''>SELECT VILLAGE</option>";
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

    function getVillageData($villID) {
        if ($villID == 0) {
            $villID = $this->input->post('cmbVillage');
        }
        /* $this->db->where('VILLAGEID', $villID);
          $this->db->from('a0_village'); */

        $this->db->select('a.*, b.PATWARIAREA, c.NAME_ as pNAME, c.TEHSIL,c.PHONE_,c.PHOTO_,c.DISTRICT');
        $this->db->select('a.*');
        $this->db->from('a0_village a');
        $this->db->join('a0_patwari_area b', 'a.PAID = b.PAID', 'left');
        $this->db->join('a0_patwari c', 'b.PID = c.PID', 'left');
        $this->db->where('a.VILLAGEID', $villID);

        $this->db->order_by('a.NAME_', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    function getVillageID_forTxtSearch() {
        $villName = $this->input->post('id');

        $this->db->where('NAME_', $villName);
        $this->db->from('a0_village');
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
        $this->db->select('a.*, b.PATWARIAREA, c.NAME_ as pNAME, c.TEHSIL,c.PHONE_,c.PHOTO_,c.DISTRICT');
        $this->db->select('a.*');
        $this->db->from('a0_village a');
        $this->db->join('a0_patwari_area b', 'a.PAID = b.PAID', 'left');
        $this->db->join('a0_patwari c', 'b.PID = c.PID', 'left');
        $this->db->where('a.VILLAGEID', $villID);

        $this->db->order_by('a.NAME_', 'desc');

        $query = $this->db->get();
        return $query->result();
    }

    function searchVillageAjax_($key) {
        $array = array();
        $this->db->select('*');
        $this->db->like('NAME_', $key);
        $this->db->where('STATUS_', 1);
        $this->db->order_by('NAME_', 'asc');
        $this->db->from('a0_village');

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

    function get_all_categories($id = 0) {
        if ($id != 0) {
            $this->db->where('CATEG_ID', $id);
        }
        $this->db->where('STATUS', 1);
        $this->db->order_by('CATEGORY', 'asc');
        $query = $this->db->get('c1_gallery_category');
        return $query->result();
    }

    function get_all_pics($id = 0) {
        if ($id != 0) {
            $this->db->where('CATEG_ID', $id);
        }
        $this->db->where('STATUS', 1);
        $this->db->order_by('CATEG_ID', 'desc');
        $query = $this->db->get('c2_gallery_picture');
        return $query->result();
    }

    function get_all_pics_cat() {
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

    function get_all_downloads() {
        $this->db->where('STATUS_', 1);
        $this->db->order_by('PDFID', 'ASC');
        $query = $this->db->get('b2_pdf');
        return $query->result();
    }

    function get_pdf_to_download() {
        $pdfID = $this->input->post('cmbPdf');
        $this->db->select('PATH_');
        $this->db->where('PDFID', $pdfID);
        $query = $this->db->get('b2_pdf');

        if ($query->num_rows() != 0) {
            foreach ($query->result() as $row) {
                $data_ = $row->PATH_;
            }
        } else {
            $data_ = 'No Data';
        }

        return $data_;
    }

    function get_newsdetail() {
        $this->db->where('STATUS', 1);
        $this->db->order_by('DATE_', 'DESC');
        $query = $this->db->get('newsevents');
        return $query->result();
    }

    function get_finalCases() {
        $this->db->select('a.COURT_NAME, COUNT(a.CASENO) as totalcase');
        $this->db->group_by('a.COURT_NAME');
        $this->db->where('a.DISMISS_IN_DEFAULT', 'Deactivate DD');
        $this->db->where('a.FINAL_ORDER_DATE<>', "");
        $this->db->from('a96_sdm_court a');
        $this->db->join('a97_sdm_court_detail b', 'a.SNO = b.REF_SNO');
        $query = $this->db->get();
        return $query->result();
    }

    function get_pendingCases() {
        $this->db->select('a.COURT_NAME, COUNT(a.CASENO) as totalcase');
        $this->db->group_by('a.COURT_NAME');
        $this->db->where('a.FINAL_ORDER_DATE', "");
        $this->db->where('a.DISMISS_IN_DEFAULT', "Deactivate DD");
        $this->db->from('a96_sdm_court a');
        $this->db->join('a97_sdm_court_detail b', 'a.SNO = b.REF_SNO');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function get_disposedoffcases() {
        $this->db->select('a.COURT_NAME, COUNT(a.CASENO) as totalcase');
        $this->db->from('a96_sdm_court a');
        $this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
        $this->db->where('a.DISMISS_IN_DEFAULT', "Activate DD");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function get_todayscases() {
        $this->db->select('a.COURT_NAME, COUNT(a.CASENO) as totalcase');
        $this->db->from('a96_sdm_court a');
        $this->db->join('a97_sdm_court_detail b', 'a.SNO = b.REF_SNO');
        $this->db->where('b.NEXT_DATE', date('Y-m-d'));
        $this->db->where('a.FINAL_ORDER_DATE', "");
        $this->db->where('a.DISMISS_IN_DEFAULT', "Deactivate DD");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function get_totalcases() {
        $this->db->select('a.COURT_NAME, COUNT(a.SNO) as totalcase');
        $this->db->group_by('a.COURT_NAME');
        $this->db->from('a96_sdm_court a');
        $this->db->join('a97_sdm_court_detail b', 'a.STATUS_=b.SNO');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function get_AllCourt() {
        $this->db->distinct('a.COURT');
        $this->db->select('a.COURT');
        $this->db->from('a95_court_master a');
        $this->db->join('a96_sdm_court b', 'b.COURT_NAME=a.COURT');

        $query = $this->db->get();
        return $query->result();
    }

}
