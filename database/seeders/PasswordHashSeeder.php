<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\UserInformationModel;

class PasswordHashSeeder extends Seeder
{
    public function run()
    {
        $users = UserInformationModel::all();

        foreach ($users as $user) {
            $user->password = Hash::make($user->password);
            $user->save();
        }
    }
}
