<?php

function current_user()
{
    if (isset($_SESSION['user_email'])) {

        if ($users = App\App::$db->getRowsWhere('users', ['email' => $_SESSION['user_email'], 'password' => $_SESSION['user_password']])) {
            return reset($users);
        }
    }
    return false;
}
