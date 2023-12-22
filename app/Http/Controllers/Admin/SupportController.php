<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {

        $supports = Support::all();

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $support)
    {
        if (!$support = Support::find($support)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index')->with('success','Duvida Cadaastrada com sucesso!');
    }

    public function edit(Request $request, $id)
    {
        //TODO verificar validação quanto ao voltar
        if (!$support = Support::where('id', $id)->first()) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(Request $request, $id)
    {
        if (!$support = $request->find($id)){
            return back();
        }

        $support->update($request);

        return redirect()->route('supports.index')->with('success','Duvida alterada com sucesso!');

    }

}
