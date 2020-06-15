<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;


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
}
