<?php ob_start(); ?>
<?php
session_start();
ini_set('display_errors', 1);

require ('../model/history.php');

if(isset($_GET['id'])){
    deleteFromHistory($_GET['id'],$_SESSION['user_id']);
}
elseif(isset($_GET['deleteAll'])){
    deleteAllHistory($_SESSION['user_id']);
}
header('location:../index.php?action=history');


?>

<?php $content = ob_get_clean(); ?>
<?php require('base.php'); ?>