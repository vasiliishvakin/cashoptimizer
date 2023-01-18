<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $with = ['account_type', 'user'];

    public function user(){
        $this->belongsTo(User::class);
    }

    public function accountType()
    {
        $this->belongsTo(AccountType::class);
    }
}
