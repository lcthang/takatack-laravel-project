<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
 * Author: Le Cong Thang
 */

class Transaction extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'id', 'amount', 'wallet_id', 'created_at', 'updated_at'
    ];
}
