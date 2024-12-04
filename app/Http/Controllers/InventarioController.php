<?php

namespace App\Http\Controllers;
use App\Models\Inventario;
use App\Models\Hoteles;     
use App\Models\Proveedores;  
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::with('hotel', 'proveedor')->get(); 
        return view('Inventario.Index_Inventario', compact('inventarios'));
    }

    public function create()
    {
        $hoteles = Hoteles::all(); 
        $proveedores = Proveedores::all(); 
        return view('Inventario.Create_Inventario', compact('hoteles', 'proveedores'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hotel_id' => 'required|exists:hoteles,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'nombre_producto' => 'required|string|max:100',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        Inventario::create($validatedData);
        return redirect()->route('inventario.index')->with('success', 'Producto creado correctamente');
    }

    public function show(Inventario $inventario)
    {
        return view('inventario.show', compact('inventario'));
    }

    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id);
        $hoteles = Hoteles::all();
        $proveedores = Proveedores::all();
        return view('Inventario.Edit_Inventario', compact('inventario', 'hoteles', 'proveedores'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $validatedData = $request->validate([
            'hotel_id' => 'required|exists:hoteles,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'nombre_producto' => 'required|string|max:100',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
        ]);

        $inventario->update($validatedData);
        return redirect()->route('inventario.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventario.index')->with('success', 'Producto eliminado correctamente');
    }

    public function filtroPdf(){
        $inventario = Inventario::all();
        $hoteles = Hoteles::all();
        $proveedores = Proveedores::all();            
        return view('Inventario.Filtro_Pdf_Inventario',compact('inventario','hoteles','proveedores'));
    }

    public function generarPdf(Request $request)
    {
        $filterHotel = $request->has('filter_hotel');
        $filterProveedor = $request->has('filter_proveedor');
        $hotelId = $request->input('hotel_id');
        $proveedorId = $request->input('proveedor_id');

        $query = Inventario::query();

        if ($filterHotel && !empty($hotelId)) {
            $query->where('hotel_id', $hotelId);
        }

        if ($filterProveedor && !empty($proveedorId)) {
            $query->where('proveedor_id', $proveedorId);
        }

        // Obtener resultados
        $inventarios = $query->with(['hotel', 'proveedor'])->get();

        $data = [
            'titulo' => 'Styde.net'
        ];

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('Inventario_pdf', compact('inventarios'));

        return $pdf->download('reporte.pdf');
    }

    public function decrement($id)
    {
        $inventario = Inventario::find($id);
        if ($inventario) {
            $inventario->cantidad = max(0, $inventario->cantidad - 1); // Que no baje de 0
            $inventario->save();
        }

        return response()->json(['cantidad' => $inventario->cantidad]);
    }

    public function generateRestockOrder(Request $request, $id)
    {
        $inventario = Inventario::with('hotel', 'proveedor')->findOrFail($id);
        $quantity = $request->query('quantity');
        $price = $request->query('price');
        $totalPrice = $quantity * $price;

        $pdfOptions = new Options();
        $pdfOptions->set('isHtml5ParserEnabled', true);
        $pdfOptions->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($pdfOptions);
        $dompdf->loadHtml(view('Inventario.restock_order', compact('inventario', 'quantity', 'price', 'totalPrice'))->render());
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('restock_order.pdf');
    }
}