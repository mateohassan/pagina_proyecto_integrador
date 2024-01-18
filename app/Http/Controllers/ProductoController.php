<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['productos'] = Producto::paginate(10);
        return view('producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosProducto = request()->except('_token');

        $reglas=[
                'tipo'=>'required|string|max:30',
                'modelo'=>'required|string|max:50',
                'precio'=>'required|integer|max_digits:7',
                'stock'=>'required|integer|max_digits:5',
                'foto'=>'required|image|max:5000'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida'
        ];
        $this->validate($request, $reglas, $mensaje);

        if($request->hasFile('foto')){
            $datosProducto['foto']=$request->file('foto')->store('uploads','public');
        }
        Producto::insert($datosProducto);

        return redirect('producto')->with('mensaje', 'Producto creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $datos['productos'] = Producto::paginate(50);
        return view('producto.catalogo', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto/edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosProducto = Request()->except(['_token', '_method']);

        $reglas=[
            'tipo'=>'required|string|max:30',
            'modelo'=>'required|string|max:50',
            'precio'=>'required|integer|max_digits:7',
            'stock'=>'required|integer|max_digits:5',
            'foto'=>'image|max:5000'
    ];
    $mensaje=[
        'required'=>'El :attribute es requerido',
    ];
    $this->validate($request, $reglas, $mensaje);

        if($request->hasFile('foto')){
            $producto = Producto::findOrFail($id);
            Storage::delete('public/' . $producto->foto);
            $datosProducto['foto'] = $request->file('foto')->store('uploads','public');
        }
        Producto::where('id', '=', $id)->update($datosProducto);
        $producto = Producto::findOrFail($id);
        return redirect('producto')->with('mensaje','Producto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        Storage::delete('public/' . $producto->foto);
        Producto::destroy($id);
        return redirect('producto')->with('mensaje', 'Producto eliminado exitosamente.');
    }
}
