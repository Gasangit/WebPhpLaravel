<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductoClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientePassController;
use App\Http\Controllers\contactoController;


//HOME
Route::get('/', function () {
    return view('welcome');
});

//MIDDLEWARE (solo usuarios activos pueden navegar)
Route::group(['middleware' => ['activo']], function(){
    //MIDDLEWARE (solo las url con usuario logueado podrán entrar)
    Route::group( [ 'middleware' => ['is_admin'] ] , function(){
        //CATEGORIAS PANEL
        Route::resource('categorias', CategoriaController::class);
        //PRODUCTOS PANEL
        Route::resource('productos', ProductoController::class);
        //USUARIOS PANEL
        Route::resource('users', UserController::class);

    });

// PRODUCTOS CLIENTES -> Falta terminar

Route::get('/productoscli/{objetoCategoria}', [ProductoClienteController::class, 'index'])->name('productoscli.index');
Route::get('/productoscli/juego/{objetoProducto}', [ProductoClienteController::class, 'show'])->name('productoscli.show');
Route::get('/productoscli/create/{objetoProducto}', [ProductoClienteController::class, 'create'])->name('productoscli.create');
Route::get('/productoscli/delete/{objetoProducto}', [ProductoClienteController::class,  'delete'])->name('productoscli.delete');
Route::get('/verCarrito', [ProductoClienteController::class, 'verCarrito'])->name('productoscli.verCarrito');

Route::get('/contacto', [HomeController::class, 'contacto'])->name('contacto.show');
Route::get('/nosotros', [HomeController::class, 'nosotros'])->name('nosotros.show');
Route::get('/contacto/respuesta', [contactoController::class, 'respuestaContacto'])->name('respuesta.contacto');

Route::get('/comprar', [ProductoClienteController::class, 'comprar'])->name('comprar');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});



Route::get('/bye', [App\Http\Controllers\ByeController::class, 'index'])->name('bye');
Auth::routes();

