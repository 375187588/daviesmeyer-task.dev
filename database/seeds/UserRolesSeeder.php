<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole\UserRoleModel;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [ 'name' => 'admin' ];

        UserRoleModel::create($role);
    }
}
