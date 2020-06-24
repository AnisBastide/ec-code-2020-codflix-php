<?php ob_start(); ?>

    <div class="mediaDetail">

        <div class="text">
        <div class="textLine"><?= $media['title']; ?></div>
        <div class="textLine"><?= $media['type']; ?></div>
        <div class="textLine"><?= $media['status']; ?></div>
        <div class="textLine"><?= $media['release_date']; ?></div>
        <div class="textLine"><?= $media['summary']; ?></div>
        <div class="textLine"><?= $media['trailer_url']; ?></div>
        <div class="textLine"><?= Media::getGenreByid($media['genre_id'])['name']; ?></div>
        </div>
        <div class="image">
        <img class="title" src="<?= $media['image']; ?>">
        </div>
    </div>


<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>