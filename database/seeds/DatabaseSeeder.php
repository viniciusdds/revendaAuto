<?php

use App\Papel;
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
         $this->call(PapelSeeder::class);
         $this->call(PermissaoSeeder::class);
    }
}
