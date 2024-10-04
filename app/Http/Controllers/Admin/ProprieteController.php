<?php

namespace App\Http\Controllers\Admin;
use App\Models\Propriete;
use App\Models\Option;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProprieteFormRequest;
use App\Http\Controllers\Admin\fill;


class ProprieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.proprietes.index',[
            'proprietes' => Propriete::orderBy
             ('created_at', 'desc')->paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Créer une nouvelle instance du modèle Propriete
        $propriete = new Propriete();

        // Utiliser la méthode fill sur l'instance du modèle $propriete
        $propriete->fill([
            'surface' => 40,
            'nombre_pieces' => 3,
            'nombre_chambres' => 1,
            'num_etage' => 0,
            'ville' => 'Conakry',
            'quartier' => 'Kobaya',
            'statut' => false, 
        ]);
        return view('admin.proprietes.form', [
            'propriete' => $propriete,
            'options' => Option::pluck('nom', 'id'),
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ProprieteFormRequest $request)
    {
        $propriete = Propriete::create($request->validated());
        $propriete->options()->sync($request->validated('options'));
        return to_route('admin.propriete.index')
            ->with('success', 'Bien créée avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propriete $propriete)
    {
        return view('admin.proprietes.form', [
            'propriete' => $propriete,
            'options' => Option::pluck('nom', 'id'),

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProprieteFormRequest $request, Propriete $propriete)
    {
        $propriete->update($request->validated());
        $propriete->options()->sync($request->validated('options'));
        return to_route('admin.propriete.index')->with('success', 'Bien modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propriete $propriete)
    {
        $propriete->delete();
        return to_route('admin.propriete.index')->with('success', 'Bien suprimé avec succès');
    }
}
