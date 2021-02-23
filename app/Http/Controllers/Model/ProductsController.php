<?php

namespace App\Http\Controllers\model;

use App\Http\Controllers\Controller;
use App\Models\Fridge;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Fridge $fridge)
    {
        return view('products.index', [
            'fridge' => $fridge,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Fridge $fridge)
    {
        return view('products.add', [
            'fridge' => $fridge,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Fridge $fridge)
    {
        //dd($fridge);
        // $this->validate($request, [
        //     'brand' => 'required|max:255',
        //     'side' => 'required',
        // ]);

        for ($i=0; $i < $request->quantity; $i++) { 
            $fridge->products()->create([
                'expired_at' => $request->expired_at,
                'name' => $request->name,
                'location' => $request->location,
                'description' => $request->description,
            ]);
        }
        

        return redirect()->route('fridges.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fridge $fridge, Product $product)
    {
        $product->delete();

        return redirect()->route('products.index', $fridge);
    }
}
