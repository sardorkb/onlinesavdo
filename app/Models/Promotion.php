<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'slug',
        'description',
        'photo',
        'start_date',
        'end_date',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function getDaysLeftAttribute()
    {
        $end_date = Carbon::parse($this->end_date);
        $today = Carbon::today();

        if ($end_date->isFuture()) {
            return $end_date->diffInDays($today);
        }
        // Return 0 if the end date is in the past
        return 0;
    }
}
