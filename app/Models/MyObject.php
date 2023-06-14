<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyObject extends Model
{
    protected $table='objects';
    protected static function newFactory()
    {
        return \Database\Factories\MyObjectFactory::new();
    }
    use HasFactory;
}
