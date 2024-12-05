<?php

namespace App\Http\Controllers;
use App\Models\Inventario;
use App\Models\Hoteles;     
use App\Models\Proveedores;  
use App\Models\OrdenCompra;
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

    public function decrement($id)
    {
        $inventario = Inventario::find($id);
        if ($inventario) {
            $inventario->cantidad = max(0, $inventario->cantidad - 1); // Que no baje de 0
            $inventario->save();
        }

        return response()->json(['cantidad' => $inventario->cantidad]);
    }

    public function createRestockOrder(Request $request, $id)
    {
        try {
            $inventario = Inventario::findOrFail($id);
            $quantity = $request->input('quantity');
            $price = $request->input('price');

            OrdenCompra::create([
                'hotel_id' => $inventario->hotel_id,
                'proveedor_id' => $inventario->proveedor_id,
                'producto_id' => $inventario->id_producto,
                'cantidad' => $quantity,
                'precio_unitario' => $price,
                'subtotal' => $quantity * $price,
                'fecha_orden' => now(),
            ]);

            $item = Inventario::find($id);

            if ($item) {
                $item->cantidad += $quantity;
                $item->save();
            }

            return response()->json([
                'message' => 'Restock order created successfully.',
                'cantidad' => $item->cantidad
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
