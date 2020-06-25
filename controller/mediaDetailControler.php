<?php
function filmDetails($id){
    $media = Media::getMediaById($id);
    require('view/mediaDetailFilm.php');
}
function seriesDetail($id){
    $media=Media::getMediaById($id);
    require('view/mediaDetailSeries.php');
}

?>