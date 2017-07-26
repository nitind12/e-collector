<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_pdf_uploads_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getPdfName($condition = 'x'){
		if($condition != 'x'){
			$this->db->where('NAME_', $condition);
		} else {
			$this->db->where('NAME_<>',"Circle Rates");
			$this->db->where('NAME_<>',"Adhaar Centres");
		}
		$query = $this->db->get('b2_pdf');
		return $query->result();
	}
	function uploadpdf($categ){
		echo $name_ = $this->input->post('pdfName');

		if($categ == '3'){
			$cmb = $this->input->post('cmbpdfName');
			if($cmb == 'New'){
				$this->db->where('NAME_', $name_);
				$query = $this->db->get('b2_pdf');
				if($query->num_rows()!=0){
					$msg = "Name already exists. Please try again!!";
				} else {
					$data = array(
						'NAME_' => $name_,
						'USERNAME_' => $this->session->userdata('user__'),
						'STATUS_' => 1,
						'DATE_' => date('Y-m-d H:i:s')
						);
					$query = $this->db->insert('b2_pdf', $data);
					$id_ = $this->db->insert_id();
					if($query == true){
						// Upload PDF
						$path_ = $this->upload_pdf_file($id_);
						if($path_ != 'x'){
							$data = array(
								'PATH_' => $path_
								);
							$this->db->where('PDFID', $id_);
							$query = $this->db->update('b2_pdf', $data);
							// ----------
							if($query == true){
								$msg = "Sussfully submitted.";
							} else {
								$msg = "Data submitted successfully without pdf file.";
							}
						} else {
							$msg = "Data submitted successfully without pdf file.";
						}
						$msg = "Sussfully submitted";
					} else {
						$msg = "Something goes wrong. Please try again!!";
					}
				}
			} else {
				$this->db->where('NAME_', $name_);
				$query = $this->db->get('b2_pdf');
				if($query->num_rows()==1){
					$r = $query->row();
					$id_ = $r->PDFID;
					$path_ = $this->upload_pdf_file($id_);
					if($path_ != 'x'){
						$data = array(
							'NAME_' => $name_,
							'PATH_' => $path_,
							'USERNAME_' => $this->session->userdata('user__'),
							'DATE_' => date('Y-m-d H:i:s')
							);
						$this->db->where('PDFID', $id_);
						$query = $this->db->update('b2_pdf', $data);
						if($query == true){
							$msg = "Sussfully updated";
						} else {
							$msg = "Something goes wrong. Please try again!!";
						}
					} else {
						$msg = "Something goes wrong with file uploading. Please try again!!";
					}
				} else {
					$msg = "Something goes wrong. Contact to Administrator!!";
				}
			}
		} else {
			$id_ = $this->input->post('txtID');
			$path_ = $this->upload_pdf_file($id_);
			if($path_ != 'x'){
				$data = array(
					'NAME_' => $name_,
					'PATH_' => $path_,
					'USERNAME_' => $this->session->userdata('user__'),
					'DATE_' => date('Y-m-d H:i:s')
					);
				$this->db->where('PDFID', $id_);
				$query = $this->db->update('b2_pdf', $data);
				if($query == true){
					$msg = "Sussfully updated";
				} else {
					$msg = "Something goes wrong. Please try again!!";
				}
			} else {
				$msg = "Something goes wrong with file uploading. Please try again!!";
			}
		}

		return $msg;
	}

	function upload_pdf_file($id){
		clearstatcache();
		$config = array(
            'upload_path' => './assets_/pdf_others',
            'allowed_types' => 'pdf',
            'overwrite' => TRUE,
            'max_size' => 5200,
            'file_name' => $id,
            'overwrite' => true
        );
        $file_element_name = 'txtpdffile';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_element_name)) {
            $path_ji = $this->upload->data();
            $path_ = $path_ji['file_name'];
        } else {
            $path_ = 'x';
        }
        return $path_;
	}
}