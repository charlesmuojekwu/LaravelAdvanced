<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Events\OrderShipped;
use App\Http\Controllers\CategoryController;
use App\Jobs\SendReminderEmail;
use App\Models\User;
use App\Notifications\TaskCompleted;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate as FacadesGate;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('show-categories/{category}', [CategoryController::class, 'show'])->name('show.category');


Route::resource('user', UserController::class);

Route::get('user-create', [UserController::class, 'creatingEvent']);
Route::get('user-update', [UserController::class, 'updateEvent']);
Route::get('user-delete', [UserController::class, 'deleteEvent']);


## output the event/ 
Route::get('/event', function() {
    event(new OrderShipped('your order is shipped'));
});


## output the listen/ 
Route::get('/listen', function() {
    return view('listen-broadcast');
});



## language change
Route::get('/locale/{lang?}', function($lang = null) {

    App::setLocale($lang);

    return view('welcome');
});



## Send email
Route::get('/send-email', function() {

    $email = 'useremail@gmail.com';
    $name = 'Mikel';

    SendReminderEmail::dispatch($email,$name)
        ->delay(now()->addSeconds(10));

        

    return 'Email is sent successfully';

});


### Notification SEND EMAIL, SMS AND LOGS TO DATABASE
Route::get('/notify', function() {

    ## registered users

    //User::find(1)->notify(new TaskCompleted);

    //$users = User::find(1);
    Notification::send(Auth::user(), new TaskCompleted);

    //FOR non registered users
    // Notification::route('mail','notify@mail.com')
    //      ->notify(new TaskCompleted());

    return view('welcome');
});

Route::get('markAsRead', function() {

    Auth::user()->unreadNotifications->markAsRead();

    return redirect()->back();

})->name('Read');




## Gate And policy
Route::get('/subs', function() {

    $response = FacadesGate::inspect('subs-only');

    if ($response->allowed()) {
        return view('subs');
    } else {
        echo $response->message();
    }

    // if(Gate::allows('subs-only', Auth::user()))
    // {
    //     return view('subs');
    // }else{
    //     return 'You are not a subscriber';
    // }
    

});






### Auth routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';
