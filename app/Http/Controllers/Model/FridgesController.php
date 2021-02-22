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
}
