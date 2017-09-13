<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class paketsiswa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = \App\siswa::where('user_id',$user_id)->first();
        $siswa_id = $user->id; 
        
        $paket =  \App\paketsiswa::where('siswa_id',$siswa_id)->get();
        return view('siswa.paketsiswa.index',compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paket =  \App\paket::all();
        return view('siswa.paketsiswa.create',compact('paket'));
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
        $user = \App\siswa::where('user_id',$user_id)->first();
        $siswa_id = $user->id; 

        $paket = \App\paket::where('id',$request['paket_id'])->first();
        $pengajar_id = $paket->pengajar_id;

      $tambah = new \App\paketsiswa();
      $tambah->siswa_id = $siswa_id;
      $tambah->paket_id = $request['paket_id'];
      $tambah->pengajar_id = $pengajar_id;
      $tambah->status = 'WAITING';

      $tambah->save();

      return redirect()->route('paketsiswa.index')->with('pesan','Berhasil membuat baru');
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
