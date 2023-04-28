<?php

namespace App\Exports;

use App\Models\Chapter;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

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
    public function headings(): array
    {
        $x = $count = Chapter::count();

        return ['ФИО', 'Логин', 'Курс', 'Группа', 'Завершено из '.$x.' тем','Раздел'];
    }
   
}
