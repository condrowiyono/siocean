<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class cashflow extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashflow =  \App\cashflow::orderBy('tanggal', 'asc')->get();
        return view('petugas.cashflow.index',compact('cashflow'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.cashflow.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cashflow =  \App\cashflow::all();
        $saldo = 0 ;
        if (count($cashflow)>=1) {
            $saldo = $cashflow->last()->saldo;
        }

        $user_id = Auth::user()->id;
        $user = \App\petugas::where('user_id',$user_id)->first();
        $petugas_id = $user->id; 
        
        $pisah = explode('/',$request['tanggal']);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $ubahtgl = implode('-',$urutan);
        
        if ($request['jenis']=='in') {
            $banyakuang = $request['banyaknya'];
        } else {
            $banyakuang = (-1 * $request['banyaknya']);
        }

        $saldo = $saldo + $banyakuang;

      $tambah = new \App\cashflow();
      $tambah->tanggal = $ubahtgl;
      $tambah->petugas_id = $petugas_id;
      $tambah->uraian = $request['uraian'];
      $tambah->jenis = $request['jenis'];
      $tambah->banyaknya = $banyakuang;
        $tambah->saldo = $saldo;
      $tambah->save();
      $ke = '/petugas/cashflow/'; 
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
