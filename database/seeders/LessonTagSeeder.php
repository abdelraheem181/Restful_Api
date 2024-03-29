<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LessonTag;

class LessonTagSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
       // factory(App\LessonTag::class, 500)->create();
        LessonTag::factory()
        ->times(500)
        ->create();
    }
}
