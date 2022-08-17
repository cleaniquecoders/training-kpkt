<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->seedAccessControl();

        if(app()->environment() != 'production' )
        {
            User::factory(100)->create();

            $users = User::inRandomOrder()->limit(rand(10,25))->get();
            
            $users->each(function($user) {
                $user->assignRole('author');
            });

            // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);

            $this->call(ArticleSeeder::class);
        }
    }

    public function seedAccessControl()
    {
        // roles
        // permissions

        $role = Role::create(['name' => 'author']);
        $permission = Permission::create(['name' => 'update articles']);
    }
}
