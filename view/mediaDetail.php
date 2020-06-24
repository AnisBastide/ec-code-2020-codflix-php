<?php ob_start();?>

<div>
        <a class="item" href="index.php?media=<?= $media['id']; ?>">
            <div class="video">
                <div>

                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>
            <div class="title"><?= $media['release_date']; ?></div>
        </a>
</div>




<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>