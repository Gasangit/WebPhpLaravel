<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    public function index(){
        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('categorias.index', [
            'categorias' => $categorias,
            'juegosEnCarrito' => $juegosEnCarrito
        ]);
    }

    public function show(Categoria $categoria)
    {
        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('categorias.show', [
            'categoria' => $categoria,
            'juegosEnCarrito' => $juegosEnCarrito
        ]);
    }

    public function create()
    {
        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

       return view('categorias.create', [
            'categorias' => $categorias,
            'juegosEnCarrito' => $juegosEnCarrito
       ]);
    }

    public function store(Request $request)
    {
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

       return redirect()
       ->route('categorias.index', [
        'juegosEnCarrito' => $juegosEnCarrito
        ])
       ->with('status', 'La Categoría se ha agregado correctamente');;;
    }

}
