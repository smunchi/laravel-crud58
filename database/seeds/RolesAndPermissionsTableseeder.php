<?php

use Illuminate\Database\Seeder;

class RolesAndPermissionsTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->saveRole();
        $this->savePermissions();
    }

    public function saveRole()
    {
        $roles = [];
        $sl = 0;
        $getRoles = config('acl.roles');

        foreach ($getRoles as $key => $role) {
            $roles[$sl]['name'] = $role;
            $roles[$sl]['guard_name'] = 'web';
            $sl++;
        }
        return \Spatie\Permission\Models\Role::insert($roles);
    }

    public function savePermissions()
    {
        $permissions = [];
        $permissions[0]['name'] = 'book index';
        $permissions[0]['guard_name'] = 'web';

        return \Spatie\Permission\Models\Permission::insert($permissions);
    }
}
