<?php

namespace App\Drinks;

use App\App;

class Model
{
    const TABLE = 'drinks';

    /**
     * Metodas grazinantis gerimo objekta, pagal paduota id.
     * @param int $id
     * @return Drink|null
     */
    public static function get(int $id): ?Drink
    {
        if($row = App::$db->getRowById(self::TABLE, $id)) {
            return new Drink($row);
        } else {
            return null;
        }
    }

    /**
     * Metodas irasantis gerimo duomenis i atitinkama table'a.
     * @param Drink $drink
     * @return bool|int
     */
    public static function insert(Drink $drink)
    {
        return App::$db->insertRow(self::TABLE, $drink->_getData());
    }

    /**
     * Metodas grazinantis gerimu objektu masyva, kurie atitinka nurodytus kriterijus.
     * @param array $conditions
     * @return array|null
     */
    public static function getWhere(array $conditions = []): ?array
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $drinks = [];

        foreach ($rows as $row) {
            $drinks[] = new Drink($row);
        }

        return $drinks;
    }

    /**
     * Metodas atnaujinantis gerimo duomenis.
     * @param Drink $drink
     */
    public static function update(Drink $drink): void
    {
        App::$db->updateRow(self::TABLE, $drink->getId(), $drink->_getData());
    }

    /**
     * Metodas istrinantis nurodyta gerima.
     * @param Drink $drink
     */
    public static function delete(Drink $drink): void
    {
        App::$db->deleteRow(self::TABLE, $drink->getId());
    }
}