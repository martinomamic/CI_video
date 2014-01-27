<?php

class Category_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function get_all_categories(){
        $this->db->order_by('id', 'asc');
        return $this->db->get('categories');
    }
    
    function get_cat_by_id($id){
        $this->db->where('id', $id);
        return $this->db->get('categories');
    }

    function save($cat){
        $this->db->insert('categories', $cat);
        return $this->db->insert_id();
    }
    
    function edit($id, $cat){
        $this->db->where('id', $id)->update('categories', $cat);
    }
    
    function delete($id){
        $this->db->where('id',$id)->delete('categories');
    }   
}

?>
