<?php ob_start();?>
<?php require ('model/history.php');
addHistory(intval($_GET['media_id']),intval($_SESSION['user_id']));?>
<iframe class="embed_video" allowfullscreen="" src=<?=$_GET['video']?> > </iframe>




<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>
