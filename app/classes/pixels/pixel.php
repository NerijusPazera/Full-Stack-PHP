<?php

namespace App\Pixels;

use Core\DataHolder;

class Pixel extends DataHolder
{

    /**
     * Metodas nustatantis x reiksme, duomenu masyve.
     * @param int $x
     */
    public function setX(int $x): void
    {
        $this->x = $x;
    }

    /**
     * Metodas grazinantis x reiksme is duomenu masyvo.
     * @return int|null
     */
    public function getX(): ?int
    {
        return $this->x ?? null;
    }

    /**
     * Metodas nustatantis y reiksme, duomenu masyve.
     * @param int $y
     */
    public function setY(int $y): void
    {
        $this->y = $y;
    }

    /**
     * Metodas grazinantis y reiksme is duomenu masyvo.
     * @return int|null
     */
    public function getY(): ?int
    {
        return $this->y ?? null;
    }

    /**
     * Metodas nustatantis color reiksme, duomenu masyve.
     * @param string $color
     */
    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    /**
     * Metodas grazinantis color reiksme is duomenu masyvo.
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color ?? null;
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
}