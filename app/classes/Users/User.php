<?php

namespace App\Users;

use Core\DataHolder;

class User extends DataHolder
{
    const ROLE_ADMIN = 0;
    const ROLE_USER = 1;

    /**
     * Metodas nustatantis user'io id reiksme, duomenu masyve.
     * @param $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * Metodas grazinantis user'io id reiksme, is duomenu masyvo.
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id ?? null;
    }

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
     * Metodas nustatantis vartotojo name reiksme, duomenu masyve.
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Metodas grazinantis vartotojo name reiksme is duomenu masyvo.
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name ?? null;
    }

    /**
     * Metodas nustatantis vartotojo surname reiksme, duomenu masyve.
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    /**
     * Metodas grazinantis vartotojo surname reiksme is duomenu masyvo.
     * @return string|null
     */
    public function getSurname(): ?string
    {
        return $this->surname ?? null;
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

    /**
     * Metodas nustatantis userio roles reiksme, duomenu masyve.
     * @param int $role
     */
    public function setRole(int $role): void
    {
        $this->role = $role;
    }

    /**
     * Metodas grazinantis userio roles reiksme is duomenu masyvo.
     * @return int|null
     */
    public function getRole(): ?int
    {
        return $this->role ?? null;
    }
}

