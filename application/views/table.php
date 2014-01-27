<style>
    table{
        border-collapse: collapse;
        margin-bottom:50px;
    }
    input{
        margin:2px;
    }
    table, td{
        border:1px solid black;
    }
    td{
        width:50px;
    }
    tr{
        height:50px;
    }
</style>

<div>
    <div id="input">
        <?php if(isset($red) && isset($stupac)){
            
        } else {
            echo validation_errors();
            echo form_open();
            echo form_label('Broj redova', 'red').form_input('red').'<br>';
            echo form_label('Broj stupaca', 'stupac').form_input('stupac'). '<br>';
            echo form_submit('submit', 'OK');
        }?>

    </div> <!-- /content -->
    <div id="output">
        
    </div>
</div> <!-- /account-container -->