<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
    }
    
    public function index(){
        $this->login();
    }
    
    public function login(){
        
        $data['title']='Login';
	$data['error']='';
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->template->load('default','login/login', $data);
        }  else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if(!$this->user_model->validation($username, $password)){
                $data['error']='Invalid credentials';
                $this->template->load('default','login/login', $data);
            } elseif(isset($username) && isset($password)){
                redirect('home');
            } else {
                $this->template->load('default','login/login');
            } 
            
        }
        
    }
    
    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        redirect('home');
    }

    public function register() {
        $data['title']='Register';
        $this->_set_fields();
        $this->_set_registration_rules();
        if($this->form_validation->run() == FALSE)
        {
            $this->load->template('default','login/register', $data);
        }  else {
            $data=$this->_set_data();
            $this->user_model->save($data);
            if($this->user_model->validation($data['username'], $data['password'])){
                $this->template->load('default','user/user_list');
            } else { 
                $this->template->load('default','login/register');
            }
        }
    }
    
    function _set_registration_rules() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
    }
    
    

}
