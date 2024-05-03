<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => '読書'
        ]);
        DB::table('categories')->insert([
            'name' => '英語'
        ]);
        DB::table('categories')->insert([
            'name' => 'Laravel'
        ]);
        DB::table('categories')->insert([
            'name' => 'React'
        ]);
        DB::table('categories')->insert([
            'name' => 'Fast API'
        ]);
        DB::table('categories')->insert([
            'name' => 'Ruby on Rails'
        ]);
        DB::table('categories')->insert([
            'name' => 'Go'
        ]);
        DB::table('categories')->insert([
            'name' => 'Cake PHP'
        ]);
        DB::table('categories')->insert([
            'name' => 'Vue.js'
        ]);
        DB::table('categories')->insert([
            'name' => 'Django'
        ]);
    }
}
