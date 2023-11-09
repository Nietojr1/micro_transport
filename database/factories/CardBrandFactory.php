<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardBrand>
 */
class CardBrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $carBrands = [
            'Toyota',
            'Ford',
            'Honda',
            'Hyundai',
            'Chevrolet',
            'Nissan',
            'Volkswagen',
            'BMW',
            'Mercedes-Benz',
            'Audi',
        ];

        $origins = [
            'Estados Unidos',
            'Japón',
            'Alemania',
            'Corea del Sur',
            'Italia',
            'Francia',
            'China',
            'Reino Unido',
            'Brasil',
        ];

        return [
            'name'              => fake()->randomElement($carBrands),
            'origin'            => fake()->randomElement($origins),
        ];
    }
}
