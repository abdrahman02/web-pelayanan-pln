<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class DashboardBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Berita::latest()->paginate(15)->withQueryString();
        // dd($beritas);
        return view('backend.berita.index', [
            'page_title' => 'Dashboard Berita',
            'beritas' => $beritas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.berita.create', [
            'page_title' => 'Dashboard Berita'
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
        // dd($request);
        $request->validate([
            'judul_berita' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $berita = new Berita();
        $berita->judul_berita = $request->judul_berita;
        $berita->body = $request->body;
        $berita->user_id = auth()->user()->id;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('berita', $filename);
            $berita->image = $filename;
        }

        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Sukses, 1 Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $beritum)
    {
        return view('backend.berita.show', [
            'page_title' => 'Dashboard Berita',
            'berita' => $beritum
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $beritum)
    {
        return view('backend.berita.edit', [
            'page_title' => 'Dashboad Berita',
            'berita' => $beritum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $beritum)
    {
        $request->validate([
            'judul_berita' => 'required|max:255',
            'body' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $berita = Berita::find($beritum->id);
        $berita->judul_berita = $request->judul_berita;
        $berita->body = $request->body;
        $berita->user_id = auth()->user()->id;
        
        if ($request->hasFile('image')) {
            // menghapus gambar lama
            if ($request->oldImage) {
                Storage::delete('berita/'.$berita->image);
            }
            // menyimpan gambar baru
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->storeAs('berita', $filename);
            $berita->image = $filename;
        }
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Sukses, 1 Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $beritum)
    {
        $item = Berita::findorFail($beritum->id);
        if ($item->image) {
            Storage::delete('berita/'.$item->image);
        }
        $item->delete();

        return redirect()->route('berita.index')->with('success', 'Sukses, 1 Data berhasil dihapus!');
    }
}
