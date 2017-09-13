@extends('layouts.app')
@section('page-css')
<link href="{{ asset('vendor/datepicker/css/bootstrap-datepicker.min.css') }} " rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Input Nilai</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('pengajar/nilai/store', $paket->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('paket') ? ' has-error' : '' }}">
                            <label for="paket" class="col-md-4 control-label">paket</label>

                            <div class="col-md-6">
                                <input id="paket" type="text" class="form-control" name="paket" value="{{ $paket->id }}" required>

                                @if ($errors->has('paket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paket') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('pengajar') ? ' has-error' : '' }}">
                            <label for="pengajar" class="col-md-4 control-label">pengajar</label>

                            <div class="col-md-6">
                                <input id="pengajar" type="text" class="form-control" name="pengajar" value="{{ $paket->pengajar_id }}" required>

                                @if ($errors->has('pengajar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengajar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nilai') ? ' has-error' : '' }}">
                            <label for="nilai" class="col-md-4 control-label">nilai</label>

                            <div class="col-md-6">
                                <input id="nilai" type="number" class="form-control" name="nilai" value="{{ old('nilai') }}" required>

                                @if ($errors->has('nilai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nilai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('materi') ? ' has-error' : '' }}">
                            <label for="materi" class="col-md-4 control-label">materi</label>

                            <div class="col-md-6">
                                <input id="materi" type="text" class="form-control" name="materi" value="{{ old('materi') }}" required>

                                @if ($errors->has('materi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('materi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label for="deskripsi" class="col-md-4 control-label">deskripsi</label>

                            <div class="col-md-6">
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}" required>

                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                            <label for="tanggal" class="col-md-4 control-label">tanggal</label>
                            <div class="col-md-6">
                                <input id="tanggal" type="text" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
                                @if ($errors->has('tanggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="jadwal_hari" class="col-md-4 control-label">Siswa</label>
                            <div class="col-md-6"   >
                                <select name="siswa_id" class="form-control">
                                    @foreach ($siswadipaket as $data)
                                        <option value="{{$data->siswanya->id}}"> {{$data->siswanya->biodata->nama}} </option>
                                    @endforeach
                                  </select>

                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Buat
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
@section('page-script')
<script src="{{ asset('vendor/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
$('#tanggal').datepicker({
    format: "dd/mm/yyyy"
});
</script>
@endsection
