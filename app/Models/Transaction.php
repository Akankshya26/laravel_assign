<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_id',
        'type',
        //'account_name',
        'amount',
        'date',
        'catagory',
    ];
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
