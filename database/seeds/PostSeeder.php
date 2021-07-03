<?php

use App\Post;
use App\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i =1; $i <= 10; $i++){
            factory(Post::class)->create([
                'user_id' => User::all()->pluck('id')->random()
            ]);
        }
    }
}
