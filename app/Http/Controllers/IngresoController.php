<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\IngresoFormRequest;
use App\Models\Ingreso;
use App\Models\DetalleIngreso;
use DB;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Response;

class IngresoController extends Controller
{
    public function __contruct()
    {

    }

    public function index(Request $request)
    {
        if($request)
        {
            $query = trim($request->get('searchText'));
            $ingresos = DB::table('ingresos as i')
            ->join('persona as p', 'i.idproveedor', '=' ,'p.idpersona')
            ->join('detalle_ingreso d', 'd.idingreso', '=', 'i.idingreso' )
            ->select('i.idingreso', 'i.fecha_hora', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.impuesto', 'i.estado', 'p.nombre', DB::raw('sum(d.cantidad * d.precio_compra) as total'))
            ->where('i.num_comprobante', 'LIKE', '%'. $query .'%')
            ->orderBy('i.idingreso', 'desc')
            ->groupBy('i.idingreso', 'i.fecha_hora', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.impuesto', 'i.estado', 'p.nombre')
            ->paginate(7);
            return view('compras.ingreso.index', ['ingresos' => $ingresos, 'searchText' => $query]);         
        }
    }

    public function create()
    {
        $personas = DB::table('persona')->where('tipo_persona', '=' , 'Proveedor')->get();
        $articulos = DB::table('articulo as art')
        ->select(DB::raw('CONCAT(art.codigo, " ", art.nombre)'), 'art.idarticulo')
        ->where('art.estado', '=' , 'Activo')
        ->get();
        return view('compras.ingreso.create', ["personas" => $personas, "articulos" => $articulos]);    
    }
}
