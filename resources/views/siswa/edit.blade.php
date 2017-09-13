@extends('layouts.app')
@section('page-css')
<link href="{{ asset('vendor/datepicker/css/bootstrap-datepicker.min.css') }} " rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Siswa</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('siswa/update') }}">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->biodata->email }}" readonly="">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">Nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ $user->biodata->nama }}" required>

                                @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="jeniskelamin" class="col-md-4 control-label">Jenis Kelamin</label>
                            <div class="col-md-6"   >
                                <select name="jeniskelamin" class="form-control">
                                    <option value="laki" {{ ($user->biodata->jeniskelamin=='laki') ? 'checked' : '' }}>Laki - laki </option>
                                    <option value="perempuan" {{ ($user->biodata->jeniskelamin=='laki') ? 'checked' : '' }}>Perempuan</option>
                                  </select>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_hape') ? ' has-error' : '' }}">
                            <label for="no_hape" class="col-md-4 control-label">no_hape</label>

                            <div class="col-md-6">
                                <input id="no_hape" type="text" class="form-control" name="no_hape" value="{{ $user->biodata->no_hape }}" required autofocus>

                                @if ($errors->has('no_hape'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_hape') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tempatlahir') ? ' has-error' : '' }}">
                            <label for="tempatlahir" class="col-md-4 control-label">tempatlahir</label>

                            <div class="col-md-6">
                                <input id="tempatlahir" type="text" class="form-control" name="tempatlahir" value="{{ $user->biodata->tempatlahir }}" required autofocus>

                                @if ($errors->has('tempatlahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempatlahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tanggallahir') ? ' has-error' : '' }}">
                            <label for="tanggallahir" class="col-md-4 control-label">tanggallahir</label>
                            <div class="col-md-6">
                                <input id="tanggallahir" type="text" class="form-control" name="tanggallahir" value="{{ $user->biodata->tanggallahir }}">
                                @if ($errors->has('tanggallahir'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggallahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-6">
                                <textarea class="form-control" style="min-height:50px" name="alamat">{{ $user->biodata->alamat }}</textarea>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('asalsekolah') ? ' has-error' : '' }}">
                            <label for="asalsekolah" class="col-md-4 control-label">asalsekolah</label>

                            <div class="col-md-6">
                                <input id="asalsekolah" type="text" class="form-control" name="asalsekolah" value="{{ $user->asalsekolah }}" required autofocus>

                                @if ($errors->has('asalsekolah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('asalsekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kelas') ? ' has-error' : '' }}">
                            <label for="kelas" class="col-md-4 control-label">kelas</label>

                            <div class="col-md-6">
                                <input id="kelas" type="text" class="form-control" name="kelas" value="{{ $user->kelas }}" required autofocus>

                                @if ($errors->has('kelas'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kelas') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nama_ortu') ? ' has-error' : '' }}">
                            <label for="nama_ortu" class="col-md-4 control-label">nama_ortu</label>

                            <div class="col-md-6">
                                <input id="nama_ortu" type="text" class="form-control" name="nama_ortu" value="{{ $user->nama_ortu }}" required autofocus>

                                @if ($errors->has('nama_ortu'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_ortu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pekerjaan_ortu') ? ' has-error' : '' }}">
                            <label for="pekerjaan_ortu" class="col-md-4 control-label">pekerjaan_ortu</label>

                            <div class="col-md-6">
                                <input id="pekerjaan_ortu" type="text" class="form-control" name="pekerjaan_ortu" value="{{ $user->pekerjaan_ortu }}" required autofocus>

                                @if ($errors->has('pekerjaan_ortu'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pekerjaan_ortu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
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
$('#tanggallahir').datepicker({
    format: "dd/mm/yyyy"
});
</script>
@endsection

