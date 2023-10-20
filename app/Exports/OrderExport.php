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

class OrderExport implements FromCollection, WithHeadings, WithColumnWidths, WithStyles
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
            'A' => 10,
            'B' => 30,
            'C' => 10,
            'D' => 10
        ];
    }

    public function collection()
    {
        $data = [];

        $users = Order::select('id', 'order_info', 'user_info', 'created_at')
            ->whereBetween('created_at', [now()->subDay(), now()])
            ->get();

        foreach ($users as $user) {
            $orderInfo = json_decode($user->order_info, true);

            if (is_array($orderInfo)) {
                foreach ($orderInfo as $orderItem) {
                    $newOrderItem = [];

                    foreach ($orderItem as $key => $value) {
                        if (empty($newOrderItem)) {
                            $newOrderItem[$key] = $value;
                        } else {
                            $newOrderItem[] = $value;
                        }
                    }
                    $goodOrderItem = array_values($newOrderItem);
                    $arrString = implode(', ', $goodOrderItem);
                    $cleanedString = str_replace(['"','\\', '[', ']'], '', $arrString);
                    $userData = [
                        'id' => $user->id,
                        'order_info' => json_encode($cleanedString, JSON_UNESCAPED_UNICODE),
                        'user_info' => $user->user_info,
                        'created_at' => $user->created_at,
                    ];
                    $data[] = $userData;
                }
            }
        }

        return new Collection($data);
    }




    public function headings(): array
    {
        $headings = ['Номер заказа', 'Товары', 'Пользователь', 'Дата заказа'];


        return $headings;
    }



}
