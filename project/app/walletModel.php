<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class walletModel extends Model
{
protected $table = "wallet";
    protected $fillable = ['userId', 'amount'];
}
