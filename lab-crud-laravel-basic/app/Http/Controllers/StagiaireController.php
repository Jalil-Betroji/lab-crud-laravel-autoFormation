<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    public function showData(){
        $stagiaires = Stagiaire::paginate(3);
        return view('home' ,compact('stagiaires'));
    }
    public function addStagiaire(Request $request){
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
        ]);

        $stagiaire = new Stagiaire;
        $stagiaire->nom = $validatedData['nom'];
        $stagiaire->prenom = $validatedData['prenom'];
        $stagiaire->email = $validatedData['email'];

        $stagiaire->save();
        return back()->with('success' , 'Stagiaire a été ajouté avec succées');
    }
    public function edit($id){
        $stagiaire = Stagiaire::find($id);
        return view('/edit' , ['profil'=>$stagiaire]);
    }
    public function updateStagiaire(Request $request , $id){
       $validatedData = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required | email|unique:stagiaire,email,' . $id,
       ]);
       $stagiaire = Stagiaire::findOrFail($id);
       $stagiaire->update([
        'nom' =>$request->input('nom'),
        'prenom' => $request->input('prenom'),
        'email'=> $request->input('email'),
       ]);
       return back()->with('success' , 'Stagiaire a été mis à jour avec succès');
    }
    public function searchStagiaire(Request $request)
    {
        $searchQuery = $request->input('search');

        $results = Stagiaire::where('nom', 'like', '%' . $searchQuery . '%')
            ->orWhere('prenom', 'like', '%' . $searchQuery . '%')
            ->paginate(2);

        return response()->json([
            'data' => $results->items(),
            'links' => $results->links()->toHtml(),
        ]);
    }
    public function deleteStagiaire(Request $request , $id){
        $stagiaire = Stagiaire::findOrFail($id);

        if($stagiaire){
            $stagiaire->delete();
        }
        return back()->with('success' , 'le stagiaire a été supprimer avec succés');
    }
}
