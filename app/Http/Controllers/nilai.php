<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class nilai extends Controller
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

    public function createbyid($id)
    {

        $paket = \App\paket::where('id',$id)->first();

        $siswadipaket = \App\paketsiswa::where('paket_id',$paket->id)->get();
        return view('pengajar.nilai.create',compact('paket','siswadipaket'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storebyid(Request $request,$id)
    {
        $id = Auth::user()->id;
        $user = \App\pengajar::where('user_id',$id)->first();
        $pengajar_id = $user->id; 
        $pisah = explode('/',$request['tanggal']);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $ubahtgl = implode('-',$urutan);
      $tambah = new \App\nilai();
      $tambah->pengajar_id = $request['pengajar'];
      $tambah->paket_id = $request['paket'];
      $tambah->nilai = $request['nilai'];
      $tambah->materi = $request['materi'];
      $tambah->siswa_id = $request['siswa_id'];
      $tambah->deskripsi = $request['deskripsi'];
      $tambah->tanggal = $ubahtgl;

      $tambah->save();
      $ke = '/pengajar/nilai/' . $tambah->paket_id; 
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
        $user_id = Auth::user()->id;
        $user = \App\pengajar::where('user_id',$user_id)->first();
        $pengajar_id = $user->id; 

        $paketsiswa = \App\paketsiswa::where('paket_id',$id)->first();

        $nilai =  \App\nilai::where([['pengajar_id',$pengajar_id], ['paket_id',$id]])->get();
        
        //return $paketsiswa;
        if (count($paketsiswa)>0)
        //    return $nilai;
            return view('pengajar.nilai.index',compact('nilai','paketsiswa'));
        //else
        //    return "no sign up";
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
