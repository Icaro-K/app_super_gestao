<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $motivo_contatos = MotivoContato::all();

        return view("site.home", compact('motivo_contatos'));
    }
}
