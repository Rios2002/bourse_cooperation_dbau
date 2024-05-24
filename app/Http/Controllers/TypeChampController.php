<?php

namespace App\Http\Controllers;

use App\Models\TypeChamp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TypeChampRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TypeChampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $typeChamps = TypeChamp::paginate();

        return view('type-champ.index', compact('typeChamps'))
            ->with('i', ($request->input('page', 1) - 1) * $typeChamps->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $typeChamp = new TypeChamp();

        return view('type-champ.create', compact('typeChamp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeChampRequest $request): RedirectResponse
    {
        $all = $request->validated();
        TypeChamp::create($all);

        return Redirect::route('type-champs.index')
            ->with('success', 'TypeChamp a été créé(e) avec succes !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $typeChamp = TypeChamp::findOrFail($id);
        $attributs = $typeChamp->attributTypeChamps()->get();

        return view('type-champ.show', compact('typeChamp', 'attributs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $typeChamp = TypeChamp::findOrFail($id);

        return view('type-champ.edit', compact('typeChamp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TypeChampRequest $request, TypeChamp $typeChamp): RedirectResponse
    {
        $all = $request->validated();
        $typeChamp->update($all);

        return Redirect::route('type-champs.index')
            ->with('success', 'TypeChamp a été mis(e) à jour avec succes !');
    }

    public function destroy($id): RedirectResponse
    {
        $data = TypeChamp::findOrFail($id);

        try {
            $data->delete();
        } catch (\Throwable $th) {
            return redirect()->back()
                ->withErrors(["Une erreur s'est produite lors de la suppression du TypeChamp !" . $th->getMessage()]);
        }


        return Redirect::route('type-champs.index')
            ->with('success', 'TypeChamp a été supprimé(e) avec succes !');
    }
}
