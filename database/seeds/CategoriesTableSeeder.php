<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert(['name' => 'sport']);
        DB::table('categories')->insert(['name' => 'nature']);
        DB::table('categories')->insert(['name' => 'cars']);
        DB::table('categories')->insert(['name' => 'women']);
        DB::table('categories')->insert(['name' => 'politics']);
    }
}
