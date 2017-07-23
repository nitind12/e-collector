<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_patwari_village_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getPatwaris($user=''){
		$this->db->order_by('PID', 'desc');
		if($user != ''){
			$this->db->where('USERNAME_', $user);
		}
		$query = $this->db->get('a0_patwari');

		return $query->result();
	}

	function getPatwari($pid, $user = ''){
		$this->db->where('PID', $pid);
		if($user != ''){
			$this->db->where('USERNAME_', $user);
		}
		$query = $this->db->get('a0_patwari');

		return $query->row();
	}

	function submitPatwari(){
		$name_ = $this->input->post('txtpatwariName');
		$phone_ = $this->input->post('txtpaContact');
		$user = $this->session->userdata('user__');

		$this->db->where('NAME_', $name_);
		$this->db->where('PHONE_', $phone_);
		$query = $this->db->get('a0_patwari');

		if($query->num_rows()!=0){
			$data['message'] = array('res_'=>false, 'msg_'=>"<span style='padding: 3px; border-radius: 5px; background: #ffff00; color: #ff0000; font-weight: bold'>X: This Name and Contact combination is already exists.</span>");
		} else {
			$data = array(
				'NAME_'=>$name_,
				'PHONE_'=>$phone_,
				'STATUS_'=>1,
				'DATE_'=> date('Y-m-d H:i:s'),
				'USERNAME_'=>$user,
				);
			$this->db->insert('a0_patwari', $data);
			$id_ = $this->db->insert_id();
			$data['message'] = array('res_'=>true, 'msg_'=>"<span style='padding: 3px; border-radius: 5px; background: #f0f0f0; color: #009000; font-weight: bold'>Patwari's Detail submitted successfully.".$id_."</span>");
			$path_ = $this->upload_patwari_name_photo($id_);
			$data = array(
				'PHOTO_'=>$path_
				);
			$this->db->where('PID', $id_);
			$query = $this->db->update('a0_patwari', $data);
			if($query == true){
				$data['message'] = array('res_'=>true, 'msg_'=>"<span style='padding: 3px; border-radius: 5px; background: #f0f0f0; color: #009000; font-weight: bold'>Patwari's Detail submitted successfully.</span>");
			} else {
				$data['message'] = array('res_'=>false, 'msg_'=>"<span style='padding: 3px; border-radius: 5px; background: #ffff00; color: #ff0000; font-weight: bold'>X: Photo is not uploaded. Please try again this update!!</span>");
			}
		}
		return $data;
	}
	function activeInactivePatwari($pid, $status_){
		$this->db->where('PID', $pid);
		if($status_ == 0){
			$st = 1;
		} else {
			$st = 0;
		}
		$data = array(
				'STATUS_'=> $st
			);
		$query = $this->db->update('a0_patwari', $data);
		if($query == true){
			if($st == 1){
				$data = array('res_'=>true, 'msg_'=>'Patwari is active now.');
			} else {
				$data = array('res_'=>true, 'msg_'=>'Patwari is in-active now');
			}
		} else {
			$data = array('res_'=>false, 'msg_'=>'Something goes wrong. Please try again.');
		}
		return $data;
	}
	function updatePatwari($pid){
		$name_ = $this->input->post('txtpatwariName_edit');
		$phone_ = $this->input->post('txtpaContact_edit');
		$user = $this->session->userdata('user__');

		$this->db->where('PID<>', $pid);
		$this->db->where('NAME_', $name_);
		$this->db->where('PHONE_', $phone_);
		$query = $this->db->get('a0_patwari');

		if($query->num_rows()!=0){
			$data['message'] = array('res_'=>false, 'msg_'=>"<span style='padding: 3px; border-radius: 5px; background: #ffff00; color: #ff0000; font-weight: bold'>X: Already exists.</span>");
		} else {
			$path_ = $this->upload_patwari_name_photo($pid);

			if($path_ != 'no-image.jpg'){
				$data = array(
					'NAME_'=>$name_,
					'PHONE_'=>$phone_,
					'PHOTO_'=>$path_,
					'DATE_'=> date('Y-m-d H:i:s'),
					'USERNAME_'=>$user,
					);
			} else {
				$data = array(
					'NAME_'=>$name_,
					'PHONE_'=>$phone_,
					'DATE_'=> date('Y-m-d H:i:s'),
					'USERNAME_'=>$user,
					);
			}
				$this->db->where('PID', $pid);
				$query = $this->db->update('a0_patwari', $data);
				if($query == true){
					$data['message'] = array('res_'=>true, 'msg_'=>"<span style='padding: 3px; border-radius: 5px; background: #f0f0f0; color: #009000; font-weight: bold'>update successfully.</span>");
				} else {
					$data['message'] = array('res_'=>false, 'msg_'=>"<span style='padding: 3px; border-radius: 5px; background: #ffff00; color: #ff0000; font-weight: bold'>X: Please try again.</span>");
				}
			}
		return $data;
	}
	function upload_patwari_name_photo($pid){
		clearstatcache();
		$config = array(
            'upload_path' => './assets_/patwari_pics',
            'allowed_types' => 'jpg|png',
            'overwrite' => TRUE,
            'max_size' => 500,
            'file_name' => $pid,
            'overwrite' => true
        );
        $file_element_name = 'txtpaPhoto';
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
