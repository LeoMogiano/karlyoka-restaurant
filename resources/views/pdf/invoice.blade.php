{{-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>invoice {{ $invoice->id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>invoice {{ $invoice->id }}</h1>
    <p><strong>NIT:</strong> {{ $invoice->nit }}</p>
    <p><strong>Nombre:</strong> {{ $invoice->nombre }}</p>
    <p><strong>Fecha de Emisión:</strong> {{ $invoice->fecha_emision }}</p>
    <p><strong>Total del Pedido:</strong> {{ $invoice->pedido->total }}</p>

    <!-- Agrega más detalles de la invoice según sea necesario -->
</body>
</html> --}}



<!DOCTYPE html>
<html>

<head>
    <title>invoice #{{ $invoice->id }}</title>
    <style media="screen">
        body {
            font-family: 'Segoe UI', 'Microsoft Sans Serif', sans-serif;
            color: #424242; /* Color de texto aplomado */
        }

        header:before,
        header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .invoiceNbr {
            font-size: 30px;
            margin-right: 30px;
            margin-top: 20px;
            float: right;
            color: #424242; /* Color de texto aplomado */
        }

        .logo {
            float: left;
        }

        .from,
        .to {
            float: left;
            width: 40%;
            color: #424242; /* Color de texto aplomado */
        }

        .fromto {
            font-size: 13px;
            border-style: solid;
            border-width: 1px;
            border-color: #e8e5e5; /* Color de borde aplomado */
            margin: 20px;
            min-width: 150px;
            color: #424242; /* Color de texto aplomado */
        }

        .fromtocontent {
            margin: 10px;
            margin-right: 40px;
        }

        .panel {
            background-color: #e8e5e5;
            font-weight: bold;
            padding: 7px;
            font-size: 14px;
            color: #424242; /* Color de texto aplomado */
        }

        .container {
            margin: 20px auto;
            /* Centrar la tabla */
        }

        .items {
            clear: both;
            display: table;
            padding: 20px;
            width: 100%;
            table-layout: fixed;
            /* Establece el ancho de la tabla de manera fija */
        }

        .col {
            display: table-cell;
            padding: 5px;
            min-width: 100px;
            /* Ajusta según tus necesidades */
            max-width: 200px;
            /* Ajusta según tus necesidades */
            word-wrap: break-word;
            /* Rompe las palabras largas */
            font-size: 13px;
        }

        .row {
            display: table-row;
            min-width: 100%;
            /* Ajusta según tus necesidades */
            max-width: 100%;
            /* Ajusta según tus necesidades */
            page-break-inside: avoid;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            border: 1px solid #e8e5e5; /* Color de borde aplomado */
        }

        th,
        td {
            border: 1px solid #e8e5e5; /* Color de borde aplomado */
            padding: 5px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #e8e5e5;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            {{-- <img src="{{ public_path('/assets/images/logo.jpg') }}" alt="generic business logo" height="181" width="167" /> --}}
        </div>
        <div class="invoiceNbr">
            FACTURA #{{ $invoice->id }}
            <br />
            <span style="font-size: 20px;">Fecha de invoice:
                {{ \Carbon\Carbon::parse($invoice->fecha_emision)->format('d-m-Y') }}</span>
        </div>
    </header>
    <br>
    <div class="fromto from" style="margin-right: 80px !important">
        <div class="panel">EMPRESA</div>
        <div class="fromtocontent">
            <span>Karlyoka Food</span><br />
            <span>Av. Banzer - 3er Anillo Interno</span><br />
        </div>
    </div>
    <div class="fromto to">
        <div class="panel">CLIENTE</div>
        <div class="fromtocontent">
            <span>{{ $invoice->nombre}}</span>
        </div>
    </div>

    <div class="container">
        <section class="items">
            <!-- DETALLE INSUMOS Y SERVICIOS -->
            <table>
                <!-- Detalle de insumos -->
                @if (count($insumos) > 0)
                <tr>
                    <th colspan="4" style="text-align: center; ">
                        DETALLE INSUMOS
                    </th>
                </tr>
                <tr class="text-center">
                    <th style="width: 40%; text-align: center;">Insumo</th>
                    <th style="width: 20%; text-align: center;">Cantidad</th>
                    <th style="width: 20%; text-align: center;">Precio Unitario</th>
                    <th style="width: 20%; text-align: center;">Precio Total</th>
                </tr>
                @foreach ($insumos as $insumo)
                <tr class="text-center">
                    <td style="width: 40%; text-align: center;">{{ $insumo->nombre }}</td>
                    <td style="width: 20%; text-align: center;">{{ $insumo->pivot->cantidad }}</td>
                    <td style="width: 20%; text-align: center;">{{ $insumo->pivot->subtotal }}</td>
                    <td style="width: 20%; text-align: center;">{{ $invoice->pedido->total}}</td>
                </tr>
                @endforeach
                @endif
                <!-- Detalle de servicios -->
                @if (count($servicios) > 0)
                <tr class="text-center">
                    <th colspan="4" style="text-align: center; ">
                        DETALLE SERVICIOS
                    </th>
                </tr>
                <tr class="text-center">
                    <th style="width: 40%; text-align: center;">Servicio</th>
                    <th style="width: 20%; text-align: center;">Precio</th>
                    <th style="width: 20%; text-align: center;">Cantidad</th>
                    <th style="width: 20%; text-align: center;">Precio Total</th>
                </tr>
                @foreach ($servicios as $servicio)
                <tr>
                    <td style="width: 40%; text-align: center;">{{ $servicio->nombre }}</td>
                    <td style="width: 20%; text-align: center;">{{ $servicio->precio }}</td>
                    <td style="width: 20%; text-align: center;">{{ $servicio->pivot->cantidad }}</td>
                    <td style="width: 20%; text-align: center;">{{ $servicio->pivot->cantidad * $servicio->precio }}</td>
                </tr>
                @endforeach
                @endif
                <tr>
                    <td colspan="4" style="text-align: right; padding-top: 20px; font-weight: bold">MONTO TOTAL: {{ $pedido->total }}
                    </td>
                </tr>
            </table>
        </section>
    </div>

</body>

</html>



