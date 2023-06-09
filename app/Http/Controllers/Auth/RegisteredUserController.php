<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\Celador;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function create_medico()
    {
        $especialidads = Especialidad::all();
        return view('auth.register-medico', ['especialidads' => $especialidads]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'tipo_usuario_id' => 'required|numeric'
        ];

        $tipo_usuario_id = intval($request->tipo_usuario_id);

        if($tipo_usuario_id == 1){
            //Médico
            $reglas_medico = ['telefono' => 'required|string|max:255',
                'fecha_contratacion' => 'required|date',
                'fecha_nacimiento' => 'required|date',
                'vacunado' => 'required|boolean',
                'sueldo' => 'required|numeric',
                'especialidad_id' => 'required|exists:especialidads,id'
            ];
            $rules = array_merge($reglas_medico, $rules);
        }

        elseif($tipo_usuario_id == 2){
            //Celador
            $reglas_celador = ['name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'telefono' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'sueldo' => 'required|numeric'
        ];
            $rules = array_merge($reglas_celador, $rules);
        }
        
        $request->validate($rules);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    
        if($tipo_usuario_id == 1) {
            //Médico
            $medico = new Medico($request->all());
            $medico->user_id = $user->id;
            $medico->save();
        }
        
        elseif($tipo_usuario_id == 2){
            //Celador
            $celador = new Celador($request->all());
            $celador->user_id = $user->id;
            $celador->save();
        }
        
        $user->fresh();
        Auth::login($user);
        event(new Registered($user));
        return redirect(RouteServiceProvider::HOME);
    }
}
