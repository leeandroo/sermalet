<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class InterfazController extends Controller
{
    public function get_landing_page()
    {
        return view('pages.landing');
    }

    public function get_login_page()
    {
        return view('auth.login');
    }

    public function get_register_page()
    {
        return view('auth.register');
    }

    public function get_user_profile()
    {
        // 
        $detalle_usuario = DB::table('detalle_usuario')->where('detalle_usuario.iduser', '=', Auth::user()->iduser)->first();
        return view('pages.profile.user-profile', compact('detalle_usuario'));
    }


    public function get_mydate_page() 
    {
        $citas_agendadas = DB::table('cita as ct')
        ->join('orden_trabajo as ot', 'ct.idcita', '=', 'ot.idcita')
        ->join('user as e', 'ot.idempleado', '=', 'e.iduser')
        ->select('ct.*', 'ot.fecha', 'ot.hora_inicio', 'e.name', 'e.lastname')
        ->where('ct.estado_cita', 'Agendada')
        ->where('ct.iduser', Auth::user()->iduser)
        ->paginate(3);

        $citas_nuevas = DB::table('cita as ct')
        ->where('ct.estado_cita', 'Nueva')
        ->where('ct.iduser', Auth::user()->iduser)
        ->paginate(3);
        
        return view('pages.profile.cliente.mydate', compact('citas_agendadas', 'citas_nuevas'));
    }

    public function get_all_dates()
    {
        $citas_agendadas = DB::table('cita as ct')
        ->join('orden_trabajo as ot', 'ct.idcita', '=', 'ot.idcita')
        ->join('user as e', 'ot.idempleado', '=', 'e.iduser')
        ->join('user as cl', 'ct.iduser', '=', 'cl.iduser')
        ->select('ct.*', 'ot.fecha', 'ot.hora_inicio', 'e.name as nombre_empleado', 'e.lastname as apellido_empleado', 'cl.name as nombre_cliente', 'cl.lastname as apellido_cliente')
        ->where('ct.estado_cita', 'Agendada')
        ->paginate(3);

        $citas_nuevas = DB::table('cita as ct')
        ->join('user as u', 'ct.iduser', '=', 'u.iduser')
        ->join('detalle_usuario as dt', 'u.iduser', '=', 'dt.iduser')
        ->select('dt.*', 'ct.*', 'u.*')
        ->where('ct.estado_cita', 'Nueva')
        ->paginate(3);

        $trabajadores = DB::table('user as u')
        ->where('u.type', 'Trabajador')
        ->get();

        return view('pages.profile.admin.dates', compact('citas_nuevas', 'citas_agendadas', 'trabajadores'));
    }

    public function get_tasks()
    {
        if(Auth::user())
        {
            $citas = DB::table('orden_trabajo as ot')
            ->join('cita as ct', 'ot.idcita','=','ct.idcita')
            ->join('user as u', 'ct.iduser', '=', 'u.iduser')
            ->join('detalle_usuario as du', 'du.iduser', '=', 'u.iduser')
            ->join('user as e', 'ot.idempleado', '=','e.iduser')
            ->select('ot.*', 'ct.servicio', 'ct.descripcion', 'ct.estado_whatsapp', 'u.name', 'u.lastname', 'u.email', 'u.rut', 'du.direccion', 'du.telefono', 'du.tipo_cliente')
            ->where('ot.idempleado', '=', Auth::user()->iduser)
            ->where('ot.estado', '=', 'Pendiente')
            ->where('ot.estado', '=', 'En proceso')
            ->orderBy('ot.fecha', 'asc')
            ->paginate(5);
            return view('pages.profile.worker.tasks', compact('citas'));
        }else{
            return redirect('/');
        }
    }

    
}
