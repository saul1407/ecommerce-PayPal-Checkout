<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\SubCategoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubCategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = SubCategoria::class;

    public function definition()
    {
        $name = $this->faker->unique()->word(20);

        return [
            //
            'name' => $name,
            'slug' => Str::slug($name),
            'user_id' => User::all()->random()->id,
            'categoria_id' => Categoria::all()->random()->id
        ];
    }
}
