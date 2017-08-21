<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * Author: Le Cong Thang
 */
class Wallet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id', 'email', 'balance', 'created_at', 'updated_at'
    ];
}
