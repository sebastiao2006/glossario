<?php

namespace App\Http\Controllers\Funcionario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\RegularizacaoEmpresa;

class MyEmpresaController extends Controller
{
    public function index()
{
    $empresas = auth()->user()
        ->empresas()
        ->with('regularizacoes')
        ->get();

    return view('pages.funcionario.my-empresas', compact('empresas'));
}


public function storeRegularizacao(Request $request, $empresaId)
{
    $request->validate([
        'situacao' => 'required|string',
        'checklist' => 'nullable|array',
        'documentos.*' => 'nullable|file'
    ]);

    $files = [];

    if ($request->hasFile('documentos')) {
        foreach ($request->file('documentos') as $file) {
            $files[] = $file->store('regularizacoes', 'public');
        }
    }

    RegularizacaoEmpresa::create([
        'empresa_id' => $empresaId,
        'user_id' => auth()->id(),
        'situacao' => $request->situacao,
        'checklist' => json_encode($request->checklist),
        'documentos' => json_encode($files),
    ]);

    return back()->with('success', 'Regularização enviada com sucesso!');
}


public function finalizar($empresaId)
{
    $empresa = Empresa::where('id', $empresaId)
        ->where('user_id', auth()->id())
        ->firstOrFail();

    $empresa->regularizacoes()->create([
        'user_id' => auth()->id(),
        'situacao' => 'finalizada',
        'checklist' => json_encode([]),
        'status' => 'finalizada',
    ]);

    return back()->with('success', 'Empresa finalizada!');
}
public function updateRegularizacao(Request $request, $empresaId)
{
    $request->validate([
        'situacao' => 'required|string',
        'checklist' => 'nullable|array',
        'checklist.*' => 'nullable|string',
    ]);

    $reg = RegularizacaoEmpresa::where('empresa_id', $empresaId)
        ->where('user_id', auth()->id())
        ->latest()
        ->first();

    if (!$reg) {
        return back()->with('error', 'Nenhuma regularização encontrada.');
    }

    $reg->update([
        'situacao' => $request->situacao,
        'checklist' => json_encode($request->checklist ?? []),
    ]);

    return back()->with('success', 'Regularização atualizada com sucesso!');
}
}