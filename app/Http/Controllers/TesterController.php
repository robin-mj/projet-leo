<?php

namespace App\Http\Controllers;

use App\Models\Tester;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testers = Tester::all();

        return view('tester.index', [
            'testers' => $testers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tester.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $tester = new Tester();
        $tester->name = $request->name;
        $tester->surname = $request->surname;
        $tester->campaign_id = $request->campaign_id;
        $tester->form_token = Str::uuid();
        $tester->save();

        return redirect()->back()->with('success', 'Tester created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tester $tester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tester $tester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tester $tester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tester $tester)
    {
        //
    }
}
