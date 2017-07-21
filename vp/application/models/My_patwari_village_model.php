<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_patwari_village_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function getPatwaris($user=''){
		if($user != ''){
			$this->db->where('USERNAME_', $user);
		}
		$query = $this->db->get('a0_patwari');

		return $query->result();
	}
}
