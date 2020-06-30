<?php

namespace App\Users;

use App\App;

class Model
{
    const TABLE = 'users';

    /**
     * Metodas grazinantis userio objekta, pagal paduota id.
     * @param int $id
     * @return User|null
     */
    public static function get(int $id): ?User
    {
        if($row = App::$db->getRowById(self::TABLE, $id)) {
            return new User($row);
        } else {
            return null;
        }
    }

    /**
     * Metodas irasantis userio duomenis i atitinkama table'a.
     * @param User $user
     * @return bool|int
     */
    public static function insert(User $user)
    {
        return App::$db->insertRow(self::TABLE, $user->_getData());
    }

    /**
     * Metodas grazinantis useriu objektu masyva, kurie atitinka nurodytus kriterijus.
     * @param array $conditions
     * @return array|null
     */
    public static function getWhere(array $conditions = []): ?array
    {
        $rows = App::$db->getRowsWhere(self::TABLE, $conditions);
        $users = [];

        foreach ($rows as $row) {
            $users[] = new User($row);
        }

        return $users;
    }

    /**
     * Metodas atnaujinantis userio duomenis.
     * @param User $user
     */
    public static function update(User $user): void
    {
        App::$db->updateRow(self::TABLE, $user->getId(), $user->_getData());
    }

    /**
     * Metodas istrinantis nurodyta useri.
     * @param User $user
     */
    public static function delete(User $user): void
    {
        App::$db->deleteRow(self::TABLE, $user->getId());
    }
}