<p><?php echo $error?></p>
<div class="account-container">
    <div class="content clearfix">
        <?php if(isset($username) && isset($password)){
            echo validation_errors();
        } else {
            
            echo validation_errors();
            echo form_open();
            echo form_label('Username', 'username').form_input('username', set_value('username'));
            echo form_label('Password', 'password').form_password('password', set_value('password')). '<br>';
            echo form_submit('submit', 'Login');
        }?>

    </div> <!-- /content -->

</div> <!-- /account-container -->