<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ator;

class AtorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $idade_1 = $request->idade_1 ? $request->idade_1 : 0;
        $idade_2 = $request->idade_2 ? $request->idade_2 : 200;

        $data_nasc1 = date("Y-m-d", strtotime("-$idade_1 years"));
        $data_nasc2 = date("Y-m-d", strtotime("-$idade_2 years"));

        $status = isset($_GET['status']) ? $_GET['status'] : true;

        return Ator::where('status', $status)
            ->where('nome', 'like', "%{$request->nome}%")
            ->where('altura', 'like', "{$request->altura}%")
            ->where('peso', 'like', "{$request->peso}%")
            ->where('sexo', 'like', "%{$request->sexo}%")
            ->whereBetween('data_nasc', [$data_nasc2, $data_nasc1])
            ->where('sapato', 'like', "%{$request->sapato}%")
            ->where('pele', 'like', "%{$request->pele}%")
            ->where('olhos', 'like', "%{$request->olhos}%")
            ->where('cabelo', 'like', "%{$request->cabelo}%")
            ->orderBy('created_at', 'desc')->paginate('12');
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
            'nome' => ['required', 'string', 'min:3', 'max:255'],
            'altura' => ['required', 'string', 'max:5'],
            'peso' => ['required', 'string', 'max:5'],
            'manequim' => ['required'],
            'sexo' => ['required', 'string'],
            'data_nasc' => ['required', 'date'],
            'sapato' => ['required', 'numeric'],
            'pele' => ['required', 'string'],
            'olhos' => ['required', 'string'],
            'cabelo' => ['required', 'string'],
            'video' => ['required', 'string'],
        ]);

        $path_manequim = $request->file('manequim')->store('imagens/manequim', 'public');
        return Ator::create([
            'nome' => $request->nome,
            'altura' => $request->altura,
            'peso' => $request->peso . "kg",
            'manequim' => "/" . $path_manequim,
            'sexo' => $request->sexo,
            'data_nasc' => $request->data_nasc,
            'sapato' => $request->sapato,
            'pele' => $request->pele,
            'olhos' => $request->olhos,
            'cabelo' => $request->cabelo,
            'video' => $request->video,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
