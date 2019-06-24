<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use App\OrdenTrabajo;
use App\Cita;
use App\Tarea;
use App\Tiene;
use App\Insumo;
use PDF;

class OTController extends Controller
{
    public function store(Cita $cita, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'hora_inicio' => 'required',
            'fecha' => 'required',
            'responsable' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $orden = OrdenTrabajo::create([
            'idcita' => $cita->idcita,
            'idempleado'=> $request->get('responsable'),
            'hora_inicio' => $request->get('hora_inicio'),
            'fecha'=> $request->get('fecha'),
            'precio' => 20000,
            'estado' => 'Pendiente'
        ]);

        $cita->estado_cita = "Agendada";
        $cita->save();

        return back()->with('message', array('title' => '¡Solicitud agendada con exito!', 'body'=>'Se ha agendado una nueva cita.'));
    }

    public function get_details(OrdenTrabajo $cita)
    {
        $ot = DB::table('orden_trabajo as ot')
        ->join('cita as ct', 'ot.idcita','=','ct.idcita')
        ->join('user as u', 'ct.iduser', '=', 'u.iduser')
        ->join('detalle_usuario as du', 'du.iduser', '=', 'u.iduser')
        ->join('user as e', 'ot.idempleado', '=','e.iduser')
        ->select('ot.*', 'ct.servicio', 'ct.descripcion', 'ct.estado_whatsapp', 'u.name', 'u.lastname', 'u.email', 'u.rut', 'du.direccion', 'du.telefono', 'du.tipo_cliente')
        ->where('ot.idcita', '=', $cita->idcita)
        ->get();

        $tareas = DB::table('tarea as t')
        ->where('t.idorden_trabajo', '=', $cita->idorden_trabajo)
        ->paginate(4);

        $insumos_agregados = DB::table('tiene as ti')
        ->join('insumo as in', 'ti.idinsumo', '=', 'ti.idinsumo')
        ->select('in.*', 'ti.cantidad')
        ->where('ti.idorden_trabajo', '=', $cita->idorden_trabajo)
        ->paginate(4);

        $insumos = DB::table('insumo')->get();

        return view('pages.profile.details', compact('ot', 'tareas', 'insumos', 'insumos_agregados'));
    }

    public function initialize_job(OrdenTrabajo $cita)
    {
        $ot = OrdenTrabajo::find($cita->idorden_trabajo);
        $ot->estado = 'En proceso';
        $ot->save();

        return back()->with('message', array('title' => '¡A trabajar!', 'body'=>'Se ha iniciado un nuevo proceso.'));
    }

    public function store_activities(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tarea' => 'required',
            'descripcion' => 'required|max:250'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $tarea = Tarea::create([
            'idorden_trabajo' => $request->get('idorden'),
            'nombre' => $request->get('tarea'),
            'descripcion' => $request->get('descripcion'),
            'estado' => 'Terminada'
        ]);

        return back()->with('message', array('title' => '¡Genial!', 'body'=>'Se ha agregado una nueva tarea.'));
    }

    public function store_supplies(Request $request)
    {
        $insumo = Insumo::find($request->get('insumo'));
        $validator = Validator::make($request->all(), [
            'cantidad' => 'required|max:'.$insumo->stock.'|numeric'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $tiene = Tiene::create([
            'idorden_trabajo' => $request->get('idorden'),
            'idinsumo' => $request->get('insumo'),
            'cantidad' => $request->get('cantidad')
        ]);

        $insumo = Insumo::find($tiene->idinsumo);
        $insumo->stock = $insumo->stock - $tiene->cantidad;
        $insumo->save();

        $ot = OrdenTrabajo::find($tiene->idorden_trabajo);
        $ot->precio = $ot->precio + ($tiene->cantidad*$insumo->precio);
        $ot->save();

        return back()->with('message', array('title' => '¡Genial!', 'body'=>'Se ha agregado un nuevo insumo.'));
    }

    public function delete_supplies(Request $request)
    {
        $tiene = Tiene::first($request->get('ot'));
        $insumo = Insumo::find($tiene->idinsumo);

        $insumo->stock = $insumo->stock + $tiene->cantidad;
        $insumo->save();

        $tiene->delete();
        return back();
    }

    public function delete_activities(Request $request)
    {
        $tarea = Tarea::first($request->get('ot'));
        $tarea->delete();

        return back();
    }

    public function finalize_job(Request $request)
    {
        $ot = OrdenTrabajo::first($request->get('ot'));
        $ot->observacion = $request->get('observacion');
        $ot->estado = 'Finalizado';
        $ot->save();

        $cita = Cita::find($ot->idcita);
        $cita->estado_cita = "Completada";
        $cita->save();

        return redirect('/worker-profile')->with('message', array('title' => '¡Genial!', 'body'=>'Has terminado tu trabajo.'));
    }

    public function download_ot(OrdenTrabajo $ot)
    {
        $ot = DB::table('orden_trabajo as ot')
        ->join('cita as ct', 'ot.idcita','=','ct.idcita')
        ->join('user as u', 'ct.iduser', '=', 'u.iduser')
        ->join('detalle_usuario as du', 'du.iduser', '=', 'u.iduser')
        ->join('user as e', 'ot.idempleado', '=','e.iduser')
        ->select('ot.*', 'ct.servicio', 'ct.descripcion', 'ct.estado_whatsapp', 'u.name', 'u.lastname', 'u.email', 'u.rut', 'u.type', 'du.direccion', 'du.telefono', 'du.tipo_cliente', 'e.name as nombre_responsable', 'e.lastname as apellido_responsable')
        ->where('ot.idcita', '=', $ot->idcita)
        ->get();

        $pdf = PDF::loadView('components.ot-pdf',['ot' => $ot]);
        return $pdf->download('ot-pdf.pdf');
    }
}
