<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HydrantInfoModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_hydrantInfo';

    protected $primaryKey = 'hydrant_id';
    
    protected $fillable = [
        'latitude',
        'longitude',
        'location',
        'pipe_type',
        'color',
        'status',
    ];
}
