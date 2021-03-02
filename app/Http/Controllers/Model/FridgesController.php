<?php

namespace App\Http\Controllers\Model;

use App\Http\Controllers\Controller;
use App\Models\Fridge;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;

class FridgesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    
    public function index()
    {  
        return view('fridges.index', [
            'fridges' => auth()->user()->fridges
        ]);
    }

    public function create()
    {
        return view('fridges.create');
    }

    /**
     * Display a list of products of owned fridges.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function searchProduct(Request $request)
    {
        $fridges = auth()->user()->fridges;
        $products = collect();

        foreach ($fridges as $fridge) {
            foreach ($fridge->products as $product) {
                $product->setAttribute('fridge_name', $fridge->brand);
                $products->push($product);
            }
        }

        if($request->exists('search')){
            $products = $products->filter(function ($item) use ($request) {
                // replace stristr with your choice of matching function$
                return false !== stristr($item->name, $request->search);
            });
        }   
        
        $products = $products->sortBy('expired_at');
        return view('fridges.search', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required|max:255',
            'side' => 'required',
            'location' => 'required',
            'shelf' => 'required|numeric|min:1|max:10',
            'max_capacity' => 'numeric|min:50|max:150',
        ]);

        auth()->user()->fridges()->create([
            'brand' => $request->brand,
            'location' => $request->location,
            'freezer' => $request->freezer==='on'?true:false,
            'side' => $request->side,
            'number_racks_bulk' => $request->shelf,
            'max_capacity' => $request->max_capacity,
        ]);

        //auth()->user()->fridges()->create($request->only('brand', 'location', 'freezer', 'side'));

        return redirect()->route('fridges.index');
    }

    public function update(Request $request, Fridge $fridge)
    {
        $this->validate($request, [
            'brand' => 'required|max:255',
            'side' => 'required',
            'location' => 'required',
            'shelf' => 'required|numeric|min:1|max:10',
            'max_capacity' => 'numeric|min:50|max:150',
        ]);


        $fridge->update([
            'brand' => $request->brand,
            'location' => $request->location,
            'freezer' => $request->freezer==='on'?true:false,
            'side' => $request->side,
            'number_racks_bulk' => $request->shelf,
            'max_capacity' => $request->max_capacity,
        ]);

        return redirect()->route('fridges.show', $request->fridge);
    }

    /**
     * Edit the specified resource.
     *
     * @param  Fridge $fridge
     * @return \Illuminate\Http\Response
     */
    public function edit(Fridge $fridge)
    {
        return view('fridges.edit', ['fridge' => $fridge]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Fridge $fridge
     * @return \Illuminate\Http\Response
     */
    public function show(Fridge $fridge)
    {
        return view('fridges.show', ['fridge' => $fridge]);
    }

    /**
     * Delete the specified resource.
     *
     * @param  Fridge $fridge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fridge $fridge)
    {
        $this->authorize('delete', $fridge);
        
        $fridge->delete();

        return redirect()->route('fridges.index');
    }
}
