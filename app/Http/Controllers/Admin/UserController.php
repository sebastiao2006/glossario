<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required'
        
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,

        // campos de funcionário
        'cargo' => $request->cargo,
        'idade' => $request->idade,
        'id_funcionario' => $request->id_funcionario,
        'numero_computador' => $request->numero_computador,
        'senha_computador' => $request->senha_computador,
        'fim_contrato' => $request->fim_contrato,
    ]);

    return redirect()->back()->with('success', 'Usuário criado com sucesso!');
}
    
   public function index()
    {
        $users = User::all();

        return view('pages.admin.users.index', compact('users'));
    }

}
