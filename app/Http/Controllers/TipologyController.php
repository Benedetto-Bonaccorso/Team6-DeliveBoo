<?php

namespace App\Http\Controllers;

use App\Models\Tipology;
use App\Http\Requests\StoreTipologyRequest;
use App\Http\Requests\UpdateTipologyRequest;

class TipologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipologyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipologyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipology  $tipology
     * @return \Illuminate\Http\Response
     */
    public function show(Tipology $tipology)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipology  $tipology
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipology $tipology)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipology  $tipology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipology $tipology)
    {
        //
    }
}
