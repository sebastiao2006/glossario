<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;

class FuncionariosEmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresa::with('user')->latest()->get();

        return view('pages.admin.funcionarios_empresas.index', compact('empresas'));
    }
}