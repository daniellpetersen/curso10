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

        return view('admin/supports/index', compact('supports'));
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
        return view('admin/supports/create');
    }

    public function store(Request $request, Support $support)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index')->with('success','Duvida Cadaastrada com sucesso!');
    }

}
