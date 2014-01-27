<?php

class Category extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('category_model');
    }

    function index() {
        $categories = $this->category_model->get_all_categories()->result();

        $this->table->set_empty("&nbsp");
        $this->table->set_heading('ID', 'Name', ' ');

        foreach ($categories as $category) {
            $this->table->add_row($category->id, $category->cname,
                    anchor('category/edit_category/' . $category->id, 'edit') . ' ' .
                    anchor('category/delete/' . $category->id, 'delete', array(
                        'onclick' => "return confirm('Continue?')")));
        }
        $this->table->add_row(anchor('category/add_category', 'new category'));
        $data['table'] = $this->table->generate();
        
        $this->template->load('default','list', $data);
    }

    function add_category() {
        $data['title'] = 'Add category';
        $this->form_data->id = '';
        $this->form_data->cname = '';
        $this->form_validation->set_rules('cname', 'Name', 'trim|required|min_length[2]|max_length[30]|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $category->cname = $this->input->post('cname');
            $id = $this->category_model->save($category);
            redirect('category/index', 'refresh');
        }
        $this->template->load('default','category/add_category', $data);
    }
    
    function edit_category($id) {
        $data['title'] = 'Edit category';
        $this->form_validation->set_rules('cname', 'Name', 'trim|required|min_length[2]|max_length[30]|xss_clean');

        $category = $this->category_model->get_cat_by_id($id)->row();
        $this->form_data->id = $id;
        $this->form_data->cname = $category->cname;
        
        if ($this->form_validation->run() == FALSE) {
            
        } else {
            $id = $this->uri->segment('3');
            $category->cname = $this->input->post('cname');
            $this->category_model->edit($id, $category);
            
            redirect('category/index', 'refresh');
        }

        $this->template->load('default','category/add_category', $data);
    }

    function delete($id) {
        $this->category_model->delete($id);
        redirect('category/index/', 'refresh');
    }

}

?>
