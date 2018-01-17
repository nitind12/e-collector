<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Yo extends CI_Controller {

    function __construct(){
        parent::__construct();
    }
    function yoyo(){
    	if($this->input->server('REQUEST_METHOD') === 'POST'){
            $data = $this->getnewtoken();
        }
        echo json_encode($data);
    }
    function getnewtoken()
    {
		$data['token'] = $this->security->get_csrf_token_name();
		$data['hash'] = $this->security->get_csrf_hash(); 
		return $data;
	}
}