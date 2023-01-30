<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use App\Models\Respon;
use Illuminate\Http\Request;

class DashboardKeluhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $keluhans = Keluhan::latest()->paginate(15)->withQueryString();
        
        return view('backend.keluhan.index', [
            'page_title' => 'Dashboard Keluhan',
            'keluhans' => $keluhans
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function show(Keluhan $keluhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Keluhan $keluhan)
    {
        // dd($keluhan);
        return view('backend.keluhan.edit', [
            'page_title' => 'Dashboard Keluhan',
            'keluhan' => $keluhan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluhan $keluhan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluhan  $keluhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Keluhan $keluhan)
    {
        $item = Keluhan::findorFail($keluhan->id);
        $item->delete();

        return redirect()->route('keluhan.index')->with('success', 'Sukses, Data berhasil dihapus!');
    }
}
