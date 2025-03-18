<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['subject_id', 'name', 'max_students', 'is_active', 'description', 'grade_level', 'course_type', 'location', 'google_meet_link', 'start_date', 'end_date', 'price', 'image_url', 'short_desc'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function weeklySchedules()
    {
        $date = Carbon::parse($this->start_date);
        $startOfWeek = $date->copy()->startOfWeek()->toDateString();
        $endOfWeek = $date->copy()->endOfWeek()->toDateString();
        return $this->hasMany(Schedule::class)
            ->whereBetween('date', [$startOfWeek, $endOfWeek]);
    }
}
