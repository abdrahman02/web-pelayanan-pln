<?php

namespace App\Http\Controllers;

use App\Models\Udl;
use Illuminate\Http\Request;

class DashboardUdlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $udls = Udl::orderBy('updated_at', 'desc')->paginate(15)->withQueryString();

        return view('backend.udl.index', [
            'page_title' => 'Dashboard Ubah Daya',
            'udls' => $udls
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
     * @param  \App\Models\Udl  $udl
     * @return \Illuminate\Http\Response
     */
    public function show(Udl $udl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Udl  $udl
     * @return \Illuminate\Http\Response
     */
    public function edit(Udl $udl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Udl  $udl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Udl $udl)
    {
        $request->validate([
            'jadwal_ubah' => 'required'
        ]);

        Udl::where('id', $udl->id)->update([
            'jadwal_ubah' => $request->jadwal_ubah
        ]);

        return back()->with('success', 'Sukses, 1 Data berhasil dijadwalkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Udl  $udl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Udl $udl)
    {
        $item = Udl::findorFail($udl->id);
        $item->delete();

        return back()->with('success', 'Sukses, 1 Data berhasil dihapus');
    }
}
