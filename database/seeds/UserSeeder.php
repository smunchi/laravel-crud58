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
        foreach (config('acl.roles') as $roleName) {
            $user = factory(\App\User::class)->create();
            $user->assignRole($roleName);
        }
    }
}
