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
        return view("single-product");
    }
}
