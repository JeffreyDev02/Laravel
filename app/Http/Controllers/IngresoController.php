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
            $ingresos = DB::table('ingreso as i')
            ->join('persona as p', 'i.idproveedor', '=' ,'p.idpersona')
            ->join('detalle_ingreso as d', 'd.idingreso', '=', 'i.idingreso')
            ->select('i.idingreso', 'i.fecha_hora', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', 'p.nombre', DB::raw('sum(d.cantidad * d.precio_compra) as total'))
            ->where('i.num_comprobante', 'LIKE', '%'. $query .'%')
            ->orderBy('i.idingreso', 'desc')
            ->groupBy('i.idingreso', 'i.fecha_hora', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.num_comprobante', 'i.impuesto', 'i.estado', 'p.nombre')
            ->paginate(7);
            return view('almacen.compras.ingreso.index', ['ingresos' => $ingresos, 'searchText' => $query]);         
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

    public function store(Request $request)
    {
        try {
            DB::begintransaction();
            $ingreso = new Ingreso;
            $dataIngreso = [
                'idproveedor' => $request->get('idproveedor'),
                'tipo_comprobante' => $request->get('tipo_comprobante'),
                'serie_comprobante' => $request->get('serie_comprobante'),
                'num_comprobante' => $request->get("num_comprobante"),
                $myTime = Carbon::now("America/guatemala"),
                'fecha_hora' => $myTime->toDateTimeString(),
                'impuesto' => '12',
                'estado' => 'A'
            ];

            DB::table('ingreso')->insert($datadetalle);

            $idarticulo = $request->get('idarticulo');
            $cantidad = $request->get('cantidad');
            $precio_compra = $request->get('precio_compras');
            $precio_venta = $request->get('precio_venta');

            $count = 0;
            while($count < count($idarticulo)){
                $datadetalle = [
                    'idingreso' => $ingreso->idingreso,
                    'idarticulo' => $idarticulo[$count],
                    'cantidad' => $cantidad[$count],
                    'precio_compra' => $precio_compra[$count],
                    'precio_venta' => $precio_venta[$count]      
                ];

                DB::table('detalle_ingreso') ->insert($datadetalle);

                $count = $count + 1;
            };

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }

        return Redirect::to('compras/ingreso');
    }

    public function show($id)
    {
        $ingreso =  DB::table('ingreso as i')
        ->join('persona as p', 'i.idproveedor', '=' ,'p.idpersona')
        ->join('detalle_ingreso as d', 'd.idingreso', '=', 'i.idingreso')
        ->select('i.idingreso', 'i.fecha_hora', 'i.tipo_comprobante', 'i.serie_comprobante', 'i.impuesto', 'i.estado', 'p.nombre')
        ->where('i.idingreso', '=', $id)
        ->first();

        $detalles = DB::table('detalle_ingreso as d')
        ->join('articulo as a', 'd.idarticulo', '=', 'a.idarticulo')
        ->select('a.nombre as articulo', 'd.cantidad', 'd.precio_compra', 'd.precio_venta')
        ->where('d.idingreso', '=' , $id)
        ->get();

        return view('almacen.compras.ingreso.show', ['ingresos'=> $ingreso, 'detalles' => $detalles]);
    }

    public function destroy($id ){
        DB::table('ingreso')
        ->where('idingreso', $id)
        ->update([
            'estado'=> 'C'
        ]);

        return Redirect::to('compras/ingreso');
    }
}
