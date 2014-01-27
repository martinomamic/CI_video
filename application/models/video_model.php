<?php

class Video_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_all() {
        $this->db->order_by('id', 'asc');
        return $this->db->get('videos');
    }

    function get_all_videos() {
        $this->db->select('v.id,name,link,cname');
        $this->db->from('videos v');
        $this->db->join('video_category vc', 'v.id=vc.video_id');
        $this->db->join('categories c', 'c.id=vc.category_id');
        $this->db->order_by('v.id', 'asc');
        return $this->db->get();
    }

    function get_video_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('videos');
    }

    function get_videos_by_category($cname) {
        $this->db->select('name,link,cname');
        $this->db->from('videos v');
        $this->db->join('video_category vc', 'v.id=vc.video_id');
        $this->db->join('categories c', 'c.id=vc.category_id');
        $this->db->where('cname', $cname);
        return $this->db->get();
    }

    function save($video) {
        $this->db->insert('videos', $video);
        return $this->db->insert_id();
    }

    function edit($id, $video) {
        $this->db->where('id', $id)->update('videos', $video);
    }

    function delete($id) {
        $this->db->where('id', $id)->delete('videos');
    }

    function get_search($match){
        $this->db->like('name',$match);
        $query = $this->db->get('videos');
        return $query->result();
    }


}

?>
