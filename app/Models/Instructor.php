<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Instructor extends Model
{
    protected $fillable = [
        'user_id',
        'bio',
        'total_earnings'
    ];

    public function courseStats()
    {
        $total = $this->courses()->count();

        $previous = $this->courses()
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->count();

        $percentChange = $previous > 0 ? (($total - $previous) / $previous) * 100 : ($total > 0 ? 100 : 0);

        return [
            'total' => $total,
            'percentChange' => round($percentChange, 1),
        ];
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
