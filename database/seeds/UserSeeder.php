<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('mysql2')->table('admins')->insert([
            ['name'=>'haha','email'=>'admin@gmail.com','gender'=>'0','phone'=>'0123456789','password'=>bcrypt('123456')],
            ['name'=>'join','email'=>'join@gmail.com','gender'=>'1','phone'=>'0123456788','password'=>bcrypt('123')],
            ['name'=>'anna','email'=>'anna@gmail.com','gender'=>'2','phone'=>'0123456787','password'=>bcrypt('123')],
        ]);
    }
}
