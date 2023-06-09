<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use App\Models\Sala;
use App\Models\TipoCamilla;
use App\Models\Camilla;
use App\Models\Celador;
use App\Models\Medico;
use App\Models\Paciente;
use App\Policies\CamillaPolicy;
use App\Policies\SalaPolicy;
use App\Policies\TipoCamillaPolicy;
use App\Policies\CeladorPolicy;
use App\Policies\MedicoPolicy;
use App\Policies\PacientePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Sala::class => SalaPolicy::class,
        TipoCamilla::class => TipoCamillaPolicy::class,
        Celador::class => CeladorPolicy::class,
        Camilla::class => CamillaPolicy::class,
        Especialidad::class => EspecialidadPolicy::class,
        Patologia::class => PatologiaPolicy::class,
        Medico::class => MedicoPolicy::class,
        Paciente::class => PacientePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

    }
}
