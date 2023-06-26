<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Categoria;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias = Categoria::all();
        $productos = Producto::all();
        
        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('home',
            ['categorias' => $categorias, 
            'juegosEnCarrito' => $juegosEnCarrito,
            'productos' => $productos]
        );

    }

    public function contacto(){
        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('contacto.show',
        ['categorias' => $categorias], 
        ['juegosEnCarrito' => $juegosEnCarrito]);
    }

    public function nosotros(){

        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('nosotros.show',
        ['categorias' => $categorias], 
        ['juegosEnCarrito' => $juegosEnCarrito]);
    }

    // public function show(){
        
    //     $productos = Producto::all();

    //     return view('productosCliente.show',
    //         ['productos' => $productos]);

    // }
}
