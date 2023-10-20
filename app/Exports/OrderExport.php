<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrderExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        $orders = Order::select('id', 'order_info', 'user_info', 'created_at')->get();

        $data = $orders->map(function ($order) {
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

            return [
                $order->id,
                implode("\n", $formattedOrderInfo), // Separate order_info items with new lines
                implode(', ', $formattedUserInfo), // Combine user_info values with a comma and space
                $order->created_at,
            ];
        });

        return new Collection($data);
    }

    public function headings(): array
    {
        return ['Номер заказа', 'Заказ', 'Пользователь', 'Дата и время заказа'];
    }
}
