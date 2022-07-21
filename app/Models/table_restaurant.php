<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_restaurant extends Model
{
    use HasFactory;
    protected $table='table_restaurants';
    protected $primaryKey='idtable_restaurant';
}
