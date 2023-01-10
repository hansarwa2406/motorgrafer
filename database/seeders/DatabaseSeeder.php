<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Han Sarwa',
            'username' => 'haruwa_desu',
            'email' => 'hansuwo@gmail.com',
            'password' => bcrypt('123456')
        ]); 
        
        User::factory(4)->create();
        
        // User::create([
        //     'name' => 'Haruwa',
        //     'email' => 'haruwa24@gmail.com',
        //     'password' => bcrypt('123456')
        // ]);
        
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
        
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Coffee',
            'slug' => 'coffee'
        ]);

        Post::factory(28)->create();
    }
}
