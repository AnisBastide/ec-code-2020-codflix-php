<?php ob_start(); ?>

<?php $season_number = Media::getNumberOfSeason($media['id']); ?>
<div class="mediaDetailPage">
    <div class="mediaDetail">
        <div class="text">
            <div class="textLine"><?= $media['title']; ?> </div>
            <div class="textLine"><?= $media['type']; ?></div>
            <div class="textLine"><?= $media['status']; ?></div>
            <div class="textLine"><?= $media['release_date']; ?></div>
            <div class="textLine"><?= $media['summary']; ?></div>
            <div class="textLine"><a href="<?= $media['trailer_url']; ?>">trailer</a></div>
            <div class="textLine"><?= Media::getGenreByid($media['genre_id'])['name']; ?></div>
        </div>
                <div class="image">
                    <img style="width:500px; height=900px; " src="<?= $media['image']; ?>">
                </div>
    </div>
    <div class="episode">
        <?php
        $limit = intval($season_number);
        for ($i = 1; $i <= $limit; $i++):?>
        <div class ="btn btn-primary">
            <a class="saison_number">saison <?= $i ?>‎</a>
        <?php
        $numberOfEpisode=Media::getNumberOfEpisode($i); ?>
        <?php for($j = 1;$j<=$numberOfEpisode;$j++):?>
               <?php $episode = Media::getEpisodesInformation($media['id'], $i,$j);?>
            <div>

                <div class="numberAndTitle" >
                    <a  href="index.php?video=<?= $episode[0]['episode_link']; ?>&media_id= <?= $media['id']?>" class="episode_number episode_title"> <?=$episode[0]['episode_number'] ?>- <?= $episode[0]['episode_title'] ?>
                        </a>
                </div>

            </div>
            <?php endfor; ?>
        </div>
        <?php endfor; ?>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('dashboard.php'); ?>