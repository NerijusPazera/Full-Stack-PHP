<?php

namespace Core;

use App\Users\User;

class Session
{
    /**
     * @var User'io duomenu masyvas.
     */
    private $user;

    /**
     * Konstruktorius kvieciantis loginFromCookie metoda.
     * Session constructor.
     */
    public function __construct()
    {
        $this->loginFromCookie();
    }

    /**
     * Metodas loggin'antis user'i su cookie'yje esanciais user'io duomenimis.
     */
    public function loginFromCookie(): void
    {
        if (isset($_SESSION['user_email'])) {
            $this->login($_SESSION['user_email'], $_SESSION['user_password']);
        }
    }

    /**
     * Metodas loggin'antis user'i su ivestais duomenimis.
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password): bool
    {
        if ($user = \App\App::$db->getRowWhere('users', ['email' => $email, 'password' => $password])) {

            $_SESSION['user_email'] = $email;
            $_SESSION['user_password'] = $password;

            $this->user = new User($user);

            return true;
        }

        return false;
    }

    /**
     * Metodas grazinantis user'io duomenu masyva.
     * @return array|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * Metodas is'loggin'antis user'i ir istrinantis cookie'yje esancius duomenis.
     * @param null $redirect
     */
    public function logout($redirect = null): void
    {
        session_destroy();
        $_SESSION = [];

        if ($redirect) {
            header("Location: $redirect");
        }
    }

    public function userIs(int $role): bool
    {
        $user = \App\App::$session->getUser();

        if ($user && $user->getRole() == $role) {
            return true;
        }
        return false;
    }
}
