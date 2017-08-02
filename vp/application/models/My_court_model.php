<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_court_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function getCases($user__, $year = 'x', $caseno='x'){

		$this->db->where('a.USERNAME', $user__);			

		$this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.DISMISS_IN_DEFAULT, a.FINAL_ORDER_DATE, a.FINAL_ORDER_ATTACH, a.FILE_DISPATCHED_TO_RECORD_ROOM, a.USERNAME, b.*');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.SNO = b.REF_SNO');
		if($year != 'x'){
			$this->db->where('a.YEAR_', $year);
		}
		if($caseno != 'x'){
			$this->db->like('a.CASENO', $caseno);
		}
		$this->db->order_by('a.REG_DATE');
		$query = $this->db->get();
		return $query->result();
	}

	function getMasterCases($year = 'x', $count = 'x'){
		$this->db->select('a.*, b.FIRST_PARTY, b.SECOND_PARTY, b.ACT_NAME, b.SECTION');
		if($year != 'x'){
			$this->db->where('a.YEAR_', $year);
		}
		$this->db->order_by('a.REG_DATE');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.STATUS_=b.SNO');
		if($count != 'x'){
			$this->db->limit($count,0);
		}
		$this->db->where('a.USERNAME', $this->session->userdata('user__'));
		$query = $this->db->get();
		return $query->result();
	}
        
    function getMasterCases_pagination($limit, $start){
		$this->db->select('a.*, b.FIRST_PARTY, b.SECOND_PARTY, b.ACT_NAME, b.SECTION');
		$this->db->order_by('a.REG_DATE');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.STATUS_=b.SNO');
        
                $this->db->limit($limit, $start);
                $this->db->where('a.USERNAME', $this->session->userdata('user__'));
		$query = $this->db->get();
		return $query->result();
	}

	function count_master_cases(){
		$this->db->select('COUNT(a.SNO) as totalcases');
                $this->db->order_by('a.REG_DATE');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.STATUS_=b.SNO');
		$this->db->where('a.USERNAME', $this->session->userdata('user__'));
		$query = $this->db->get();
		return $query->row();
	}
        
        function total_master_cases(){
		$this->db->select('a.*');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.STATUS_=b.SNO');
		$this->db->where('a.USERNAME', $this->session->userdata('user__'));
		$query = $this->db->get();
		return $query->result();
	}
        
	function getCase($caseno){
		//$this->db->like('a.CASENO', $caseno);
		$this->db->select('a.*, b.FIRST_PARTY, b.SECOND_PARTY, b.ACT_NAME, b.SECTION');

		$this->db->order_by('a.REG_DATE');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.STATUS_=b.SNO');
		$this->db->where('SUBSTRING_INDEX(a.CASENO, "-", -1)=', $caseno);
		$this->db->where('a.USERNAME', $this->session->userdata('user__'));
		$query = $this->db->get();
		return $query->result();
	}
	function submitnewcase($user__){
		$x = explode('-',$this->input->post('txtRegDate'));
		$regdate = $this->input->post('txtRegDate');
		$caseno = $x[0] ."-".$this->input->post('txtCaseNo');
		$year = $x[0];
		$month = $x[1];
		$type = $this->input->post('txtType');
		$court = $this->input->post('txtCourt');
		$village = $this->input->post('txtVillage');
		$subdiv = $this->input->post('txtSubDivision');
		$tehsil = $this->input->post('txtTehsil');
		$patwariarea = $this->input->post('txtPatwariArea');
		$policearea = $this->input->post('txtPoliceArea');
		$actname = $this->input->post('txtActName');
		$section = $this->input->post('txtSection');
		$first_party = $this->input->post('txtFirstName');
		$second_party = $this->input->post('txtSecondParty');
		$next_date = $this->input->post('txtNextDate');
		$scheduled_for = $this->input->post('txtScheduledFor');
		$final_order_date = $this->input->post('txtFinalOrderDate');
		//$finalOrder = $this->input->post('txtFinalOrder');
		$file_dispatched_to_record_room = $this->input->post('txtFileDispatchedRecordRoom');
		$dismiss_in_default = $this->input->post('txtDismissInDefault');

			$data = array(
				'CASENO' => $caseno,
				'REG_DATE' => $regdate,
				'YEAR_' => $year,
				'MONTH' => $month,
				'TYPE_' => $type,
				'COURT_NAME' => $court,
				'VILLAGE' => $village,
				'DISMISS_IN_DEFAULT' => $dismiss_in_default,
				'FINAL_ORDER_DATE' => $final_order_date,
				'FINAL_ORDER_ATTACH' => 'x',
				'FILE_DISPATCHED_TO_RECORD_ROOM' => $file_dispatched_to_record_room,
				'USERNAME' => $user__,
				'STATUS_' => 1
				);
			$query = $this->db->insert('a96_sdm_court', $data);
			if($query == true){
				$id__ = $this->db->insert_id();

				$data = array(
						'REF_SNO' => $id__,
						'CASENO' => $caseno,
						'SUB_DIVISION' => $subdiv,
						'TEHSIL' => $tehsil,
						'PATWARI_AREA' => $patwariarea,
						'POLICE_AREA' => $policearea,
						'ACT_NAME' => $actname,
						'SECTION' => $section,
						'FIRST_PARTY' => $first_party,
						'SECOND_PARTY' => $second_party,
						'NEXT_DATE'	=> $next_date,
						'SCHEDULED_FOR' => $scheduled_for,
						'DOE'	=>  date('Y-m-d H:i:s'),
						'USERNAME' => $user__
					);
				$query = $this->db->insert('a97_sdm_court_detail', $data);

				if($query == true){
					// Below code is to maintain to fetch the last record
						$secondtableid = $this->db->insert_id();
						$data = array(
								'STATUS_' => $secondtableid
							);
						$this->db->where('SNO', $id__);
						$this->db->update('a96_sdm_court', $data);
					// --------------------------------------------------

						// Insert Act If not exists
							$this->db->where('ACT', $actname);
							$query = $this->db->get('a95_act_master');
							if($query->num_rows()!=0){

							} else {
								$data = array(
									'ACT' => $actname
									);
								$this->db->insert('a95_act_master', $data);
							}
						// ------------------------

						// Insert Court If not exists
							$this->db->where('COURT', $court);
							$query = $this->db->get('a95_court_master');
							if($query->num_rows()!=0){

							} else {
								$data = array(
									'COURT' => $court
									);
								$this->db->insert('a95_court_master', $data);
							}
						// ------------------------

						// Insert Section If not exists
							$this->db->where('SECTION', $section);
							$query = $this->db->get('a95_section_master');
							if($query->num_rows()!=0){

							} else {
								$data = array(
									'SECTION' => $section
									);
								$this->db->insert('a95_section_master', $data);
							}
						// ------------------------

					$this->session->set_flashdata('_msgall_', 'New Case <span style="color: #0000ff">'. $caseno . '</span> is successfully submitted.');
				} else {
					$this->session->set_flashdata('_msgall_', 'Something goes wrong. Please try again !!');
				}
			} else {
				$this->session->set_flashdata('_msgall_', 'Something goes wrong. Please try again !!');
			}
	}

	function editCaseRecord($id__){
		$this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.COURT_NAME, a.VILLAGE, a.DISMISS_IN_DEFAULT, a.FINAL_ORDER_DATE, a.FINAL_ORDER_ATTACH, a.FILE_DISPATCHED_TO_RECORD_ROOM, a.USERNAME, b.*');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.SNO = b.REF_SNO');
		$this->db->where('b.SNO', $id__);
		//$this->db->where('a.STATUS_', 1);
		$query = $this->db->get();
		if($query != true){
			redirect('sdmcourt/index/view');
		}
		return $query->row();
	}

	function updateNewCaseRecord($sno){
		$this->db->where('REF_SNO', $sno);
		$this->db->select_max('SNO');
		$query = $this->db->get('a97_sdm_court_detail');
		$row = $query->row();
		$snoid = $row->SNO;

		$this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.COURT_NAME, a.VILLAGE, a.DISMISS_IN_DEFAULT, a.FINAL_ORDER_DATE, a.FINAL_ORDER_ATTACH, a.FILE_DISPATCHED_TO_RECORD_ROOM, b.*');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.SNO = b.REF_SNO');
		$this->db->where('b.SNO', $snoid);

		//$this->db->where('a.STATUS_', 1);
		$query = $this->db->get();
		return $query->row();	
	}
	function updatecaserecord($sno, $ref_sno, $user__){
		$x = explode('-',$this->input->post('txtRegDate'));
		$regdate = $this->input->post('txtRegDate');
		$caseno = $this->input->post('txtCaseNo');
		$year = $x[0];
		$month = $x[1];
		$type = $this->input->post('txteditType');
		$court = $this->input->post('txtCourtEdit');
		$village = $this->input->post('txtVillage');
		$subdiv = trim($this->input->post('txtSubDivision'));
		$tehsil = $this->input->post('txtTehsilEdit');
		$patwariarea = $this->input->post('txtPatwariArea');
		$policearea = $this->input->post('txtPoliceArea');
		$actname = $this->input->post('txtActNameEdit');
		$section = $this->input->post('txtSectionEdit');
		$first_party = $this->input->post('txtFirstName');
		$second_party = $this->input->post('txtSecondParty');
		$next_date = $this->input->post('txtNextDate');
		$scheduled_for = $this->input->post('txtScheduledFor');
		$final_order_date = $this->input->post('txtFinalOrderDate');
		//$finalOrder = $this->input->post('txtFinalOrder');
		$file_dispatched_to_record_room = $this->input->post('txtFileDispatchedRecordRoom');
		$dismiss_in_default = $this->input->post('txtDismissInDefault');

		$data = array(
			'REG_DATE' => $regdate,
			'YEAR_' => $year,
			'MONTH' => $month,
			'TYPE_' => $type,
			'COURT_NAME' => $court,
			'VILLAGE' => $village,
			'DISMISS_IN_DEFAULT' => $dismiss_in_default,
			'FINAL_ORDER_DATE' => $final_order_date,
			'FINAL_ORDER_ATTACH' => 'x',
			'FILE_DISPATCHED_TO_RECORD_ROOM' => $file_dispatched_to_record_room,
			'USERNAME' => $user__
			);
		$this->db->where('SNO', $ref_sno);
		$query = $this->db->update('a96_sdm_court', $data);

		if($query == true){
			$data = array(
					'SUB_DIVISION' => $subdiv,
					'TEHSIL' => $tehsil,
					'PATWARI_AREA' => $patwariarea,
					'POLICE_AREA' => $policearea,
					'ACT_NAME' => $actname,
					'SECTION' => $section,
					'FIRST_PARTY' => $first_party,
					'SECOND_PARTY' => $second_party,
					'NEXT_DATE'	=> $next_date,
					'SCHEDULED_FOR' => $scheduled_for,
					'DOE'	=>  date('Y-m-d H:i:s'),
					'USERNAME' => $user__
				);
			$this->db->where('SNO', $sno);
			$query = $this->db->update('a97_sdm_court_detail', $data);

			if($query == true){
				// Insert Act If not exists
					$this->db->where('ACT', $actname);
					$query = $this->db->get('a95_act_master');
					if($query->num_rows()!=0){

					} else {
						$data = array(
							'ACT' => $actname
							);
						$this->db->insert('a95_act_master', $data);
					}
				// ------------------------
				// Insert Court If not exists
					$this->db->where('COURT', $court);
					$query = $this->db->get('a95_court_master');
					if($query->num_rows()!=0){

					} else {
						$data = array(
							'COURT' => $court
							);
						$this->db->insert('a95_court_master', $data);
					}
				// ------------------------

				// Insert Section If not exists
					$this->db->where('SECTION', $section);
					$query = $this->db->get('a95_section_master');
					if($query->num_rows()!=0){

					} else {
						$data = array(
							'SECTION' => $section
							);
						$this->db->insert('a95_section_master', $data);
					}
				// ------------------------
				$this->session->set_flashdata('_msgall_', 'Case <span style="color: #0000ff">'. $caseno . '</span> is successfully updated.');
			} else {
				$this->session->set_flashdata('_msgall_', 'Something goes wrong. Please try again !!');
			}
		} else {
			$this->session->set_flashdata('_msgall_', 'Something goes wrong. Please try again !!');
		}
	}

	function updatecaseNewrecord($sno, $ref_sno, $user__){
		$caseno = $this->input->post('txtCaseNo');
		//$regdate = $this->input->post('txtRegDate');
		//$year = $this->input->post('txtYear');
		//$month = $this->input->post('txtMonth');
		//$type = $this->input->post('txteditType');
		//$village = $this->input->post('txtVillage');
		$subdiv = $this->input->post('txtSubDivision');
		$tehsil = $this->input->post('txtTehsil');
		$patwariarea = $this->input->post('txtPatwariArea');
		$policearea = $this->input->post('txtPoliceArea');
		$actname = $this->input->post('txtActNameNewUpdate');
		$section = $this->input->post('txtSectionUpdate');
		$first_party = $this->input->post('txtFirstName');
		$second_party = $this->input->post('txtSecondParty');
		$next_date = $this->input->post('txtNextDate');
		$scheduled_for = $this->input->post('txtScheduledFor');
		$final_order_date = $this->input->post('txtFinalOrderDate');
		//$finalOrder = $this->input->post('txtFinalOrder');
		$file_dispatched_to_record_room = $this->input->post('txtFileDispatchedRecordRoom');
		$dismiss_in_default = $this->input->post('txtDismissInDefault');

		$data = array(
			'DISMISS_IN_DEFAULT' => $dismiss_in_default,
			'FINAL_ORDER_DATE' => $final_order_date,
			'FILE_DISPATCHED_TO_RECORD_ROOM' => $file_dispatched_to_record_room,
			'USERNAME' => $user__
			);
		$this->db->where('SNO', $ref_sno);
		$query = $this->db->update('a96_sdm_court', $data);

		if($query == true){
			$data = array(
					'REF_SNO' => $ref_sno,
					'CASENO' => $caseno,
					'SUB_DIVISION' => $subdiv,
					'TEHSIL' => $tehsil,
					'PATWARI_AREA' => $patwariarea,
					'POLICE_AREA' => $policearea,
					'ACT_NAME' => $actname,
					'SECTION' => $section,
					'FIRST_PARTY' => $first_party,
					'SECOND_PARTY' => $second_party,
					'NEXT_DATE'	=> $next_date,
					'SCHEDULED_FOR' => $scheduled_for,
					'DOE'	=>  date('Y-m-d H:i:s'),
					'USERNAME' => $user__
				);
			$query = $this->db->insert('a97_sdm_court_detail', $data);

			if($query == true){
				// Below code is to maintain to fetch the last record
					$secondtableid = $this->db->insert_id();
					$data = array(
							'STATUS_' => $secondtableid
						);
					$this->db->where('SNO', $ref_sno);
					$this->db->update('a96_sdm_court', $data);
				// --------------------------------------------------

					// Insert Act If not exists
						$this->db->where('ACT', $actname);
						$query = $this->db->get('a95_act_master');
						if($query->num_rows()!=0){

						} else {
							$data = array(
								'ACT' => $actname
								);
							$this->db->insert('a95_act_master', $data);
						}
					// ------------------------

					// Insert Section If not exists
						$this->db->where('SECTION', $section);
						$query = $this->db->get('a95_section_master');
						if($query->num_rows()!=0){

						} else {
							$data = array(
								'SECTION' => $section
								);
							$this->db->insert('a95_section_master', $data);
						}
					// ------------------------

				$this->session->set_flashdata('_msgall_', 'New Entry for the Case <span style="color: #0000ff">'. $caseno . '</span> is successfully submitted.');
			} else {
				$this->session->set_flashdata('_msgall_', 'Something goes wrong. Please try again !!');
			}
		} else {
			$this->session->set_flashdata('_msgall_', 'Something goes wrong. Please try again !!');
		}
	}

	function deletecaserecord($sno){
		$this->db->where('SNO', $sno);
		$query = $this->db->get('a97_sdm_court_detail');
		if($query->num_rows() != 0){
			$row = $query->row();
			$caseno = $row->CASENO;
			$refsno = $row->REF_SNO;
		} else {
			$caseno = 'x';
		}
		$this->db->where('SNO', $sno);
		$query = $this->db->delete('a97_sdm_court_detail');
		if($query == true){
			// Update the latest case entry corresponsing to the case in main table
			$this->db->where('REF_SNO', $refsno);
			$this->db->select_max('SNO');
			$query = $this->db->get('a97_sdm_court_detail');
			$row = $query->row();
			$snoid = $row->SNO;

			$this->db->where('SNO', $refsno);
			$data = array(
				'STATUS_'=> $snoid
				);
			$this->db->update('a96_sdm_court', $data);
			// ------------------------------------------------------
			$this->session->set_flashdata('_msgall_', 'Record deleted from the case <span style="color: #0000ff">'. $caseno . '</span>.');
		} else {
			$this->session->set_flashdata('_msgall_', 'Something goes wrong. Please try again !!');
		}
	}

	function deletewholecase($sno){
		$this->db->where('SNO', $sno);
		$query = $this->db->delete('a96_sdm_court');
		if($query == true){
			$this->db->where('REF_SNO', $sno);
			$this->db->delete('a97_sdm_court_detail');
		} else {
			redirect('sdmcourt/index/view');
		}
	}

	function pendingcases(){
		$this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, b.*');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
		$this->db->where('a.FINAL_ORDER_DATE', "");
		$this->db->where('a.DISMISS_IN_DEFAULT', "Deactivate DD");
		$this->db->where('a.USERNAME', $this->session->userdata('user__'));
		$this->db->order_by('a.REG_DATE');
		$this->db->order_by('a.SNO', 'asc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}
	function todayscases(){
		$this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, b.*');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
		$this->db->where('b.NEXT_DATE', date('Y-m-d'));
		$this->db->where('a.FINAL_ORDER_DATE', "");
		$this->db->where('a.DISMISS_IN_DEFAULT', "Deactivate DD");
		$this->db->where('a.USERNAME', $this->session->userdata('user__'));
		$this->db->order_by('a.REG_DATE');
		$this->db->order_by('a.SNO', 'asc');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function disposedoffcases($startdate = 'x', $enddate = 'x') {
		$this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, b.*');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
		$this->db->where('a.DISMISS_IN_DEFAULT', "Activate DD");
		if($startdate != 'x'){
			$this->db->where('a.REG_DATE >=', $startdate);
		}
		if($enddate != 'x'){
			$this->db->where('a.REG_DATE <=', $enddate);	
		}
		$this->db->where('a.USERNAME', $this->session->userdata('user__'));
		$this->db->order_by('a.REG_DATE');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function finalcases($startdate = 'x', $enddate = 'x'){
		$this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, a.FINAL_ORDER_DATE, a.FILE_DISPATCHED_TO_RECORD_ROOM, b.*');
		$this->db->from('a96_sdm_court a');
		$this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
		$this->db->where('a.DISMISS_IN_DEFAULT', "Deactivate DD");
		$this->db->where('a.FINAL_ORDER_DATE<>', "");
		if($startdate != 'x'){
			$this->db->where('FINAL_ORDER_DATE >=', $startdate);
		}
		if($enddate != 'x'){
			$this->db->where('FINAL_ORDER_DATE <=', $enddate);	
		}
		$this->db->where('a.USERNAME', $this->session->userdata('user__'));
		$this->db->order_by('a.REG_DATE');
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result();
	}

	function fetch_act(){
		$query = $this->db->query("SELECT DISTINCT ACT_NAME, REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` where USERNAME ='".$this->session->userdata('user__')."' group by REF_SNO");
		return $query->result();
	}

	function fetch_section(){
		$query = $this->db->query("SELECT DISTINCT SECTION, REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` where USERNAME ='".$this->session->userdata('user__')."' group by REF_SNO");
		return $query->result();
	}

	function fetch_village(){
		$this->db->distinct();
		$this->db->select('VILLAGE');
		$this->db->where('USERNAME', $this->session->userdata('user__'));
		$query = $this->db->get('a96_sdm_court');

		return $query->result();
	}

	function fetch_patwariarea(){
		$query = $this->db->query("SELECT DISTINCT PATWARI_AREA, REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` where USERNAME ='".$this->session->userdata('user__')."' group by REF_SNO");
		return $query->result();
	}

	function fetch_policearea(){
		/*SELECT POLICE_AREA from a97_sdm_court_detail 
			INNER JOIN
			(SELECT REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` group by REF_SNO) temp
			on a97_sdm_court_detail.REF_SNO = temp.REF_SNO AND a97_sdm_court_detail.SNO = temp.maxSNO*/
		$query = $this->db->query("SELECT DISTINCT POLICE_AREA, REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` where USERNAME ='".$this->session->userdata('user__')."' group by REF_SNO");
		
		return $query->result();
	}
	function searching(){
		$actname = $this->input->post('txtActName');
		$section = $this->input->post('txtSection');
		$village = $this->input->post('txtVillage');
		$patwariarea = $this->input->post('txtPatwariArea');
		$policearea = $this->input->post('txtPoliceArea');

		if($actname == 'x' AND $section == 'x' AND $village == 'x' AND $patwariarea == 'x' AND $policearea == 'x'){
			$this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, b.*');
			$this->db->from('a96_sdm_court a');
			$this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
			$this->db->where('a.SNO', 'xx');
			$this->db->where('a.USERNAME', $this->session->userdata('user__'));
			$this->db->order_by('a.REG_DATE');
			$this->db->order_by('a.SNO', 'asc');
			$query = $this->db->get();
		} else {

			$this->db->select('a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, a.FINAL_ORDER_DATE, b.*');
			$this->db->from('a96_sdm_court a');
			$this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
			if($actname != 'x'){
				$this->db->where('b.ACT_NAME', $actname);
			}
			if($section != 'x'){
				$this->db->where('b.SECTION',$section);
			}
			if($village != 'x'){
				$this->db->where('a.VILLAGE', $village);	
			}
			if($patwariarea != 'x'){
				$this->db->where('b.PATWARI_AREA', $patwariarea);
			}
			if($policearea != 'x'){
				$this->db->where('b.POLICE_AREA', $policearea);	
			}
			$this->db->order_by('a.REG_DATE');
			$this->db->order_by('a.SNO', 'asc');
			$this->db->where('a.USERNAME', $this->session->userdata('user__'));
			$query = $this->db->get();
		}
		return $query->result();
	}

	function fetch_court_dm(){
		$query = $this->db->query("SELECT DISTINCT COURT_NAME FROM `a96_sdm_court`");
		return $query->result();
	}

	function fetch_act_dm(){
		$query = $this->db->query("SELECT DISTINCT ACT_NAME, REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` group by REF_SNO");
		return $query->result();
	}

	function fetch_section_dm(){
		$query = $this->db->query("SELECT DISTINCT SECTION, REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` group by REF_SNO");
		return $query->result();
	}

	function fetch_village_dm(){
		$this->db->distinct();
		$this->db->select('VILLAGE');
		$query = $this->db->get('a96_sdm_court');

		return $query->result();
	}

	function fetch_patwariarea_dm(){
		$query = $this->db->query("SELECT DISTINCT PATWARI_AREA, REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` group by REF_SNO");
		return $query->result();
	}

	function fetch_policearea_dm(){
		/*SELECT POLICE_AREA from a97_sdm_court_detail 
			INNER JOIN
			(SELECT REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` group by REF_SNO) temp
			on a97_sdm_court_detail.REF_SNO = temp.REF_SNO AND a97_sdm_court_detail.SNO = temp.maxSNO*/
		$query = $this->db->query("SELECT DISTINCT POLICE_AREA, REF_SNO, MAX(SNO) AS maxSNO FROM `a97_sdm_court_detail` group by REF_SNO");
		
		return $query->result();
	}

	function dmsearching(){
		$court_ = $this->input->post('txtCourt');
		$actname = $this->input->post('txtActName');
		$section = $this->input->post('txtSection');
		$village = $this->input->post('txtVillage');
		$patwariarea = $this->input->post('txtPatwariArea');
		$policearea = $this->input->post('txtPoliceArea');
		if($court_ != 'x'){
			if($actname == 'x' AND $section == 'x' AND $village == 'x' AND $patwariarea == 'x' AND $policearea == 'x'){
				$this->db->select('a.COURT_NAME, a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, a.FINAL_ORDER_DATE, b.*');
				$this->db->from('a96_sdm_court a');
				$this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
				$this->db->where('a.COURT_NAME', $court_);
				$this->db->order_by('a.REG_DATE');
				$this->db->order_by('a.SNO', 'asc');
				$query = $this->db->get();
			} else {
				$this->db->select('a.COURT_NAME, a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, a.FINAL_ORDER_DATE, b.*');
				$this->db->from('a96_sdm_court a');
				$this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');

				$this->db->where('a.COURT_NAME', $court_);
				
				if($actname != 'x'){
					$this->db->where('b.ACT_NAME', $actname);
				}
				if($section != 'x'){
					$this->db->where('b.SECTION',$section);
				}
				if($village != 'x'){
					$this->db->where('a.VILLAGE', $village);	
				}
				if($patwariarea != 'x'){
					$this->db->where('b.PATWARI_AREA', $patwariarea);
				}
				if($policearea != 'x'){
					$this->db->where('b.POLICE_AREA', $policearea);	
				}
				$this->db->order_by('a.REG_DATE');
				$this->db->order_by('a.SNO', 'asc');
				$query = $this->db->get();
			}
		} else {
			$this->db->select('a.COURT_NAME, a.REG_DATE, a.YEAR_, a.MONTH, a.TYPE_, a.VILLAGE, a.DISMISS_IN_DEFAULT, b.*');
			$this->db->from('a96_sdm_court a');
			$this->db->join('a97_sdm_court_detail b', 'a.STATUS_ = b.SNO');
			$this->db->where('a.SNO', 'xx');
			$this->db->order_by('a.REG_DATE');
			$this->db->order_by('a.SNO', 'asc');
			$query = $this->db->get();
		}
		return $query->result();
	}

	function get_acts(){
		$query = $this->db->get('a95_act_master');
		return $query->result();
	}
	function get_court(){
		$query = $this->db->get('a95_court_master');
		return $query->result();
	}
	function get_section(){
		$query = $this->db->get('a95_section_master');
		return $query->result();
	}
	function get_tehsil(){
		$query = $this->db->get('a95_tehsil_master');
		return $query->result();
	}
}