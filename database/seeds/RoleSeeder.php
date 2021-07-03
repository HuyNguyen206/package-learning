<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create(['name' => 'writer'])->givePermissionTo(['write post']);
        Role::create(['name' => 'editor'])->givePermissionTo('edit post');
        Role::create(['name' => 'publisher'])->givePermissionTo('publish post');
        Role::create(['name' => 'admin'])->givePermissionTo(['write post', 'edit post', 'publish post']);
        Role::create(['name' => 'guest']);
    }
}
