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
        $produits = DB::select("select * from produit ");
        return view("BackOfficeAdmin.listeProduits", compact("produits"));
    }

    public function NouveauProduit()
    {
        $marques = DB::select('select id_marque, nom_marque from marque');
        return view("BackOfficeAdmin.nouveauProduit", compact("marques"));
    }

    public function AjoutNouveauProduit(Request $request)
    {
        $nom_produit = $request->nom_produit;
        $qtt_stock = $request->qtt_stock;
        $min_qtt_stock = $request->min_qtt_stock;
        $max_qtt_stock = $request->max_qtt_stock;
        $typeProduit = $request->typeProduit;
        DB::select(DB::raw("insert into produit(nom_produit, qtt_stock, min_qtt_stock, max_qtt_stock, type_)
                            values('$nom_produit', $qtt_stock, $min_qtt_stock, $max_qtt_stock, $typeProduit)"));

        if (isset($request->color0)) {
            DB::select(DB::raw("insert into couleur(valeur_couleur) values('$request->color0');"));
            DB::select(DB::raw("insert into possession_couleur(produit_,couleur_)
                     values(
                       (select id_produit from produit where produit.nom_produit = '$nom_produit' limit 1),
                       (select id_couleur from couleur where valeur_couleur = '$request->color0' limit 1)
                            )"));
        }
        if (isset($request->color1)) {
            DB::select(DB::raw("insert into couleur(valeur_couleur) values('$request->color1');"));
            DB::select(DB::raw("insert into possession_couleur(produit_,couleur_)
                     values(
                       (select id_produit from produit where produit.nom_produit = '$nom_produit' limit 1),
                       (select id_couleur from couleur where valeur_couleur = '$request->color1' limit 1)
                            )"));
        }
        if (isset($request->color2)) {
            DB::select(DB::raw("insert into couleur(valeur_couleur) values('$request->color2');"));
            DB::select(DB::raw("insert into possession_couleur(produit_,couleur_)
                     values(
                       (select id_produit from produit where produit.nom_produit = '$nom_produit' limit 1),
                       (select id_couleur from couleur where valeur_couleur = '$request->color2' limit 1)
                            )"));
        }
        if (isset($request->color3)) {
            DB::select(DB::raw("insert into couleur(valeur_couleur) values('$request->color3');"));
            DB::select(DB::raw("insert into possession_couleur(produit_,couleur_)
                     values(
                       (select id_produit from produit where produit.nom_produit = '$nom_produit' limit 1),
                       (select id_couleur from couleur where valeur_couleur = '$request->color3' limit 1)
                            )"));
        }
        if (isset($request->inpFile1)) {
            $request->inpFile1->store('images', 'public');
            $file = $request->inpFile1;
            $path = $nom_produit . '_img1.jpg';
            $file->move(public_path() . '/images/', $path);
        }
        if (isset($request->inpFile2)) {
            $request->inpFile2->store('images', 'public');
            $file = $request->inpFile2;
            $path = $nom_produit . '_img1.jpg';
            $file->move(public_path() . '/images/', $path);
        }
        if (isset($request->inpFile3)) {
            $request->inpFile3->store('images', 'public');
            $file = $request->inpFile3;
            $path = $nom_produit . '_img1.jpg';
            $file->move(public_path() . '/images/', $path);
        }
        if (isset($request->inpFile4)) {
            $request->inpFile4->store('images', 'public');
            $file = $request->inpFile4;
            $path = $nom_produit . '_img1.jpg';
            $file->move(public_path() . '/images/', $path);
        }
        if (isset($request->inpFile5)) {
            $request->inpFile5->store('images', 'public');
            $file = $request->inpFile5;
            $path = $nom_produit . '_img1.jpg';
            $file->move(public_path() . '/images/', $path);
        }

        // for ($i = 0; $i < $request->nbrTotalOptions; $i++) {
        //     DB::select(DB::raw("insert into carateristique(libelle_caractere, libell_option_produit, prix_suplementaire, produit_) values( , , , )"));
        //     // DB::select(DB::raw("insert into carateristique(libelle_caractere, libell_option_produit, prix_suplementaire, produit_) values( , , , )"));
        // }

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
