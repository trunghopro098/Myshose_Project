<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Hồ Văn Trung',
        	'email' => 'hvtrung.18it4@sict.udn.vn',
        	'password' => Hash::make('0332755831'),
        	'ruler' => 1
        ]);
    }
}
