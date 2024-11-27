<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Job extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'requirements',
        'conditions',
        'skills',
        'location',
        'phone_number',
        'close_date',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array<int, string>
     */
    protected $dates = [
        'close_date',
    ];

    /**
     * Get the number of days left until the close date.
     *
     * @return int
     */
    public function getDaysLeftAttribute()
    {
        $close_date = Carbon::parse($this->close_date);
        $today = Carbon::today();

        if ($close_date->isFuture()) {
            return $close_date->diffInDays($today);
        }
        // Return 0 if the close date is in the past
        return 0;
    }
}
