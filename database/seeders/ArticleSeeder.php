<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::role('author')
            ->get()
            ->each(function($user) {
                Article::factory(rand(1,100))->create([
                    'user_id' => $user->id,
                ]);
            });
    }
}
