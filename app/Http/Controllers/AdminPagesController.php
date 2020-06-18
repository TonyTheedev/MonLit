<?php

namespace App\Http\Controllers;

use DB;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminPagesController extends Controller
{
    public function Accueil()
    {
        return view("BackOfficeAdmin.Accueil");
    }

    public function ListeProduits()
    {
        return view("BackOfficeAdmin.listeProduits");
    }

    public function NouveauProduit()
    {
        return view("BackOfficeAdmin.nouveauProduit");
    }

    public function AjoutNouveauProduit()
    {
        //ajout de produit
        return view("BackOfficeAdmin.listeProduits");
    }

    //*********************** */
    public function NouvelleMarque()
    {
        $marques = DB::select('select * from marque');
        return view("BackOfficeAdmin.nouvelleMarque", compact("marques"));
    }
    
    public function AjoutNouvelleMarque(Request $request)
    {
        $request->inpFile1->store('images', 'public');
        $file = $request->inpFile1;
        $path = $request->nomMarque . '.jpg';
        $file->move(public_path() . '/images/', $path);
        $nomMarque = $request->nomMarque;
        $slogganMarque = $request->slogganMarque;
        $descriptionMarque = $request->descriptionMarque;
        DB::select(DB::raw("insert into marque(nom_marque,sloggan_marque,description_marque,logo_marque) VALUES ('$nomMarque','$slogganMarque','$descriptionMarque','/images/$path');"));
        $idmarque = collect(
            DB::select("select id_marque from marque where marque.nom_marque = '$nomMarque'")
        )->first()->id_marque;
        for ($i = 0; $i < $request->nbrTotalOptions; $i++) {
            $libelle_type = $request->get("labelOption$i");
            DB::select(DB::raw("insert into type_produit(libelle_type,marque_) VALUES('$libelle_type', $idmarque)"));
        }
        return $this->NouvelleMarque();
    }
}
