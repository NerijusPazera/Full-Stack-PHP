<?php

namespace App\Cart\Orders;

use App\App;

class Model
{
    const TABLE = 'orders';

    /**
     * Metodas grazinantis order objekta, pagal paduota id.
     * @param int $id
     * @return Order|null
     */
    public static function get(int $id): ?Order
    {
        if($row = App::$db->getRowById(self::TABLE, $id)) {
            return new Order($row);
        } else {
            return null;
        }
    }

    /**
     * Metodas irasantis order duomenis i atitinkama table'a.
     * @param Order $order
     * @return int|bool
     */
    public static function insert(Order $order)
    {
       return App::$db->insertRow(self::TABLE, $order->_getData());
    }

    /**
     * Metodas grazinantis order'iu objektu masyva, kurie atitinka nurodytus kriterijus.
     * @param array $conditions
     * @return array|null
     */
    public static function getWhere(array $conditions = []): ?array
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $orders = [];

        foreach ($rows as $row) {
            $orders[] = new Order($row);
        }

        return $orders;
    }

    /**
     * Metodas atnaujinantis order'io duomenis.
     * @param Order $order
     */
    public static function update(Order $order): void
    {
        App::$db->updateRow(self::TABLE, $order->getId(), $order->_getData());
    }

    /**
     * Metodas istrinantis nurodyta order'i.
     * @param Order $order
     */
    public static function delete(Order $order): void
    {
        App::$db->deleteRow(self::TABLE, $order->getId());
    }
}