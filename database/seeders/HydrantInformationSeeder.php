<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HydrantInfoModel;

class HydrantInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HydrantInfoModel::create([
            'hydrant_id' => 1,
            'latitude' => 14.243217,
            'longitude' => 121.11925,
            'location' => 'Adelina(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 2,
            'latitude' => 14.24465,
            'longitude' => 121.116767,
            'location' => 'Adelina(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Blue andd black',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 3,
            'latitude' => 14.24545,
            'longitude' => 121.129333,
            'location' => 'Realica(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 4,
            'latitude' => 14.2531,
            'longitude' => 121.1287,
            'location' => 'Banay-Banay',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 5,
            'latitude' => 14.24175,
            'longitude' => 121.17085,
            'location' => 'Mamatid',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 6,
            'latitude' => 14.233433,
            'longitude' => 121.165883,
            'location' => 'Mamatid(Cassandra)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 7,
            'latitude' => 14.232967,
            'longitude' => 121.164983,
            'location' => 'Mamatid(Cassandra)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
           

        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 8,
            'latitude' => 14.232217,
            'longitude' => 121.164983,
            'location' => 'Mamatid(Cassandra)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 9,
            'latitude' => 14.233467,
            'longitude' => 121.1666,
            'location' => 'Mamatid(Cassandra)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 10,
            'latitude' => 14.235283,
            'longitude' => 121.158117,
            'location' => 'Mamatid(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 11,
            'latitude' => 14.2352,
            'longitude' => 121.157683,
            'location' => 'Mamatid(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 12,
            'latitude' => 14.231967,
            'longitude' => 121.145683,
            'location' => 'Mamatid(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 13,
            'latitude' => 14.228483,
            'longitude' => 121.13885,
            'location' => 'Banlic(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 14,
            'latitude' => 14.228633,
            'longitude' => 121.135817,
            'location' => 'Banlic(Camella Homes)',
            'pipe_type' => 'Blow Off',
            'color'=> 'Blue',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 15,
            'latitude' => 14.229967,
            'longitude' => 121.1378,
            'location' => 'Banlic(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 16,
            'latitude' => 14.2325,
            'longitude' => 121.136383,
            'location' => 'Banlic(Felicias)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 17,
            'latitude' => 14.23395,
            'longitude' => 121.13485,
            'location' => 'Banlic(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 18,
            'latitude' => 14.23805,
            'longitude' => 121.133317,
            'location' => 'San-isidro(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Light Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 19,
            'latitude' => 14.243917,
            'longitude' => 121.130833,
            'location' => 'Pulo(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 20,
            'latitude' => 14.24655,
            'longitude' => 121.129817,
            'location' => 'Pulo(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow Black',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 21,
            'latitude' => 14.247333,
            'longitude' => 121.135483,
            'location' => 'Millwood(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 22,
            'latitude' => 14.2462,
            'longitude' => 121.1337,
            'location' => 'Millwood(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 23,
            'latitude' => 14.247833,
            'longitude' => 121.138333,
            'location' => 'Millwood(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 24,
            'latitude' => 14.256283,
            'longitude' => 121.131533,
            'location' => 'Don-Onofre(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 25,
            'latitude' => 14.254783,
            'longitude' => 121.132367,
            'location' => 'Don-Onofre(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 26,
            'latitude' => 14.251667,
            'longitude' => 121.13225,
            'location' => 'Don-Onofre(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 27,
            'latitude' => 14.249983,
            'longitude' => 121.140817,
            'location' => 'Don-Vicente-Villas(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 28,
            'latitude' => 14.250267,
            'longitude' => 121.142,
            'location' => 'Don-Vicente-Villas(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 29,
            'latitude' => 14.24465,
            'longitude' => 121.140917,
            'location' => 'NIA-Road(San-Isidro)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 30,
            'latitude' => 14.241817,
            'longitude' => 121.142417,
            'location' => 'NIA-Road(San-Isidro)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 31,
            'latitude' => 14.23555,
            'longitude' => 121.144667,
            'location' => 'NIA-Road(Mamatid)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Blue and Pink',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 32,
            'latitude' => 14.24285,
            'longitude' => 121.14025,
            'location' => 'Tierra-Allegra(San-Isidro)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 33,
            'latitude' => 14.228583,
            'longitude' => 121.142533,
            'location' => 'Psalm Ville(Mamatid)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 34,
            'latitude' => 14.229367,
            'longitude' => 121.144567,
            'location' => 'Psalm Ville(Mamatid)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 35,
            'latitude' => 14.22945,
            'longitude' => 121.143317,
            'location' => 'Psalm Ville(Mamatid)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 36,
            'latitude' => 14.2386,
            'longitude' => 121.157667,
            'location' => 'Phase 2(Mabuhay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 37,
            'latitude' => 14.23955,
            'longitude' => 121.160317,
            'location' => 'Phase 2(Mabuhay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 38,
            'latitude' => 14.242417,
            'longitude' => 121.165333,
            'location' => 'Phase 1(Mabuhay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 39,
            'latitude' => 14.240817,
            'longitude' => 121.165783,
            'location' => 'Phase 2(Mabuhay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 40,
            'latitude' => 14.239417,
            'longitude' => 121.1685,
            'location' => 'Phase 1(Mabuhay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 41,
            'latitude' => 14.277317,
            'longitude' => 121.14078,
            'location' => 'Lyn Ville(Marinig)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 42,
            'latitude' => 14.275567,
            'longitude' => 121.140317,
            'location' => 'Lyn Ville(Marinig)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 43,
            'latitude' => 14.275867,
            'longitude' => 121.141683,
            'location' => 'Lyn Ville(Marinig)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 44,
            'latitude' => 14.277567,
            'longitude' => 121.142,
            'location' => 'Lyn Ville(Marinig)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 45,
            'latitude' => 14.250167,
            'longitude' => 121.1352,
            'location' => 'Evergreen(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 46,
            'latitude' => 14.2511,
            'longitude' => 121.135717,
            'location' => 'Evergreen(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 47,
            'latitude' => 14.253067,
            'longitude' => 121.1359,
            'location' => 'Evergreen(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 48,
            'latitude' => 14.2522,
            'longitude' => 121.1465,
            'location' => 'Evergreen(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 49,
            'latitude' => 14.23609,
            'longitude' => 121.139383,
            'location' => 'Evergreen(Pulo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 50,
            'latitude' => 14.256133,
            'longitude' => 121.129067,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 51,
            'latitude' => 14.25625,
            'longitude' => 121.1298,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 52,
            'latitude' => 14.256183,
            'longitude' => 121.1297,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 53,
            'latitude' => 14.2565,
            'longitude' => 121.130683,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 54,
            'latitude' => 14.256667,
            'longitude' => 121.12975,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 55,
            'latitude' => 14.25705,
            'longitude' => 121.128867,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 56,
            'latitude' => 14.257317,
            'longitude' => 121.12965,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 57,
            'latitude' => 14.257517,
            'longitude' => 121.130417,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 58,
            'latitude' => 14.256733,
            'longitude' => 121.1319,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 59,
            'latitude' => 14.257267,
            'longitude' => 121.134067,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 60,
            'latitude' => 14.258617,
            'longitude' => 121.134633,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 61,
            'latitude' => 14.261067,
            'longitude' => 121.133767,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 62,
            'latitude' => 14.260333,
            'longitude' => 121.132167,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 63,
            'latitude' => 14.258967,
            'longitude' => 121.132633,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 64,
            'latitude' => 14.257667,
            'longitude' => 121.132983,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 65,
            'latitude' => 14.25845,
            'longitude' => 121.133533,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Barrel Type',
            'color'=> 'Yellow',
            'status' => 'Not Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 66,
            'latitude' => 14.258483,
            'longitude' => 121.13425,
            'location' => 'Katapatan(Banay-Banay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 67,
            'latitude' => 14.170381,
            'longitude' => 121.019423,
            'location' => 'Casile',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Fade Yellow / Black Stripe',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 68,
            'latitude' => 14.183167,
            'longitude' => 121.02855,
            'location' => 'Casile',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Fade Yellow / Black Stripe',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 69,
            'latitude' => 14.191033,
            'longitude' => 121.033983,
            'location' => 'Casile',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Fade Yellow / Black White',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 70,
            'latitude' => 14.19895,
            'longitude' => 121.036117,
            'location' => 'Casile',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow Green Black',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 71,
            'latitude' => 14.23165,
            'longitude' => 121.091867,
            'location' => 'Pitland(Diezmo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 72,
            'latitude' => 14.233183,
            'longitude' => 121.09126,
            'location' => 'Pitland(Diezmo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 73,
            'latitude' => 14.233667,
            'longitude' => 121.091533,
            'location' => 'Pitland(Diezmo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 74,
            'latitude' => 14.23365,
            'longitude' => 121.0912,
            'location' => 'Pitland(Diezmo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 75,
            'latitude' => 14.232883,
            'longitude' => 121.090933,
            'location' => 'Pitland(Diezmo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 76,
            'latitude' => 14.232583,
            'longitude' => 121.091183,
            'location' => 'Pitland(Diezmo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 77,
            'latitude' => 14.230717,
            'longitude' => 121.091283,
            'location' => 'Pitland(Diezmo)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'None',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 78,
            'latitude' => 14.231717,
            'longitude' => 121.092867,
            'location' => 'Diezmo',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 79,
            'latitude' => 14.233633,
            'longitude' => 121.092267,
            'location' => 'Diezmo',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 80,
            'latitude' => 14.23435,
            'longitude' => 121.09205,
            'location' => 'Diezmo',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 81,
            'latitude' => 14.232183,
            'longitude' => 121.09225,
            'location' => 'Diezmo',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 82,
            'latitude' => 14.231017,
            'longitude' => 121.09255,
            'location' => 'Diezmo',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 83,
            'latitude' => 14.227067,
            'longitude' => 121.093733,
            'location' => 'Diezmo',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 84,
            'latitude' => 14.22865,
            'longitude' => 121.09645,
            'location' => 'Diezmo',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 85,
            'latitude' => 14.23075,
            'longitude' => 121.105067,
            'location' => 'Diezmo',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 86,
            'latitude' => 14.257767,
            'longitude' => 121.128083,
            'location' => 'Niugan(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 87,
            'latitude' => 14.266583,
            'longitude' => 121.127,
            'location' => 'Sala(Highway)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 88,
            'latitude' => 14.274117,
            'longitude' => 121.1248,
            'location' => 'Poblacion 3(Cabuyao)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 89,
            'latitude' => 14.275633,
            'longitude' => 121.12655,
            'location' => 'Poblacion 3(Cabuyao)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow Black',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 90,
            'latitude' => 14.275683,
            'longitude' => 121.1242,
            'location' => 'Poblacion 3(Cabuyao)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 91,
            'latitude' => 14.277617,
            'longitude' => 121.126017,
            'location' => 'Poblacion 2(Cabuyao)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 92,
            'latitude' => 14.279117,
            'longitude' => 121.126017,
            'location' => 'Poblacion 1(Cabuyao)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 93,
            'latitude' => 14.277883,
            'longitude' => 121.12315,
            'location' => 'Poblacion 2(Cabuyao)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 94,
            'latitude' => 14.280033,
            'longitude' => 121.123233,
            'location' => 'Poblacion 1(Cabuyao)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 95,
            'latitude' => 14.281917,
            'longitude' => 121.126217,
            'location' => 'Bigaa',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 96,
            'latitude' => 14.283083,
            'longitude' => 121.1263,
            'location' => 'StoneRidge (Bigaa)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 97,
            'latitude' => 14.282683,
            'longitude' => 121.12545,
            'location' => 'StoneRidge (Bigaa)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Light Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 98,
            'latitude' => 14.2842,
            'longitude' => 121.12515,
            'location' => 'StoneRidge (Bigaa)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Black',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 99,
            'latitude' => 14.28475,
            'longitude' => 121.12615,
            'location' => 'Bigaa',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Light Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 100,
            'latitude' => 14.2839,
            'longitude' => 121.126567,
            'location' => 'Bigaa',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Light Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 101,
            'latitude' => 14.291267,
            'longitude' => 121.12885,
            'location' => 'Bigaa',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 102,
            'latitude' => 14.292967,
            'longitude' => 121.130367,
            'location' => 'Bigaa',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 103,
            'latitude' => 14.2901,
            'longitude' => 121.137183,
            'location' => 'Butong',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 104,
            'latitude' => 14.2793,
            'longitude' => 121.146417,
            'location' => 'Marinig',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 105,
            'latitude' => 14.27,
            'longitude' => 121.157367,
            'location' => 'Marinig',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 106,
            'latitude' => 14.25685,
            'longitude' => 121.15665,
            'location' => 'Gulod',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 107,
            'latitude' => 14.250967,
            'longitude' => 121.15665,
            'location' => 'Centera Village (Gulod)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 108,
            'latitude' => 14.251867,
            'longitude' => 121.158383,
            'location' => 'Centera Village (Gulod)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Light Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 109,
            'latitude' => 14.251133,
            'longitude' => 121.158883,
            'location' => 'Centera Village (Gulod)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Light Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 110,
            'latitude' => 14.249567,
            'longitude' => 121.159383,
            'location' => 'Centera Village (Gulod)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 111,
            'latitude' => 14.25005,
            'longitude' => 121.158583,
            'location' => 'Centera Village (Gulod)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 112,
            'latitude' => 14.25115,
            'longitude' => 121.1577,
            'location' => 'Centera Village (Gulod)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Light Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 113,
            'latitude' => 14.245133,
            'longitude' => 121.155167,
            'location' => 'Phase 7 (Mabuhay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Light Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 114,
            'latitude' => 14.24565,
            'longitude' => 121.154417,
            'location' => 'Phase 7 (Mabuhay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Fade Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 115,
            'latitude' => 14.24575,
            'longitude' => 121.155633,
            'location' => 'Phase 7 (Mabuhay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 116,
            'latitude' => 14.244133,
            'longitude' => 121.156667,
            'location' => 'Phase 7 (Mabuhay)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 117,
            'latitude' => 14.24745,
            'longitude' => 121.164867,
            'location' => 'Villas Estella (Baclaran)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Light Yellow',
            'status' => 'Serviceable'
        ]);
        HydrantInfoModel::create([
            'hydrant_id' => 118,
            'latitude' => 14.2469,
            'longitude' => 121.165833,
            'location' => 'Villas Estella (Baclaran)',
            'pipe_type' => 'Stand Pipe',
            'color'=> 'Yellow',
            'status' => 'Serviceable'
        ]);
    }
}
