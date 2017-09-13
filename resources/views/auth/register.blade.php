@extends('layouts.app')
@section('page-css')
<link href="{{ asset('vendor/datepicker/css/bootstrap-datepicker.min.css') }} " rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                            <label for="nama" class="col-md-4 control-label">nama</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>

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
                                    <option value="laki">Laki - laki </option>
                                    <option value="perempuan">Perempuan</option>
                                  </select>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('no_hape') ? ' has-error' : '' }}">
                            <label for="no_hape" class="col-md-4 control-label">no_hape</label>

                            <div class="col-md-6">
                                <input id="no_hape" type="text" class="form-control" name="no_hape" value="{{ old('no_hape') }}" required autofocus>

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
                                <input id="tempatlahir" type="text" class="form-control" name="tempatlahir" value="{{ old('tempatlahir') }}" required autofocus>

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
                                <input id="tanggallahir" type="text" class="form-control" name="tanggallahir" value="{{ old('tanggallahir') }}">
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
                                <textarea class="form-control" style="min-height:50px" name="alamat"> 
                                {{ old('alamat') }}
                                </textarea>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                         <div class="form-group">
                            <label for="role" class="col-md-4 control-label">Role</label>
                            <div class="col-md-6"   >
                                <select name="role" class="form-control">
                                    <option value="siswa">Siswa </option>
                                    <option value="pengajar">Pengajar</option>
                                    <option value="petugas">Petugas</option>
                                  </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
