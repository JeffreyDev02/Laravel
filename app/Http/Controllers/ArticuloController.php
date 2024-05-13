<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Articulo;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticuloFormRequest;
use DB;

class ArticuloController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request){

            $query = trim($request->get('searchText'));
            $articulos = DB::table('articulo')
            ->join('categoria','articulo.idcategoria', '=', 'categoria.idcategoria')
            ->select('articulo.idarticulo as idarticulo', 'categoria.nombre as categoriaNombre', 'categoria.idcategoria', 'articulo.codigo as codigo', 'articulo.nombre as nombre', 'articulo.stock as stock', 'articulo.descripcion as descripcion')
            ->where('articulo.nombre', 'like', '%'. $query .'%')
            ->where('articulo.estado', '=', '1')
            ->orderBy('articulo.idarticulo', 'desc')
            ->paginate(7);
            return view('almacen.articulo.index', ["articulos"=> $articulos, "searchText"=> $query ]);
            
        }

    }

    public function create()
    {
        $categorias = DB::table('categoria')
        ->where('condicion', '=', '1')
        ->orderBy('idcategoria', 'asc')
        ->get();

        return view('almacen.articulo.create', ["categorias" => $categorias]);

    }

    public function store(ArticuloFormRequest $request){
        
       

        $data = [
            'idcategoria' => $request -> get('idcategoria'),
            'codigo' => $request -> get('codigo'),
            'nombre' => $request ->get('nombre'),
            'stock' => $request ->get('stock'),
            'descripcion' => $request ->get('descripcion'),
            'estado' => '1'
        ];

        DB::table('articulo') -> insert($data);
        return Redirect::to('almacen/articulo');
    }

    public function edit($id)
    {
        $categorias = DB::table('categoria')
        ->where('condicion', '=', '1')
        ->orderBy('idcategoria', 'asc')
        ->get();

        return view("almacen.articulo.edit", ["articulo" => Articulo::findOrFail($id), "categorias" => $categorias]);
    }

    public function update(ArticuloFormRequest $request, $id)
    {
        $idcategoria = $request->get('idcategoria');
        $codigo = $request->get('codigo');
        $nombre = $request ->get('nombre');
        $stock = $request ->get('stock');
        $descripcion = $request ->get("descripcion");

        $file = "";

        if(Input::hasFile('imagen')){
            $file = Input::file('imagen');
            $file -> move(public_path().'/imagenes/articulos/', $file->getClientOriginalName());
        }

        DB::table('articulo')
            -> where('idarticulo', $id)
            -> update([
                'idcategoria' => $idcategoria,
                'codigo' => $codigo,
                'nombre' => $nombre,
                'stock' => $stock,
                'descripcion' => $descripcion,
                'imagen' => $file->getClientOriginalName()
        ]);

        return Redirect::to('almacen/articulo');
    }

    public function destroy($id)
    {
        DB::table('articulo')
            -> where('idcategoria', $di)
            -> update([
                'estado' => '1'
            ]);

        return Redirect::to('almance/articulo');
    }


}
