<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyLog extends Model
{

use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'mood',
        'sleep_start','sleep_end',
        'meal_morning','lunch','dinner','meal_snack',
        'activity',
        'medication',
        'journal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
