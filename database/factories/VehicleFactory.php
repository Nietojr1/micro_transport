<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class VehicleFactory extends Factory
{

    public function definition(): array
    {
        $ownerIds = User::where('role_id', 1)->pluck('id')->toArray();
        $driverIds = User::where('role_id', 2)->pluck('id')->toArray();
        $brandIds = DB::table('card_brand')->pluck('id')->toArray();

        return [
            'owner_id'         => fake()->randomElement($ownerIds),
            'driver_id'        => fake()->randomElement($driverIds),
            'brand_id'         => fake()->randomElement($brandIds),
            'plate'            => fake()->regexify('[A-Z]{3}-[0-9]{3}'),
            'color'            => fake()->safeColorName(),
            'type'             => fake()->randomElement(['PARTICULAR','PUBLIC'])
        ];
    }
}
