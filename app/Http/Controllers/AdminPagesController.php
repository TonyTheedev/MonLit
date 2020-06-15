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
}
