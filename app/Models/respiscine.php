<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class respiscine extends Model
{
    use HasFactory;

    protected $table='respiscines';
    protected $primaryKey='idrespiscine';
}
