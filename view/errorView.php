<?php $title = "ERR PAGE" ?>
<?php ob_start();?>
<div id="error">
    <h1>ERROR</h1>
</div>
<?php $content = ob_get_clean();?>
<?php require('template.php');?>