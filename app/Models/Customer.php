<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
protected $fillable = ['name', 'table_number', 'number_customers'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
