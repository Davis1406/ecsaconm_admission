<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    // Define the table associated with this model
    protected $table = 'countries';

    public static function getCountries($orderBy = 'country_name', $direction = 'asc')
    {
        return self::orderBy($orderBy, $direction)->get();
    }
}
