<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_village_model extends CI_Model{
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
	function getActivePatwaris($user=''){
		$this->db->order_by('PID', 'desc');
		if($user != ''){
			$this->db->where('USERNAME_', $user);
		}
		$this->db->where('STATUS_', 1);
		$query = $this->db->get('a0_patwari');

		return $query->result();
	}
	function getPatwari($pid, $user = ''){
		$this->db->where('PID', $pid);
		if($user != ''){
			$this->db->where('USERNAME_', $user);
		}
		$query = $this->db->get('a0_patwari');
		$this->db->last_query();
		return $query->row();
	}

	function submitPatwari(){
		$tehsil_detail = explode("~",$this->input->post('cmbTehsilForVillage'));
		$tehsil_ = $tehsil_detail[1];
		$tehsil_id = $tehsil_detail[0];
		$name_ = $this->input->post('txtpatwariName');
		$phone_ = $this->input->post('txtpaContact');
		$user = $this->session->userdata('user__');
		$dist = $this->input->post('txtDistrict');

		$this->db->where('NAME_', $name_);
		$this->db->where('PHONE_', $phone_);
		$query = $this->db->get('a0_patwari');

		if($query->num_rows()!=0){
			$data['message'] = array('res_'=>false, 'msg_'=>"<span style='padding: 3px; border-radius: 5px; background: #ffff00; color: #ff0000; font-weight: bold'>X: This Name and Contact combination is already exists.</span>");
		} else {
			$data = array(	
				'DISTRICT'=> $dist,
				'TEHSIL'=>$tehsil_,
				'TEHSILID'=>$tehsil_id,
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

	function activeInactivePatwariArea($paid, $status_){
		$this->db->where('PAID', $paid);
		if($status_ == 0){
			$st = 1;
		} else {
			$st = 0;
		}
		$data = array(
				'STATUS_'=> $st
			);
		$query = $this->db->update('a0_patwari_area', $data);
		if($query == true){
			if($st == 1){
				$data = array('res_'=>true, 'msg_'=>'Patwari Area is active now.');
			} else {
				$data = array('res_'=>true, 'msg_'=>'Patwari Area is in-active now');
			}
		} else {
			$data = array('res_'=>false, 'msg_'=>'Something goes wrong. Please try again.');
		}
		return $data;
	}
	function updatePatwari($pid){
		$tehsil_detail = explode("~",$this->input->post('cmbTehsilForVillage_edit'));
		$tehsil_ = $tehsil_detail[1];
		$tehsil_id = $tehsil_detail[0];
		$name_ = $this->input->post('txtpatwariName_edit');
		$phone_ = $this->input->post('txtpaContact_edit');
		$user = $this->session->userdata('user__');
		$dist = $this->input->post('txtDistrict');

		$this->db->where('PID<>', $pid);
		$this->db->where('NAME_', $name_);
		$this->db->where('PHONE_', $phone_);
		$query = $this->db->get('a0_patwari');
		echo $this->db->last_query();

		if($query->num_rows()!=0){
			$data['message'] = array('res_'=>false, 'msg_'=>"<span style='padding: 3px; border-radius: 5px; background: #ffff00; color: #ff0000; font-weight: bold'>X: Already exists.</span>");
		} else {
			$path_ = $this->upload_patwari_name_photo($pid);

			if($path_ != 'no-image.jpg'){
				$data = array(
					'DISTRICT'=> $dist,
					'TEHSIL'=>$tehsil_,
					'TEHSILID'=>$tehsil_id,
					'NAME_'=>$name_,
					'PHONE_'=>$phone_,
					'PHOTO_'=>$path_,
					'DATE_'=> date('Y-m-d H:i:s'),
					'USERNAME_'=>$user,
					);
			} else {
				$data = array(
					'DISTRICT'=> $dist,
					'TEHSIL'=>$tehsil_,
					'TEHSILID'=>$tehsil_id,
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

	/* village Model below */

	function getVillageMaster(){
		$this->db->order_by('INFO_ID');
		$query = $this->db->get('a0_village_info_master');
		return $query->result();
	}
	function getTehsilMasterEnglish(){
		$this->db->order_by('ID');
		$query = $this->db->get('a95_tehsil_master_english');
		return $query->result();	
	}
	function getVillages($user, $paid=''){
		$this->db->order_by('VILLAGEID', 'desc');
		$this->db->where('USERNAME_', $user);
		if($paid != ''){
			$this->db->where('PAID', $paid);
		}
		$query = $this->db->get('a0_village');
		//echo $this->db->last_query();
		return $query->result();
	}

	function getPatwariAreas($user, $pid){
		$this->db->order_by('PAID', 'desc');
		$this->db->where('USERNAME_', $user);
		if($pid != ''){
			$this->db->where('PID', $pid);
		}
		$query = $this->db->get('a0_patwari_area');
		//echo $this->db->last_query();
		return $query->result();
	}
	function getPatwariArea($paid){
		$this->db->where('PAID', $paid);
		$query = $this->db->get('a0_patwari_area');
		return $query->result();
	}
	function UpdatepatwariArea($user){
		$pid =  $this->input->post('txtPatwariID_');
		$patwariArea = $this->input->post('txtPatwariArea');
		$patwariAreaID = $this->input->post('txtPatwariAreaID');

		if($patwariAreaID == 'newPatwariArea'){
			$data = array(
				'PID' => $pid,
				'PATWARIAREA' => $patwariArea,
				'DATE_' => date('Y-m-d H:i:s'),
				'STATUS_' => 1,
				'USERNAME_'=>$user
				);
			$query = $this->db->insert('a0_patwari_area', $data);
			if($query == true){
				$data['msg_'] = "Successfully submitted.";
			} else {
				$data['msg_'] = "Please try again.";
			}
		} else {
			$data = array(
				'PATWARIAREA' => $patwariArea,
				'USERNAME_'=>$user
				);
			$this->db->where('PAID', $patwariAreaID);
			$query = $this->db->update('a0_patwari_area', $data);
			if($query == true){
				$data['msg_'] = "Successfully updated.";
			} else {
				$data['msg_'] = "Please try again.";
			}
		}
	}
	function UpdateVillage($user){
		$villageID = $this->input->post('txtVillageID');
		$paid = $this->input->post('txtPatwariAreaID_for_village');
		$villageName = $this->input->post('txtVillageName');
		$KANOONGO_AREA = $this->input->post('txtKanoongoArea');
		$GRAM_PANCHAYAT =  $this->input->post('txtGramPanchayat');
		$NYAY_PANCHAYAT =  $this->input->post('txtNyayPanchayat');
		$VAN_PANCHAYAT =  $this->input->post('txtVanPanchayat');
		$PARLIAMENTARY_CONS =  $this->input->post('txtParliamentaryCons');
		$ASSEMBLY_CONS =  $this->input->post('txtAssemblyCons');
		$POLLING_BOOTH =  $this->input->post('txtPollingBoothName');
		$REGULAR_REVENUE_POLICE =  $this->input->post('txtRegularRevenuePolice');

		if($villageName != ''){
			if($villageID == 'newVillage'){
				/*
				$this->db->where('TEHSIL', $tehsil_);
				$this->db->where('NAME_', $villageName);
				$this->db->where('USERNAME_', $user);
				$query = $this->db->get('a0_village');
				if($query->num_rows()!=0){
					$data['msg_'] = "Village already exists!!";
				} else {
				*/
				// Insert new Village
					$data = array(
						'PAID' => $paid,
						'NAME_' => $villageName,
						'KANOONGO_AREA'=>$KANOONGO_AREA,
						'GRAM_PANCHAYAT'=>$GRAM_PANCHAYAT,
						'NYAY_PANCHAYAT'=>$NYAY_PANCHAYAT,
						'VAN_PANCHAYAT'=>$VAN_PANCHAYAT,
						'PARLIAMENTARY_CONS'=>$PARLIAMENTARY_CONS,
						'ASSEMBLY_CONS'=>$ASSEMBLY_CONS,
						'POLLING_BOOTH'=>$POLLING_BOOTH,
						'REGULAR_REVENUE_POLICE'=>$REGULAR_REVENUE_POLICE,
						'DATE_' => date('Y-m-d H:i:s'),
						'STATUS_' => 1,
						'USERNAME_'=>$user
						);
					$query = $this->db->insert('a0_village', $data);
					if($query == true){
						$data['msg_'] = "Successfully submitted.";
					} else {
						$data['msg_'] = "Please try again.";
					}
				/*}*/
				// ------------------
			} else {
				// Update Village
					/*
					$this->db->where('VILLAGEID<>', $villageID);
					$this->db->where('TEHSIL', $tehsil_);
					$this->db->where('NAME_', $villageName);
					$this->db->where('USERNAME_', $user);
					$query = $this->db->get('a0_village');
					if($query->num_rows()!=0){
						$data['msg_'] = "Village already exists!!";
					} else {
					*/
						$data = array(
							'PAID' => $paid,
							'NAME_' => $villageName,
							'KANOONGO_AREA'=>$KANOONGO_AREA,
							'GRAM_PANCHAYAT'=>$GRAM_PANCHAYAT,
							'NYAY_PANCHAYAT'=>$NYAY_PANCHAYAT,
							'VAN_PANCHAYAT'=>$VAN_PANCHAYAT,
							'PARLIAMENTARY_CONS'=>$PARLIAMENTARY_CONS,
							'ASSEMBLY_CONS'=>$ASSEMBLY_CONS,
							'POLLING_BOOTH'=>$POLLING_BOOTH,
							'REGULAR_REVENUE_POLICE'=>$REGULAR_REVENUE_POLICE,
							'USERNAME_'=>$user
							);
						$this->db->where('VILLAGEID', $villageID);
						$query = $this->db->update('a0_village', $data);
						if($query == true){
							$data['msg_'] = "Successfully updated.";
						} else {
							$data['msg_'] = "Please try again.";
						}
					/* } */
				// --------------
			}
		} else {
			$data['msg_'] = "Village Name Please.";
		}
		return $data;
	}
	function getVillageData($vid){
		$this->db->where('VILLAGEID',$vid);
		$query = $this->db->get('a0_village');
		return $query->result();
	}

	function activeInactiveVillage($vid, $status_){
		$this->db->where('VILLAGEID', $vid);
		if($status_ == 0){
			$st = 1;
		} else {
			$st = 0;
		}
		$data = array(
				'STATUS_'=> $st
			);
		$query = $this->db->update('a0_village', $data);
		if($query == true){
			if($st == 1){
				$data = array('res_'=>true, 'msg_'=>'Village is active now.');
			} else {
				$data = array('res_'=>true, 'msg_'=>'Village is in-active now');
			}
		} else {
			$data = array('res_'=>false, 'msg_'=>'Something goes wrong. Please try again.');
		}
		return $data;
	}
}
