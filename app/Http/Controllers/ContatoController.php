<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;


class ContatoController extends Controller
{
    public function contato(Request $request) {
        
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();


        // $contato = new SiteContato();
        // $contato->create($request->all());
        
        // $motivo_contatos = [
        //     '1' => 'Dúvida',
        //     '2' => 'Elogio',
        //     '3' => 'Reclamação'
        // ];
        
        $motivo_contatos = MotivoContato::all();

        return view("site.contato", compact('motivo_contatos'));
    }

    public function save(Request $request){
        
        $regras = [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required|unique:site_contatos',
            'email' => 'email',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ];
        
        $feedback = [
            'nome.required' => 'O campo nome precisa ser preenchido.',
            'nome.min' => 'O nome precisa ter no mínimo 3 caracteres.',
            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.unique' => 'Este telefone já foi registrado.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Digite um e-mail válido.',
            'mensagem.required' => 'A mensagem é obrigatória.',
            'mensagem.max' => 'A mensagem não pode exceder 2000 caracteres.'
        ];


        $request->validate($regras, $feedback);
        SiteContato::create($request->all());
        return redirect()->route('site.index')->with('success', 'Mensagem enviada com sucesso!');
    }
}
