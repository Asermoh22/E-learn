<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Category;


class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Web Development',
            'Mobile Development',
            'Backend Development',
            'Frontend Development',
            'UI / UX Design',
            'Graphic Design',
            'Data Science',
            'Machine Learning',
            'Artificial Intelligence',
            'Cyber Security',
            'Cloud Computing',
            'DevOps',
            'Game Development',
            'Programming Basics',
            'Databases',
            'Networking',
            'Operating Systems',
            'Software Engineering',
            'Digital Marketing',
            'Business & Entrepreneurship',
        ];

        foreach ($categories as $category) {
           Category::create(['name' => $category]);
        }
    }
}