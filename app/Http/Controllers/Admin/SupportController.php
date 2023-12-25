<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRequest;
use App\Services\SupportService;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(protected SupportService $service)
    {}

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.show', compact('support'));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(StoreUpdateRequest $request, Support $support)
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index')->with('success','Duvida Cadaastrada com sucesso!');
    }

    public function edit(string $id)
    {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreUpdateRequest $request, string $id)
    {
        //dd($request);
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request),
        );

        if (!$support) {
            return back();
        }

        return redirect()->route('supports.index')->with('success','Duvida alterada com sucesso!');
    }

    public function destroy($id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index')->with('success','Duvida excluída com sucesso!');
    }
}
