<?php

namespace App\Models;

use App\Facades\MoneyContextServiceFacade;
use Brick\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

/**
 * App\Models\Account
 *
 * @property int $id
 * @property string $title
 * @property int $user_id
 * @property int $account_type_id
 * @property Money $balance
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\AccountType $accountType
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\AccountFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account newQuery()
 * @method static \Illuminate\Database\Query\Builder|Account onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereAccountTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Account withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Account withoutTrashed()
 * @mixin \Eloquent
 * @property string $currency_id
 * @property-read \App\Models\Currency $currency
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereCurrencyId($value)
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account byUser(\App\Models\User $user)
 */
class Account extends Model
{
    public const NUMBER_FORMATTER_INTL = 1;
    public const NUMBER_FORMATTER_INTL_DECIMAL = 2;
    public const NUMBER_FORMATTER_DECIMAL = 3;


    use HasFactory;
    use SoftDeletes;

    protected $with = ['accountType', 'currency', 'user'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function getBalanceAttribute($value): Money
    {
        return Money::of($value, $this->currency_id, MoneyContextServiceFacade::getAppMoneyContext());
    }

    public function setBalanceAttribute($value)
    {
        $this->attributes['balance'] = $value instanceof Money ? (string)$value->getAmount() : (string)$value;
    }

    /**
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param ?User $user
     * @return void
     */
    public function scopeByUser(Builder $query, User $user = null)
    {
        $query->where('user_id', $user?->id);
    }
}
