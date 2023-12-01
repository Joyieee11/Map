<?php

// Login.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginUserModel extends Model
{
    protected $table = 'tbl_login';

    protected $primary_key = 'login_id';

    protected $fillable = [
        'account_number', 'position', 'password', 
    ];

    // Define the relationship with UserInformation model
    public function userInformation()
    {
        return $this->belongsTo(UserInformationModel::class, 'account_number', 'account_number');
    }
}
