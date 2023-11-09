<?php

namespace Database\Seeders;

use App\Models\CardBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{

    public function run(): void
    {
        CardBrand::factory(10)->create([]);
    }
}
