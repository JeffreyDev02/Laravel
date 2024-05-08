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
            -> where('nombre', 'LIKE', '%'.$query.'%')
            -> where('estado', '=', '1')
            -> orderBy('idarticulo','desc')
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


}
