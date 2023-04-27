<?php

namespace App\Exports;

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
        $users = User::select('name', 'login', 'city', 'place_of_work', 'completed')
            ->join('course_user', 'users.id', '=', 'course_user.user_id')
            ->get();
    
        return $users;
    }
    public function headings(): array
    {
        return ['ФИО', 'Логин', 'Курс', 'Группа', 'Завершено глав'];
    }
   
}
