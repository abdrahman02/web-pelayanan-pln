<?php

namespace App\Http\Controllers;

use App\Models\Pasbar;
use Illuminate\Http\Request;

class NewPowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasbars = Pasbar::where('user_id', auth()->user()->id)->latest()->paginate(15)->withQueryString();

        return view('frontend.pasbar.index', [
            'title' => 'Penyambungan Baru',
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
        $request->validate([
            'alamat' => 'required',
            'kelurahan' => 'required',
            'no_rumah' => 'nullable',
            'rt' => 'required',
            'rw' => 'required',
            'telepon' => 'required',
            'identitas' => 'required',
            'no_identitas' => 'required',
            'layanan' => 'required',
            'peruntukan' => 'required',
            'daya' => 'required'
        ]);

        Pasbar::create([
            'alamat' => $request->alamat,
            'kelurahan' => $request->kelurahan,
            'no_rumah' => $request->no_rumah,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'telepon' => $request->telepon,
            'identitas' => $request->identitas,
            'no_identitas' => $request->no_identitas,
            'layanan' => $request->layanan,
            'peruntukan' => $request->peruntukan,
            'daya' => $request->daya,
            'user_id' => auth()->user()->id
        ]);

        return back()->with('success', 'Sukses membuat pengajuan!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasbar  $pasbar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasbar $pasbar)
    {
        //
    }
}
