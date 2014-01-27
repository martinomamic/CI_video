
<div class="account-container register">
    <div class="content clearfix">
        <?php if(isset($username) && isset($email) && isset($password) ){
            echo validation_errors();
            echo 'User added';      
        } else {
            echo validation_errors();
            echo form_open();
            echo form_label('Username', 'username'). '<br>' 
                    . form_input('username', set_value('username', $this->form_data->username)). '<br>';
            echo form_label('Email', 'email') . '<br>'
                    . form_input('email', set_value('email', $this->form_data->email)). '<br>';
            echo form_label('Password', 'password') . '<br>'
                    . form_password('password', set_value('password', $this->form_data->password)). '<br>';
            echo form_label('Repeat password', 'passconf') 
                    . '<br>'. form_password('passconf', set_value('password',$this->form_data->password)). '<br>';
            echo form_submit('submit', 'Save');
        }?>
    </div> <!-- /content -->
</div> <!-- /account-container -->
<div class="login-extra">
    Already have an account? <a href="<?php echo site_url("login/login"); ?>">Login to your account</a>
</div>

