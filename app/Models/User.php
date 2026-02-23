<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function instructor()
    {
        return $this->hasOne(Instructor::class);
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }


    public function createInstructor()
    {
        return $this->instructor()->create([
                'user_id' => $this->id,
                'bio' => null,
                'total_earnings' => 0,
            ]);   
     }

    public function createStudent()
    {
        return $this->student()->create([
                'user_id' => $this->id,
            ]);  
    }
}
