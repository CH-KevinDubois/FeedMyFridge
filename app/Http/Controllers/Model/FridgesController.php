<?php

namespace App\Http\Controllers\Model;

use App\Http\Controllers\Controller;
use App\Models\Fridge;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;

class FridgesController extends Controller
{
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

    public function allproducts(Request $request)
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
        return view('fridges.allproducts', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required|max:255',
            'side' => 'required',
        ]);


        auth()->user()->fridges()->create([
            'brand' => $request->brand,
            'location' => $request->location,
            'freezer' => $request->freezer==='on'?true:false,
            'side' => $request->side,
        ]);

        //auth()->user()->fridges()->create($request->only('brand', 'location', 'freezer', 'side'));

        return redirect()->route('fridges.index');
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
        $fridge->delete();

        return redirect()->route('fridges.index');
    }
}
