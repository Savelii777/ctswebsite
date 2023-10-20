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
            $orderInfo = json_decode($user->order_info, true);
            $userInfo = json_decode($user->user_info, true);

            if (is_array($orderInfo) && is_array($userInfo)) {
                $orderTotal = 0; // Переменная для суммирования значений в order_info

                foreach ($orderInfo as $orderItem) {
                    if (is_array($orderItem)) {
                        $data[] = array_values($orderItem);
                        if (isset($orderItem['total']) && is_numeric($orderItem['total'])) {
                            $orderTotal += $orderItem['total'];
                        }
                    }
                }


                // Добавьте общую сумму в колонку C (значение $orderTotal)
                $data[] = ["Итого", $orderTotal];

                foreach ($userInfo as $userItem) {
                    if (is_array($userItem)) {
                        $data[] = array_values($userItem);
                    } else {
                        $data[] = [$userItem];
                    }
                }
            }
        }

        return new Collection($data);
    }





    public function headings(): array
    {
        $headings = ['Цена шт.', 'Наименование', 'Всего', 'Количество' ];


        return $headings;
    }
}
