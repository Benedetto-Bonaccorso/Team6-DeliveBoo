<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tipology;
use App\Http\Requests\StoreTipologyRequest;
use App\Http\Requests\UpdateTipologyRequest;
use App\Http\Controllers\Controller;

class TipologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipologies = Tipology::all();

        return view('admin.tipologies.index', compact('tipologies'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipologyRequest $request)
    {
        $tipology = Tipology::create($request->all());

        return back()->with('message', "tipology $tipology->slug created successfully");
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipologyRequest  $request
     * @param  \App\Models\Tipology  $tipology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipologyRequest $request, Tipology $tipology)
    {
        $tipology->update($request->all());

        // redirect
        return back()->with('message', "Tipology $tipology->slug updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipology  $tipology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipology $tipology)
    {
        $tipology->delete();
        return to_route('admin.tipologies.index')->with('message', "Tipology $tipology->slug Deleted successfully");
    }
}
