<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyLog extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'log_date',
        'mood',
        'sleep_start',
        'sleep_end',
        'meal_morning',
        'meal_lunch',
        'meal_dinner',
        'meal_snack',
        'activity',
        'medication',
        'journal',
    ];

    protected $casts = [
        'log_date' => 'date',
        'sleep_start' => 'datetime:H:i',
        'sleep_end' => 'datetime:H:i',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
