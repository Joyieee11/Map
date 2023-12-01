<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class UserInformationModel extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'tbl_users_information';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'account_number', 
        'full_name', 
        'position',  
        'gender', 
        'address', 
        'birthday', 
        'password'    ];

    public function login()
    {
        return $this->hasOne(LoginUserModel::class, 'account_number', 'account_number');
    }
}
