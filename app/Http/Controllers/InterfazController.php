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
        $citas = DB::table('cita as ct')
        ->where('ct.iduser', Auth::user()->iduser)
        ->paginate(4);
        return view('pages.profile.user-profile', compact('citas'));
    }

    public function get_admin_profile()
    {
        $citas = DB::table('cita as ct')
        ->join('user as u', 'ct.iduser', '=', 'u.iduser')
        ->join('detalle_usuario as du', 'u.iduser', '=', 'du.iduser')
        ->select('ct.*', 'u.*', 'du.*')
        ->paginate(4);
        $trabajadores = DB::table('user as u')
        ->where('u.type', 'Trabajador')
        ->get();
        return view('pages.profile.admin', compact('citas', 'trabajadores'));
    }

    public function get_worker_profile()
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
            ->orderBy('ot.fecha', 'asc')
            ->paginate(5);
            return view('pages.profile.worker-profile', compact('citas'));
        }else{
            return redirect('/');
        }
    }

    
}
