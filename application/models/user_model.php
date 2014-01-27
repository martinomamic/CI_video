<?php

class User_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function get_all_users(){
        $this->db->order_by('id', 'asc');
        return $this->db->get('users');
    }
    
    function get_user_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get('users');
    }
    
    function get_user_by_role($role){
        $this->db->where('role', $role);
        return $this->db->get('users');
    }
    
    function save($user){
        $this->db->insert('users', $user);
        return $this->db->insert_id();
    }
    
    function edit($id, $user){
        $this->db->where('id', $id)->update('users', $user);
    }
    
    function delete($id){
        $this->db->where('id',$id)->delete('users');
    }
    
    function validation($username, $password){
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $validated = $this->db->get()->result();
        if(count($validated)==1){
            $this->userdata =$validated[0];
            $this->save_session();
            return true;
        } else {
            return false;
        }
    }
    
    function save_session(){
        $this->session->set_userdata(array(
            'id'=>$this->userdata->id,
            'username'=>$this->userdata->username,
            'role'=>$this->userdata->role,
            'logged_in'=>true      
        ));
    }
    
    
}
?>
