<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model{

	function authenticate(){
		$user = $this->input->post('txtUsr');
		$pwd = $this->input->post('txtPwd');
		$this->db->select('a.USERNAME, b.USERSTATUS, b.PATH_');
		$this->db->where('a.USERNAME', $user);
		$this->db->where('a.PASSWORD', $pwd);
		$this->db->where('a.STATUS', 1);
		$this->db->where('b.STATUS', 1);
		$this->db->from('login a');
		$this->db->join('user_status b', 'a.USERSTATUS = b.STATUSID');
		$query = $this->db->get();
		echo $this->db->last_query(); die();
		if($query->num_rows() != 0){
			$row = $query->row();

			// Below PATH_ is directly related to ADMIN or USER as per login credentials
			$result = array('res_' => true, 'path_' => $row->PATH_); // returnable
			// -------------------------------------------------------------------------

			$this->session->set_userdata('user__', $row->USERNAME);
			$this->session->set_userdata('status__', $row->USERSTATUS);

			//$this->session->set_flashdata('_msgall_', 'Welcome '.$row->USERNAME);
		} else {
			$result = array('res_' => false, 'path_' => 'web/login'); // returnable
			$this->session->set_flashdata('_msgall_', 'X: Please fill login credentials correctly !!! ');
		}

		return $result;
	}

	function newVillageEntry(){
		$newVill = $this->security->xss_clean($this->input->post('txtNewVillageName'));
		
		//$this->db->where('UCASE(NAME_)', strtoupper($newVill));
		//$query = $this->db->get('a1_village');

		//if($query->num_rows() != 0){
			//$this->session->set_flashdata('_msgall_', $newVill. " Village is already exists. Please click update for the same village");
			//$bool_ = array('res_'=>false, 'id'=>'x');
		//} else {
			$data = array(
				'NAME_' => $newVill,
				'USERNAME' => $this->session->userdata('user__'),
				'STATUS' => 1,
				'DATE_' => date('Y-m-d H:i:s')
				);
			$query = $this->db->insert('a1_village', $data);
			if($query == true){
				$vid = $this->db->insert_id();
				// Picture upload
					$config = array(
		                'upload_path' => './assets_/pics',
		                'allowed_types' => 'jpg|png|jpeg',
		                'file_name'	=> 'village_'.$vid,
		                'overwrite' => true
		            );
		            $file_element_name = 'villagePicture';
		            $this->load->library('upload', $config);

		            if ($this->upload->do_upload($file_element_name)) {
		                $path_ji = $this->upload->data();
		                $path_ = $path_ji['file_name'];
		            } else {
		                $path_ = 'x';
		            }
		            if($path_ != 'x'){
			            $data = array(
			            	'PIC' => $path_
			            	);	
			            $this->db->where('VILLAGEID', $vid);
			            $query = $this->db->update('a1_village', $data);
		        	}
	            // Picture upload done
				$this->session->set_flashdata('_msgall_', "New Village is Successfully submitted");
				// Update old Photo if exists
					// For DM -
						$this->db->where('USERNAME', $this->session->userdata('user__'));
						$this->db->where('DM_PHOTO <>', 'x');
						$query = $this->db->get('a8_village_one_row_data');
						if($query->num_rows() != 0){
							$row = $query->row();
							$dm_photo = $row->DM_PHOTO;
						} else {
							$dm_photo = 'x';
						}
					// -------------

					// For SDM -
						$this->db->where('USERNAME', $this->session->userdata('user__'));
						$this->db->where('SDM_PHOTO <>', 'x');
						$query = $this->db->get('a8_village_one_row_data');
						if($query->num_rows() != 0){
							$row = $query->row();
							$sdm_photo = $row->SDM_PHOTO;
						} else {
							$sdm_photo = 'x';
						}
					// -------------

					// For Tehsildar -
						$this->db->where('USERNAME', $this->session->userdata('user__'));
						$this->db->where('TEHSILDAR_PHOTO <>', 'x');
						$query = $this->db->get('a8_village_one_row_data');
						if($query->num_rows() != 0){
							$row = $query->row();
							$tehsildar_photo = $row->TEHSILDAR_PHOTO;
						} else {
							$tehsildar_photo = 'x';
						}
					// -------------

					// For Patwari -
						$this->db->where('USERNAME', $this->session->userdata('user__'));
						$this->db->where('PATWARI_PHOTO <>', 'x');
						$query = $this->db->get('a8_village_one_row_data');
						if($query->num_rows() != 0){
							$row = $query->row();
							$patwari_photo = $row->PATWARI_PHOTO;
						} else {
							$patwari_photo = 'x';
						}
					// -------------
				// ------------
				$data = array(
					'USERNAME' => $this->session->userdata('user__'),
					'VILLAGEID'=> $vid,
					'NAMES_OF_TOK' => 'x',
					'VILLAGES_UNDER_POLING_BOOTH' => 'x',
					'DM_PHOTO' => $dm_photo,
					'SDM_PHOTO' => $sdm_photo,
					'TEHSILDAR_PHOTO' => $tehsildar_photo,
					'PATWARI_PHOTO' => $patwari_photo,
					);
				$query = $this->db->insert('a8_village_one_row_data', $data);
				if($query == true){
					$id_query = $this->db->insert_id();
					$this->session->set_flashdata('_msgall_', "New Village is Successfully submitted");
					$bool_ = array('res_'=>true, 'id'=>$id_query);
				} else {
					$id_query = 'x';
					$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
					$bool_ = array('res_'=>false, 'id'=>'x');
				}
				
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
				$bool_ = array('res_'=>false, 'id'=>'x');
			}
		//}

		return $bool_;
	}

	function getVillages($user__='x'){
		$this->db->order_by('USERNAME', 'asc');
		$this->db->select('a.*, b.ONEROWID');
		if($user__ != 'x'){
			if($this->session->userdata('status__') != 'SDM'){
				$this->db->where('a.USERNAME', $user__);
			}
		}
		$this->db->where('a.STATUS', 1);
		$this->db->from('a1_village a');
		$this->db->join('a8_village_one_row_data b', 'a.VILLAGEID = b.VILLAGEID');
		
		if($this->session->userdata('status__') == 'SDM'){
			$this->db->join('login c', 'c.USERNAME = a.USERNAME');
			$this->db->where('c.UP_LINE', $user__);
		}

		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function getVillageOneRowData($id){
		$this->db->where('ONEROWID', $id);
		$this->db->where('STATUS', 1);
		$query = $this->db->get('a8_village_one_row_data');

		return $query->row();
	}
	function updatevillage($villid){
		if(trim($this->input->post('txtVillageName')) != ''){
			$this->db->where('VILLAGEID', $villid);
			$data = array(
				'NAME_' => trim($this->input->post('txtVillageName'))
				);
			$bool_ = $this->db->update('a1_village', $data);
			if($bool_ == true){
				$villageName = trim($this->input->post('txtVillageName'));
			} else {
				$villageName = '-x-';
			}
		} else {
			$villageName = '-x-';
		}
		return $villageName;
	}
	function delvillage($villid){
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a8_village_one_row_data');

		if($query->num_rows() != 0){
			$row = $query->row();
			//$dm_photo = $row->DM_PHOTO;
			//$sdm_photo = $row->SDM_PHOTO;
			//$tehsildar_photo = $row->TEHSILDAR_PHOTO;
			//$patwari_photo = $row->PATWARI_PHOTO;

			$this->db->where('VILLAGEID', $villid);
			$data = array(
				'STATUS' => 0
				);
			$query = $this->db->update('a1_village', $data);

			$this->db->where('VILLAGEID', $villid);
			$data = array(
				'STATUS' => 0
				);
			$q = $this->db->update('a8_village_one_row_data', $data);	
			if($q == true){
				$this->session->set_flashdata('_msgall_', "Village successfully deleted.");
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");	
			}
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function updatedm($detailid){
		$config = array(
                'upload_path' => './assets_/pics',
                'allowed_types' => 'jpg|png|jpeg',
                'file_name'	=> 'dmpic_'.$detailid,
                'overwrite' => true
            );
            $file_element_name = 'dmPic';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload($file_element_name)) {
                $path_ji = $this->upload->data();
                $path_ = $path_ji['file_name'];

                // Update photo for all villages
                	$this->db->where('USERNAME', $this->session->userdata('user__'));
                	$data_1 = array(
                		'DM_PHOTO' => $path_
                		);
                	$result = $this->db->update('a8_village_one_row_data', $data_1);
                // -----------------------------
            } else {
                $path_ = 'x';
            }
		
		$this->db->where('ONEROWID', $detailid);
		if($path_ == 'x'){
			$data = array(
			'DISTRICT_NAME'=>$this->input->post('txtDistrict'),
			'DM_NAME'=>	$this->input->post('txtDM'),
			'DM_PHONE'=>	$this->input->post('txtDMPhone'),
			'DM_EMAIL'=>	$this->input->post('txtDMEmail'),
			);
		} else {
			$data = array(
			'DISTRICT_NAME'=>$this->input->post('txtDistrict'),
			'DM_NAME'=>	$this->input->post('txtDM'),
			'DM_PHONE'=>	$this->input->post('txtDMPhone'),
			'DM_EMAIL'=>	$this->input->post('txtDMEmail'),
			'DM_PHOTO'=>	$path_,
			);
		}
		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'DM Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}


	function updatesdm($detailid){
		$config = array(
                'upload_path' => './assets_/pics',
                'allowed_types' => 'jpg|png|jpeg',
                'file_name'	=> 'sdmpic_'.$detailid,
                'overwrite' => true
            );
            $file_element_name = 'sdmPic';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload($file_element_name)) {
                $path_ji = $this->upload->data();
                $path_ = $path_ji['file_name'];

                // Update photo for all villages
                	$this->db->where('USERNAME', $this->session->userdata('user__'));
                	$data_1 = array(
                		'SDM_PHOTO' => $path_
                		);
                	$result = $this->db->update('a8_village_one_row_data', $data_1);
                // -----------------------------
            } else {
                $path_ = 'x';
            }
		
		$this->db->where('ONEROWID', $detailid);
		if($path_ == 'x'){
			$data = array(
			'SDM_SUBDIVISION_AREA'=>$this->input->post('txtSubDivision'),
			'SDM_NAME'=>	$this->input->post('txtSDM'),
			'SDM_PHONE'=>	$this->input->post('txtSDMPhone'),
			'SDM_EMAIL'=>	$this->input->post('txtSDMEmail'),
			);
		} else {
			$data = array(
			'SDM_SUBDIVISION_AREA'=>$this->input->post('txtSubDivision'),
			'SDM_NAME'=>	$this->input->post('txtSDM'),
			'SDM_PHONE'=>	$this->input->post('txtSDMPhone'),
			'SDM_EMAIL'=>	$this->input->post('txtSDMEmail'),
			'SDM_PHOTO'=>	$path_,
			);
		}
		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'SDM Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function updatetehsil($detailid){
		$config = array(
                'upload_path' => './assets_/pics',
                'allowed_types' => 'jpg|png|jpeg',
                'file_name'	=> 'tehsildarpic_'.$detailid,
                'overwrite' => true
            );
            $file_element_name = 'TehsildarPic';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload($file_element_name)) {
                $path_ji = $this->upload->data();
                $path_ = $path_ji['file_name'];

                // Update photo for all villages
                	$this->db->where('USERNAME', $this->session->userdata('user__'));
                	$data_1 = array(
                		'TEHSILDAR_PHOTO' => $path_
                		);
                	$result = $this->db->update('a8_village_one_row_data', $data_1);
                // -----------------------------
            } else {
                $path_ = 'x';
            }
		
		$this->db->where('ONEROWID', $detailid);
		if($path_ == 'x'){
			$data = array(
			'TEHSIL_NAME'=>$this->input->post('txtTehsil'),
			'TEHSILDAR_NAME'=>	$this->input->post('txtTehsildar'),
			'TEHSILDAR_PHONE'=>	$this->input->post('txtTehsildarPhone'),
			'TEHSILDAR_EMAIL'=>	$this->input->post('txtTehsildarEmail'),
			'NAYAB_TEHSILDAR_NAME' => $this->input->post('txtNTehsildar'),
			'NAYAB_TEHSILDAR_PHONE' => $this->input->post('txtNTehsildarPhone')
			);
		} else {
			$data = array(
			'TEHSIL_NAME'=>$this->input->post('txtTehsil'),
			'TEHSILDAR_NAME'=>	$this->input->post('txtTehsildar'),
			'TEHSILDAR_PHONE'=>	$this->input->post('txtTehsildarPhone'),
			'TEHSILDAR_EMAIL'=>	$this->input->post('txtTehsildarEmail'),
			'TEHSILDAR_PHOTO'=>	$path_,
			'NAYAB_TEHSILDAR_NAME' => $this->input->post('txtNTehsildar'),
			'NAYAB_TEHSILDAR_PHONE' => $this->input->post('txtNTehsildarPhone')
			);
		}
		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Tehsil Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function updatediffareaundertehsil($detailid){
		$config = array(
                'upload_path' => './assets_/pics',
                'allowed_types' => 'jpg|png|jpeg',
                'file_name'	=> 'patwaripic_'.$detailid,
                'overwrite' => true
            );
            $file_element_name = 'PatwariPic';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload($file_element_name)) {
                $path_ji = $this->upload->data();
                $path_ = $path_ji['file_name'];

                // Update photo for all villages
                	$this->db->where('USERNAME', $this->session->userdata('user__'));
                	$data_1 = array(
                		'PATWARI_PHOTO' => $path_
                		);
                	$result = $this->db->update('a8_village_one_row_data', $data_1);
                // -----------------------------

            } else {
                $path_ = 'x';
            }
		
		$this->db->where('ONEROWID', $detailid);
		if($path_ == 'x'){
			$data = array(
			'KANOONGO_AREA_NAME'=>$this->input->post('txtKanoongoArea'),
			'PATWARI_AREA_NAME'=>	$this->input->post('txtPatwariArea'),
			'PATWARI_NAME'=>	$this->input->post('txtPatwari'),
			'PATWARI_PHONE'=>	$this->input->post('txtPatwariPhone'),
			'FOREST_RANGE_NAME' => $this->input->post('txtForestRange'),
			'FOREST_RANGER_NAME'=>$this->input->post('txtFRanger'),
			'FOREST_RANGER_PHONE'=>	$this->input->post('txtFRangerPhone'),
			'BLOCK_NAME'=>	$this->input->post('txtBlockName'),
			'BDO_NAME'=>	$this->input->post('txtBDO'),
			'BDO_PHONE' => $this->input->post('txtBDOPhone'),
			'VANPANCHAYAT_NAME' => $this->input->post('txtVanPanchayat'),
			'SARPANCH_NAME'=>$this->input->post('txtSarpanch'),
			'SARPANCH_PHONE'=>	$this->input->post('txtSarpanchPhone'),
			'TOTAL_VANPANCHAYAT_AREA'=>	$this->input->post('txtVanPanchayatArea'),
			'POLICE_THANA_OR_REVENUE_POLICE_NAME'=>	$this->input->post('txtPoliceThana'),
			'SO_NAME' => $this->input->post('txtSO'),
			'SO_PHONE' => $this->input->post('txtSOPhone'),
			'POLICE_CHAWKI_OR_REVENUE_POLICE_NAME'=>$this->input->post('txtPoliceChauki'),
			'CHAWKI_INCHARGE_NAME'=>	$this->input->post('txtChIncharge'),
			'CHAWKI_INCHARGE_PHONE'=>	$this->input->post('txtChInchargePhone'),
			'NYAY_PANCHAYAT_NAME'=>	$this->input->post('txtNyayPanchayat'),
			'ANGANVAADI_NAME' => $this->input->post('txtAganwadi'),
			'ANGANVAADI_WORKER_NAME' => $this->input->post('txtAganWorker'),
			'ANGANVAADI_WORKER_PHONE' => $this->input->post('txtAganWorkerPhone'),
			);
		} else {
			$data = array(
			'KANOONGO_AREA_NAME'=>$this->input->post('txtKanoongoArea'),
			'PATWARI_AREA_NAME'=>	$this->input->post('txtPatwariArea'),
			'PATWARI_NAME'=>	$this->input->post('txtPatwari'),
			'PATWARI_PHONE'=>	$this->input->post('txtPatwariPhone'),
			'PATWARI_PHOTO' => $path_,
			'FOREST_RANGE_NAME' => $this->input->post('txtForestRange'),
			'FOREST_RANGER_NAME'=>$this->input->post('txtFRanger'),
			'FOREST_RANGER_PHONE'=>	$this->input->post('txtFRangerPhone'),
			'BLOCK_NAME'=>	$this->input->post('txtBlockName'),
			'BDO_NAME'=>	$this->input->post('txtBDO'),
			'BDO_PHONE' => $this->input->post('txtBDOPhone'),
			'VANPANCHAYAT_NAME' => $this->input->post('txtVanPanchayat'),
			'SARPANCH_NAME'=>$this->input->post('txtSarpanch'),
			'SARPANCH_PHONE'=>	$this->input->post('txtSarpanchPhone'),
			'TOTAL_VANPANCHAYAT_AREA'=>	$this->input->post('txtVanPanchayatArea'),
			'POLICE_THANA_OR_REVENUE_POLICE_NAME'=>	$this->input->post('txtPoliceThana'),
			'SO_NAME' => $this->input->post('txtSO'),
			'SO_PHONE' => $this->input->post('txtSOPhone'),
			'POLICE_CHAWKI_OR_REVENUE_POLICE_NAME'=>$this->input->post('txtPoliceChauki'),
			'CHAWKI_INCHARGE_NAME'=>	$this->input->post('txtChIncharge'),
			'CHAWKI_INCHARGE_PHONE'=>	$this->input->post('txtChInchargePhone'),
			'NYAY_PANCHAYAT_NAME'=>	$this->input->post('txtNyayPanchayat'),
			'ANGANVAADI_NAME' => $this->input->post('txtAganwadi'),
			'ANGANVAADI_WORKER_NAME' => $this->input->post('txtAganWorker'),
			'ANGANVAADI_WORKER_PHONE' => $this->input->post('txtAganWorkerPhone'),
			);
		}
		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Different area under tehsil Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function updategrampanchayat($detailid){
		$this->db->where('ONEROWID', $detailid);
		$data = array(
			'GRAM_PANCHAYAT_NAME'=>$this->input->post('txtGramPanchayat'),
			'GRAM_PRADHAN_NAME'=>	$this->input->post('txtGramPradhan'),
			'GRAM_PRADHAN_PHONE'=>	$this->input->post('txtPradhanPhone'),
			'GRAM_VIKAS_ADHIKARI_NAME'=>	$this->input->post('txtGramVikasAdhikari'),
			'GRAM_VIKAS_ADHIKARI_PHONE' => $this->input->post('txtGramVikasAdhikariPhone'),
			'GRAM_PANCHAYAT_ADHIKARI_NAME' => $this->input->post('txtGramPanchAdhikari'),
			'GRAM_PANCHAYAT_ADHIKARI_PHONE' => $this->input->post('txtGramPanchAdhikariPhone'),
			'NUMBER_OF_TOK' => $this->input->post('txtNoOfTok'),
			'NAMES_OF_TOK' => $this->input->post('txtTokNames')
			);

		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Gram Panchayat Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function updatelanddetail($detailid){
		$this->db->where('ONEROWID', $detailid);
		$data = array(
			'TOTAL_LAND_HOLDERS'=>$this->input->post('txtLandHolders'),
			'AGRICULTURE_TOTAL_AREA_UNDER_CULTIVATION_IN_HECTARE'=>	$this->input->post('txtCultivationArea'),
			'TOTAL_GOVT_LAND_UNDER_DIFF_CATEG_IN_HECTARE'=>	$this->input->post('txtGovtLand'),
			'TOTAL_LANDLESS_PEOPLE'=>	$this->input->post('txtLandlessPeople'),
			'MAIN_NAME_OF_CROP' => $this->input->post('txtNameofCrop'),
			'TOTAL_LAND_AREA_OF_VILLAGE_IN_HECTARE' => $this->input->post('txtLandArea'),
			);

		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Land Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function updatepopulation($detailid){
		$this->db->where('ONEROWID', $detailid);
		$data = array(
			'POPULATION_CENSUS_YEAR'=>$this->input->post('txtCensus'),
			'MALE_POPULATION'=>	$this->input->post('txtMalePopulation'),
			'FEMALE_POPULATION'=>	$this->input->post('txtFemalePopulation'),
			'TOTAL_POPULATION'=>	$this->input->post('txtTotalPopulation'),
			);

		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Population Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function nearesthealthfacility($detailid){
		$this->db->where('ONEROWID', $detailid);
		$data = array(
			'HEALTH_FACILITY_NAME'=>$this->input->post('txtHealthFacility'),
			'HEALTH_FACILITY_GOVT_PRIVATE'=>	$this->input->post('optGovtPvtMode'),
			'ASHA_NAME'=>	$this->input->post('txtAshaName'),
			'ASHA_PHONE'=>	$this->input->post('txtAshaNumber'),
			'ANM_NAME' => $this->input->post('txtANMName'),
			'ANM_PHONE' => $this->input->post('txtANMNumber'),
			'PRIVATE_CLINIC_NAME' => $this->input->post('txtPrivateClinic'),
			'CHEMIST_NAME' => $this->input->post('txtChemistName'),
			'HOSPITAL_SUBCENTRE_NAME' => $this->input->post('txtHospitalSubCenterName'),
			'HOSPITAL_SUBCENTRE_DISTANCE' => $this->input->post('txtHospitalSubCenterDistance')
			);

		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Nearest Health Facility Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function election($detailid){
		$this->db->where('ONEROWID', $detailid);
		$data = array(
			'LOKSABHA_PARLIAMENTRY_CONSTITUENCY'=>$this->input->post('txtParliamentryName'),
			'LOKSABHA_MP_NAME'=>	$this->input->post('txtMPName'),
			'LOKSABHA_ASSEMBLY_CONSTITUENCY'=>	$this->input->post('txtAssemblyName'),
			'LOKSABHA_MLA_NAME'=>	$this->input->post('txtMLAName'),
			'POLING_BOOTH_NAME' => $this->input->post('txtBoothName'),
			'VILLAGES_UNDER_POLING_BOOTH' => $this->input->post('txtVillagesUnderBooth'),
			'BLO_NAME' => $this->input->post('txtBLOName'),
			'BLO_PHONE' => $this->input->post('txtBLOPhoneNumber')
			);
		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Election Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function pdsroaddetail($detailid){
		$this->db->where('ONEROWID', $detailid);
		$data = array(
			'PDS_SHOP_OWNER_NAME'=>$this->input->post('txtPDSName'),
			'PDS_SHOP_OWNER_PHONE'=>	$this->input->post('txtShopPhoneNumber'),
			'APPROACH_ROAD_NAME'=>	$this->input->post('txtApproachName'),
			'CONSTRUCTION_AGENCY'=>	$this->input->post('txtConsAgency'),
			'APPROACH_ROAD_PAKKA_KACHCHA' => $this->input->post('optpakkkachcha'),
			'APPROACH_ROAD_TREK_DISTANCE' => $this->input->post('txtTrekDistance'),
			'LANDSLIDE_ZONE_NAME' => $this->input->post('txtLandSlideZone'),
			'ALTERNATE_ROUTE_NAME' => $this->input->post('txtAlternateRouteName'),
			'ALTERNATE_ROUTE_TYPE' => $this->input->post('txtAlternateRouteType'),
			'ALTERNATE_ROUTE_DISTANCE' => $this->input->post('txtAlternateRouteDistance'),
			'ELECTRICITY' => $this->input->post('optElectricity')
			);
		print_r($data);
		$result = $this->db->update('a8_village_one_row_data', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'PDS &amp; Road Detail Successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}


	// Dynamic Below
	function checkPensionNumber($pensionNo){
		$this->db->where('PENSION_NUMBER', trim($pensionNo));
		$query = $this->db->get('a2_pension_pensioner_detail');

		if($query->num_rows() != 0){
			$message = true;
		} else {
			$message = false;
		}
		return $message;
	}

	function checkPensionNumberupdation($pensionNo, $pdetid){
		$this->db->where('PENSION_NUMBER', trim($pensionNo));
		$this->db->where('PDETID <>', $pdetid);
		$query = $this->db->get('a2_pension_pensioner_detail');

		if($query->num_rows() != 0){
			$message = true;
		} else {
			$message = false;
		}
		return $message;
	}
	function enterpensioner(){
			if($this->checkPensionNumber(trim($this->input->post('txtPensionNumber'))) == true){
				$this->session->set_flashdata('_msgall_', 'X: This pension number is already exists. Please feed another Pensioner detail and number.');
			} else {

				$villid = $this->input->post('txtPensionVillageID');

					$id__ = $this->input->post('pensionType');
					$data = array(
						'PTID' =>$id__,
						'VILLAGEID' =>$villid,
						'NAME_' =>$this->input->post('txtName'),
						'FATHER_HUSBAND_NAME_'=>$this->input->post('txtFHName'),
						'FH_TYPE'=>$this->input->post('father_or_husband'),
						'CAST_'=>$this->input->post('txtCaste'),
						'DOB_AGE'=>$this->input->post('txtAge'),
						'PENSION_NUMBER'=>$this->input->post('txtPensionNumber'),
						'APPROVAL_DATE'=>$this->input->post('txtApprovalDate'),
						'AMOUNT'=>$this->input->post('txtAmount'),
						'POST_AT_THE_TIME_OF_RETIREMENT'=>$this->input->post('txtPostRetirement'),
						'DEPARTMENT'=>$this->input->post('txtDept'),
						'STATUS'=>1,
						'DESC_'=>'x',
						'DATE_'=> date('Y-m-d H:i:s')
						);
					$query = $this->db->insert('a2_pension_pensioner_detail', $data);

					$this->session->set_flashdata('_msgall_', "Pensioner detail is successfully submitted.");
			}
	}

	function getPensionType(){
		$query = $this->db->get('a2_pension_pension_type');

		return $query->result();
	}
	function getPension_detail($user__ = 'x', $villid='x'){
		$this->db->select('a.PENSION_TYPE_NAME, b.*');
		if($user__ != 'x'){
			$this->db->where('a.USERNAME', $user__);
		}
		$this->db->where('b.VILLAGEID', $villid);
		$this->db->from('a2_pension_pension_type a');
		$this->db->join('a2_pension_pensioner_detail b', 'a.PTID = b.PTID');
		$query = $this->db->get();

		return $query->result();
	}
	
	function editPensionDetail($pdetid){
		$this->db->select('a.PENSION_TYPE_NAME,b.*');
		$this->db->where('b.PDETID', $pdetid);
		$this->db->from('a2_pension_pension_type a');
		$this->db->join('a2_pension_pensioner_detail b','a.PTID = b.PTID');
		$query = $this->db->get();

		return $query->row();
	}
	function updatepensioner($pdetid){
		if($this->checkPensionNumberupdation(trim($this->input->post('txtPensionNumber')), $pdetid) == true){
			$this->session->set_flashdata('_msgall_', 'X: This pension number is already exists with another penioner. Please update correctly and try again!!.');
		} else {
			
				$data = array(
					'PTID' => $this->input->post('pensionType'),
					'NAME_' =>$this->input->post('txtName'),
					'FATHER_HUSBAND_NAME_'=>$this->input->post('txtFHName'),
					'FH_TYPE'=>$this->input->post('father_or_husband'),
					'CAST_'=>$this->input->post('txtCaste'),
					'DOB_AGE'=>$this->input->post('txtAge'),
					'PENSION_NUMBER'=>$this->input->post('txtPensionNumber'),
					'APPROVAL_DATE'=>$this->input->post('txtApprovalDate'),
					'AMOUNT'=>$this->input->post('txtAmount'),
					'POST_AT_THE_TIME_OF_RETIREMENT'=>$this->input->post('txtPostRetirement'),
					'DEPARTMENT'=>$this->input->post('txtDept'),
					'DESC_'=>'x',
					'DATE_'=> date('Y-m-d H:i:s')
					);
				$this->db->where('PDETID', $pdetid);
				$query = $this->db->update('a2_pension_pensioner_detail', $data);

				if($query == true){
					$this->session->set_flashdata('_msgall_', "Pensioner detail is successfully updated.");
				} else {
					$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
				}
		}
	}
	function delPensionDetail($pdetid){

		$this->db->where('PDETID', $pdetid);
		$this->db->delete('a2_pension_pensioner_detail');
	}

	function getprimaryschool_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('SCHID', 'desc');
		if($user__ != 'x'){
			$this->db->where('USERNAME', $user__);
			//$this->db->where('STATUS', 1);
		}
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a5_school_primary');
		return $query->result();
	}

	function enterprimaryschool(){
		$villid = $this->input->post('txtEducationVillageID');
		$schoolname = $this->input->post('txtPrimarySchool');

		//$this->db->where('SCHOOL_NAME', $schoolname);
		//$query = $this->db->get('a5_school_primary');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This primary school name is already exists. Please enter different primary school name.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'SCHOOL_NAME'=>$schoolname,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a5_school_primary', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Primary School name successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}

	function editprimaryschool($schid){
		$this->db->where('SCHID', $schid);
		$query = $this->db->get('a5_school_primary');
		return $query->row();
	}

	function updateprimaryschool($schid){
		$villid = $this->input->post('txtEducationVillageID');
		$schoolname = $this->input->post('txtPrimarySchool');
		$this->db->where('SCHID', $schid);
		$data = array(
				'SCHOOL_NAME'=>$schoolname,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		$result = $this->db->update('a5_school_primary', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Primary school successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}

	}

	function delprimaryschool($schid){
		$this->db->where('SCHID', $schid);
		$this->db->delete('a5_school_primary');	
	}
	function getmiddleschool_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('SCHID', 'desc');
		if($user__ != 'x'){
			$this->db->where('USERNAME', $user__);
			$this->db->where('STATUS', 1);
		}
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a5_school_middle');
		return $query->result();
	}

	function entermiddleschool(){
		$villid = $this->input->post('txtEducationmiddleVillageID');
		$schoolname = $this->input->post('txtMiddleSchool');

		//$this->db->where('SCHOOL_NAME', $schoolname);
		//$query = $this->db->get('a5_school_middle');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This middle school name is already exists. Please enter different middle school name.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'SCHOOL_NAME'=>$schoolname,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a5_school_middle', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Middle School name successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}

	function editmiddleschool($schid){
		$this->db->where('SCHID', $schid);
		$query = $this->db->get('a5_school_middle');
		return $query->row();
	}
	function updatemiddleschool($schid){
		$villid = $this->input->post('txtEducationmiddleVillageID');
		$schoolname = $this->input->post('txtMiddleSchool');
		$this->db->where('SCHID', $schid);
		$data = array(
				'SCHOOL_NAME'=>$schoolname,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		$result = $this->db->update('a5_school_middle', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Middle school successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}
	function delmiddleschool($schid){
		$this->db->where('SCHID', $schid);
		$this->db->delete('a5_school_middle');	
	}
	function getprivateschool_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('SCHID', 'desc');
		if($user__ != 'x'){
			$this->db->where('USERNAME', $user__);
			$this->db->where('STATUS', 1);
		}
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a5_school_private');
		return $query->result();
	}

	function enterprivateschool(){
		$villid = $this->input->post('txtEducationprivateVillageID');
		$schoolname = $this->input->post('txtPrivateSchool');

		//$this->db->where('SCHOOL_NAME', $schoolname);
		//$query = $this->db->get('a5_school_private');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This private school name is already exists. Please enter different private school name.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'SCHOOL_NAME'=>$schoolname,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a5_school_private', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Private School name successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}
	function editprivateschool($schid){
		$this->db->where('SCHID', $schid);
		$query = $this->db->get('a5_school_private');
		return $query->row();
	}
	function updateprivateschool($schid){
		$villid = $this->input->post('txtEducationprivateVillageID');
		$schoolname = $this->input->post('txtPrivateSchool');
		$this->db->where('SCHID', $schid);
		$data = array(
				'SCHOOL_NAME'=>$schoolname,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		$result = $this->db->update('a5_school_private', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Private school successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}
	function delprivateschool($schid){
		$this->db->where('SCHID', $schid);
		$this->db->delete('a5_school_private');	
	}
	function getcollege_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('SCHID', 'desc');
		if($user__ != 'x'){
			$this->db->where('USERNAME', $user__);
			$this->db->where('STATUS', 1);
		}
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a5_school_higher_education_college');
		return $query->result();
	}

	function entercollege(){
		$villid = $this->input->post('txtEducationcollegeVillageID');
		$schoolname = $this->input->post('txtCollege');

		//$this->db->where('COLLEGE_NAME', $schoolname);
		//$query = $this->db->get('a5_school_higher_education_college');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This college name is already exists. Please enter different college name.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'COLLEGE_NAME'=>$schoolname,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a5_school_higher_education_college', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'College name successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}
	function editcollege($schid){
		$this->db->where('SCHID', $schid);
		$query = $this->db->get('a5_school_higher_education_college');
		return $query->row();
	}
	function updatecollege($schid){
		$villid = $this->input->post('txtEducationcollegeVillageID');
		$schoolname = $this->input->post('txtCollege');
		$this->db->where('SCHID', $schid);
		$data = array(
				'COLLEGE_NAME'=>$schoolname,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		$result = $this->db->update('a5_school_higher_education_college', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'College successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}

	}
	function delcollege($schid){
		$this->db->where('SCHID', $schid);
		$this->db->delete('a5_school_higher_education_college');	
	}
	function getuniv_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('SCHID', 'desc');
		if($user__ != 'x'){
			$this->db->where('USERNAME', $user__);
			$this->db->where('STATUS', 1);
		}
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a5_school_higher_education_university');
		return $query->result();
	}

	function enteruniversity(){
		$villid = $this->input->post('txtEducationunivVillageID');
		$schoolname = $this->input->post('txtUniv');

		//$this->db->where('UNIV_NAME', $schoolname);
		//$query = $this->db->get('a5_school_higher_education_university');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This university name is already exists. Please enter different university name.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'UNIV_NAME'=>$schoolname,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a5_school_higher_education_university', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'University name successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}

	function edituniv($schid){
		$this->db->where('SCHID', $schid);
		$query = $this->db->get('a5_school_higher_education_university');
		return $query->row();
	}
	function updateuniversity($schid){
		$villid = $this->input->post('txtEducationunivVillageID');
		$schoolname = $this->input->post('txtUniv');
		$this->db->where('SCHID', $schid);
		$data = array(
				'UNIV_NAME'=>$schoolname,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		$result = $this->db->update('a5_school_higher_education_university', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'University successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}
	function deluniv($schid){
		$this->db->where('SCHID', $schid);
		$this->db->delete('a5_school_higher_education_university');	
	}

	function getmela_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('LOCALMELAID', 'desc');
		if($user__ != 'x'){
			$this->db->where('USERNAME', $user__);
			$this->db->where('STATUS', 1);
		}
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a4_local_mela');
		return $query->result();
	}
	function entermela(){
		$villid = $this->input->post('txtMelaVillageID');
		$melaname = $this->input->post('txtLocalMela');

		//$this->db->where('MELA_NAME', $melaname);
		//$query = $this->db->get('a4_local_mela');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This Mela name is already exists. Please enter different mela name.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'MELA_NAME'=>$melaname,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a4_local_mela', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Mela name successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}
	function editmela($melaid){
		$this->db->where('LOCALMELAID', $melaid);
		$query = $this->db->get('a4_local_mela');

		return $query->row();
	}

	function updatemela($melaid){
		$this->db->where('LOCALMELAID', $melaid);
		$melaname = $this->input->post('txtLocalMela');
		$data = array(
				'MELA_NAME'=>$melaname,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		$result = $this->db->update('a4_local_mela', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Local Mela successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function delmela($melaid){
		$this->db->where('LOCALMELAID', $melaid);
		$this->db->delete('a4_local_mela');	
	}

	function gettoristplacetype(){
		$query = $this->db->get('a3_tourism_tourist_places_type');
		return $query->result();
	}

	function gettoristplace_detail($user__ = 'x', $villid='x'){
		$this->db->select('a.TOURIST_PLACE_TYPE, b.*');
		$this->db->order_by('a.TPTID', 'desc');
		$this->db->order_by('b.TPID', 'desc');
		if($user__ != 'x'){
			$this->db->where('b.USERNAME', $user__);
			//$this->db->where('b.STATUS', 1);
		}
		$this->db->where('VILLAGEID', $villid);
		$this->db->from('a3_tourism_tourist_places_type a');
		$this->db->join('a3_tourism_tourist_places b', 'a.TPTID = b.TPTID');
		$query = $this->db->get();
		return $query->result();
	}

	function entertourplaces(){

		$villid = $this->input->post('txttouristplaceVillageID');
		$touristplace = $this->input->post('txtTouristPlace');
		$touristType = $this->input->post('touristType');

		//$this->db->where('TOURIST_PLACE', $touristplace);
		//$query = $this->db->get('a3_tourism_tourist_places');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This Tourist place is already exists. Please enter different Tourist place.');
		//} else {
				$data = array(
					'TPTID' => $touristType,
					'VILLAGEID'=>$villid,
					'TOURIST_PLACE'=>$touristplace,
					'PIC' => 'x',
					'STATUS' => 1,
					'DATE_'=>date('Y-m-d H:i:s'),
					'USERNAME'=>$this->session->userdata('user__')
					);
				$result = $this->db->insert('a3_tourism_tourist_places', $data);
				
				$ID_ID = $this->db->insert_id();

				// Picture upload
					$config = array(
		                'upload_path' => './assets_/pics',
		                'allowed_types' => 'jpg|png|jpeg',
		                'file_name'	=> 'tourplace_'.$ID_ID,
		                'overwrite' => true
		            );
		            $file_element_name = 'tourPlacePic';
		            $this->load->library('upload', $config);

		            if ($this->upload->do_upload($file_element_name)) {
		                $path_ji = $this->upload->data();
		                $path_ = $path_ji['file_name'];
		            } else {
		                $path_ = 'x';
		            }
		        // Picture uploading over

				if($path_ != 'x'){
					$data = array(
					'PIC' => $path_,
					);
				} 
				$this->db->where('TPID', $ID_ID);
				$query = $this->db->update('a3_tourism_tourist_places', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Tourist place successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}
	function edittourplaces($tpid){
		$this->db->where('TPID', $tpid);
		$query = $this->db->get('a3_tourism_tourist_places');

		return $query->row();
	}
	function updatetourplaces($tpid){

		// Picture upload
			$config = array(
                'upload_path' => './assets_/pics',
                'allowed_types' => 'jpg|png|jpeg',
                'file_name'	=> 'tourplace_'.$tpid,
                'overwrite' => true
            );
            $file_element_name = 'tourPlacePic';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload($file_element_name)) {
                $path_ji = $this->upload->data();
                $path_ = $path_ji['file_name'];
            } else {
                $path_ = 'x';
            }
        // Picture uploading over

		$touristplace = $this->input->post('txtTouristPlace');
		$touristType = $this->input->post('touristType');

		$this->db->where('TPID', $tpid);
		if($path_ != 'x'){
			$data = array(
				'TPTID' => $touristType,
				'TOURIST_PLACE'=>$touristplace,
				'PIC' => $path_,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		} else {
			$data = array(
				'TPTID' => $touristType,
				'TOURIST_PLACE'=>$touristplace,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		}
		$result = $this->db->update('a3_tourism_tourist_places', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Tourist place successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}
	function deltourplaces($tpid){
		$this->db->where('TPID', $tpid);
		$query = $this->db->delete('a3_tourism_tourist_places');
	}

	function getactivity_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('TATID', 'desc');
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a3_tourism_tourism_activity_type');
		return $query->result();
	}

	function enteractivity(){
		$villid = $this->input->post('txtactivityVillageID');
		$activity = $this->input->post('txtTouristActivity');

		//$this->db->where('ACTIVITY_NAME_', $activity);
		//$query = $this->db->get('a3_tourism_tourism_activity_type');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This Tourist Activity is already exists. Please enter different Tourist Activity.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'ACTIVITY_NAME_'=>$activity,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a3_tourism_tourism_activity_type', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Tourist Activity successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}

	function editactivity($tatid){
		$this->db->where('TATID', $tatid);
		$query = $this->db->get('a3_tourism_tourism_activity_type');

		return $query->row();
	}

	function updateactivity($tatid){
		$activity = $this->input->post('txtTouristActivity');

		$this->db->where('TATID', $tatid);
		$data = array(
				'ACTIVITY_NAME_'=>$activity,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		$result = $this->db->update('a3_tourism_tourism_activity_type', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Tourist Activity successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}
	function delactivity($tatid){
		$this->db->where('TATID', $tatid);
		$query = $this->db->delete('a3_tourism_tourism_activity_type');
	}

	function getnearesttown_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('NEARESTTOWNID', 'desc');
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a4_nearest_town');
		return $query->result();
	}

	function enternearesttown(){
		$villid = $this->input->post('txtNearestTownVillageID');
		$nearesttown = $this->input->post('txtNearestTown');
		$distance = $this->input->post('txtDistanceFromVillage');

		//$this->db->where('NAME_', $nearesttown);
		//$query = $this->db->get('a4_nearest_town');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This Nearest town is already exists. Please enter different Tourist Activity.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'NAME_'=>$nearesttown,
				'DISTANCE_FROM_VILLAGE'=>$distance,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a4_nearest_town', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Nearest town successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}

	function editnearesttown($nearesttownid){
		$this->db->where('NEARESTTOWNID', $nearesttownid);
		$query = $this->db->get('a4_nearest_town');

		return $query->row();
	}

	function updatenearesttown($nearesttownid){
		$this->db->where('NEARESTTOWNID', $nearesttownid);
		$nearesttown = $this->input->post('txtNearestTown');
		$distance = $this->input->post('txtDistanceFromVillage');

		$data = array(
			'NAME_'=>$nearesttown,
			'DISTANCE_FROM_VILLAGE'=>$distance,
			'DATE_'=>date('Y-m-d H:i:s'),
			'USERNAME'=>$this->session->userdata('user__')
			);
		$result = $this->db->update('a4_nearest_town', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Nearest town successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function delnearesttown($nearesttownid){
		$this->db->where('NEARESTTOWNID', $nearesttownid);
		$result = $this->db->delete('a4_nearest_town');
	}

	function get_bank_atm_type(){
		$query = $this->db->get('a6_bank_atm_type');
		return $query->result();
	}

	function getbankatm_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('b.BANKATMID', 'desc');
		$this->db->select('a.NAME_ as TYPE_NAME, b.*');
		$this->db->from('a6_bank_atm_type a');
		$this->db->join('a6_bank_atm b', 'a.TYPEID = b.TYPE_');
		$this->db->where('b.VILLAGEID', $villid);
		$query = $this->db->get();
		return $query->result();
	}

	function enterbankatm(){
		$villid = $this->input->post('txtbankatmVillageID');
		$type_ = $this->input->post('BAType');
		$bankatmname = $this->input->post('txtBankAtmName');

		//$this->db->where('NAME_', $nearesttown);
		//$query = $this->db->get('a4_nearest_town');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This Bank/ATM name is already exists. Please enter different Tourist Activity.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'NAME_'=>$bankatmname,
				'TYPE_'=>$type_,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a6_bank_atm', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Bank/ATM name successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}
	function editbankatm($bankatmid){
		$this->db->where('BANKATMID', $bankatmid);
		$query = $this->db->get('a6_bank_atm');
		return $query->row();
	}

	function updatebankatm($bankatmid){
		$this->db->where('BANKATMID', $bankatmid);
		$type_ = $this->input->post('BAType');
		$bankatmname = $this->input->post('txtBankAtmName');

		$data = array(
			'NAME_'=>$bankatmname,
			'TYPE_'=>$type_,
			'DATE_'=>date('Y-m-d H:i:s'),
			'USERNAME'=>$this->session->userdata('user__')
			);
		$result = $this->db->update('a6_bank_atm', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Bank/ATM successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function delbankatm($bankatmid){
		$this->db->where('BANKATMID', $bankatmid);
		$result = $this->db->delete('a6_bank_atm');
	}

	function get_industrytype(){
		$query = $this->db->get('a7_village_industry_type');
		return $query->result();
	}

	function getindustry_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('b.VIID', 'desc');
		$this->db->select('a.NAME_ as TYPE_NAME, b.*');
		$this->db->from('a7_village_industry_type a');
		$this->db->join('a7_village_industry b', 'a.TYPEID = b.INDUSTRY_TYPE');
		$this->db->where('b.VILLAGEID', $villid);
		$query = $this->db->get();
		return $query->result();
	}

	function enterindustry(){
		$villid = $this->input->post('txtindustryVillageID');
		$type_ = $this->input->post('industryType');
		$name = $this->input->post('txtIndustryName');

		//$this->db->where('INDUSTRY', $name);
		//$query = $this->db->get('a7_village_industry');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This Industry name is already exists. Please enter different Tourist Activity.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'INDUSTRY'=>$name,
				'INDUSTRY_TYPE'=>$type_,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a7_village_industry', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Industry name successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}

	function editindustry($viid){
		$this->db->where('VIID', $viid);
		$query = $this->db->get('a7_village_industry');
		return $query->row();
	}

	function updateindustry($viid){
		$this->db->where('VIID', $viid);
		$type_ = $this->input->post('industryType');
		$name = $this->input->post('txtIndustryName');

		$data = array(
			'INDUSTRY'=>$name,
			'INDUSTRY_TYPE'=>$type_,
			'DATE_'=>date('Y-m-d H:i:s'),
			'USERNAME'=>$this->session->userdata('user__')
			);
		$result = $this->db->update('a7_village_industry', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Industry name successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function delindustry($viid){
		$this->db->where('VIID', $viid);
		$this->db->delete('a7_village_industry');
	}

	function gethelipad_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('PHDID', 'desc');
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a7_proposed_halipad_detail');
		return $query->result();
	}

	function enterhelipad(){
		$villid = $this->input->post('txthelipadVillageID');
		$name = $this->input->post('txtLandOwnerName');

		//$this->db->where('LAND_OWNER_NAME_', $name);
		//$query = $this->db->get('a7_proposed_halipad_detail');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This Helipad site owner name is already exists. Please enter different Tourist Activity.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'LAND_OWNER_NAME_'=>$name,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a7_proposed_halipad_detail', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Helipad site owner name successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}

	function edithelipad($phdid){
		$this->db->where('PHDID', $phdid);
		$query = $this->db->get('a7_proposed_halipad_detail');
		return $query->row();
	}

	function updatehelipad($phdid){
		$name = $this->input->post('txtLandOwnerName');

		$this->db->where('PHDID', $phdid);
		$data = array(
				'LAND_OWNER_NAME_'=>$name,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
		$result = $this->db->update('a7_proposed_halipad_detail', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Helipad site owner name successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function delhelipad($phdid){
		$this->db->where('PHDID', $phdid);
		$this->db->delete('a7_proposed_halipad_detail');
	}

	function getshelter_detail($user__ = 'x', $villid='x'){
		$this->db->order_by('PSDID', 'desc');
		$this->db->where('VILLAGEID', $villid);
		$query = $this->db->get('a7_proposed_shelter_detail');
		return $query->result();
	}

	function entershelter(){
		$villid = $this->input->post('txtshelterVillageID');
		$name = $this->input->post('txtShelterName');
		$capacity = $this->input->post('txtCapacity');
		$water = $this->input->post('txtWater_yes_no');
		$electricity = $this->input->post('txtelectricity_yes_no');

		//$this->db->where('SHELTER_NAME', $name);
		//$query = $this->db->get('a7_proposed_shelter_detail');

		//if($query->num_rows()!=0){
			//$this->session->set_flashdata('_msgall_', 'X: This Shelter name is already exists. Please enter different Tourist Activity.');
		//} else {
			$data = array(
				'VILLAGEID'=>$villid,
				'SHELTER_NAME'=>$name,
				'CAPACITY'=>$capacity,
				'WATER' => $water,
				'ELECTRICITY' => $electricity,
				'STATUS' => 1,
				'DATE_'=>date('Y-m-d H:i:s'),
				'USERNAME'=>$this->session->userdata('user__')
				);
			$result = $this->db->insert('a7_proposed_shelter_detail', $data);
			if($result == true){
				$this->session->set_flashdata('_msgall_', 'Shelter successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
			}
		//}
	}

	function editshelter($psdid){
		$this->db->where('PSDID', $psdid);
		$query = $this->db->get('a7_proposed_shelter_detail');
		return $query->row();
	}

	function updateshelter($psdid){
		$this->db->where('PSDID', $psdid);

		$name = $this->input->post('txtShelterName');
		$capacity = $this->input->post('txtCapacity');
		$water = $this->input->post('txtWater_yes_no');
		$electricity = $this->input->post('txtelectricity_yes_no');

		$data = array(
			'SHELTER_NAME'=>$name,
			'CAPACITY'=>$capacity,
			'WATER' => $water,
			'ELECTRICITY' => $electricity,
			'DATE_'=>date('Y-m-d H:i:s'),
			'USERNAME'=>$this->session->userdata('user__')
			);
		$result = $this->db->update('a7_proposed_shelter_detail', $data);
		if($result == true){
			$this->session->set_flashdata('_msgall_', 'Shelter successfully updated.');
		} else {
			$this->session->set_flashdata('_msgall_', "X: Something goes wrong. Please try again !!");
		}
	}

	function delshelter($psdid){
		$this->db->where('PSDID', $psdid);
		$this->db->delete('a7_proposed_shelter_detail');
	}
	// Dynamic End here
}