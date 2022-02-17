<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        //realizar a validação dos dados do formulário recebidos no request
        $request->validate(
            [
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email|unique:site_contatos',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
            ],
            [
                'nome.required' => 'O nome tem que ser preenchido',
                'nome.min' => 'O nome tem que ter no mínimo 3 caracteres',
                'nome.max' => 'O nome tem que ter no máximo 40 caracteres',
                'telefone.required' => 'Telefone é Obrigatório',
                'email.email' => 'Obrigatório um válido',
                'email.unique' => 'Esse email já foi usado para esse sistema',
                'motivo_contatos_id.required' => 'Escolha o motivo do contato',
                'mensagem.required' => 'Tamanho da mensagem excedido (max=2000)'
            ]
        );
        SiteContato::create($request->all());
        return redirect()->route('site.index');  // está sendo utilizado o ALIAS da ROUTE.WEB 'site.index'
    }
}
