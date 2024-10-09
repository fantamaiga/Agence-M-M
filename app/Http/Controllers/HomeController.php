<?php

namespace App\Http\Controllers;

use App\Models\Propriete;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the latest properties on the homepage.
     */
    public function index()
    {
        // Récupérer les 4 dernières propriétés créées
        $proprietes = Propriete::orderBy('created_at', 'desc')->limit(4)->get();

        // Retourner la vue avec les propriétés récupérées
        return view('home', ['proprietes' => $proprietes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Code pour afficher un formulaire de création
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Code pour gérer la sauvegarde des nouvelles ressources
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Code pour afficher une ressource spécifique
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Code pour afficher un formulaire d'édition
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Code pour mettre à jour une ressource spécifique
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Code pour supprimer une ressource spécifique
    }
}
