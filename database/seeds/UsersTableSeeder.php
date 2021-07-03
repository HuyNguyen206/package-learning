<?php

use App\User;
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
        //
        factory(User::class)->create(['email' => 'huy@gmail.com', 'name' => 'huy nguyen'])->assignRole('admin');
        factory(User::class)->create(['email' => 'jane@gmail.com', 'name' => 'jane'])->assignRole('publisher');
        factory(User::class)->create(['email' => 'john@gmail.com', 'name' => 'john'])->assignRole('editor');
        factory(User::class)->create(['email' => 'sarthak@gmail.com', 'name' => 'sarthak'])->assignRole('writer');

        factory(User::class, 5)->create()->each(function($u){
            $u->assignRole('guest');
        });

    }
}
