<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinatesLocationModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_coordinates_locations';
    
    protected $primaryKey = 'coordinates_id';

    protected $fillable = [
        'latitude',
        'longitude',
        'address'
    ];
}
