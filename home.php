<?php

class Home extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('video_model');
    }

    public function index() {

        $this->player();
    }

    public function player() {
        $data['videos'] = $this->video_model->get_all_videos()->result();
        $this->template->load('default', 'player', $data);
    }

    public function dbz() {
        $data['videos'] = $this->video_model->get_videos_by_category('dbz')->result();
        $this->template->load('default', 'player', $data);
    }

    public function yugioh() {
        $data['videos'] = $this->video_model->get_videos_by_category('yugioh')->result();
        $this->template->load('default', 'player', $data);
    }

    public function naruto() {
        $data['videos'] = $this->video_model->get_videos_by_category('naruto')->result();
        $this->template->load('default', 'player', $data);
    }
    
    public function martial(){
        $data['videos'] = $this->video_model->get_videos_by_category('martial_arts')->result();
        $this->template->load('default', 'player', $data);
    }
    
    public function scifi(){
        $data['videos'] = $this->video_model->get_videos_by_category('sci-fi')->result();
        $this->template->load('default', 'player', $data);
    }
}
?>
