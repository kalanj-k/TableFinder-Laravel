<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/error', [HomeController::class, 'error'])->name('error');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/author',[AuthorController::class, 'index'])->name('author');

Route::post('/register',[RegisterController::class,'register'])->name('register.user');
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/',[LoginController::class,'store'])->name('doLogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


Route::group(['middleware'=>['isLogged','isAdmin']],function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    //Route::get('/createUser', [AccountController::class, 'create'])->name('account.create');
    Route::post('/admin', [AccountController::class, 'store'])->name('account.store');
    Route::delete('/admin',[AccountController::class,'destroy'])->name('account.delete');

    /// ajax
    Route::get('/allusers',[AccountController::class,'getAllUsers'])->name("allusers");

    Route::get('/allactivity',[AdminController::class,'readLog']);

    Route::resource('/allads',AdController::class);
    Route::resource('/allmessages',\App\Http\Controllers\MessageController::class);
    Route::resource('/allsocials',\App\Http\Controllers\SocialController::class);
    Route::resource('/allsystems',\App\Http\Controllers\GameSystemController::class);
    Route::resource('/allcomments',CommentController::class);
    Route::resource('/allaccounts',AccountController::class);
    Route::resource('/alltables',TableController::class);
});



Route::middleware(['isLogged'])->group(function(){
    Route::get('/account/{account}', [AccountController::class, 'show'])->name('account');
    Route::get('/account/{account}/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account/{account}', [AccountController::class, 'update'])->name('account.update');

    Route::get('/tables', [TableController::class, 'index'])->name('tables');
    Route::get('/tables/create', [TableController::class, 'create'])->name('table.create');
    Route::post('/tables', [TableController::class, 'store'])->name('table.store');

    Route::get('/table/{id}', [TableController::class, 'show'])->name('table');

    Route::get('/table/{id}/edit', [TableController::class, 'edit'])->name('table.edit');
    Route::put('/table/{id}', [TableController::class, 'update'])->name('table.update');
    Route::delete('/table/{id}', [TableController::class, 'destroy'])->name('table.destroy');


    Route::get('/comments/{id}',[CommentController::class,'getCommentsForTable']);
    Route::post('/comments',[CommentController::class,'store'])->name('comment.store');
    Route::get('/comments/{id}/edit',[CommentController::class,'edit'])->name('comment.edit');
    Route::put('/comments/{id}',[CommentController::class,'update'])->name('comment.update');
    Route::delete('/comments/{id}',[CommentController::class,'destroy'])->name('comment.destroy');


////////// ajax
   // Route::get('/alltables',[TableController::class,'getAllTables'])->name("alltables");
    Route::get('/filtertables',[TableController::class,'filterTables'])->name("filtertables");
});


Route::post('/contact',[ContactController::class,'store'])->name('contact.store');

////////// mail send
Route::get('/contactMail',function (\App\Http\Requests\ContactStoreRequest $request){
    $content=[
        'email' => $request->email,
        'subject' => $request->subject,
        'message'=>$request->message
    ];
    \Mail::to('katarina.kalanj.php2@gmail.com')->send(new \App\Mail\Mail($content));

    return response(['feedback'=>'Message sent.']);
});
