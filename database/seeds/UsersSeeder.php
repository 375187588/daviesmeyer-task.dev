<?php

use Illuminate\Database\Seeder;
use App\Models\User\UserModel;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =
            [
                'role_id' => 1,
                'email' => 'dmin@admin.com',
                'password' => Hash::make('admin'),
            ];

        UserModel::create($user);
    }
}