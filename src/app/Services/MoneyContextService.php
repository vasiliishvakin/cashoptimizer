<?php

namespace App\Services;

use Brick\Money\Context;
use Brick\Money\Context\CustomContext;

class MoneyContextService
{
    public function getAppMoneyContext(): Context
    {
        return new CustomContext(config('money.decimal.places'));
    }
}
