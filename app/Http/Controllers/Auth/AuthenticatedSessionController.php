<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->is('api/*')) {    
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);
        
            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Invalid credentials',
                ], 401);
            }
        
            $credentials = request(['email', 'password']);
        
            if (!Auth::once($credentials)) {
                return response()->json([
                    'error' => 'Unauthorized',
                ], 401);
            }
        
            $user = Auth::user();
            $tokenResult = $user->createToken('API Token');
            $token = $tokenResult->accessToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
            
        } else {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
            // El usuario ha sido autenticado correctamente
                return redirect()->intended('/dashboard');
            } else {
                // Las credenciales no son válidas
                return back()->withErrors([
                    'email' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }
        } 
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
        public function destroy(Request $request)
    {
        if ($request->user()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        if ($request->wantsJson()) {
           return response()->json(['message' => 'Logout successful']);
        }

        return redirect('/');
    }

}
