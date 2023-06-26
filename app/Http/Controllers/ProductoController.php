<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();
        $productos = Producto::where('id', '>', '0')
            ->orderBy('nombre')
            ->paginate(5);

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('productos.index', [
            'productos' => $productos,
            'categorias' => $categorias,
            'juegosEnCarrito' => $juegosEnCarrito
        ]);
    }


    public function create()
    {
        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('productos.create', [
            'categorias' => $categorias,
            'juegosEnCarrito' => $juegosEnCarrito
        ]);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'nombre' => 'required|max:255',
        'desarrollador' => 'required|max:255',
        'lanzamiento' => 'numeric|min:1900|max:9999',
        'genero' => 'required|max:255',
        'descripcion' => 'required',
        'precio' =>'numeric|min:1|max:999999999',
        'categoria_id' => 'required',
        'imagen' => 'required|mimes:jpg,png,bmp',
        'video' => 'required'
        ]);

        if($validator->fails()){

            $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
            $juegosEnCarrito = $arrayCarritoCantidad[1];

            return redirect()
            ->route('productos.create',
            ['juegosEnCarrito' => $juegosEnCarrito])
            ->withErrors($validator)
            ->withInput();
        }

        //SI LA VALIDACION PASO:

        //Guardamos el nombre del archivo modificando el nombre original del cliente con un time
        $imagen_nombre = time() . $request->file('imagen')->getClientOriginalName();
        //Subimos el archivo a una carpeta del proyecto y guardamos el nombre con el que se subio el archivo
        $imagen = $request->file('imagen')->storeAs('productos', $imagen_nombre, 'public');

        Producto::create([
            'nombre' => $request->nombre,
            'desarrollador' => $request->desarrollador,
            'lanzamiento' => $request->lanzamiento,
            'genero' => $request->genero,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'categoria_id' => $request->categoria_id,
            'imagen' => $imagen,
            'video' => $request->video,
        ]);

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];
        
       return redirect()
       ->route('productos.index',
       ['juegosEnCarrito' => $juegosEnCarrito])
       ->with('status', 'El juego se ha agregado correctamente');;;
    }

    public function show(Producto $producto)
    {
        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('productos.show',[
            'producto' => $producto,
            'categorias' => $categorias,
            'juegosEnCarrito' => $juegosEnCarrito        
        ]);
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('productos.edit',[
            'producto' => $producto,
            'categorias' => $categorias,
            'juegosEnCarrito' => $juegosEnCarrito
        ]);
    }

    public function update(Request $request, Producto $producto)
    {
       
        $rules= [
            'nombre' => 'required|max:255',
            'desarrollador' => 'required|max:255',
            'lanzamiento' => 'numeric|min:1900|max:9999',
            'genero' => 'required|max:255',
            'descripcion' => 'required',
            'precio' =>'numeric|min:1|max:999999999',
            'categoria_id' => 'required',
            'imagen' => 'required|mimes:jpg,png,bmp',
            'video' => 'required'
        ];

        //Solamente valido la imagen si el usuario están intentando subirla.
        if($request->file('imagen')){
            $rules['imagen'] = 'required|mimes:jpg,png,bmp';
        }

        $validator = Validator::make($request->all(), $rules);

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        if($validator->fails()){
            return redirect()
            ->route('productos.edit', ['producto' => $producto, 
                'juegosEnCarrito' => $juegosEnCarrito])
            ->withErrors($validator)
            ->withInput();
        }

        $data = [
            'nombre' => $request->nombre,
            'desarrollador' => $request->desarrollador,
            'lanzamiento' => $request->lanzamiento,
            'genero' => $request->genero,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'en_oferta' => $request->en_oferta,
            'categoria_id' => $request->categoria_id,
            'video' => $request->video,
        ];

        //Guardamos el nuevo archivo.
        if($request->file('imagen')){
            //Guardamos el nombre del archivo, modificando el nombre original del cliente con time.
            $imagen_nombre = time() . $request->file('imagen')->getClientOriginalName();
            //Subimos el archivo a una carpeta del proyecto y guardamos el nombre con el que subió el archivo.
            $imagen = $request->file('imagen')->storeAs('productos', $imagen_nombre, 'public');
            //Elimina la imagen vieja.
            Storage::delete('public/' . $producto->imagen);
            $data['imagen'] = $imagen;
        }

        $producto->update($data);

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return redirect()
        ->route('productos.index', [
            'juegosEnCarrito' => $juegosEnCarrito])
        ->with('status', 'El juego se ha modificado correctamente');
    }

    public function destroy(Producto $producto)
    {
        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        if($producto->activo == 1){
            $producto->update([
                'activo' => false,
            ]);

            return redirect()
        ->route('productos.index', [
            'juegosEnCarrito' => $juegosEnCarrito])
        ->with('status', 'El juego se ha inactivado');;
        } else {
            $producto->update([
                'activo' => true,
            ]);

            return redirect()
        ->route('productos.index', [
            'juegosEnCarrito' => $juegosEnCarrito])
        ->with('status', 'El juego se ha activado');;
        }
    }
}
