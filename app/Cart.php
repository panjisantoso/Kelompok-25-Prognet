<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='carts';
    protected $primaryKey='id';
    protected $fillable=['user_id','products_id','qty','status'];
}
