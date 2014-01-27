<?php 
if($this->session->userdata('role')!='admin')
    redirect('list');

if(isset($name) && isset($link)){
            echo validation_errors();
        } else {
            echo validation_errors();
            echo form_open();
            echo form_label('Name', 'name'). '<br>' 
                    . form_input('name', set_value('name', $this->form_data->name)). '<br>';
            echo form_label('Link', 'link') . '<br>'
                    . form_input('link', set_value('link', $this->form_data->link)). '<br>';
            echo form_submit('submit', 'Save');
        }?>
