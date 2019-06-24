<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\DetalleUsuario;
use App\Cita;
use App\OrdenTrabajo;
use Auth;

class AgendaController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descripcion' => 'nullable|max:150|'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $estadowsp = 0;
        if($request->get('estadowsp'))
        {
            $estadowsp = 1;
        }

        $cita = Cita::create([
            'iduser' => Auth::user()->iduser,
            'servicio'=> $request->get('servicio'),
            'estado_whatsapp' => $estadowsp,
            'estado_cita'=> "Nueva",
            'descripcion' => $request->get('descripcion')
        ]);
        return back()->with('message', array('title' => '¡Solicitud registrada con exito!', 'body'=>'La confirmación de la hora y responsable será enviada a su correo'));
    }

    public function destroy(Cita $cita)
    {
        $cita->estado_cita = "Cancelada";
        $cita->save();

        return back()->with('message', array('title' => '¡Cita cancelada con exito!', 'body'=>'Se ha cancelado su cita, prueve realizar otra.'));
    }


}
