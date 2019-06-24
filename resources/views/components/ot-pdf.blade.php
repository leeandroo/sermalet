<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden de trabajo: { $ot->idorden_trabajo }</title>
    <style>
        table, td, th {  
            border: 1px solid #ddd;
            text-align: left;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }


        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-family: 'Century Gothic', sans-serif;
        }

        h1 {
            font-family: 'Century Gothic', sans-serif;
            font-size: 30px;
            text-align: center;
        }

        .cabecera {
            text-align: left;
            font-size: 20px;
            background-color: #ddd;
        }

        hr {
            border-width: 0.025rem;
            border-color: lightgrey;
            margin-bottom: 30px;
        }

        .info-cliente{
            margin-bottom: 20px;
        }

        .insumos {
            margin-bottom: 20px;
        }

        .tareas {
            margin-bottom: 20px;
        }
    
    </style>
</head>
<body>
    <div class="info-cliente">
        <h1>Orden de trabajo</h1>
        <hr>
        <table>
            <tbody>
                <tr>
                    <th colspan="2" class="cabecera">Información del cliente</th>
                </tr>
                @foreach($ot as $cliente)
                <tr>
                    @if($cliente->type = "Cliente")
                        <th>Nombre cliente</th>
                        <td>{{ $cliente->name.' '.$cliente->lastname }}</td>
                    @endif
                </tr>
                <tr>
                    @if($cliente->type = "Cliente")
                        <th>RUT</th>
                        <td>{{ $cliente->rut}}</td>
                    @endif
                </tr>
                <tr>
                    @if($cliente->type = "Cliente")
                        <th>Tipo cliente</th>
                        <td>{{ $cliente->tipo_cliente}}</td>
                    @endif
                </tr>
                @endforeach
                <tr>
                    <th colspan="2" class="cabecera">Información de contacto</th>
                </tr>

                @foreach($ot as $cliente)
                <tr>
                    @if($cliente->type = "Cliente")
                        <th>Teléfono</th>
                        <td>{{ $cliente->telefono }}</td>
                    @endif
                </tr>
                <tr>
                    @if($cliente->type = "Cliente")
                        <th>Correo</th>
                        <td>{{ $cliente->email }}</td>
                    @endif
                </tr>
                <tr>
                    @if($cliente->type = "Cliente")
                        <th>Whatsapp habilitado</th>
                        @if($cliente->estado_whatsapp == 1)
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="info-servicio">
        <table>
            <tbody>
                <tr>
                    <th colspan="2" class="cabecera">Información del servicio</th>
                </tr>
                @foreach($ot as $ot)
                <tr>
                    <th>N° de orden</th>
                    <td>{{ $ot->idorden_trabajo }}</td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <td>{{ $ot->fecha }}</td>
                </tr>
                <tr>
                    <th>Costo base</th>
                    <td>{{ '$'.$ot->precio }}</td>
                </tr>
                <tr>
                    <th>Responsable</th>
                    <td>{{ $ot->nombre_responsable.' '.$ot->apellido_responsable }}</td>
                </tr>
                <tr>
                    <th colspan="2" class="cabecera">Descripción de la solicitud</th>
                </tr>
                <tr>
                    @if($ot->descripcion == NULL)
                        <td colspan="2  ">Sin descripción</td>
                    @else
                        <td colspan="2">{{ $ot->descripcion }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="insumos">
        <table>
            <thead>
                <tr>
                    <th colspan="4" class="cabecera">Insumos utilizados</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td>Insumo</td>
                    <td>Categoria</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="tareas">
        <table>
            <thead>
                <tr>
                    <th colspan="3" class="cabecera">Tareas anexas</th>
                </tr>
            </thead>
            <tbody> 
                <tr>
                    <td>Tarea</td>
                    <td>Descripción</td>
                    <td>Estado</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table>
            <thead>
                <tr>
                    <th colspan="3" class="cabecera">Observación</th>
                </tr>
            </thead>
            <tbody> 
                <tr> 
                    <td colspan="3" style=" height: 120px; "></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>