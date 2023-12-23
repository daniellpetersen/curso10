<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRequest;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Support::all();

        return view('admin.supports.index', compact('supports'));
    }

     /**
     * Display the specified resource.
     */
    public function show(string|int $support)
    {
        if (!$support = Support::find($support)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateRequest $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index')->with('success','Duvida Cadaastrada com sucesso!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //TODO verificar validação quanto ao voltar
        if (!$support = Support::where('id', $id)->first()) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateRequest $request, $id)
    {
        if (!$support = Support::find($id)){
            return redirect()->back();
        }
  
        $support->update($request->validated());

        return redirect()->route('supports.index')->with('success','Duvida alterada com sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        //TODO verificar validação quanto ao voltar
        if (!$support = Support::where('id', $id)->first()) {
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index')->with('success','Duvida excluída com sucesso!');
    }
}
