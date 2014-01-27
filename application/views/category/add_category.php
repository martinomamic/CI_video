<?php 
if($this->session->userdata('role')!='admin')
    redirect('list');

if(isset($cname)){
            echo validation_errors();   
        } else {
            echo validation_errors();
            echo form_open();
            echo form_label('Category name', 'cname') . '<br>'
                    . form_input('cname', set_value('cname', $this->form_data->cname)). '<br>';
            echo form_submit('submit', 'Save');
        }?>
