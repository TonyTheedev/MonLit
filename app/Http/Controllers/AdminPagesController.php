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
        $marques = DB::select('select id_marque, nom_marque from marque');
        return view("BackOfficeAdmin.nouveauProduit", compact("marques"));
    }

    public function AjoutNouveauProduit(Request $request)
    {
        // $nom_produit = $request->nom_produit;
        // $qtt_stock = $request->qtt_stock;
        // $min_qtt_stock = $request->min_qtt_stock;
        // $max_qtt_stock = $request->max_qtt_stock;
        // $typeProduit = $request->typeProduit;
        // DB::select(DB::raw("insert into produit(nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
        //                     values('$nom_produit', $qtt_stock, $min_qtt_stock, $max_qtt_stock, $typeProduit)"));

        if (isset($request->colorInput0)) {
            echo $request->colorInput0;
            // $couleur1 = $request->colorInput0;
        }
        // DB::select(DB::raw("insert into couleur(valeur_couleur) values('$couleur1');"));
        // return view("BackOfficeAdmin.listeProduits");
    }

    //*********************** */
    public function NosMarques()
    {
        $marques = DB::select('select * from marque');
        return view("BackOfficeAdmin.NosMarques", compact("marques"));
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
        return Redirect("/Admin/NosMarques");
    }

    public function SupprimerMarque($id_marque)
    {
        // todo : requis la supression des produit aussi !
        // todo : supression de la photo
        DB::select(DB::raw("delete from type_produit where type_produit.marque_ = $id_marque;"));
        DB::select(DB::raw("delete from marque where marque.id_marque = $id_marque;"));
        return Redirect("/Admin/NosMarques");
    }

    //****************** types */
    public function ImportTypes(Request $request)
    {
        $types_de_marque = DB::select("select id_type, libelle_type from type_produit where type_produit.marque_ = " . $request->get('id_marque'));
        echo json_encode($types_de_marque);
    }
}
