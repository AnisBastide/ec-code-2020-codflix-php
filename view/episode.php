<?php ob_start();?>

<iframe class="embed_video" allowfullscreen="" src=<?=$_GET['video']?> > </iframe>



<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>
