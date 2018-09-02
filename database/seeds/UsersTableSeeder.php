<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\factory::create();
        for ($i=0; $i < 20; $i++) { 
        	DB::table('users')->insert([
        		'name'=>$faker->name,
        		'email'=>$faker->unique()->email,
        		'password'=>$faker->password,
        		
        	]);
        }
    }
}
