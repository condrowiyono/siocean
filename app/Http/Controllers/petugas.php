<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class petugas extends Controller
{
    public function index()
    {
    	$id = Auth::user()->id;
        $user = \App\petugas::where('user_id',$id)->first();
        $petugas_id = $user->id; 
        return view('petugas.index', compact('user'));
    }

    public function edit() {
    	$id = Auth::user()->id;
        $user = \App\petugas::where('user_id',$id)->first();
        $pengajar_id = $user->id; 

        $pisah = explode('-',$user->biodata->tanggallahir);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $ubahtgl = implode('/',$urutan);
        $user->biodata->tanggallahir = $ubahtgl;
        return view('petugas.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = \App\petugas::where('user_id',$id)->first();
        $pengajar_id = $user->id; 
        
        $pisah = explode('/',$request['tanggallahir']);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $ubahtgl = implode('-',$urutan);

        $user2 = \App\petugas::findOrFail($pengajar_id);
        $pengguna = \App\User::findOrFail($user2->user_id);
        $pengguna->nama = $request['nama'];
        $pengguna->jeniskelamin = $request['jeniskelamin'];
        $pengguna->no_hape = $request['no_hape'];
        $pengguna->tempatlahir = $request['tempatlahir'];
        $pengguna->tanggallahir = $ubahtgl;
        $pengguna->alamat = $request['alamat'];
        $user2->posisi = $request['posisi'];

        $pengguna->save();
        $user2->save();
        
        return redirect('/petugas');

    }
}
