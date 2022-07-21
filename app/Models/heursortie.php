<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class heursortie extends Model
{
    use HasFactory;

    protected $table='heursorties';
    protected $primaryKey='idheursortie';
}
