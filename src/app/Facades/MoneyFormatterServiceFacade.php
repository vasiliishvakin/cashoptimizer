<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string format(\Brick\Money\Money $value)
 * @method static string decimal(\Brick\Money\Money $value)
 */
class MoneyFormatterServiceFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'money.formatter.service';
    }
}
