<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportIssueModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_report';

    protected $primaryKey = 'issue_id';

    protected $fillable = [
        'latitude',
        'longitude',
        'reason',
        'status',
    ];
}
