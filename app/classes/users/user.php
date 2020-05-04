<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{

    /**
     * Metodas nustatantis username reiksme, duomenu masyve.
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * Metodas grazinantis username reiksme is duomenu masyvo.
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username ?? null;
    }

    /**
     * Metodas nustatantis email reiksme, duomenu masyve.
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * Metodas grazinantis email reiksme is duomenu masyvo.
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email ?? null;
    }

    /**
     * Metodas nustatantis password reiksme, duomenu masyve.
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * Metodas grazinantis password reiksme is duomenu masyvo.
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password ?? null;
    }
}

