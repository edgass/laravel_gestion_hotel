<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recruitement extends Model
{
    use HasFactory;
    protected $table='recruitements';
    protected $primaryKey='idrecruitement';
}
