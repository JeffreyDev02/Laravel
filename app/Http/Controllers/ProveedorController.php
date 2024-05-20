<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PersonaFormRequest;
use App\Models\Persona;
use DB;

class ProveedorController extends Controller
{
    //
    public function __construct() {

    }

    public function index(Request $request){
        if($request){

            $query = trim($request->get('searchText'));
            $persona = DB::table('persona')
            ->where('nombre','like','%'.$query.'%')
            ->where('tipo_persona', '=', 'Proveedor')
            ->orwhere('num_documento', 'like', '%'. $query.'%')
            ->where('tipo_persona','=','Proveedor')
            ->orderBy('idpersona','desc')
            ->paginate(11);
            return view('almacen.compras.proveedor.index', ["personas" => $persona, "searchText" => $query]);
        }
    }

    public function create(){
        return view('almacen.compras.proveedor.create');
    }

    public function store(PersonaFormRequest $request){
        
        $data = [
            'tipo_persona' => 'Proveedor',
            'nombre' => $request->get('nombre'),
            'tipo_documento' => $request->get('tipo_documento'),
            'num_documento' => $request->get('num_documento'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'email' => $request->get('email')
        ];

        DB::table('persona') -> insert($data);
        return Redirect::to('almacen/proveedor');
    }

    public function edit($id){
        return view("almacen.compras.proveedor.edit", ["personas"=>Persona::findOrFail($id)]);
    }

    public function update(PersonaFormRequest $request, $id){
        $dataUpdate = [
            'tipo_persona' => 'Proveedor',
            'nombre' => $request->get('nombre'),
            'tipo_documento' => $request->get('tipo_documento'),
            'num_documento' => $request->get('num_documento'),
            'direccion' => $request->get('direccion'),
            'telefono' => $request->get('telefono'),
            'email' => $request->get('email')
        ];
        DB::table('persona')
        -> where('idpersona', $id)
        -> update($dataUpdate);

        return Redirect::to('almacen/proveedor');
    }

    public function destroy($id){
        DB::table('persona')
        ->where('idpersona', $id)
        ->update([
            'tipo_persona' => 'Inactivo'
        ]);

        return Redirect::to('almacen/proveedor');
    }
}
