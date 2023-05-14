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
            'C' => 10, 
            'D' => $columnWidth,     
            'E' => $columnWidth,
            'F' => $columnWidth,
            'G' => $columnWidth,
            'H' => $columnWidth,
            'I' => $columnWidth,
            'J' => $columnWidth,
            'K' => $columnWidth,     
        ];
    }
     
     public function collection()
    {
        $data = [];
        $users = User::select('id', 'name', 'city', 'place_of_work')->get();
        $chapters = Chapter::select('id', 'title')->get();

        foreach ($users as $user) {
            $userData = [
                'name' => $user->name,
                'city' => $user->city,
                'place_of_work' => $user->place_of_work,
            ];

            foreach ($chapters as $chapter) {
                $status = $this->passed($chapter->id, $user->id);

                $userData['chapter_' . $chapter->id . '_status'] = $status;
            }

            $data[] = $userData;
        }

        return new Collection($data);
    }
    

    public function headings(): array
    {
        $headings = ['ФИО', 'Курс', 'Группа'];

        $chapters = Chapter::select('title')->get();
        foreach ($chapters as $chapter) {
            $headings[] = $chapter->title;
        }

        return $headings;
    }


    public function passed($chapter_id, $user_id)
    {
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
}
