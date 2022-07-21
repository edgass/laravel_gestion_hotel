<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class piscine extends Model
{
    use HasFactory;
    protected $table='piscines';
    protected $primaryKey='idpiscine';
}
