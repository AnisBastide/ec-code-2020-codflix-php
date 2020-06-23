<?php

require_once('model/user.php');

/****************************
 * ----- LOAD SIGNUP PAGE -----
 ****************************/

function signupPage()
{

    $user = new stdClass();
    $user->id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;

    if (!$user->id):
        require('view/auth/signupView.php');
    else:
        require('view/homeView.php');
    endif;


}

/***************************
 * ----- SIGNUP FUNCTION -----
 ***************************/
function signup($post)
{
    $email = $post['email'];
    $password = $post['password'];
    $password_confirm = $post['password_confirm'];
    $data           = new stdClass();
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($password === $password_confirm && $password != "") {
            $data->email=$email;
            $data->password=hash('sha256',$password);
            $user=new user($data);
            $user->createUser();
            $to=$user->getEmail();
            $subject="verify your email";
            $message="click the link to verify your email http://localhost/EcCode/index.php?action=verify&user=".$email."";
            mail($to,$subject,$message);
            echo '<script type="text/javascript">window.alert("You are sucessfully registered, please log in");</script>';
            loginPage();
        } else {
            echo '<script type="text/javascript">window.alert("the password are not the same or are empty");</script>';
            signupPage();
        }
    } else {
        echo '<script type="text/javascript">window.alert("email is not in a valid format");</script>';
        signupPage();
    }
    function verifyUserByEmail($email){
        $db   = init_db();

        $req  = $db->prepare( "UPDATE user SET status = 'verified' WHERE email='".$email."'" );
        $req->execute();

        // Close database connection
        $db   = null;
    }
}