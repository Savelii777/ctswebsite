<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'minutes',
        'min_correct',
        'chapter_id'
    ];

    protected $appends = ["complete_questions", "in_progress"];

    public function chapter()
    {
        return $this->belongsTo(Chapter::class);
    }

    public function attempts()
    {
        return $this->hasMany(Attempt::class);
    }

    public function getInProgressAttribute()
    {
        $is_passed = $this->attempts()
            ->where('is_passed', true)
            ->where('user_id', Auth::user()->id)
            ->count();

        $attempts_count = $this->attempts()
            ->where('is_passed', false)
            ->where('user_id', Auth::user()->id)
            ->count();


        return !$is_passed && $attempts_count > 0;
    }

    public function passed(User $user)
    {
        return $this->attempts()
                ->where('is_passed', true)->where('user_id', $user->id)->count() > 0;
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }


    public function getCompleteQuestionsAttribute()
    {

        $attemps = $this->attempts()
            ->whereNotNull("answers")
            ->where('user_id', Auth::user()->id)
            ->orderBy("created_at", "DESC")
            ->first();

        if (empty($attemps))
            return [];

        $tmp = [];

      //  foreach ($attemps->toArray() as $item) {
            $item = (object)$attemps->toArray();//(object)$item;

            $answers = json_decode($item->answers);

            foreach ($answers as $ans) {
                $ans = (object)$ans;

                if (!in_array($ans->question_index, $tmp))
                    array_push($tmp, $ans->question_index);
            }


       // }

        //Log::info(print_r($tmp,true));

        return $tmp ?? [];
    }

}
