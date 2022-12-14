<?php

namespace Database\Seeders;

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
         \App\Models\User::factory(1)->create();
         \App\Models\Category::factory(1)->create();
         \App\Models\News::factory(1)->create();
        
         \App\Models\Level::factory(1)->create();
         \App\Models\Course::factory(15)->create();
         \App\Models\Setting::factory(1)->create();
         \App\Models\Privacy::factory(1)->create();
    }
}
