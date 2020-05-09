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
        $data = [
            [
                'name'     => 'Unknown author',
                'email'    => 'unknown_author@gmail.com',
                'password' => bcrypt(str_random(10))
            ],
            [
                'name'     => 'Author',
                'email'    => 'author@gmail.com',
                'password' => bcrypt('123')
            ],
        ];

        DB::table('users')->insert($data);
    }
}
