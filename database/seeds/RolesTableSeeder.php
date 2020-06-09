<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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
                'title'     => 'admin',
            ],
            [
                'title'     => 'moder',
            ],
            [
                'title'     => 'guest',
            ],
        ];

        DB::table('roles')->insert($data);

        $data = [
            [
                'user_id'   => '1',
                'role_id'   => '1',
            ],
            [
                'user_id'   => '2',
                'role_id'   => '2',
            ],
            [
                'user_id'   => '3',
                'role_id'   => '3',
            ],

        ];

        DB::table('roles_user')->insert($data);
    }
}
