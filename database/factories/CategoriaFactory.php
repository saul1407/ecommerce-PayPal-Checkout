<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Categoria::class;

    public function definition()
    {
        $name = $this->faker->unique()->word(20);
        return [
            //
            'name' => $name,
            'user_id' => User::all()->random()->id,
            'slug' => Str::slug($name)
        ];
    }
}
