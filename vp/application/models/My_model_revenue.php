<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_revenue extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getVillages($user__ = 'x') {                        
        $this->db->where('USERNAME_', $user__);
        $this->db->order_by('NAME_', 'asc');
        $query = $this->db->get('a0_village');

       // echo $this->db->last_query();
        return $query->result();
    }

    public function do_upload() {
        $id_ = $this->input->post('villageName');
        $sheetNo = $this->input->post('txtSheetNumber');

        $this->db->where('VILLAGEID', $id_);
        $this->db->where('SHEETNO', $sheetNo);
        $this->db->from('b1_revenue_map');
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
            $this->session->set_flashdata('feed_msg_', "This Sheet Number Already uploded for village. Please try again with different sheet number!!!");
        } else {
            $config = array(
                'upload_path' => './assets_/revenueMap',
                'allowed_types' => 'pdf',
                'max_size' => 2100,
                'file_name' => 'village_' . $id_ . '_' . $sheetNo,
                'overwrite' => true
            );
            $file_element_name = 'RevenuePdf';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload($file_element_name)) {
                $path_ji = $this->upload->data();
                $path_ = $path_ji['file_name'];
            } else {
                $this->session->set_flashdata('feed_msg_', "Revenue Map should be less than or equal to 2100KB and must be in(<b>pdf</b>) format only.");
                $path_ = 'x';
            }

            if ($path_ != 'x') {

                $data = array(
                    'VILLAGEID' => $id_,
                    'SHEETNO' => $sheetNo,
                    'MAP_PATH' => $path_,
                    'USERNAME' => $this->session->userdata('user__'),
                    'STATUS' => 1
                );
                $query1 = $this->db->insert('b1_revenue_map', $data);
                if ($query1) {
                    $this->session->set_flashdata('feed_msg_', "Map uploded Successfully");
                } else {
                    $this->session->set_flashdata('feed_msg_', "'Something goes wrong in server. Please try again !!!");
                }
            }
        }
    }

    function fillMap_($id_) {
        $data_ = '';
        $uploadpath = base_url() . 'assets_/revenueMap/';

        $this->db->where('VILLAGEID', $id_);
        $rs = $this->db->get('b1_revenue_map');

        if ($rs->num_rows() != 0) {
            foreach ($rs->result() as $row) {
                $src = $uploadpath . $row->MAP_PATH;
                $alt = $row->SHEETNO;
                $lid = $row->MAPID . 'g';
                $data_ = $data_ . "<li class='thumbnail' id='$lid'>
                            <span id='$row->MAPID' class='btn btn-danger btn-block btn-delete'><i class='fa fa-times' aria-hidden='true'></i>Delete</span>"
                        . "<a href='$src' target='_blank'>";
                $data_ = $data_ . "<span id='$row->MAPID' class='btn btn-info btn-block btn-active'>SHEET NO $alt <i style='color:#DC143C;' class='fa fa-file-pdf-o fa-2x' aria-hidden='true'></i></span></a>";
            }
        } else {
            $data_ = "<li class='thumbnail' style='color:red'>
                           No Revenue Map PDF have been added to this Village</li>";
        }
        return $data_;
    }

    function deletepdf_($id) {
        $this->db->where('MAPID', $id);
        $query = $this->db->get('b1_revenue_map');

        if ($query->num_rows() != 0) {
            $row = $query->row();
            $bool_ = array('res_' => TRUE, 'path__' => $row->MAP_PATH);

            $this->db->where('MAPID', $id);
            $this->db->delete('b1_revenue_map');
        } else {
            $bool_ = array('res_' => FALSE, 'path__' => 'X');
        }
        return $bool_;
    }

}
