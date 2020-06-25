<?php

require_once('controller/homeController.php');
require_once('controller/loginController.php');
require_once('controller/signupController.php');
require_once('controller/mediaController.php');
require_once('controller/mediaDetailControler.php');
require_once('controller/episodeController.php');
/**************************
 * ----- HANDLE ACTION -----
 ***************************/

if (isset($_GET['action'])):

    switch ($_GET['action']):

        case 'login':

            if (!empty($_POST)) login($_POST);
            else loginPage();

            break;

        case 'signup':
            if (!empty($_POST)) signup($_POST);
            else signupPage();

            break;

        case 'logout':

            logout();

            break;
        case 'verify':
            verifyUserByEmail($_GET['user']);
            break;

    endswitch;

else:

    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
    $media_id=isset($_GET['media']) ? $_GET['media'] : null;

    if(isset($_GET['video'])):
        episode();
    elseif ($media_id):
        if(Media::getTypeById($media_id)['type']==="film"):
            filmDetails($media_id);
        elseif(Media::getTypeById($media_id)['type']==="serie"):
            seriesDetail($media_id);
        endif;
    elseif ($user_id):
        mediaPage();
    else:
        homePage();
    endif;

endif;
