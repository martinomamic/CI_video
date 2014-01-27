<?php

class Video extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('video_model');
    }

    function index() {
        $videos = $this->video_model->get_all()->result();

        $this->table->set_empty("&nbsp");
        $this->table->set_heading('ID', 'Name', 'Link', ' ');

        foreach ($videos as $video) {
            $this->table->add_row($video->id, $video->name, $video->link,
                    anchor('video/edit_video/' . $video->id, 'edit') . ' ' .
                    anchor('video/delete/' . $video->id, 'delete', array('onclick' => "return confirm('Continue?')")));
        }
        $this->table->add_row(anchor('video/add_video', 'new video'));
        $data['table'] = $this->table->generate();
        $this->template->load('default','list', $data);
    }

    function add_video() {
        $data['title'] = 'Add video';
        $this->_set_fields();
        $this->_set_validation_rules();

        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $video = $this->_set_data();
            $id = $this->video_model->save($video);
            redirect('video/index', 'refresh');
        }
        $this->template->load('default','video/add_video', $data);
    }
    
    function edit_video($id) {
        $data['title'] = 'Edit video';
        $this->_set_validation_rules();

        $video = $this->video_model->get_video_by_id($id)->row();
        $this->form_data->id = $id;
        $this->form_data->name = $video->name;
        $this->form_data->link = $video->link;
        
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $id = $this->uri->segment('3');
            $video = $this->_set_data();
            $this->video_model->edit($id, $video);
            
            redirect('video/index', 'refresh');
        }

        $this->template->load('default','video/add_video', $data);
    }

    function delete($id) {
        $this->video_model->delete($id);
        redirect('video/index/', 'refresh');
    }

    function _set_fields() {
        $this->form_data->id = '';
        $this->form_data->name = '';
        $this->form_data->link = '';
    }

    function _set_validation_rules() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('link', 'Link', 'trim|required|min_length[15]|max_length[100]|xss_clean');
    }

    function _set_data() {
        $data['name'] = $this->input->post('name');
        $data['link'] = $this->input->post('link');
        
        return $data;
    }

}

?>
