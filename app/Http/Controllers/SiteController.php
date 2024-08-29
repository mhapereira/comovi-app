<?php

namespace App\Http\Controllers;

use App\Models\Comunicado;
use App\Models\Contato;
use App\Models\Evento;
use App\Models\Galeria;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        // Recupera todas as galerias do banco de dados
        $comunicados = Comunicado::where('status', 'ativo')->get();
        $eventos = Evento::where('status', 'ativo')->get();
        $galeria = Galeria::where('status', 'ativo')->get();
        $contatos = Contato::all();

        // Retorna a view 'welcome' com as galerias
        return view('welcome', ['comunicados' => $comunicados, 'eventos' => $eventos, 'galeria' => $galeria, 'contatos' => $contatos]);
    }
}
