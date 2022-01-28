<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //eliminamos en el caso de que existiera la carpeta posts
        Storage::deleteDirectory('posts');

        Storage::makeDirectory('posts'); //Storage crea una nueva carpeta 

         \App\Models\Post::factory(100)->create();
    }
}
