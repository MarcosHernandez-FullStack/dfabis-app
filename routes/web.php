<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Prueba;
use App\Http\Livewire\Pedido\MesaComponent;
use App\Http\Livewire\Pedido\PedidoFormComponent;

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
    return view('welcome');
});

Route::get('/prueba', Prueba::class)->name('prueba'); 
Route::get('/mesas', MesaComponent::class)->name('mesas'); 
Route::get('/pedidoform/{mesa_id}', PedidoFormComponent::class)->name('pedidoform'); 
