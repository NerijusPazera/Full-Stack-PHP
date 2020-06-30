<?php

namespace App\Cart\Items;

use App\App;

class Model
{
    const TABLE = 'items';

    /**
     * Metodas grazinantis item objekta, pagal paduota id.
     * @param int $id
     * @return Item|null
     */
    public static function get(int $id): ?Item
    {
        if($row = App::$db->getRowById(self::TABLE, $id)) {
            return new Item($row);
        } else {
            return null;
        }
    }

    /**
     * Metodas irasantis item duomenis i atitinkama table'a.
     * @param Item $item
     * @return bool|int
     */
    public static function insert(Item $item)
    {
        return App::$db->insertRow(self::TABLE, $item->_getData());
    }

    /**
     * Metodas grazinantis item'u objektu masyva, kurie atitinka nurodytus kriterijus.
     * @param array $conditions
     * @return array|null
     */
    public static function getWhere(array $conditions = []): ?array
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $items = [];

        foreach ($rows as $row) {
            $items[] = new Item($row);
        }

        return $items;
    }

    /**
     * Metodas atnaujinantis item'o duomenis.
     * @param Item $item
     */
    public static function update(Item $item): void
    {
        App::$db->updateRow(self::TABLE, $item->getId(), $item->_getData());
    }

    /**
     * Metodas istrinantis nurodyta item'a.
     * @param Item $item
     */
    public static function delete(Item $item): void
    {
        App::$db->deleteRow(self::TABLE, $item->getId());
    }
}