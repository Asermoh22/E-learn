<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            DB::table('courses')->insert([
                'title' => $category->name . ' Course',
                'description' => 'This is a sample course for ' . $category->name,
                'price' => rand(50, 500),
                'level' => ['Beginner', 'Intermediate', 'Advanced'][array_rand(['Beginner', 'Intermediate', 'Advanced'])],
                'duration' => rand(5, 20) . ' hours',
                'instructor_id' => 1,
                'category_id' => $category->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}