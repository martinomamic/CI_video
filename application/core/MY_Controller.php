<?php

class MY_Controller extends CI_Controller{
     
    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        
        
    }
    
    function _set_data() {
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        $data['role']=  $this->input->post('role');
        return $data;
    }
    
    function _set_fields() {
        $this->form_data->id = '';
        $this->form_data->username = '';
        $this->form_data->email = '';
        $this->form_data->password = '';
        $this->form_data->passconf = '';
    }
    
    public function logged_in(){
        if($this->session->userdata('logged_in')){
            return true;
         } else {
        return false;
         }
    }
    
    public function role(){
        if($this->session->userdata('role')==='admin'){
            return 'admin';
        } elseif($this->session->userdata('role')==='editor') {
            return 'editor';
        } else {
            return 'guest';
        }
    }
    
    
    
    
  
}
?>
