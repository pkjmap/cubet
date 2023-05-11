<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getTotalAttribute()
    {
        return $this->maths + $this->science + $this->history;
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
