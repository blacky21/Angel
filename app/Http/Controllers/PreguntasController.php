<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\pregunta;
use App\Models\User;
use App\Models\Respuestas;

class PreguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user_id = Auth::user()->id;
        //$preguntas= pregunta::where('user_id', $user_id)->get();
        $preguntas=pregunta::all();
        return view('preguntas/index', compact('preguntas'));
    }
    public function mispreguntas()
    {
        $user_id = Auth::user()->id;
        $preguntas= pregunta::where('user_id', $user_id)->get();
        //$preguntas=pregunta::all();
        return view('preguntas/mispreguntas', compact('preguntas'));
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
        
        $pregunta=pregunta::where('titulo', $request->titulo)->first();
        if (!is_object($pregunta)) {
        $pregunta = new pregunta;
        $pregunta->titulo = $request->titulo;
        $pregunta->descripcion = $request->descripcion;
        $pregunta->codigo = $request->codigo;
        $pregunta->etiquetas = $request->etiquetas;
        $pregunta->user_id =$user_id;
        if ($pregunta->save()) {
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
        return redirect('/preguntas');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pregunta= pregunta::findOrFail($id);
        
        $propietario=pregunta::where('id', $id)->first();
        $usuario=User::where('id', $propietario->user_id)->first();
       
        $respuestas= Respuestas::where('pregunta_id', $propietario->id)->get();
        
        return view('preguntas.pregunta', compact('pregunta', 'usuario','respuestas'));
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
        $pregunta = pregunta::findOrFail($id);

        if(is_object($pregunta)) {
            if($pregunta->delete()) {
                Session::flash('color-class', 'success');
                Session::flash('mensaje', 'La pregunta ha sido eliminada exitosamente.');
            } else {
                Session::flash('color-class', 'danger');
                Session::flash('mensaje', 'Ocurrio un error, intente nuevamente.');
            }
        }
        return redirect('/preguntas');
    }
}
