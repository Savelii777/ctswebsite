<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use App\Models\Chapter;
use App\Models\User;
use App\Models\Attempt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithColumnWidths, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true], 'alignment' => ['vertical' => 'top', 'wrapText' => true]],


        ];
    }

    public function columnWidths(): array
    {
        $columnWidth = 27;
        return [
            'A' => 30,
            'B' => 10,
            'C' => 30,
            'D' => 20,
            'E' => 10,
            'F' => 10,
            'G' => 10,
            'H' => 10,

        ];
    }

     public function collection()
    {
        $data = [];
        $users = User::select('id', 'name','login','email','phone_number','birth','sex', 'city', 'place_of_work')->get();
        $chapters = Chapter::select('id', 'title')->get();

        foreach ($users as $user) {
            $userData = [
                'name' => $user->name,
                'login' => $user->login,
                'email' => $user->email,
                'phone_number' => $user->phone_number,
                'birth' => $user->birth,
                'sex' => $user->sex,
                'city' => $user->city,
                'place_of_work' => $user->place_of_work,
            ];

            $data[] = $userData;
        }

        return new Collection($data);
    }


    public function headings(): array
    {
        $headings = ['ФИО','Логин','Почта','Телефон', 'Дата рождения', 'Пол', 'Город', 'Место работы'];


        return $headings;
    }



}
