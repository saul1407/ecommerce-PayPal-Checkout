<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserSeeder::class);
        Categoria::factory(8)->create();
        SubCategoria::factory(40)->create();

    }
}
