<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Insumo;


class InsumoController extends Controller
{

    public function index(Request $request)
    {

        if($request){
            $nombre=trim($request->get('nombre'));
            $categoriaid=trim($request->get('categoria'));
            $insumos = DB::table('insumo')		
            ->where('nombre','LIKE','%'.$nombre.'%')
            ->where('idcategoria','LIKE','%'.$categoriaid.'%')
            ->where('estado', 'Disponible')
            ->orderBy('idinsumo', 'DESC')
            ->paginate(3);
		                            
            $categorias = DB::table('categoria')->get();
    
            return view('pages.insumo.index', compact('insumos', 'categorias', 'nombre', 'categoriaid'));     
        }

    }

    public function show()
    {
        // return view('pages.insumo.create');
    }

    public function create()
    {   
        $categorias = DB::table('categoria')->get();
        return view('pages.insumo.create', compact('categorias'));
    }

    public function store()
    {
        $data = request()->all();
        $validator = Validator::make($data, [
            'nombre' => 'required|max:45|unique:insumo,nombre',            
            'codigo' => 'required|max:45|unique:insumo,codigo',
            'stock' => 'required|max:45',
            'descripcion' => 'nullable|max:45',
            'precio' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else
        {
            Insumo::create([

                'idcategoria' => $data['categoria'],
                'nombre' => $data['nombre'],
                'codigo' => $data['codigo'],
                'stock' => $data['stock'],
                'descripcion' => $data['descripcion'],
                'estado' => 'Disponible',
                'precio' => $data['precio']
            ]);
            return redirect('/admin-profile/insumo')->with('message', array('title' => '¡Insumo registrado con exito!', 'body'=>'Se ha registrado una nuevo Insumo'));
        }

    }


    public function edit(Insumo $insumo)
    {
        $categorias = DB::table('categoria')->get();
        return view('pages.insumo.edit', compact('categorias', 'insumo'));
    }

    public function update(Insumo $insumo)
    {

        $data = request()->all();
        $validator = Validator::make($data, [ 
            'nombre' => ['required', 'max:45', Rule::unique('insumo')->ignore($insumo->idinsumo, 'idinsumo')],
            'codigo' => ['required', 'max:45', Rule::unique('insumo')->ignore($insumo->idinsumo, 'idinsumo')], 
            'stock' => ['required', 'max:45'],  
            'descripcion' => 'nullable|max:45',
            'precio' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            
            $insumo->update($data);
            return redirect('/admin-profile/insumo')
            ->with('message', array('title' => '¡Genial!', 'body'=>'Has actualizado correctamente'));
        }

    }

    public function destroy(Insumo $insumo){

        $insumo->estado='Inactivo';
        $insumo->update();
        return redirect('/admin-profile/insumo')
            ->with('message', array('title' => 'Todo salio bien!', 'body'=>'Has dado de baja el insumo correctamente'));
    }



}
