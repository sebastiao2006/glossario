<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $empresas = Empresa::latest()->get();
        return view('pages.admin.empresas.index', compact('empresas'));
    }

    public function create()
    {
        return view('pages.admin.empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'nif' => 'required|unique:empresas',
            'telefone' => 'required',
            'localizacao' => 'required',
        ]);

        Empresa::create([
            'nome' => $request->nome,
            'nif' => $request->nif,
            'telefone' => $request->telefone,
            'localizacao' => $request->localizacao,
            'senha_portal' => $request->senha_portal,
        ]);

        return redirect()->route('pages.admin.empresas.index')
            ->with('success', 'Empresa cadastrada com sucesso!');
    }
}
