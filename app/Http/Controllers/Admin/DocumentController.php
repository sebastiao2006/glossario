<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Empresa;


class DocumentController extends Controller
{


public function index()
{
    $documents = Document::all(); // ou com paginação

    return view('pages.admin.documents.index', compact('documents'));
}
public function create()
{
    $empresas = Empresa::all();

    return view('pages.admin.documents.create', compact('empresas'));
}

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'empresa_id' => 'required',
            'file' => 'required|file|max:10240'
        ]);

        $path = $request->file('file')->store('documents', 'public');

        Document::create([
            'titulo' => $request->titulo,
            'empresa_id' => $request->empresa_id,
            'file_path' => $path,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.documents.index');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return back();
    }

/*     public function funcionario()
{
    $user = auth()->user();

    // pegar empresas do funcionário
    $empresaIds = $user->empresas->pluck('id');

    $documents = Document::all();

    return view('pages.funcionario.documents.index', compact('documents'));
} */


public function meusDocumentos()
{
    $empresas = Empresa::with('documents')->get();

    return view('pages.funcionario.documents.index', compact('empresas'));
}
}