<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AssistenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (Auth::user()->access_level !== 2) {
                exit;
            }
            return $next($request);
        });
    }

    /**
     * Todos os assistentes
     *
     * @return void
     */
    public function all()
    {
        return response()->json(User::where('access_level', 1)->get());
    }

    protected function create(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'access_level' => (empty(\App\Models\User::first()) ? 2 : 1),
            'password' => Hash::make($request->password),
        ]);
    }

    public function delete(User $user)
    {
        return $user->delete();
    }
}
