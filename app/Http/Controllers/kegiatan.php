<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class kegiatan extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = \App\petugas::where('user_id',$user_id)->first();
        $petugas_id = $user->id; 
        
        $kegiatan =  \App\kegiatan::where('petugas_id',$petugas_id)->get();
        return view('petugas.kegiatan.index',compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = \App\petugas::where('user_id',$user_id)->first();
        $petugas_id = $user->id; 
        
        $pisah = explode('/',$request['tanggal']);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $ubahtgl = implode('-',$urutan);
      
      $tambah = new \App\kegiatan();
      $tambah->tempat = $request['tempat'];
      $tambah->petugas_id = $petugas_id;
      $tambah->deskripsi = $request['deskripsi'];
      $tambah->tanggal = $ubahtgl;

      $tambah->save();
      $ke = '/petugas/kegiatan/'; 
      return redirect($ke)->with('pesan','Berhasil membuat baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
