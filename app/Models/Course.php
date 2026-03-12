<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'level',
        'duration',
        'instructor_id',
        'category_id',
        'image',
        'status'
    ];

    public static function totalCourses()
    {
        return self::count();
    }

    public static function totalhours(){
        return self::sum('duration');
    }

    
    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }
   public function lessons()
    {
        return $this->hasManyThrough(
            Lesson::class,
            Section::class,
            'course_id',   
            'section_id', 
            'id',          
            'id'           
        );
    }
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
