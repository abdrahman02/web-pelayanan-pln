<?php

namespace App\Http\Controllers;

use App\Models\Respon;
use Illuminate\Http\Request;

class DashboardResponController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'respon' => 'required'
        ]);

        Respon::create([
            'respon' => $request->respon,
            'user_id' => auth()->user()->id,
            'keluhan_id' => $request->keluhan_id
        ]);

        return redirect()->route('keluhan.index')->with('success', 'Sukses, 1 Data berhasil dibalas!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Respon  $respon
     * @return \Illuminate\Http\Response
     */
    public function show(Respon $respon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Respon  $respon
     * @return \Illuminate\Http\Response
     */
    public function edit(Respon $respon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Respon  $respon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Respon $respon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Respon  $respon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respon $respon)
    {
        //
    }
}
