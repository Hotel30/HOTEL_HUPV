<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use App\Models\Inventario;
use App\Models\Hoteles;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class OrdenCompraController extends Controller
{
    public function index()
    {
        $ordenesCompra = OrdenCompra::with('hotel', 'proveedor', 'producto')->get();
        return view('OrdenCompra.Index_OrdenCompra', compact('ordenesCompra'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hotel_id' => 'required|exists:hoteles,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'producto_id' => 'required|exists:inventario,id_producto',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric',
        ]);

        OrdenCompra::create([
            'hotel_id' => $validatedData['hotel_id'],
            'proveedor_id' => $validatedData['proveedor_id'],
            'producto_id' => $validatedData['producto_id'],
            'cantidad' => $validatedData['cantidad'],
            'precio_unitario' => $validatedData['precio_unitario'],
            'subtotal' => $validatedData['cantidad'] * $validatedData['precio_unitario'],
        ]);

        return redirect()->route('ordenes-compra.index')->with('success', 'Orden de compra creada correctamente.');
    }

    public function printOrder($id)
    {
        $orden = OrdenCompra::with('hotel', 'proveedor', 'producto')->findOrFail($id);
        $quantity = $orden->cantidad;
        $price = $orden->precio_unitario;
        $totalPrice = $orden->subtotal;

        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($pdfOptions);
        $dompdf->loadHtml(view('OrdenCompra.restock_order', compact('orden', 'quantity', 'price', 'totalPrice'))->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('restock_order.pdf');
    }
}