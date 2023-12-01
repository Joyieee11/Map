<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenerateReportModel extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_generate_report';

    protected $primaryKey = 'report_id';
    
    protected $fillable = [
        'reporter_name',
        'hydrant_id',
        'before',
        'during',
        'after',
        'status'
    ];
}
