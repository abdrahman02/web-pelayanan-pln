<?php

namespace App\Http\Controllers;

use App\Models\Pasbar;
use Illuminate\Http\Request;

class DashboardPasbarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasbars = Pasbar::orderBy('updated_at', 'desc')->paginate(15)->withQueryString();

        return view('backend.pasbar.index', [
            'page_title' => 'Dashboard Pasang Baru',
            'pasbars' => $pasbars
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
     * @param  \App\Models\Pasbar  $pasbar
     * @return \Illuminate\Http\Response
     */
    public function show(Pasbar $pasbar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasbar  $pasbar
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasbar $pasbar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pasbar  $pasbar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasbar $pasbar)
    {
        $request->validate([
            'jadwal_pasang' => 'required'
        ]);

        Pasbar::where('id', $pasbar->id)->update([
            'jadwal_pasang' => $request->jadwal_pasang
        ]);

        return back()->with('success', 'Sukses, 1 Data berhasil dijadwalkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasbar  $pasbar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasbar $pasbar)
    {
        $item = Pasbar::findorFail($pasbar->id);
        $item->delete();

        return back()->with('success', 'Sukses, 1 Data berhasil dihapus');
    }
}
