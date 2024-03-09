<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HolidayPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'holiday_plan_user', 'holiday_plan_id', 'user_id');
    }
}
