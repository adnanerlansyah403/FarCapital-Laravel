<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $blogs = [
            [
                "title" => "Post 1",
                "body" => "Content dari post 1",
                "author" => "Adnan Erlansyah"
            ]
        ];

        foreach ($blogs as $blog) {
            Blog::create($blog);
        }

    }
}
