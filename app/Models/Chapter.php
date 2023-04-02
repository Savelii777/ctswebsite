<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order',
        'course_id'
    ];

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function complete(User $user)
    {
        $completedTests = 0;
        $tests = $this->tests()->count();
        foreach ($this->tests as $test) {
            if ($test->passed($user)) {
                $completedTests++;
            }
        }
        return $completedTests == $tests;
    }

    public function available(User $user) : bool
    { return true;
        if ($this->order == 1) {
            return true;
        }

        $previous = $this->course->chapters->where('order', $this->order - 1)->first();

        if ($previous) {
            return $previous->complete($user);
        }
        
        return true;
    }
}
