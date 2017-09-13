<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class paket extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = \App\pengajar::where('user_id',$id)->first();
        $pengajar_id = $user->id; 
        
        $paket =  \App\paket::where('pengajar_id',$pengajar_id)->get();
        return view('pengajar.paket.index',compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengajar.paket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $user = \App\pengajar::where('user_id',$id)->first();
        $pengajar_id = $user->id; 

      $tambah = new \App\paket();
      $tambah->pengajar_id = $pengajar_id;
      $tambah->pelajaran = $request['pelajaran'];
      $tambah->tahun = $request['tahun'];
      $tambah->semester = $request['semester'];
      $tambah->jadwal_hari = $request['jadwal_hari'];
      $tambah->jadwal_mulai = $request['jadwal_mulai'];
      $tambah->jadwal_selesai = $request['jadwal_selesai'];

      $tambah->save();

      return redirect()->route('paket.index')->with('pesan','Berhasil membuat baru');
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
      $paket = \App\paket::findOrFail($id);
      return view('pengajar.paket.edit', compact('paket'));
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
        $user_id = Auth::user()->id;
        $user = \App\pengajar::where('user_id',$user_id)->first();
        $pengajar_id = $user->id; 

      $tambah = \App\paket::findOrFail($id);
      $tambah->pengajar_id = $pengajar_id;
      $tambah->pelajaran = $request['pelajaran'];
      $tambah->tahun = $request['tahun'];
      $tambah->semester = $request['semester'];
      $tambah->jadwal_hari = $request['jadwal_hari'];
      $tambah->jadwal_mulai = $request['jadwal_mulai'];
      $tambah->jadwal_selesai = $request['jadwal_selesai'];

      $tambah->save();

      return redirect()->route('paket.index')->with('pesan','Berhasil edit ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cruds = \App\paket::findOrFail($id);
      $cruds->delete();
      return redirect()->route('paket.index')->with('pesan','Berhasil dihapus');
    }
}
