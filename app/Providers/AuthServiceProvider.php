<?php

namespace App\Providers;

use App\Chamado;
use App\Permissao;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Chamado' => 'App\Policies\ChamadoTestePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       /* 
        Gate::define('ver-chamado',function($user,Chamado $chamado){
            return $user->id == $chamado->user_id;
        }); 
        */

        foreach($this->listaPermissoes() as $permissao){
            Gate::define($permissao->nome,function($user) use($permissao){
                return $user->temUmPapelDestes($permissao->papeis) || $user->isAdmin();
            }); 
        }
    }

    public function listaPermissoes(){
        return Permissao::with('papeis')->get();
    }
}
