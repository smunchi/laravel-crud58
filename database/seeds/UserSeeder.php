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
        $user = factory(\App\User::class)->create();
        $user->assignRole('admin');
        //permission = Permission::create(['name' => 'book.index']);
        //$permission = Permission::first();
        //$permission->assignRole('admin');
        // Auth()->user()->assignRole('admin');
    }
}
