<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\pregunta;
use App\Models\Respuestas;
use App\Models\User;
use Redirect;

class RespuestasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $user_name = Auth::user()->name;
        
        $respuesta=Respuestas::where('titulo', $request->titulo)->first();
        if (!is_object($respuesta)) {
        $respuesta = new Respuestas;
        $respuesta->titulo = $request->titulo;
        $respuesta->descripcion = $request->descripcion;
        $respuesta->codigo = $request->codigo;
        $respuesta->user_id =$user_id;
        $respuesta->user_name =$user_name;
        $respuesta->pregunta_id =$request->pregunta_id;
        if ($respuesta->save()) {
            $request->session()->flash('color-class', 'success');
            $request->session()->flash('mensaje', 'La pregunta ha sido publicada!');
        } else {
            $request->session()->flash('color-class', 'danger');
            $request->session()->flash('mensaje', 'Ocurrio un error, vuelva a intentarlo más tarde.');
        }
        } else {
            $request->session()->flash('color-class', 'warning');
            $request->session()->flash('mensaje', 'La pregunta ya existe, elige otra:)');
        }
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
