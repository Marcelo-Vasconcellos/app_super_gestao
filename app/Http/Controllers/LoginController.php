<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';

        if($request->get('erro')==1){
            $erro = 'Usuário não autorizado!';
        }

        if($request->get('erro')==2){
            $erro = 'Necessário autenticação!';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {

        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //as mensagens de feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        //se não passar no validate
        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();
        $existe = $user->where('email',$email)->where('password',$password)
                        ->get()
                        ->first();

        if(isset($existe->name)){
            session_start();
            $_SESSION['nome'] = $existe->name;
            $_SESSION['email'] = $existe->email;
            //echo dd($_SESSION);

            return redirect()->route('app.home');

        }else{
            return redirect()->route('site.login',['erro' => 1]);
        }

    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');

    }

}