<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class SendApplicationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'place_of_work' => 'required|max:255',
            'city' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ],
        [
            'name.required' => 'Пожалуйста, укажите ваше имя',
            'place_of_work.required' => 'Пожалуйста, укажите вашу сферу деятельности',
            'city.required' => 'Пожалуйста, укажите ваш город',
            'email.required' => 'Пожалуйста, укажите ваш электронный адрес',
            'email.email' => 'Пожалуйста, введите коректный электронный адрес',
            'email.unique' => 'Учетная запись с таким электронным адресом уже существует',
            'max' => 'Максимальная длина параметра 255 символов',
        ]);

        Application::create([
            'name' => $request->get('name'),
            'place_of_work' => $request->get('place_of_work'),
            'city' => $request->get('city'),
            'email' => $request->get('email'),
            'status' => 'новая',
        ]);

        return view('application_sent');
    }
}
