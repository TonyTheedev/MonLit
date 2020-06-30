<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB as FacadesDB;

class ClientPagesController extends Controller
{
    public function Accueil()
    {
        $produits = DB::select("select * from produit limit 8");
        return view("welcome", compact("produits"));
    }

    public function ProduitOverview($product)
    {
        $info_produit = collect(DB::select("select * from produit inner join type_produit on type_produit.id_type = produit.type_ inner join marque ON marque.id_marque = type_produit.marque_ where produit.id_produit = $product "))->first();
        $produits = DB::select("select * from produit limit 5");
        return view("single-product")
            ->with('info_produit', $info_produit)
            ->with('produits', $produits);
    }

    public function importDescriptions(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id_caracteristique;
            $prix = collect(DB::select("select prix from carateristique where id_caractere = $id"))->first()->prix;
            $id_caractere = collect(DB::select("select id_caractere from carateristique where id_caractere = $id"))->first()->id_caractere;
            $libelle_caractere = collect(DB::select("select libelle_caractere from carateristique where id_caractere = $id"))->first()->libelle_caractere;
            $descriptions = DB::select("
            select libelle_description from carateristique inner join description_produit on description_produit.caracteristique_ = carateristique.id_caractere
            where carateristique.id_caractere = $id");

            $success = array(
                'prix' => $prix,
                'id_caractere' => $id_caractere,
                'libelle_caractere' => $libelle_caractere,
                'descriptions' => $descriptions
            );
            echo json_encode($success);
        }
    }

    public function AjoutPanier(Request $request)
    {
        if ($request->ajax()) {

            $produit = $request->get("produit");
            $nbr = $request->get("nbr");

            if (AuthController::IsAuthentificated()) {
                $userConnected = session()->get('userObject')->id_personne;
                for ($i = 0; $i < $nbr; $i++) {
                    DB::statement(
                        "insert into commande(personne_, produit_, statut_commande, est_delivre) 
                        values(:personne_, :produit_, :statut_commande, :est_delivre)",
                        array(
                            'personne_' => $userConnected,
                            'produit_' => $produit,
                            'statut_commande' => 'En attente',
                            'est_delivre' => 'false'
                        )
                    );
                }
            } else {
                if (!session()->has("produits"))
                    $panier = collect([]);
                else
                    $panier = session()->get("produits");


                $panier->put("$produit", $panier->get("$produit") + $nbr);
                session()->put("produits", $panier);
            }
            // \Session::forget("produits");

            echo json_encode("success");
        }
    }

    public function StoreMessage(Request $request)
    {

        $nom_personne = isset($request->nom_personne) ? $request->nom_personne : 'Abonnement client';
        $email_persone = $request->email_persone;
        $sujet_message = isset($request->sujet_message) ? $request->sujet_message : '';
        $contenu_message = isset($request->contenu_message) ? $request->contenu_message : '';

        DB::statement(
            "insert into contact(nom_personne, email_persone, sujet_message, contenu_message)
                       values(:nom_personne, :email_persone, :sujet_message, :contenu_message)",
            array(
                'nom_personne' => $nom_personne,
                'email_persone' => $email_persone,
                'sujet_message' => $sujet_message,
                'contenu_message' => $contenu_message
            )
        );
        return redirect(url()->previous());
    }

    public function Category()
    {
        $marques = DB::select('select COUNT(produit.nom_produit) as nbrproduct , marque.nom_marque , marque.id_marque
                                from marque inner join type_produit on type_produit.marque_ = marque.id_marque
                                    inner join produit on produit.type_ = type_produit.id_type
                                group by marque.nom_marque ,marque.id_marque;');

        $types = DB::select('select distinct on (libelle_type) libelle_type , id_type from type_produit');

        $couleurs = DB::select('select distinct valeur_couleur from couleur;');

        $produits = DB::select("select * from produit limit 5");

        $produits_filtres = DB::select("select * from produit");

        return view('category')
            ->with("marques", $marques)
            ->with("types", $types)
            ->with("couleurs", $couleurs)
            ->with("produits", $produits);
    }

    public function InfoPaiement()
    {
        return view('checkout');
    }

    public function ConfirmationFinal(Request $request)
    {
        $nom = $request->nom;
        $prenom = $request->prenom;
        $sexe = isset($request->radioHomme) ? 1 : 2;
        $adresse = $request->adresse;
        $ville = $request->ville;
        $telephone = $request->telephone;
        $email = $request->email;
        $codePostal = $request->codePostal;
        if (isset($request->message))
            echo "msg";
        $role = $request->compte == 'on' ? 2 : 3;

        DB::statement(
            "insert into personne(nom, prenom, sexe_, codepostal, adresse, ville, telephone, email, username, mot_de_passe, role_personne_) 
                        values(:nom, :prenom, :sexe_, :codepostal, :adresse, :ville, :telephone, :email, :username, :mot_de_passe, :role_personne_)",
            array(
                'nom' => $nom,
                'prenom' => $prenom,
                'sexe_' => $sexe,
                'adresse' => $adresse,
                'ville' => $ville,
                'telephone' => $telephone,
                'email' => $email,
                'codepostal' => $codePostal,
                'role_personne_' => $role,
                'username' => "invit",
                'mot_de_passe' => "invit",
            )
        );
        $last_person_id = collect(DB::select("select currval('personne_seq') as currval;"))->first()->currval;
        $last_person =  collect(DB::select("select * from personne where personne.id_personne = $last_person_id"))->first();

        return view('confirmation')
            ->with("MontantHidden", $request->MontantHidden)
            ->with("FacturationHidden", $request->FacturationHidden)
            ->with("last_person", $last_person);
    }
}
