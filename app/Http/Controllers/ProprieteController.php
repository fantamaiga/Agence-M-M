<?php

namespace App\Http\Controllers;

use App\Models\Propriete;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchProprieteRequest;
use App\Http\Requests\ProprieteContactRequest;

class ProprieteController extends Controller
{
    public function index(SearchProprieteRequest $request)
   {
      $query = Propriete::query()->orderBy('created_at', 'desc');

      // if($request->filled('ville')) {
      //    $query->where('ville', 'LIKE', '%'. $request->ville. '%');
      // }
      $prix = $request->validated('prix');
      $surface = $request->validated('surface');
      $nombre_pieces = $request->validated('nombre_pieces');
      $titre = $request->validated('titre');

      if ($prix) {
         $query = $query->where('prix', '<=', $prix);
      }

      if ($surface) {
         $query = $query->where('surface', '>=', $surface);
      }
      if ($nombre_pieces) {
         $query = $query->where('nombre_pieces', '>=', $nombre_pieces);
      }
      if ($titre) {
         $query = $query->where('titre', 'like', "%{$request->input('titre')}%");
      }

      $proprietes = Propriete::paginate(16);
      return view('propriete.index', [
         'proprietes' => $query->paginate(16),
         'input' => $request->validated('')
         // 'title' => 'Liste des propriétés'
      ]);
   }

   public function show(string $slug, Propriete $propriete)
   {
       $expectedslug = $propriete->getslug();
   
       if ($slug !== $expectedslug) {
           return redirect()->route('propriete.show', ['slug' => $expectedslug, 'propriete' => $propriete]);
       }
   
       return view('propriete.show', [
           'propriete' => $propriete
       ]);
   }
   
   public function contact(Propriete $propriete, ProprieteContactRequest $request)
   {
       Mail::send(new PropieteContactMail($propriete, $request->validated()));
       return back()->with('success', 'Votre message a été envoyé avec succès');
   }
   
}

