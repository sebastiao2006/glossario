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
    ->with(['regularizacoes' => function ($q) {
        $q->latest();
    }])
    ->get();

        return view('pages.funcionario.my-empresas', compact('empresas'));
    }

    // ================= CREATE =================
    public function storeRegularizacao(Request $request, $empresaId)
    {
        $request->validate([
            'situacao' => 'required|string',
            'observacao' => 'nullable|string',
            'checklist' => 'nullable|array',
            'checklist.*' => 'nullable|string',
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
            'status' => $request->situacao, // mantém sincronizado
            'observacao' => $request->observacao,
            'checklist' => json_encode($request->checklist ?? []),
            'documentos' => json_encode($files),
        ]);

        return back()->with('success', 'Regularização enviada com sucesso!');
    }

    // ================= FINALIZAR =================
    public function finalizar($empresaId)
    {
        $reg = RegularizacaoEmpresa::where('empresa_id', $empresaId)
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        if (!$reg) {
            return back()->with('error', 'Nenhuma regularização encontrada.');
        }

        $reg->update([
            'situacao' => 'finalizada',
            'status' => 'finalizada',
        ]);

        return back()->with('success', 'Empresa finalizada!');
    }

    // ================= UPDATE COMPLETO =================
    public function updateRegularizacao(Request $request, $empresaId)
    {
        $request->validate([
            'situacao' => 'required|string',
            'observacao' => 'nullable|string',
            'checklist' => 'nullable|array',
            'checklist.*' => 'nullable|string',
            'documentos.*' => 'nullable|file',
        ]);

        $reg = RegularizacaoEmpresa::where('empresa_id', $empresaId)
            ->where('user_id', auth()->id())
            ->latest()
            ->first();

        if (!$reg) {
            return back()->with('error', 'Nenhuma regularização encontrada.');
        }

        // ================= DOCUMENTOS =================
        $existingFiles = json_decode($reg->documentos ?? '[]', true);
        $newFiles = [];

        if ($request->hasFile('documentos')) {
            foreach ($request->file('documentos') as $file) {
                $newFiles[] = $file->store('regularizacoes', 'public');
            }
        }

        $allFiles = array_merge($existingFiles, $newFiles);

        // ================= UPDATE =================
        $reg->update([
            'situacao' => $request->situacao,
            'status' => $request->situacao,
            'observacao' => $request->observacao,
            'checklist' => json_encode($request->checklist ?? []),
            'documentos' => json_encode($allFiles),
        ]);

        return back()->with('success', 'Regularização atualizada com sucesso!');
    }
}