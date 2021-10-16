<?php

namespace App\Http\Controllers;

use App\Models\Produtor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\Artistas;
use Illuminate\Support\Facades\Mail;

class ProdutorController extends Controller
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

    public function index()
    {
        return response()->json(Produtor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:produtores'],
        ]);

        return Produtor::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }

    public function update(Request $request, Produtor $produtor)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $produtor->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }

    public function destroy(Produtor $produtor)
    {
        $produtor->delete();
    }

    public function enviarArtistasParaProdutores(Request $request)
    {
        $this->validate($request, [
            'email' => ['required'],
            'atores' => ['required'],
        ]);
        // Envia atores para email de produtores selecionados
        Mail::to($request->email)->send(new Artistas($request->atores));
        return response()->json(['email' => 'sucesso']);
    }
}
