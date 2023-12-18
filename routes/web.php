<?php

use App\Http\Controllers\CustomerController;
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
Route::get('/', [CustomerController::class, 'index'])->name('customer.index');

/*Route::get('/customer', 
    [CustomerController::class, 'index'])->name('customer.index');
  */
  
  Route::resource('customer', CustomerController::class);
  
/*Route::get('/customer/create', 
    [CustomerController::class, 'create'])->name('customer.create');*/

Route::post('/customer/store',
    [CustomerController::class, 'store'])->name('customer.store');

Route::get('/customer/edit/{id}',
    [CustomerController::class, 'edit'])->name('customer.edit');

    Route::resource('testroute', CustomerController::class);

Route::post('/customer/update/{id}',
    [CustomerController::class, 'update'])->name('customer.update');

/*Route::delete('/customer/destroy/{id}',
    [CustomerController::class, 'destroy'])->name('customer.destroy');
*/


