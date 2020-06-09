<?php

namespace App\Pixel;

use App\App;

class Model
{
    const TABLE = 'pixels';

    /**
     * Metodas irasantis pixel'io duomenis i atitinkama table'a.
     * @param Pixel $pixel
     */
    public static function insert(Pixel $pixel): void
    {
        App::$db->insertRow(self::TABLE, $pixel->_getData());
    }

    /**
     * Metodas grazinantis pixel'iu objektu masyva, kurie atitinka nurodytus kriterijus.
     * @param array $conditions
     * @return array|null
     */
    public static function getWhere(array $conditions): ?array
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $pixels = [];

        foreach ($rows as $row) {
            $pixels[] = new Pixel($row);
        }

        return $pixels;
    }

    /**
     * Metodas atnaujinantis pixel'io duomenis.
     * @param Pixel $pixel
     */
    public static function update(Pixel $pixel): void
    {
        App::$db->updateRow(self::TABLE, $pixel->getId(), $pixel->_getData());
    }

    /**
     * Metodas istrinantis nurodyta pixel'i.
     * @param Pixel $pixel
     */
    public static function delete(Pixel $pixel): void
    {
        App::$db->deleteRow(self::TABLE, $pixel->getId());
    }
}