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
        $order = Order::select('id', 'order_info', 'user_info', 'created_at')
            ->where('id', $this->orderId) // Замените $this->orderId на актуальное значение
            ->first();

        if ($order) {
            // Parse the JSON string into an array
            $orderInfoArray = json_decode($order->order_info, true);

            // Initialize an array for formatted order info
            $formattedOrderInfo = [];

            $totalSum = 0; // Для хранения суммы значений $item['total']

            // Loop through the items in the order_info array and format them
            foreach ($orderInfoArray as $item) {
                $formattedItem = $item['title'] . ',' . $item['total'] . ',' . $item['quantity'];
                $formattedOrderInfo[] = $formattedItem;

                // Суммируем значения $item['total']
                $totalSum += $item['total'];
            }

            // Добавляем строку "Итого" и сумму в конце order_info
            $totalString = "Итого: {$totalSum}";
            $formattedOrderInfo[] = $totalString;

            // Parse the JSON string into an array for user_info
            $userInfoArray = json_decode($order->user_info, true);

            // Extract the values you want from user_info
            $formattedUserInfo = [
                $userInfoArray['name'],
                $userInfoArray['email'],
                $userInfoArray['phone_number'],
            ];

            // Формируем данные для экспорта
            $data = [
                [
                    $order->id,
                    implode("\n", $formattedOrderInfo), // Separate order_info items with new lines
                    implode(', ', $formattedUserInfo), // Combine user_info values with a comma and space
                    $order->created_at,
                ],
            ];
        } else {
            // Если заказ не найден, вернуть пустую коллекцию
            $data = [];
        }

        return new Collection($data);
    }





    public function headings(): array
    {
        return ['Номер заказа', 'Заказ', 'Пользователь', 'Дата и время заказа'];
    }
}
