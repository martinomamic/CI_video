<?php

class User extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    function index() {
        $users = $this->user_model->get_all_users()->result();

        $this->table->set_empty("&nbsp");
        $this->table->set_heading('ID', 'Username', 'Email', ' ');

        foreach ($users as $user) {
            $this->table->add_row($user->id, $user->username, $user->email, 
                    anchor('user/user_details/' . $user->id, 'details') . ' ' .
                    anchor('user/edit_user/' . $user->id, 'edit') . ' ' .
                    anchor('user/delete/' . $user->id, 'delete', array('onclick' => "return confirm('Continue?')")));
        }
        $this->table->add_row(anchor('user/add_user', 'new user'));
        $data['table'] = $this->table->generate();
       
        $this->template->load('default','list', $data);
        
    }

    function add_user() {
        $data['title'] = 'Add user';
        $this->_set_fields();
        $this->_set_validation_rules();

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $user = $this->_set_data();
            $id = $this->user_model->save($user);
            redirect('user/index', 'refresh');
        }
        $this->template->load('default','user/add_user', $data);
    }

    function user_details($id) {

        $data['title'] = 'User Details';
        $user = $this->user_model->get_user_by_id($id)->row();
        $this->table->set_empty("&nbsp");
        $this->table->add_row('ID', $user->id);
        $this->table->add_row('Username', $user->username);
        $this->table->add_row('Email', $user->email);
        $data['table'] = $this->table->generate();

       $this->template->load('default','list', $data);
    }

    function edit_user($id) {
        $data['title'] = 'Edit user';
        $this->_set_validation_rules();

        $user = $this->user_model->get_user_by_id($id)->row();
        $this->form_data->id = $id;
        $this->form_data->username = $user->username;
        $this->form_data->email = $user->email;
        $this->form_data->role = $user->role;

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $id = $this->uri->segment('3');
            $user = $this->_set_data();
            $this->user_model->edit($id, $user);
            
            redirect('user/index', 'refresh');
        }

        $this->template->load('default','user/edit_user', $data);
    }

    function delete($id) {
        $this->user_model->delete($id);
        redirect('user/index/', 'refresh');
    }

    function _set_fields() {
        $this->form_data->id = '';
        $this->form_data->username = '';
        $this->form_data->email = '';
        $this->form_data->password = '';
        $this->form_data->passconf = '';
    }

    function _set_validation_rules() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
    }

    function _set_data() {
        $data['username'] = $this->input->post('username');
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        return $data;
    }

}

?>
