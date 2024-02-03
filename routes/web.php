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
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Auth\RegisterController;


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

Route::get('/', [ChapterController::class, 'viewChapterCount'])->name('home.page');

Route::get('/sent', function () {
    return view('auth.passwords.sent');
})->name('passwordsSent');

Route::post('/send-application', SendApplicationController::class)->name('application.send.guest');
Route::get('/create-application', [GuestController::class, 'application'])->name('application.create.guest');

Auth::routes(
    ['register' => true]
);

// Auth
Route::get('/items', [ItemController::class, 'index']);
Route::get('/general', [ItemController::class, 'general']);
Route::get('/page1', [ItemController::class, 'page1'])->name('page1');
Route::get('/page2', [ItemController::class, 'page2'])->name('page2');
Route::get('/page3', [ItemController::class, 'page3'])->name('page3');
Route::get('/page4', [ItemController::class, 'page4'])->name('page4');
Route::get('/page5', [ItemController::class, 'page5'])->name('page5');
Route::get('/page6', [ItemController::class, 'page6'])->name('page6');
Route::get('/page7', [ItemController::class, 'page7'])->name('page7');
Route::get('/page8', [ItemController::class, 'page8'])->name('page8');
Route::get('/page9', [ItemController::class, 'page9'])->name('page9');
Route::get('/page10', [ItemController::class, 'page10'])->name('page10');
Route::get('/page11', [ItemController::class, 'page11'])->name('page11');
Route::get('/page12', [ItemController::class, 'page12'])->name('page12');
Route::get('/page13', [ItemController::class, 'page13'])->name('page13');
Route::get('/page14', [ItemController::class, 'page14'])->name('page14');
Route::get('/page15', [ItemController::class, 'page15'])->name('page15');
Route::get('/page16', [ItemController::class, 'page16'])->name('page16');
Route::get('/page17', [ItemController::class, 'page17'])->name('page17');
Route::get('/page18', [ItemController::class, 'page18'])->name('page18');

Route::post('/register-user', [RegisterController::class, 'create'])->name('register');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/storage/images/users/{id}/{photoName}', [HomeController::class, 'getPhoto'])->name('get.photo');
Route::get('/storage/files/chapters/{id}/{fileName}', [HomeController::class, 'getFiles'])->name('get.file');
// Продакшн тесты
Route::get('/test/about/{test}', [UserTestController::class, 'testBefore'])->name('test.about');
Route::get('/test/{test}', [UserTestController::class, 'test'])->name('test'); // Продакшн версия
Route::get('/test/result/{attempt}', [UserTestController::class, 'testResult'])->name('test.result');
Route::post('/start-test/{test}', [UserTestController::class, 'startTest'])->name('start.test');
Route::post('/validatate-test-result/{attempt}', [UserTestController::class, 'validatateTestResult'])->name('validatate.test.result');
Route::post('/test/check', [UserTestController::class, 'check']);

Route::get('/test/template', [HomeController::class, 'test'])->name('test.template'); // Версия для разработки
Route::get('/testshow', [HomeController::class, 'testShow'])->name('test.show');
Route::get('/settings', [HomeController::class, 'settings'])->name('settings');
Route::get('/course/{course}', [HomeController::class, 'course'])->name('course.show.user');
Route::get('/chapter/{chapter}/materials', [HomeController::class, 'materials'])->name('chapter.materials');
Route::get('/chapter/{chapter}/materialsVideo', [HomeController::class, 'materialsVideo'])->name('chapter.materialsVideo');
Route::get('/chapter/{chapter}/materialsVideo', [HomeController::class, 'materialsVideo'])->name('chapter.materialsVideo');
Route::get('/course/{course}/materialsAllVideo',  [HomeController::class, 'materialsAllVideo'])->name('course.materialsAllVideo');

Route::patch('/user/profile/{user}', [UserComponentController::class, 'updateUserProfileData'])->name('user.profile');
Route::post('/user/image/upload/{user}', [UserComponentController::class, 'updateUserProfileImageUpload'])->name('user.image.upload');
Route::post('/user/image/delete/{user}', [UserComponentController::class, 'updateUserProfileImageDelete'])->name('user.image.delete');
Route::post('/user/password/update/{user}', [UserComponentController::class, 'updateUserPassword'])->name('user.password.update');
Route::post('/user/email/update/{user}', [UserComponentController::class, 'updateUserEmail'])->name('user.email.update');
Route::get('/order/single-export-user/{id}', [UserController::class, 'getSingleUserOrderXlsxData'])->name('single-export-user');


// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home.admin');

    Route::post('/dollar', [ItemController::class, 'setDollar'])->name('dollar');

    // Пользователи
    Route::get('user/{user}/course/{course}/tests', [UserController::class, 'tests'])->name('user.course.tests');
    Route::get('user/{user}/test/{test}/attempts', [UserController::class, 'attempts'])->name('user.test.attempts');
    Route::get('user/export', [UserController::class, 'getXlsxData'])->name('user.export');
    Route::get('order/export', [UserController::class, 'getOrderXlsxData'])->name('order.export');
    Route::post('user/import', [UserController::class, 'postXlsxData'])->name('user.import');
    Route::get('/order/single-export/{id}', [UserController::class, 'getSingleOrderXlsxData'])->name('single-export');
    Route::patch('/update-status/{id}', [TestController::class, 'updateStatus'])->name('update.status');


    Route::resource('user', UserController::class);
    Route::get('application/accept/{application}', [ApplicationController::class, 'accept'])->name('application.accept');
    Route::get('application/deny/{application}', [ApplicationController::class, 'deny'])->name('application.deny');
    Route::get('application/postpone/{application}', [ApplicationController::class, 'postpone'])->name('application.postpone');
    Route::get('application/fresh', [ApplicationController::class, 'migrateAndSeed'])->name('application.fresh');

    Route::post('application/deny', [ApplicationController::class, 'sendDenyEmail'])->name('application.send.deny');
    Route::resource('application', ApplicationController::class);

    // Курсы
    Route::get('course/{course}/chapters', [CourseController::class, 'chapters'])->name('course.chapters');
    Route::get('course/{course}/chapters/create', [ChapterController::class, 'createOfCourse'])->name('course.chapters.create');
    Route::get('course/{course}/chapters/edit/{chapter}', [ChapterController::class, 'editOfCourse'])->name('course.chapters.edit');
    Route::resource('course', CourseController::class);

    Route::delete('course', [CourseController::class, 'destroy'])->name('stores.deleteAll');

    // Главы
    Route::get('chapter/{chapter}/tests', [ChapterController::class, 'tests'])->name('chapter.tests');
    Route::get('chapter/{chapter}/tests/create', [TestController::class, 'createOfChapter'])->name('chapter.tests.create');
    Route::get('chapter/{chapter}/tests/edit/{test}', [TestController::class, 'editOfChapter'])->name('chapter.tests.edit');
    Route::get('chapter/{chapter}/files', [ChapterController::class, 'files'])->name('chapter.files');
    Route::get('chapter/{chapter}/files/create', [FileController::class, 'createOfChapter'])->name('chapter.files.create');
    Route::resource('chapter', ChapterController::class);
    // Тесты
    Route::resource('test', TestController::class);
    Route::get('/tests', [TestController::class, 'index'])->name('tests.home');

    Route::get('questions/{question}/edit', [TestController::class, 'editQuestion'])->name('questions.edit');
    Route::delete('questions/{question}', [TestController::class, 'destroyQuestion'])->name('questions.destroy');
    Route::put('questions/{question}', [TestController::class, 'updateQuestion'])->name('questions.update');

    Route::get('questions/create', [TestController::class, 'create'])->name('questions.create');
    Route::post('/questions', [TestController::class, 'testStore'])->name('questions.testStore');



    // Файлы
    Route::resource('file', FileController::class);

    // json
    Route::group(['prefix' => 'api'], function () {
        Route::resource('users', ApiUserController::class);
    });
});
