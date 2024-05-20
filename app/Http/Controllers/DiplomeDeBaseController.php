<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\DiplomeDeBase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DiplomeDeBaseRequest;

class DiplomeDeBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $diplomeDeBases = DiplomeDeBase::paginate();

        return view('diplome-de-base.index', compact('diplomeDeBases'))
            ->with('i', ($request->input('page', 1) - 1) * $diplomeDeBases->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $diplomeDeBase = new DiplomeDeBase();
        $cycles = Cycle::all();

        return view('diplome-de-base.create', compact('diplomeDeBase', 'cycles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiplomeDeBaseRequest $request): RedirectResponse
    {
        $all = $request->validated();
        DiplomeDeBase::create($all);

        return Redirect::route('diplome-de-bases.index')
            ->with('success', 'DiplomeDeBase a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $diplomeDeBase = DiplomeDeBase::findOrFail($id);

        return view('diplome-de-base.show', compact('diplomeDeBase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $diplomeDeBase = DiplomeDeBase::findOrFail($id);
        $cycles = Cycle::all();

        return view('diplome-de-base.edit', compact('diplomeDeBase', 'cycles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DiplomeDeBaseRequest $request, DiplomeDeBase $diplomeDeBase): RedirectResponse
    {
        if ($diplomeDeBase->isWritable == false) {
            return Redirect::route('diplome-de-bases.index')
                ->withErrors('Ce diplome de base ne peut pas être modifié !');
        }
        $all = $request->validated();
        $diplomeDeBase->update($all);

        return Redirect::route('diplome-de-bases.index')
            ->with('success', 'DiplomeDeBase a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = DiplomeDeBase::findOrFail($id);
        if ($data->isWritable == false) {
            return Redirect::route('diplome-de-bases.index')
                ->withErrors('Ce diplome de base ne peut pas être supprimé !');
        }
        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du DiplomeDeBase !" . $th->getMessage()]);
        }


        return Redirect::route('diplome-de-bases.index')
            ->with('success', 'DiplomeDeBase a été supprimé(e) avec succes !');
    }
}
