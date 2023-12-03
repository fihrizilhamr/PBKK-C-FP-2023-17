<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\PaymentController;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $latestArticles = Article::latest()->take(3)->get();
    
    return view('home', ['latestArticles' => $latestArticles]);
})->name('home');

Route::get('/signup', [SignUpController::class, 'showForm'])->name('signup');
Route::post('/signup', [SignUpController::class, 'submitForm']);

Route::get('/auth', function () {
    return view('welcome');
});

Route::get('/listarticles', [ArticleController::class, 'showArticles'])->name('list-articles');
Route::get('/viewarticle/{id}', [ArticleController::class, 'view'])->name('article.view');

Route::get('/myarticles', [ArticleController::class, 'myArticle'])->name('list-myarticles');
Route::get('/myarticle/edit/{id}', [ArticleController::class, 'editArticle'])->name('article.edit');
Route::put('/myarticle/update/{id}', [ArticleController::class, 'updateArticle'])->name('article.update');
Route::get('/myarticle/delete/{id}', [ArticleController::class,'deleteArticle'])->name('article.delete');

Route::get('/myarticle/create', [ArticleController::class,'createArticle'])->name('article.create');
Route::post('/myarticle/submit/{id}', [ArticleController::class,'submitArticle'])->name('article.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/listusers', [AuthController::class, 'showUsers'])->name('list-users');
    Route::get('/edit/{id}', [AuthController::class, 'edit'])->name('user.edit');
    Route::post('/update/{id}', [AuthController::class, 'update'])->name('user.update');
    Route::get('/delete/{id}', [AuthController::class,'delete'])->name('user.delete');

    // Trainer list
    Route::get('/listtrainers', [TrainerController::class, 'showTrainers'])->name('list-trainers');
    Route::get('/picktrainer/{id}', [TrainerController::class, 'pickTrainer'])->name('pick-trainer');
    



    
    Route::post('/checkout', [PaymentController::class, 'showCheckout'])->name('checkout-trainer');

    Route::post('/payment/{id}', [PaymentController::class, 'createPayment']);
    Route::get('/payment-status/{id}', [PaymentController::class, 'showStatus']);
});

require __DIR__.'/auth.php';
