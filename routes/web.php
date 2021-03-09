<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use Carbon\Carbon;

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

Route::get('/', [CustomersController::class, 'index'])->name('customers.index');

Route::post('/add', [CustomersController::class, 'addCustomer'])->name('customer.add');

// Route::get('/time', function(){
//     $current = new Carbon();
//     // $current->timezone('Europe/London');
//     echo $current->format('Y-m-d');
// });