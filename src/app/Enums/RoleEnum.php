<?php

namespace App\Enums;

use Generator;

enum RoleEnum: int
{
    case SuperAdministrator = 1;

    case Administrator = 2;

    case User = 4;

    public static function getIterator(): Generator
    {
        foreach (self::cases() as $item) {
            yield $item->name => $item->value;
        }
    }

    public static function toArray(): array
    {
        return iterator_to_array(self::getIterator());
    }

    public static function adminItems()
    {
        return [
            self::SuperAdministrator,
            self::Administrator,
        ];
    }

}
