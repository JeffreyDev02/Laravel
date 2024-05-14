
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
    <body>
        <div class="row">
            <div class="col-lg-6">
                <img src="https://www.distribuidoramariscal.com.gt/wp-content/uploads/2022/09/Logotipo-distribuidora-mariscal-principal-300x138.jpg" alt="png" width="200px" >
            </div>

            <div class="col-lg-6">
                <h3 style="background-color: #000; color:#fff; padding:10px">Reporte Categoria</h3>
            </div>
        </div>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $cat)
                <tr>
                    <th scope="row">{{$cat-> idcategoria}}</th>
                    <td>{{$cat -> nombre}}</td>
                    <td>{{$cat -> descripcion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </body>
</html>
            
			
