<?php
function filmDetails($id){
    $media = Media::getMediaById($id);
    require('view/mediaDetail.php');
}

?>