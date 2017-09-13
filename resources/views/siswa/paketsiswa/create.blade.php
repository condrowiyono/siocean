@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Paket</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('paketsiswa.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="semester" class="col-md-4 control-label">Paket</label>
                            <div class="col-md-6"   >
                                <select name="paket_id" class="form-control">
                                @foreach ($paket as $data)
                                    <option value="{{$data->id}}">{{$data->pelajaran}} - {{$data->pemilik->biodata->nama}} ( {{$data->jadwal_hari}} - {{$data->jadwal_mulai}} {{$data->jadwal_selesai}} )</option>
                                @endforeach
                                  </select>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Pilih
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection