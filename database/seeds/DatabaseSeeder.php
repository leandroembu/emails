<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo "Criando 85 livros...\n";
        factory(App\Livro::class, 85)->create();
    }
}
