<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Course extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'title',
        'description',
        'img_url',
        'hours',
        'user_id'
    ];

    protected $sortable = [
        'title',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapters(){
        return $this->hasMany(Chapter::class);
    }

    public function users() {
        return $this->belongsToMany(User::class)->withPivot('completed');
    }

    public function completePercent($id){
        $user = $this->users()->find($id);
        $chaptersCount = $this->chapters()->count();

        if (!$user) {
            return 0;
        }

        $completed = $this->users()->find($id)->pivot->completed;
        return round(($completed/$chaptersCount)*100);
        /*$completedChapters = 0;
        $chaptersCount = $this->chapters()->count();
        foreach ($this->chapters as $chapter) {
            if ($chapter->complete()) {
                $completedChapters++;
            }
        }
        return round(($completedChapters/$chaptersCount)*100);*/
    }

    public function completeCount($id){
        $user = $this->users()->find($id);

        if (!$user) {
            return 0;
        }

        $completed = $this->users()->find($id)->pivot->completed;
        return $completed;
        /*$completedChapters = 0;
        foreach ($this->chapters as $chapter) {
            if ($chapter->complete()) {
                $completedChapters++;
            }
        }
        return $completedChapters;*/
    }

    public function completeCheck(User $user){
        $completedChapters = 0;
        foreach ($this->chapters as $chapter) {
            if ($chapter->complete($user)) {
                $completedChapters++;
            }
        }
        return $completedChapters;
    }
}
