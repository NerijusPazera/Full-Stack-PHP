<?php

namespace App\Cart\Items;

use App\Cart\Orders\Order;
use App\Drinks\Drink;
use App\Users\User;
use Core\DataHolder;

class Item extends DataHolder
{
    const STATUS_IN_CART = 100;
    const STATUS_ORDERED = 101;

    /**
     * Metodas nustatantis id reiksme duomenu masyve.
     * @param $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * Metodas grazinantis id reiksme is duomenu masyvo.
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id ?? null;
    }

    /**
     * Metodas nustatantis gerimo id reiksme duomenu masyve.
     * @param int $drink_id
     */
    public function setDrinkId(int $drink_id): void
    {
        $this->drink_id = $drink_id;
    }

    /**
     * Metodas grazinantis gerimo id reiksme is duomenu masyvo.
     * @return int|null
     */
    public function getDrinkId() : ?int
    {
        return $this->drink_id ?? null;
    }

    /**
     * Metodas nustatantis userio id reiksme duomenu masyve.
     * @param $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * Metodas grazinantis userio id reiksme is duomenu masyvo.
     * @return mixed|null
     */
    public function getUserId()
    {
        return $this->user_id ?? null;
    }

    /**
     * Metodas nustatantis uzsakymo Id reiksme duomenu masyve.
     * @param $order_id
     */
    public function setOrderId($order_id): void
    {
        $this->order_id = $order_id;
    }

    /**
     * Metodas grazinantis uzsakymo Id reiksme is duomenu masyvo.
     * @return mixed|null
     */
    public function getOrderId()
    {
        return $this->order_id ?? null;
    }

    /**
     * Metodas nujstatantis prekes status reiksme duomenu masyve.
     * @param $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * Metodas grazinantis prekes status reiksme is duomenu masyvo.
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status ?? null;
    }

    public function user(): User
    {
        return \App\Users\Model::get($this->getUserId());
    }

    public function drink(): Drink
    {
        return \App\Drinks\Model::get($this->getDrinkId());
    }

    public function order(): Order
    {
        return \App\Cart\Orders\Model::get($this->getOrderId());
    }
}