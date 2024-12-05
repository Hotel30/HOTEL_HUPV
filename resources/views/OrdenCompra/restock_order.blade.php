<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 0 20px; }
        .content h2 { margin-bottom: 10px; }
        .content p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Orden de Compra</h1>
    </div>
    <div class="content">
        <h2>Informacion del Producto</h2>
        <p><strong>Fecha del reporte:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        <p><strong>Producto:</strong> {{ $orden->producto->nombre_producto }}</p>
        <p><strong>Descripción:</strong> {{ $orden->producto->descripcion }}</p>
        <p><strong>Cantidad:</strong> {{ $quantity }}</p>
        <p><strong>Precio Por Unidad:</strong> ${{ $price }}</p>
        <p><strong>Precio Total:</strong> ${{ $totalPrice }}</p>

        <h2>Informacion del Proveedor</h2>
        <p><strong>Nombre del Proveedor:</strong> {{ $orden->proveedor->nombre }}</p>
        <p><strong>Contacto:</strong> {{ $orden->proveedor->telefono }}</p>
        <p><strong>Envio en:</strong> {{ $orden->proveedor->tiempo_reabastecimiento }} dias</p>


        <h2>Informacion del Hotel</h2>
        <p><strong>Nombre del Hotel:</strong> {{ $orden->hotel->nombre }}</p>
        <p><strong>Dirección:</strong> {{ $orden->hotel->direccion }}</p>
    </div>
</body>
</html>