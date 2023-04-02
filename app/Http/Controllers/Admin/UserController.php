<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Application;
use App\Mail\WelcomeMail;
use App\Models\Course;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::sortable()->simplePaginate(20);

        return view('admin.user.index', compact('users'));
    }

    public function experts()
    {
        $users = User::role('expert')->sortable()->simplePaginate(20);

        return view('admin.user.index', compact('users'));
    }

    public function admins()
    {
        $users = User::role('admin')->sortable()->simplePaginate(20);

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.user.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'login' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|max:255',
            'city' => 'max:255',
            'place_of_work' => 'max:255',
            'image' => 'mimes:jpg,jpeg,png,gif,bmp'
        ],
            [
                'name.required' => 'Поле имя должно быть заполено!',
                'login.required' => 'Поле логин должно быть заполено!',
                'login.unique' => 'Пользователь с таким логином уже существует!',
                'email.required' => 'Поле e-mail должно быть заполено!',
                'email.unique' => 'Пользователь с таким e-mail уже существует!',
                'email.email' => 'e-mail указан в неверном формате!',
                'password.required' => 'Поле пароль должно быть заполено!',
                'max' => 'Максимальная длина параметра 255 символов!',
                'mimes' => 'Изображение должно быть в формате jpg,jpeg,png,gif,bmp'
            ]);

        $user = User::create([
            'name' => $request->get('name'),
            'login' => $request->get('login'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'city' => $request->get('city'),
            'birth' => $request->get('birth'),
            'sex' => $request->get('sex'),
            'place_of_work' => $request->get('place_of_work'),
        ]);

        if ($request->has('application_id')) {
            $application = Application::find($request->get('application_id'));
            $application->status = 'принята';
            $application->save();
        }

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/users/' . $user->id, $filename, 'public');
            $user->update(['img_url' => "/storage/images/users/" . $user->id . "/" . $filename]);
        }

        $user->syncRoles($request->get('roles'));

        $data = array('login' => $request->get('login'), 'password' => $request->get('password'));
        Mail::to($user->email)->send(new WelcomeMail($data, 'Заявка принята!'));

        return redirect()
            ->route('user.index')
            ->with('success', 'Пользователь успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.user.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = $request->validate(
            [
                'name' => 'required|max:255',
                'login' => ['max:255', 'required', Rule::unique('users')->ignore($user->id)],
                'email' => ['email', 'max:255', 'required', Rule::unique('users')->ignore($user->id)],
                'city' => 'max:255',
                'place_of_work' => 'max:255',
                'image' => 'image|mimes:jpg,jpeg,png,gif,bmp'
            ],
            [
                'name.required' => 'Поле имя должно быть заполено!',
                'login.required' => 'Поле логин должно быть заполено!',
                'login.unique' => 'Пользователь с таким логином уже существует!',
                'email.required' => 'Поле e-mail должно быть заполено!',
                'email.unique' => 'Пользователь с таким e-mail уже существует!',
                'email.email' => 'e-mail указан в неверном формате!',
                'max' => 'Максимальная длина параметра 255 символов!',
                'mimes' => 'Изображение должно быть в формате jpg,jpeg,png,gif,bmp'
            ]
        );

        $user->name = $request->get('name');
        $user->login = $request->get('login');
        $user->email = $request->get('email');
        $user->city = $request->get('city');
        $user->birth = $request->get('birth');
        $user->sex = $request->get('sex');
        $user->place_of_work = $request->get('place_of_work');
        $user->save();

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            if (Storage::exists('public/images/users/' . $user->id)) {
                $files = Storage::allFiles('public/images/users/' . $user->id);
                Storage::delete($files);
            }
            $request->image->storeAs('images/users/' . $user->id, $filename, 'public');
            $user->update(['img_url' => "/storage/images/users/" . $user->id . "/" . $filename]);
        }

        $user->syncRoles($request->get('roles'));

        return redirect()
            ->route('user.index')
            ->with('success', 'Пользователь успешно отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        if (Storage::exists('public/images/users/' . $user->id)) {
            Storage::deleteDirectory('public/images/users/' . $user->id);
        }
        return redirect()->back()->withSuccess('Пользователь был успешно удален!');
    }

    public function tests(User $user, Course $course)
    {
        $tests = [];

        foreach ($course->chapters as $chapter) {
            array_push($tests, ...$chapter->tests );
        }

        return view('admin.user.tests', [
            'course' => $course,
            'tests' => $tests,
            'user' => $user
        ]);
    }

    public function attempts(User $user, Test $test)
    {
        $attempts = $test->attempts->where('user_id', $user->id);

        return view('admin.user.attempts', [
            'test' => $test,
            'user' => $user,
            'attempts' => $attempts
        ]);
    }
}
