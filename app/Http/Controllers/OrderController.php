<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $items = Store::all();
        return view('index', compact('items'));
    }
    public function store(Request $request)
    {       $user = Auth::user();
        $data = $request->input('data');

        $userInfo = [
            'name' => $user->name,
            'birth' => $user->birth,
            'sex' => $user->sex,
            'city' => $user->city,
            'place_of_work' => $user->place_of_work,
            'email' => $user->email,

        ];

        $order = Order::firstOrCreate(
            ['order_info' => $data],
            ['user_info' => json_encode($userInfo)]
        );

        if (!$order->wasRecentlyCreated) {
            return response()->json(['message' => 'Order already exists']);
        }

        return response()->json(['message' => 'Success']);
    }
}
