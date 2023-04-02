<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\SendApplicationController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController as UserComponentController;
use App\Http\Controllers\TestController as UserTestController;
use App\Http\Controllers\Admin\Api\UserController as ApiUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Guest
Route::get('/', function () {
    return view('index');
});

Route::get('/sent', function () {
    return view('auth.passwords.sent');
})->name('passwordsSent');

Route::post('/send-application', SendApplicationController::class)->name('application.send.guest');
Route::get('/create-application', [GuestController::class, 'application'])->name('application.create.guest');

Auth::routes(
    ['register' => false]
);

// Auth
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/storage/images/users/{id}/{photoName}', [HomeController::class, 'getPhoto'])->name('get.photo');
Route::get('/storage/files/chapters/{id}/{fileName}', [HomeController::class, 'getFiles'])->name('get.file');
// Продакшн тесты
Route::get('/test/about/{test}', [UserTestController::class, 'testBefore'])->name('test.about');
Route::get('/test/{test}', [UserTestController::class, 'test'])->name('test'); // Продакшн версия
Route::get('/test/result/{attempt}', [UserTestController::class, 'testResult'])->name('test.result');
Route::post('/start-test/{test}', [UserTestController::class, 'startTest'])->name('start.test');
Route::post('/validatate-test-result/{attempt}', [UserTestController::class, 'validatateTestResult'])->name('validatate.test.result');

Route::get('/test/template', [HomeController::class, 'test'])->name('test.template'); // Версия для разработки
Route::get('/testshow', [HomeController::class, 'testShow'])->name('test.show');
Route::get('/settings', [HomeController::class, 'settings'])->name('settings');
Route::get('/course/{course}', [HomeController::class, 'course'])->name('course.show.user');
Route::get('/chapter/{chapter}/materials', [HomeController::class, 'materials'])->name('chapter.materials');
Route::patch('/user/profile/{user}', [UserComponentController::class, 'updateUserProfileData'])->name('user.profile');
Route::post('/user/image/upload/{user}', [UserComponentController::class, 'updateUserProfileImageUpload'])->name('user.image.upload');
Route::post('/user/image/delete/{user}', [UserComponentController::class, 'updateUserProfileImageDelete'])->name('user.image.delete');
Route::post('/user/password/update/{user}', [UserComponentController::class, 'updateUserPassword'])->name('user.password.update');
Route::post('/user/email/update/{user}', [UserComponentController::class, 'updateUserEmail'])->name('user.email.update');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home.admin');
    // Пользователи
    Route::get('user/{user}/course/{course}/tests', [UserController::class, 'tests'])->name('user.course.tests');
    Route::get('user/{user}/test/{test}/attempts', [UserController::class, 'attempts'])->name('user.test.attempts');
    Route::resource('user', UserController::class);
    Route::get('application/accept/{application}', [ApplicationController::class, 'accept'])->name('application.accept');
    Route::get('application/deny/{application}', [ApplicationController::class, 'deny'])->name('application.deny');
    Route::get('application/postpone/{application}', [ApplicationController::class, 'postpone'])->name('application.postpone');
    Route::post('application/deny', [ApplicationController::class, 'sendDenyEmail'])->name('application.send.deny');
    Route::resource('application', ApplicationController::class);
    // Курсы
    Route::get('course/{course}/chapters', [CourseController::class, 'chapters'])->name('course.chapters');
    Route::get('course/{course}/chapters/create', [ChapterController::class, 'createOfCourse'])->name('course.chapters.create');
    Route::get('course/{course}/chapters/edit/{chapter}', [ChapterController::class, 'editOfCourse'])->name('course.chapters.edit');
    Route::resource('course', CourseController::class);
    // Главы
    Route::get('chapter/{chapter}/tests', [ChapterController::class, 'tests'])->name('chapter.tests');
    Route::get('chapter/{chapter}/tests/create', [TestController::class, 'createOfChapter'])->name('chapter.tests.create');
    Route::get('chapter/{chapter}/tests/edit/{test}', [TestController::class, 'editOfChapter'])->name('chapter.tests.edit');
    Route::get('chapter/{chapter}/files', [ChapterController::class, 'files'])->name('chapter.files');
    Route::get('chapter/{chapter}/files/create', [FileController::class, 'createOfChapter'])->name('chapter.files.create');
    Route::resource('chapter', ChapterController::class);
    // Тесты
    Route::resource('test', TestController::class);
    // Файлы
    Route::resource('file', FileController::class);

    // json
    Route::group(['prefix' => 'api'], function () {
        Route::resource('users', ApiUserController::class);
    });
});
