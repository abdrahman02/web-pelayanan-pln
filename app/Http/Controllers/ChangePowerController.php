<?php

namespace App\Http\Controllers;

use App\Models\Pasbar;
use App\Models\Udl;
use Illuminate\Http\Request;

class ChangePowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $udls = Udl::where('user_id', auth()->user()->id)->latest()->paginate(15)->withQueryString();
        // dd($udls);

        return view('frontend.udl.index', [
            'title' => 'Perubahan Daya',
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
        $pasbars = Pasbar::where('user_id', auth()->user()->id)->latest()->paginate(15)->withQueryString();
        
        return view('frontend.udl.create', [
            'title' => 'Perubahan Daya',
            'pasbars' => $pasbars
        ]);
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

        Udl::create([
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

        return redirect()->route('change-power.index')->with('success', 'Sukses membuat pengajuan!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Udl  $udl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Udl $udl)
    {
        //
    }
}
