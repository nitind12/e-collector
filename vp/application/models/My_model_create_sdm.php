<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_create_sdm extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function changepwd(){
        if($this->session->userdata('pwd_count') <= 3){
            $old_pwd = $this->input->post('old_pwd');
            $new_pwd = $this->input->post('new_pwd');

            $this->db->where('USERNAME', $this->session->userdata('user__'));
            $this->db->where('PASSWORD', $old_pwd);
            $query = $this->db->get('login');

            if($query->num_rows() != 0){
                $data = array(
                    'PASSWORD' => $new_pwd
                );
                $this->db->where('USERNAME', $this->session->userdata('user__'));
                $this->db->where('PASSWORD', $old_pwd);
                $query = $this->db->update('login', $data);

                $bool_ = array('res_'=>TRUE, 'msg_' => 'good');
                $this->session->unset_userdata('pwd_count');
            } else {
                $bool_ = array('res_'=>FALSE, 'msg_' => 'Your old credentials are not matching. Please try again!!!');
            }
        } else {
            $bool_ = array('res_'=>FALSE, 'msg_' => 'All three chances over.');
        }

        return $bool_;
    }
    
    function check_sdm($USERSTATUS){

        $this->db->where('USERNAME',$USERSTATUS);
        $query = $this->db->get('login');

        if($query->num_rows() != 0){
            $bool_ = array('res_'=>FALSE, 'msg_' => 'Not available.');
        } else {
            $bool_ = array('res_'=>TRUE, 'msg_' => 'User available.');
        }
        return $bool_;
    }
    function create_sdm(){
        $USERSTATUS = $this->input->post('txtUsername');
        $pwd_ = $this->input->post('txtpwd');
        $STATUSed = $this->input->post('txtStatus');
        $name_ = $this->input->post('txtName');
	
        $data = array(
            'USERNAME' => $USERSTATUS,
            'PASSWORD' => $pwd_,
            'USERSTATUS'   => 3,
            'STATUS' => $STATUSed,
            'NAME_' => $name_,
            'UP_LINE' => $this->session->userdata('user__')
        );

        $bool_ = $this->check_sdm($USERSTATUS);

        if($bool_['res_'] == TRUE){
            $query = $this->db->insert('login', $data);
            if($query == TRUE){
                $bool_ = array('res_'=>TRUE, 'msg_'=>'New SDM login Created');
            } else {
                $bool_ = array('res_'=>FALSE, 'msg_'=>'Something goes wrong...!! Please try again.');
            }
        } else {
            $bool_ = array('res_'=>FALSE, 'msg_'=>'Username already exists. Please try again.');
        }
        return $bool_;
    }
    function get_all_sdms($status = 'x'){
    	$this->db->where('USERSTATUS', 3);
        $this->db->where('UP_LINE', $this->session->userdata('user__'));
    	if($status != 'x') $this->db->where('STATUS', $status);
    	$query = $this->db->get('login');
    	return $query->result();
    }
    function active_inactive($USERSTATUS, $STATUS){
        $data = array(
            'STATUS'=>$STATUS,
        );
        $this->db->where('USERNAME', $USERSTATUS);
        $query = $this->db->update('login', $data);
    }

    function delete_sdm($USERSTATUS){
        $this->db->where('USERNAME', $USERSTATUS);
        $query = $this->db->delete('login');

        if($query == TRUE){
            $bool_ = array('res_'=>TRUE, 'msg_'=>'SDM login successfully deleted !!');
        } else {
            $bool_ = array('res_'=>FALSE, 'msg_'=>'Something goes wrong...!! Please try again.');
        }

        return $bool_;
    }
}