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
        // $this->call(UsersTableSeeder::class);

       DB::table('users')->insert([
        'name' => 'administrator',
        'email' => 'example@gmail.com',
        'password' =>  Hash::make('12345678'),
        'active' => 1,
        'level' => 1,
        'facebook_id' => '-'
        ]);


       $mod_id  = DB::table('users')->select('id')->where('email', 'example@gmail.com')->first()->id;

       DB::table('profiles')->insert(
        array(
            array(
                'fullname' => 'Example',
                'address' => 'jl warga 008/003',
                'phone_number' => '085862624149',
                'users_id' => $mod_id
                )
            ));

   }
}
