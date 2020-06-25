<?php ob_start(); ?>
<?php ini_set('display_errors', 1); ?>

<?php require ('model/history.php');
addHistory(intval($media['id']),intval($_SESSION['user_id']));?>

<div class="mediaDetail">
    <div class="mediaDetail">
    <div class="text">
        <div class="textLine"><?= $media['title']; ?> </div>
        <div class="textLine"><?= $media['type']; ?></div>
        <div class="textLine"><?= $media['status']; ?></div>
        <div class="textLine"><?= $media['release_date']; ?></div>
        <div class="textLine"><?= $media['summary']; ?></div>
        <div class="textLine"><a href="<?= $media['trailer_url']; ?>">trailer</a></div>
        <div class="textLine" ><?= Media::getGenreByid($media['genre_id'])['name']; ?></div>
    </div>
    <div class="image">
        <img style="width:500px; height=900px; " src="<?= $media['image']; ?>">
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>