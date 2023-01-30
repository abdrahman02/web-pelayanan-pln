<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardUserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('backend.user.settings', [
            'page_title' => 'Dashboard Settings Account',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->name || $request->email || $request->username ||$request->image) {
            $request->validate([
                'name' => 'required|max:55',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'username' => 'required|min:5|max:55|unique:users,username,' . $user->id,
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            $user = User::find($user->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;

            if ($request->hasFile('image')) {
                // menghapus gambar lama
                if ($request->oldImage) {
                    Storage::delete('user/'.$user->image);
                }
                // menyimpan gambar baru
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->storeAs('user', $filename);
                $user->image = $filename;
            }
            $user->save();

            return redirect()->route('berita.index')->with('success', 'Sukses, Informasi akun berhasil diubah!');
        } else {
            $request->validate([
                'password' => 'required|min:5|max:55|confirmed'
            ]);
            $password_user = User::find($user->id);
            $password_user->password = bcrypt($request->password);
            $password_user->save();
            return redirect()->route('berita.index')->with('success', 'Sukses, Password akun berhasil diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
