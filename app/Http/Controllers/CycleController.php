<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CycleRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $cycles = Cycle::paginate();

        return view('cycle.index', compact('cycles'))
            ->with('i', ($request->input('page', 1) - 1) * $cycles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cycle = new Cycle();

        return view('cycle.create', compact('cycle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CycleRequest $request): RedirectResponse
    {
        $all = $request->validated();
        Cycle::create($all);

        return Redirect::route('cycles.index')
            ->with('success', 'Cycle a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cycle = Cycle::findOrFail($id);

        return view('cycle.show', compact('cycle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cycle = Cycle::findOrFail($id);



        return view('cycle.edit', compact('cycle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CycleRequest $request, Cycle $cycle): RedirectResponse
    {

        if (!$cycle->isWritable) {
            return Redirect::route('cycles.index')
                ->withErrors(['Cycle non modifiable !']);
        }
        $cycle->update($request->validated());

        return Redirect::route('cycles.index')
            ->with('success', 'Cycle a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = Cycle::findOrFail($id);
        if (!$data->isWritable) {
            return Redirect::route('cycles.index')
                ->withErrors(['Cycle non modifiable !']);
        }

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du cycle !" . $th->getMessage()]);
        }
        return Redirect::route('cycles.index')
            ->with('success', 'Cycle a été supprimé(e) avec succes !');
    }
}
