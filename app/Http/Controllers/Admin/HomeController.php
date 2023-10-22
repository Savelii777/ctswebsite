<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attempt;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users_count = User::count();
        $users_attempts = Order::count();
        $orders_last_month = Order::where('created_at', '>=', now()->subMonth())->count();
        $orders_last_24_hours = Order::where('created_at', '>=', now()->subDay())->count();

        $all_orders = Order::all();

        // Создаем переменные для хранения сумм
        $total_all_time = 0;
        $total_last_month = 0;
        $total_last_24_hours = 0;

        // Итерируемся по всем заказам
        foreach ($all_orders as $order) {
            // Декодируем JSON в массив
            $order_info = json_decode($order->order_info, true);
            // Проверяем, существует ли массив и является ли он массивом
            if (is_array($order_info)) {
                foreach ($order_info as $item) {

                    // Проверяем, существует ли ключ 'total' в элементе
                    if (isset($item['total'], $item['quantity'])) {
                        // Преобразуем значения 'total' и 'quantity' в числа
                        $total = floatval($item['total']);
                        $quantity = floatval($item['quantity']);
                        if (is_numeric($total) && is_numeric($quantity)) {
                            $total_all_time += $total * $quantity;

                            // Проверяем, когда был создан заказ
                            $created_at = $order->created_at;
                            if ($created_at >= now()->subMonth()) {
                                $total_last_month += $total * $quantity;
                            }
                            if ($created_at >= now()->subDay()) {
                                $total_last_24_hours += $total * $quantity;
                            }
                        }
                    }
                }
            }
        }

        return view('admin.home.index', [
            'users_count' => $users_count,
            'users_attempts' => $users_attempts,
            'orders_last_month' =>  $orders_last_month,
            'orders_last_24_hours' => $orders_last_24_hours,
            'total_all_time' => $total_all_time,
            'total_last_month' => $total_last_month,
            'total_last_24_hours' => $total_last_24_hours,
        ]);
    }
}
