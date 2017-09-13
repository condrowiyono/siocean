<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use PDF;

class siswa extends Controller
{
    public function index()
    {
    	$id = Auth::user()->id;
        $user = \App\siswa::where('user_id',$id)->first();
        $siswa_id = $user->id; 
        
        $paket =  \App\paketsiswa::where('siswa_id',$siswa_id)->get();
        $nilai = \App\nilai::where('siswa_id',$siswa_id)->get();
        return view('siswa.index', compact('user','nilai','paket'));
      //  return $siswa_id;
    }

    public function edit() {
    	$id = Auth::user()->id;
        $user = \App\siswa::where('user_id',$id)->first();
        $pengajar_id = $user->id; 

        $pisah = explode('-',$user->biodata->tanggallahir);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $ubahtgl = implode('/',$urutan);
        $user->biodata->tanggallahir = $ubahtgl;
        return view('siswa.edit', compact('user'));
    }
	public function update(Request $request) {
    
        $id = Auth::user()->id;
        $user = \App\siswa::where('user_id',$id)->first();
        $pengajar_id = $user->id; 
        
        $pisah = explode('/',$request['tanggallahir']);
        $urutan = array($pisah[2],$pisah[1],$pisah[0]);
        $ubahtgl = implode('-',$urutan);

        $user2 = \App\siswa::findOrFail($pengajar_id);
        $pengguna = \App\User::findOrFail($user2->user_id);
        $pengguna->nama = $request['nama'];
        $pengguna->jeniskelamin = $request['jeniskelamin'];
        $pengguna->no_hape = $request['no_hape'];
        $pengguna->tempatlahir = $request['tempatlahir'];
        $pengguna->tanggallahir = $ubahtgl;
        $pengguna->alamat = $request['alamat'];
        $user2->asalsekolah = $request['asalsekolah'];
        $user2->kelas = $request['kelas'];
        $user2->nama_ortu = $request['nama_ortu'];
        $user2->pekerjaan_ortu = $request['pekerjaan_ortu'];

        $pengguna->save();
        $user2->save();
        
        return redirect('/siswa');

    }

	public function nilai()
    {
        $id = Auth::user()->id;
        $user = \App\siswa::where('user_id',$id)->first();
        $siswa_id = $user->id; 
        
        $paket =  \App\paketsiswa::where('siswa_id',$siswa_id)->get();
        $nilai = \App\nilai::where('siswa_id', $siswa_id)->get();

        //array_merge($user, $nilai);

        //return $user;
        //$pdf = PDF::loadView('pdf.siswa', $user);
		$view = \View::make('pdf.siswa', compact('user','nilai','paket'))->render();
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($view);
		return $pdf->stream('nilai');
		//return $pdf->download('nilai.pdf');
	}

}
