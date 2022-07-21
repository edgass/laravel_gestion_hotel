<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reschambre extends Model
{
    use HasFactory;

    protected $table='reschambres';
    protected $primaryKey='idreschambre';
}
