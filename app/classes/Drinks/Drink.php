<?php

namespace App\Drinks;

use Core\DataHolder;

class Drink extends DataHolder
{
    /**
     * Metodas nustatantis id reiksme, duomenu masyve.
     * @param $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * Metodas grazinantis id reiksme, is duomenu masyvo.
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    /**
     * Metodas nustatantis gerimo pavadinimo reiksme, duomenu masyve.
     * @param string $drink_name
     */
    public function setDrinkName(string $drink_name): void
    {
        $this->drink_name = $drink_name;
    }

    /**
     * Metodas grazinantis gerimo pavadinimo reiksme is duomenu masyvo.
     * @return string|null
     */
    public function getDrinkName(): ?string
    {
        return $this->drink_name ?? null;
    }

    /**
     * Metodas nustatantis gerimo laipsniu reiksme, duomenu masyve.
     * @param float $alk_vol
     */
    public function setAlkVol(float $alk_vol): void
    {
        $this->alk_vol = $alk_vol;
    }

    /**
     * Metodas grazinantis gerimo laipsniu reiksme is duomenu masyvo.
     * @return float|null
     */
    public function getAlkVol(): ?float
    {
        return $this->alk_vol ?? null;
    }

    /**
     * Metodas nustatantis gerimo turio reiksme, duomenu masyve.
     * @param int $capacity
     */
    public function setCapacity(int $capacity): void
    {
        $this->capacity = $capacity;
    }

    /**
     * Metodas grazinantis gerimo turio reiksme is duomenu masyvo.
     * @return int|null
     */
    public function getCapacity(): ?int
    {
        return $this->capacity ?? null;
    }

    /**
     * Metodas nustatantis gerimo kiekio sandelyje reiksme, duomenu masyve.
     * @param int $in_stock
     */
    public function setInStock(int $in_stock): void
    {
        $this->in_stock = $in_stock;
    }

    /**
     * Metodas grazinantis gerimo kiekio sandelyje reiksme is duomenu masyvo.
     * @return int|null
     */
    public function getInStock(): ?int
    {
        return $this->in_stock ?? null;
    }

    /**
     * Metodas nustatantis gerimo kainos reiksme, duomenu masyve.
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * Metodas grazinantis gerimo kainos reiksme is duomenu masyvo.
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price ?? null;
    }

    /**
     * Metodas nustatantis gerimo nuotraukos URL, duomenu masyve.
     * @param string $photo
     */
    public function setPhoto(string $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * Metodas grazinantis gerimo nuotraukos URL is duomenu masyvo.
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo ?? null;
    }
}