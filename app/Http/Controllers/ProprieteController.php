<?php

namespace App\Http\Controllers;

use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Requests\SearchProprieteRequest;
use App\Http\Requests\ProprieteContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProprieteContactMail;

class ProprieteController extends Controller
{
    /**
     * Display a listing of the properties based on search criteria.
     */
    public function index(SearchProprieteRequest $request)
    {
        // Initialiser la requête pour les propriétés, triées par date de création
        $query = Propriete::query()->orderBy('created_at', 'desc');

        // Récupérer les critères de recherche validés
        $prix = $request->validated('prix');
        $surface = $request->validated('surface');
        $nombre_pieces = $request->validated('nombre_pieces');
        $titre = $request->validated('titre');

        // Appliquer les filtres selon les valeurs présentes dans la requête
        if ($prix) {
            $query->where('prix', '<=', $prix);
        }

        if ($surface) {
            $query->where('surface', '>=', $surface);
        }

        if ($nombre_pieces) {
            $query->where('nombre_pieces', '>=', $nombre_pieces);
        }

        if ($titre) {
            $query->where('titre', 'like', "%{$titre}%");
        }

        // Exécuter la requête et paginer les résultats
        $proprietes = $query->paginate(16);

        // Retourner la vue avec les propriétés filtrées
        return view('propriete.index', [
            'proprietes' => $proprietes,
            'input' => $request->validated()
        ]);
    }

    /**
     * Display the details of a single property.
     */
    public function show(string $slug, Propriete $propriete)
    {
        // Vérifier si le slug est correct, sinon rediriger avec le bon slug
        $expectedSlug = $propriete->getSlug();

        if ($slug !== $expectedSlug) {
            return redirect()->route('propriete.show', ['slug' => $expectedSlug, 'propriete' => $propriete]);
        }

        // Retourner la vue avec les détails de la propriété
        return view('propriete.show', [
            'propriete' => $propriete
        ]);
    }

    /**
     * Handle property contact form submission.
     */
    public function contact(Propriete $propriete, ProprieteContactRequest $request)
    {
        // Envoyer l'email via la classe ProprieteContactMail
        Mail::send(new ProprieteContactMail($propriete, $request->validated()));

        // Retourner un message de succès à l'utilisateur
        return back()->with('success', 'Votre message a été envoyé avec succès');
    }
}
