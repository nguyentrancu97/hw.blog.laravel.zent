<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
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
    		DB::table('posts')->insert([
    			'title'=>$faker->text($maxNbChars = 200),
    			'description'=>$faker->text($maxNbChars = 200),
    			'content'=>$faker->text($maxNbChars = 200),
    			'user_id'=>1,
    			'slug'=>$faker->slug,
    		]);
    	}
    	
    }
}
