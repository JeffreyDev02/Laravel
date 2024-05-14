<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoriaFormRequest;
use DB;
use Barryvdh\DomPDF\Facade\PDF;

class CategoriaController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $categorias=DB::table('categoria')
            ->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('almacen.categoria.index',["categorias"=>$categorias,"searchText"=>$query]);
        }
    }

    public function gererar_pdf()
    {
        $categorias=DB::table('categoria')
        ->where ('condicion','=','1')
        ->orderBy('idcategoria','desc')
        ->paginate(7);

        $pdf = PDF::loadView('almacen.categoria.generar_pdf', ['categorias'=> $categorias]);
        return $pdf ->stream('reporte.pdf');
    }

    public function create()
    {
        return view("almacen.categoria.create");
    }

    public function store (CategoriaFormRequest $request)
    {
        $data = [
            'nombre' => $request -> get('nombre'),
            'descripcion' => $request -> get('descripcion'),
            'condicion' => '1'
        ];

        DB::table('categoria') -> insert($data);
        return Redirect::to('almacen/categoria');

    }

    public function show($id)
    {
        return view("almacen.categoria.show",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view("almacen.categoria.edit",["categoria"=>Categoria::findOrFail($id)]);
    }

    public function update(CategoriaFormRequest $request, $id)
    {
        $nombre = $request -> get('nombre');
        $descripcion = $request -> get('descripcion');
        
        DB::table('categoria')
            -> where ('idcategoria', $id)
            -> update ([
                'nombre' => $nombre,
                'descripcion' => $descripcion
            ]);

        return Redirect::to('almacen/categoria');
    }
    public function destroy($id){
        DB::table('categoria')
            -> where ('idcategoria', $id)
            -> update ([
                'condicion' => '0'
            ]);

        return Redirect::to('almacen/categoria');
    }

}