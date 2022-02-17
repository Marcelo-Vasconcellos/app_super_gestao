<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Middleware\LogAcessoMiddleware;

class SobreNosController extends Controller
{
/*exemplo de inclusão de middleware direto em um controlador    
    public function __construct()
    {
        $this->middleware(LogAcessoMiddleware::class);
    }
*/    
    public function sobreNos() {
        return view('site.sobre-nos');
    }
}
