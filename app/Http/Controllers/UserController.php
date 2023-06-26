<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    

    public function index()
    {
        $categorias = Categoria::all();
        $users = User::where('id', '>', '0')
            ->orderBy('id')
            ->paginate(5);

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('users.index', [
            'users' => $users,
            'categorias' => $categorias,
            'juegosEnCarrito' => $juegosEnCarrito
        ]);
    }

    public function show(User $user)
    {
        $categorias = Categoria::all();

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('users.show', [
            'user' => $user,
            'categorias' => $categorias,
            'juegosEnCarrito' => $juegosEnCarrito
        ]);
    }

    public function edit(Request $request, User $user)
    {
        $categorias = Categoria::all();
        $is_checked = ($request->is_checked);

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return view('users.edit', [
            'user' => $user,
            'is_admin' => $is_checked,
            'categorias' => $categorias,
            'juegosEnCarrito' => $juegosEnCarrito
        ]);
    }

    public function update(Request $request, User $user)
    {

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
        ]); 
        return redirect()->route('users.index',
            ['juegosEnCarrito' => $juegosEnCarrito]);
    }

    public function destroy(User $user)
    {
        $user->update([
            'activo' => false,
        ]);

        $arrayCarritoCantidad = ProductoClienteController::getAndSetJuegosEnCarrito();
        $juegosEnCarrito = $arrayCarritoCantidad[1];

        return redirect()
        ->route('users.index',
            ['juegosEnCarrito' => $juegosEnCarrito])
        ->with('status', 'El usuario se ha inactivado');;
    }
}
