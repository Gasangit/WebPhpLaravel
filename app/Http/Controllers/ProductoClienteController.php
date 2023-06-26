<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categoria;
use App\Models\Producto;

class ProductoClienteController extends Controller
{
    public static function getAndSetJuegosEnCarrito(){
        if(session('arrayCarrito') != null){
            $arrayCarrito = session('arrayCarrito');
            $totalAPagar = 0;
            
            foreach($arrayCarrito as $juego){
                $totalAPagar += $juego->precio;
            }
        }else{
            $arrayCarrito = array();
            $totalAPagar = 0;
        }
        $juegosEnCarrito = count($arrayCarrito);
        session('juegosEnCarrito', $juegosEnCarrito);
        session('totalAPagar', $totalAPagar);

        $arrayCarritoCantidad = [$arrayCarrito, $juegosEnCarrito, $totalAPagar];
        return $arrayCarritoCantidad;
    }

    public function index(Categoria $objetoCategoria){
        
        $categorias = Categoria::all();
        $productos = Producto::where('categoria_id', $objetoCategoria->id)->get();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $arrayCarrito = $arrayCarritoCantidad[0];
        $juegosEnCarrito = $arrayCarritoCantidad[1];
        $totalAPagar = $arrayCarritoCantidad[2];

        return view('productosCliente.index',
            ['productos' => $productos,
            'categorias' => $categorias, 
            'juegosEnCarrito' => $juegosEnCarrito,
            'totalAPagar' => $totalAPagar]
        );
    }

    public function show(Producto $objetoProducto){
        
        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $arrayCarrito = $arrayCarritoCantidad[0];
        $juegosEnCarrito = $arrayCarritoCantidad[1];
        $totalAPagar = $arrayCarritoCantidad[2];

        return view('productosCliente.show',
        ['objetoProducto' => $objetoProducto,
        'categorias' => $categorias, 
        'juegosEnCarrito' => $juegosEnCarrito,
        'totalAPagar' => $totalAPagar]);
    }

    public function create(Producto $objetoProducto){
        //agrega los productos al carrito

        $categorias = Categoria::all();
        $juegoRepetido = false;

        if(session('arrayCarrito') !== null){

            $arrayCarrito = session('arrayCarrito');
            
            foreach ($arrayCarrito as  $juego) {
                if ($juego->id === $objetoProducto->id) {

                    $juegoRepetido = true;
                    break;
                }   
            }

            if($juegoRepetido == false){
                array_push($arrayCarrito, $objetoProducto);  
            }

        }else{

            $arrayCarrito=array();
            array_push($arrayCarrito, $objetoProducto);
        }
        
        session(['arrayCarrito' => $arrayCarrito]);

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $arrayCarrito = $arrayCarritoCantidad[0];
        $juegosEnCarrito = $arrayCarritoCantidad[1];
        $totalAPagar = $arrayCarritoCantidad[2];
        

        return view('carrito.create',
                    ['categorias' => $categorias, 
                    'arrayCarrito' => $arrayCarrito,
                    'juego' => $objetoProducto, 
                    'juegosEnCarrito' => $juegosEnCarrito,
                    'totalAPagar' => $totalAPagar]);
    }

    public function delete(Producto $objetoProducto){

        $categorias = Categoria::all();

        $arrayCarrito = session('arrayCarrito');
        
        $count = -1;
        foreach($arrayCarrito as $juego){
            $count += 1;
            if($juego->id === $objetoProducto->id){
                
                array_splice($arrayCarrito, $count, 1);
                session(['arrayCarrito' => $arrayCarrito]);
            }
        }

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $arrayCarrito = $arrayCarritoCantidad[0];
        $juegosEnCarrito = $arrayCarritoCantidad[1];
        $totalAPagar = $arrayCarritoCantidad[2];

        return view('carrito.create', 
                    ['arrayCarrito' => $arrayCarrito,
                    'categorias' => $categorias, 
                    'juegosEnCarrito' => $juegosEnCarrito, 
                    'juegosEnCarrito' => $juegosEnCarrito,
                    'totalAPagar' => $totalAPagar]);

    }

    public function verCarrito(){

        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $arrayCarrito = $arrayCarritoCantidad[0];
        $juegosEnCarrito = $arrayCarritoCantidad[1];
        $totalAPagar = $arrayCarritoCantidad[2];

        return view('carrito.create', 
                    ['arrayCarrito' => $arrayCarrito, 
                    'categorias' => $categorias, 
                    'juegosEnCarrito' => $juegosEnCarrito,
                    'totalAPagar' => $totalAPagar]);

    }

    public function comprar(){

        $categorias = Categoria::all();
        
        if(session('arrayCarrito') != null){
            $arrayCarrito = session('arrayCarrito');
            if(count($arrayCarrito) > 0){
                $arrayCarrito = array();
                session(['arrayCarrito' => $arrayCarrito]);

                $juegosEnCarrito = 0;

                return view('carrito.compra', [
                    'categorias' => $categorias,
                    'juegosEnCarrito' => $juegosEnCarrito
                ]);
             }else{
                $arrayCarrito = array();
                return view('carrito.create', [
                    'categorias' => $categorias,
                    'arrayCarrito' => $arrayCarrito]);
            }

        }else{

            $arrayCarrito = array();
            return view('carrito.create', [
                'categorias' => $categorias,
                'arrayCarrito' => $arrayCarrito]);
        }

    }

    
}
