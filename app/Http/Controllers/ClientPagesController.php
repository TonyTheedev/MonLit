<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB as FacadesDB;

class ClientPagesController extends Controller
{
    public function ProduitOverview($product)
    {
        $info_produit = collect(DB::select("select * from produit inner join type_produit on type_produit.id_type = produit.type_ inner join marque ON marque.id_marque = type_produit.marque_ where produit.id_produit = $product "))->first();
        return view("single-product", compact('info_produit'));
    }

    public function importDescriptions(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id_caracteristique;
            $prix = collect(DB::select("select prix from carateristique where id_caractere = $id"))->first()->prix;
            $descriptions = DB::select("
            select libelle_description from carateristique inner join description_produit on description_produit.caracteristique_ = carateristique.id_caractere
            where carateristique.id_caractere = $id");

            $success = array(
                'prix' => $prix,
                'descriptions' => $descriptions
            );
            echo json_encode($success);
        }
    }
}
