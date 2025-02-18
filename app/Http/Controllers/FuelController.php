<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fuels = Fuel::all();
        return view('fuels.index', compact('fuels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fuels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|min:3|max:255'],
            ['name.required' => 'Az üzemanyag típusát kötelező kitölteni!',
             'name.min' => 'Az üzemanyag típusa legalább 3 karakter hosszú kell legyen!',
             'name.max' => 'Az üzemanyag típusa hosszabb a megengedettnél!',]
        );

        Fuel::create($request->all());

        return redirect()->route('fuels.index')->with('success', 'A gyártó sikeresen hozzáadva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fuel = Fuel::find($id);
        $fuel->delete();

        return redirect()->route('fuels.index')->with('success', 'Üzemanyag sikeresen törölve!');
    }
}
