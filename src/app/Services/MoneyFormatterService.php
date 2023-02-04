<?php

namespace App\Services;

use Brick\Money\Money;
use NumberFormatter;

class MoneyFormatterService
{
    protected const FORMATTER_SHOW = 'currency';
    protected const FORMATTER_EDIT = 'decimal';

    public function getFormatter(string $type): NumberFormatter
    {
        $formatter = new NumberFormatter(config('money.formatters.' . (string)$type . '.locale'), config('money.formatters.' . (string)$type . '.formatter'));
        foreach (config('money.formatters.' . (string)$type . '.symbols', []) as $symbol => $symbolValue) {
            $formatter->setSymbol($symbol, $symbolValue);
        }
        foreach (config('money.formatters.' . (string)$type . '.attributes', []) as $attribute => $attributeValue) {
            $formatter->setAttribute($attribute, $attributeValue);
        }
        return $formatter;
    }

    public function format(?Money $value = null): ?string
    {
        return $value?->formatWith($this->getFormatter(self::FORMATTER_SHOW));
    }

    public function decimal(?Money $value = null): ?string
    {
        return $value?->formatWith($this->getFormatter(self::FORMATTER_EDIT));
    }
}
