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

        return redirect()->route('admin.empresas.index')
            ->with('success', 'Empresa cadastrada com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);

        $request->validate([
            'nome' => 'required',
            'nif' => 'required|unique:empresas,nif,' . $empresa->id,
            'telefone' => 'required',
            'localizacao' => 'required',
        ]);

        $empresa->update([
            'nome' => $request->nome,
            'nif' => $request->nif,
            'telefone' => $request->telefone,
            'localizacao' => $request->localizacao,
        ]);

        return redirect()->back()->with('success', 'Empresa atualizada!');
    }

    public function destroy($id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->delete();

        return redirect()->back()->with('success', 'Empresa excluída!');
    }

    public function listaFuncionario()
    {
        $empresas = Empresa::latest()->get();

        return view('pages.funcionario.empresas.index', compact('empresas'));
    }
}
