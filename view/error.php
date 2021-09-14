<?php $title="Error Page";?>
<?php ob_start();?>
    <div id='error'>
        <h1>ERROR: UNABLE TO LOAD CONTENT</h1>
    </div>
<?php $content= ob_get_clean();?>
<?php require('template.php');