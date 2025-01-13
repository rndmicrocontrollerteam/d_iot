<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ArticleType;
use App\Models\UserRole;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       Category::create([
          "name" => "Java",
          "icon" => '<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/java/java-original.svg" />',
          "slug" => "java"
        ]);

         ArticleType::create([
            "id" => 1,
            "name" => "Public"
         ]);

         ArticleType::create([
             "id" => 2,
             "name" => "Private"

        ]);

        UserRole::create([
            "id" => 1,
            "name" => "Moderator"
        ]);

        UserRole::create([
            "id" => 2,
            "name" => "Default_User"
        ]);

        UserRole::create([
            "id" => 3,
            "name" => "Reader"
        ]);

        User::create([
            "name" => "admin",
            "Slug" => Str::slug('admin'),
            "user_roles_id" => 1,
            "email" => "admins@intek.com",
           "password" => bcrypt("admin123")

        ]);
    }
}
