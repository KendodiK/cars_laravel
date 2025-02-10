<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;

class MakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$abc = $this->getAbc();
        $sortBy = request()->query('sort_by','name');
        $sortDir = request()->query('sort_dir','acs');
        $makers = Maker::orderBy($sortBy, $sortDir)->paginate(config('app.pagination'));
        return view('maker.index',['makers' => $makers]);*/

        $makers = Maker::all();
        return view('makers.index', compact('makers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('makers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|min:3|max:255', 'logo' => 'min:5|max:255'],
            ['name.required' => 'A gyártó nevét kötelező kitölteni!',
             'name.min' => 'A gyártó neve legalább 3 karakter hosszú kell legyen!',
             'name.max' => 'A gyártó neve hosszabb a megengedettnél!',
             'logo.min' => 'A kép neve legalább 3 karakter hoszú legyen! (*elérési út/*név.kiterjesztés)',
             'logo.max' => 'A kép neve hosszabb a megengedettnél!',]
        );

        Maker::create($request->all());

        return redirect()->route('makers.index')->with('success', 'A gyártó sikeresen hozzáadva!');
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
        $maker = Maker::find($id);
        return view('makers.edit', compact('maker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            ['name' => 'required|min:3|max:255', 'logo' => 'min:3|max:255'],
            ['name.required' => 'A gyártó nevét kötelező kitölteni!',
             'name.min' => 'A gyártó neve legalább 3 karakter hosszú kell legyen!',
             'name.max' => 'A gyártó neve hosszabb a megengedettnél!',
             'logo.min' => 'A kép neve legalább 3 karakter hoszú legyen! (*elérési út/*név.kiterjesztés)',
             'logo.max' => 'A kép neve hosszabb a megengedettnél!',]
        );

        $maker = Maker::find($id);
        $maker->name = $request->name;
        $maker->logo = $request->logo;

        $maker->save();

        return redirect()->route('makers.index')->with('success', 'Gyártó sikeresen módosítva!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $maker = Maker::find($id);
        $maker->delete();

        return redirect()->route('makers.index')->with('success', 'Gyártó sikeresen törölve!');
    }
}
