<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserInformationModel;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserInformationModel::create([
            'account_number' => '2000407',
            'full_name' => 'Joy Balsomo',
            'position' => 1,
            'gender' => 'Female',
            'address' => 'Southville 1',
            'birthday' => '2002-02-11',
            'password' => bcrypt('2002-02-11'),
        ]);

        UserInformationModel::create([
            'account_number' => '2000430',
            'full_name' => 'Ayahel Omictin',
            'position' => 3,
            'gender' => 'Female',
            'address' => 'Saint Joseph 6',
            'birthday' => '2001-11-13',
            'password' => bcrypt('2001-11-13'),
        ]);
        
    }
}
