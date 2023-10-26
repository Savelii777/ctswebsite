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

class SingleUserOrderExport implements FromCollection, WithHeadings
{
    protected $orderId;

    public function __construct($id)
    {
        $this->orderId = $id;
    }

    public function collection()
    {
        $order = Order::select('id', 'order_info', 'user_info', 'created_at')
            ->where('id', $this->orderId)
            ->first();

        if ($order) {
            $orderInfoArray = json_decode($order->order_info, true);
            $formattedOrderInfo = [];
            $totalSum = 0;

            foreach ($orderInfoArray as $item) {
                $formattedItem = [
                    $item['title'],
                    $item['total'],
                    $item['quantity'],
                    $item['total']*$item['quantity']
                ];
                $formattedOrderInfo[] = $formattedItem;

                $totalSum += $item['total']*$item['quantity'];
            }

            $data = [];
            foreach ($formattedOrderInfo as $item) {
                $data[] = $item;
            }

            // Добавляем строку "Итого" и сумму в конце order_info
//            $totalString = ["Итого:", $totalSum];
//            $data[] = $totalString;
            $data[] = [
                'Итого:',
                '',
                '',
                $totalSum
            ];

            $userInfoArray = json_decode($order->user_info, true);
            $formattedUserInfo = [
                $userInfoArray['name'],
                $userInfoArray['email'],
                $userInfoArray['phone_number'],
            ];

            $data[] = []; // Пустая строка для отделения order_info и user_info

            $data[] = [
                'Дата и время заказа',
                $order->created_at
            ];

        } else {
            $data = [];
        }

        return new Collection($data);
    }





    public function headings(): array
    {
        return ['Наименование', 'Цена за шт.', 'Количество', 'Всего'];
    }
}
