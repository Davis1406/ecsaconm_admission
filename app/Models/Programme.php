<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    // Define the table associated with this model
    protected $table = 'Programmes';

        public static function getProgrammes($orderBy = 'id', $direction = 'asc')
        {
            return self::orderBy($orderBy, $direction)->get();
        }
}
