<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Shop Staff','Shop Owner','Admin Staff', 'Admin','Customer'];
        while($role = array_pop($roles))
        {
            Role::create([
                'role_name' => $role,
            ]);
        }
    }
}
