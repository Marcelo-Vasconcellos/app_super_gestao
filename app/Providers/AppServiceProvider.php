<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; // adicionado para corrigir o erro >>> SQLSTATE [42000]: Erro de sintaxe ou violação de acesso: 1071 A chave especificada era muito longa; o comprimento máximo da chave é 767 bytes Erro

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // adicionado para corrigir o erro >>> SQLSTATE [42000]: Erro de sintaxe ou violação de acesso: 1071 A chave especificada era muito longa; o comprimento máximo da chave é 767 bytes Erro
    }
}
