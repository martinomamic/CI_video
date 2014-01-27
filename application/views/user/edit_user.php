<?php
if($this->session->userdata('role')!='admin')
    redirect('list');

if(isset($username) && isset($email) && isset($password) ){
            echo validation_errors();
            echo 'Done';      
        } else {
            echo validation_errors();
            echo form_open();
            echo form_label('Username', 'username'). '<br>' 
                    . form_input('username', set_value('username', $this->form_data->username)). '<br>';
            echo form_label('Email', 'email') . '<br>'
                    . form_input('email', set_value('email', $this->form_data->email)). '<br>';
            echo form_label('Role', 'role') 
                    . '<br>'. form_input('role', set_value('role',$this->form_data->role)). '<br>';
            echo form_submit('submit', 'Save');
        }?>
