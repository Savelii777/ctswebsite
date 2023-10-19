<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use App\Models\Chapter;
use App\Models\User;
use App\Models\Order;
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

class SingleOrderExport implements FromCollection, WithHeadings
{
    protected $orderId;

    public function __construct($id)
    {
        $this->orderId = $id;
    }

    public function collection()
    {
        $data = [];
        $user = Order::select('id', 'order_info', 'user_info', 'created_at')
            ->where('id', $this->orderId)
            ->first();

        if ($user) {
            $userData = [
                'id' => $user->id,
                'order_info' => $user->order_info,
                'user_info' => $user->user_info,
                'created_at' => $user->created_at,
            ];

            $data[] = $userData;
        }

        return new Collection($data);
    }

    public function headings(): array
    {
        $headings = ['Номер заказа', 'Товары', 'Пользователь', 'Дата заказа'];

        return $headings;
    }
}
