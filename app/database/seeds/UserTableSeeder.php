<?php
 
class UserTableSeeder extends Seeder
{
 
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Maulana Yusup A.',
            'username' => 'maulana',
            'email'    => 'adeneling@gmail.com',
            'password' => Hash::make('maulana12'),
        ));
    }
 
}