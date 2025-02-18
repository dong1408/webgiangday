<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'start_time', 'end_time', 'day_of_week', 'location', 'google_meet_link'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
