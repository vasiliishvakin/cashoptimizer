<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

/**
 * App\Models\Currency
 *
 * @property string $id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Account[] $accounts
 * @property-read int|null $accounts_count
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency query()
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Currency extends Model
{
    private const SYMBOLS_API_URL = 'https://api.exchangerate.host/symbols';

    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public static function getSymbolsFromHttp(): array
    {
        $symbols = Http::get(self::SYMBOLS_API_URL)->throw()->json('symbols');
        if (empty($symbols)) {
            throw new \RuntimeException(sprintf('Error: get empty currencies list from %s', self::SYMBOLS_API_URL));
        }
        $brickMoneySymbols = include base_path('vendor') . '/brick/money/data/iso-currencies.php';
        $symbols = array_intersect_key($symbols, $brickMoneySymbols);
        ksort($symbols);
        return $symbols;
    }
}
