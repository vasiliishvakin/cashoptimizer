<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Brick\Money\Context getAppMoneyContext()
 */
class MoneyContextServiceFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'money.context.service';
    }
}
