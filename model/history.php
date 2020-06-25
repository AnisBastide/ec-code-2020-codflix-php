<?php
require_once('database.php');



function addHistory($media_id,$user_id){
    $db = init_db();
    $req = $db->prepare("INSERT INTO history (user_id, media_id, start_date)VALUES (:user_id,:media_id,:start_date)");
    $req->execute(array(':user_id'=>$user_id,
        ':media_id'=>$media_id,
        ':start_date'=>date('Ymd'))
    );
}
function deleteFromHistory($id,$user_id){
    $db = init_db();
    $req = $db->prepare("DELETE FROM `history` WHERE id=:id AND user_id=:id_user");
    $req->execute(array(':id'=>$id,':id_user'=>$user_id));
}
function deleteAllHistory($user_id){
    $db = init_db();
    $req = $db->prepare("DELETE FROM `history` WHERE user_id=:id_user");
    $req->execute(array(':id_user'=>$user_id));
}
function selectAllHistory($user_id){
    $db = init_db();
    $req = $db->prepare("SELECT * FROM `history` WHERE user_id= ?");
    $req->execute(array($user_id));
    return $req->fetchAll();
}
