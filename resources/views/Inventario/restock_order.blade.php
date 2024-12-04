<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restock Order</title>
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
        <h1>Restock Order</h1>
    </div>
    <div class="content">
        <h2>Product Information</h2>
        <p><strong>Fecha del reporte:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        <p><strong>Product Name:</strong> {{ $inventario->nombre_producto }}</p>
        <p><strong>Description:</strong> {{ $inventario->descripcion }}</p>
        <p><strong>Quantity:</strong> {{ $quantity }}</p>
        <p><strong>Price per Unit:</strong> ${{ $price }}</p>
        <p><strong>Total Price:</strong> ${{ $totalPrice }}</p>

        <h2>Supplier Information</h2>
        <p><strong>Supplier Name:</strong> {{ $inventario->proveedor->nombre }}</p>
        <p><strong>Supplier Contact:</strong> {{ $inventario->proveedor->telefono }}</p>
        <p><strong>Envio en:</strong> {{ $inventario->proveedor->tiempo_reabastecimiento }} dias</p>


        <h2>Hotel Information</h2>
        <p><strong>Hotel Name:</strong> {{ $inventario->hotel->nombre }}</p>
        <p><strong>Hotel Address:</strong> {{ $inventario->hotel->direccion }}</p>
    </div>
</body>
</html>