<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_whoswho_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_whoswho_1(){
		$query = $this->db->get('a0_whoswho1_department');
		return $query->result();
	}
	function get_whoswho_whome_2($id_){
		$this->db->where('WW1ID', $id_);
		$query = $this->db->get('a0_whoswho2_whome');
		return $query->result();
	}
	function get_whoswho_whome_detail($ww2id = ''){
		if($ww2id != ''){
			$this->db->where('WW2ID', $ww2id);
		}
		$query = $this->db->get('a0_whoswho3_whome_detail');
		
		return $query->result();
	}
	function update_whoswho_detail(){
		$name_ = $this->input->post('txtName_');
		$contact = $this->input->post('txtContact');
		$email = $this->input->post('txtEmail');
		$WW2ID = $this->input->post('txtWhoswhome');
		$username = $this->session->userdata('user__');
		$desc = $this->input->post('txtDesc_');
		$date_ = date('Y-m-d H:i:s');
		$status_ = 1;

		$this->db->where('WW2ID', $WW2ID);
		$query = $this->db->get('a0_whoswho3_whome_detail');

		if($query->num_rows()!=0){
			$r = $query->row();
			$path_ = $this->upload_post_name_photo($r->WW3ID);
			if($path_ != 'no-image.jpg'){
				$data = array(
				'NAME_' =>$name_,
				'CONTACT'=>$contact,
				'EMAIL'=>$email,
				'PHOTO_PATH'=>$path_,
				'WW2ID'=>$WW2ID,
				'USERNAME'=>$username,
				'DESC_'=>$desc,
				'DATE_'=>$date_,
				'STATUS_'=>$status_,
				);
			} else {
				$data = array(
				'NAME_' =>$name_,
				'CONTACT'=>$contact,
				'EMAIL'=>$email,
				'WW2ID'=>$WW2ID,
				'USERNAME'=>$username,
				'DESC_'=>$desc,
				'DATE_'=>$date_,
				'STATUS_'=>$status_,
				);
			}
			$this->db->where('WW3ID', $r->WW3ID);
			$this->db->update('a0_whoswho3_whome_detail', $data);
			$data['id_'] = $WW2ID;
			$data['msg_'] = "<span style='color:#009000; background: #f0f0f0; padding: 3px; border-radius:5px'>Data updated is successfully</span>";
		} else {
			$data = array(
				'NAME_' =>$name_,
				'CONTACT'=>$contact,
				'EMAIL'=>$email,
				'WW2ID'=>$WW2ID,
				'USERNAME'=>$username,
				'DESC_'=>$desc,
				'DATE_'=>$date_,
				'STATUS_'=>$status_,
				);
			$this->db->insert('a0_whoswho3_whome_detail', $data);
			$id_ = $this->db->insert_id();
			$path_ = $this->upload_post_name_photo($id_);
			
			$data = array(
				'PHOTO_PATH' => $path_
				);
			$this->db->where('WW2ID', $WW2ID);
			$this->db->update('a0_whoswho3_whome_detail', $data);
			$data['id_'] = $WW2ID;
			$data['msg_'] = "<span style='color:#009000; background: #f0f0f0; padding: 3px; border-radius:5px'>Data submitted is successfully</span>";
		}
		return $data;
	}
	function upload_post_name_photo($ww3id_){
		clearstatcache();
		$config = array(
            'upload_path' => './assets_/post_name_for_department',
            'allowed_types' => 'jpg|png',
            'overwrite' => TRUE,
            'max_size' => 500,
            'file_name' => $ww3id_
        );
        $file_element_name = 'txtPhoto';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_element_name)) {
            $path_ji = $this->upload->data();
            $path_ = $path_ji['file_name'];
        } else {
            $path_ = 'no-image.jpg';
        }
        return $path_;	
	}
}