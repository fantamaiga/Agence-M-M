<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchProprieteRequest;
use App\Models\Propriete;

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

   public function show(string $slug, Propriete $bien)
   {
      $expectedslug = $propriete->getslug();
      if ($slug == $expectedslug) {
         return to_route('propriete.show', ['slug' => $expectedslug, 'propriete' => $propriete]);
      }
      return view('propriete.show', [
         'propriete' => $propriete
      ]);
   }
}

