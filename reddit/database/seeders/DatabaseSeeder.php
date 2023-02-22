<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Community;
use App\Models\Commentary;
use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user=User::factory(2)
            ->has(Community::factory(2))
            ->create();

/*         Post::factory(1)->create(); */
/*         Commentary::factory(1)->create(); */

$admin=User::factory()->create([
    'name'=> 'mateu',
    'email'=>'mateu@123.com',
    'password'=> 'hola'
]);

 Community::factory(4)
        ->has(Post::factory()->has(Commentary::factory()))

        ->hasAttached($admin)
        ->create();

/*
         \App\Models\Commentary::factory(20)->create();
        \App\Models\Community::factory(20)->create(); */

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
