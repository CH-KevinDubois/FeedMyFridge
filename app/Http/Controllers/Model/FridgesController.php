<?php

namespace App\Http\Controllers\Model;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FridgesController extends Controller
{
    public function index()
    {  
        return view('fridges.index');
    }

    public function create()
    {
        return view('fridges.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required|max:255',
            'freezer' => 'required',
            'door' => 'required',
        ]);

        return redirect()->route('fridges.index');
    }
}
