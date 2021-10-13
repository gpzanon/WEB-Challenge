<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(['name' => 'Abarth']);
        Brand::create(['name' => 'Alfa Romeo']);
        Brand::create(['name' => 'Alpine']);
        Brand::create(['name' => 'Aston Martin']);
        Brand::create(['name' => 'Audi']);
        Brand::create(['name' => 'Bentley']);
        Brand::create(['name' => 'BMW']);
        Brand::create(['name' => 'Citroen']);
        Brand::create(['name' => 'Cupra']);
        Brand::create(['name' => 'Dacia']);
        Brand::create(['name' => 'Ds']);
        Brand::create(['name' => 'Ferrari']);
        Brand::create(['name' => 'Fiat']);
        Brand::create(['name' => 'Ford']);
        Brand::create(['name' => 'Honda']);
        Brand::create(['name' => 'Hyundai']);
        Brand::create(['name' => 'Jaguar']);
        Brand::create(['name' => 'Jeep']);
        Brand::create(['name' => 'Kia']);
        Brand::create(['name' => 'Lamborghini']);
        Brand::create(['name' => 'Land Rover']);
        Brand::create(['name' => 'Lexus']);
        Brand::create(['name' => 'Maserati']);
        Brand::create(['name' => 'Mazda']);
        Brand::create(['name' => 'Mercedes-Benz']);
        Brand::create(['name' => 'Mg']);
        Brand::create(['name' => 'Mini']);
        Brand::create(['name' => 'Mitsubishi']);
        Brand::create(['name' => 'Nissan']);
        Brand::create(['name' => 'Opel']);
        Brand::create(['name' => 'Peugeot']);
        Brand::create(['name' => 'Porsche']);
        Brand::create(['name' => 'Renault']);
        Brand::create(['name' => 'Seat']);
        Brand::create(['name' => 'Skoda']);
        Brand::create(['name' => 'Smart']);
        Brand::create(['name' => 'Suzuki']);
        Brand::create(['name' => 'Tesla']);
        Brand::create(['name' => 'Toyota']);
        Brand::create(['name' => 'Volkswagen']);
        Brand::create(['name' => 'Volvo']);
    }
}