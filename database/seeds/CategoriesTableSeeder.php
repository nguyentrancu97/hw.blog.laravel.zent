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
        $faker = Faker\Factory::create();
        for ($i=0; $i < 20; $i++) { 
        	DB::table('categories')->insert([
        		'name'=>$faker->name,
        		'thumbnail'=>$faker->text($maxNbChars = 200),
        		'slug'=>$faker->slug,
        		'description'=>$faker->text($maxNbChars = 200),

        	]);
        }
    }
}
