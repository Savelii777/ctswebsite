<?php

namespace App\Exports;

use App\Models\Chapter;
use App\Models\User;
use App\Models\Test;
use App\Models\Attempt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
 

        $users = User::select('users.name', 'users.login', 'users.city', 'users.place_of_work', 'course_user.completed', 'courses.title')
        ->leftJoin('course_user', 'users.id', '=', 'course_user.user_id')
        ->leftJoin('courses', 'courses.id', '=', 'course_user.course_id')
        ->selectRaw('IFNULL(course_user.completed, "не приступил") as completed')
        ->get();
            
    return $users;
    }
     /*public function headings(): array
    {
        $x = $count = Chapter::count();

        return ['ФИО', 'Логин', 'Курс', 'Группа', 'Завершено из '.$x.' тем','Раздел'];
    }*/
    
    public function map($user): array
    {
        $chapters = Chapter::all();
        $chapterStatuses = [];

        foreach ($chapters as $chapter) {
            $status = $this->passed($chapter->id,$user->id);
            $chapterStatuses[] = $status;
        }

        return [
            $user->name,
            $user->login,
            $user->city,
            $user->place_of_work,
            $user->completed,
            $user->title,
            ...$chapterStatuses,
        ];
    }
    public function passed($chapter_id, $user_id) {
        //dd($this->id);
        $test_id = $chapter_id;
        $attempts = Attempt::where("user_id", $user_id)->where("test_id", $test_id)->get();

        if ($attempts->count() == 0) {
            return "Не приступил";
        }

        if ($attempts->where('is_passed', true)->count() > 0) {
            return "Сдал успешно";
        }

        if ($attempts->where('is_passed', true)->count() == 0) {
            return "Не сдал";
        }

        return "Не приступил";
    }
    public function headings(): array
    {
        $chapterCount = Chapter::count();

        return [
            'ФИО',
            'Логин',
            'Город',
            'Место работы',
            'Завершено из '.$chapterCount.' тем',
            'Курс',
            ...Chapter::pluck('title')->toArray(),
        ];
    }
   
}
