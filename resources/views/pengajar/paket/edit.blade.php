@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Paket</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('paket.update', $paket->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('pelajaran') ? ' has-error' : '' }}">
                            <label for="pelajaran" class="col-md-4 control-label">pelajaran</label>

                            <div class="col-md-6">
                                <input id="pelajaran" type="text" class="form-control" name="pelajaran" value="{{ $paket->pelajaran }}" required>

                                @if ($errors->has('pelajaran'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pelajaran') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tahun') ? ' has-error' : '' }}">
                            <label for="tahun" class="col-md-4 control-label">tahun</label>

                            <div class="col-md-6">
                                <input id="tahun" type="text" class="form-control" name="tahun" value="{{ $paket->tahun }}" required>

                                @if ($errors->has('tahun'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="semester" class="col-md-4 control-label">Semester</label>
                            <div class="col-md-6"   >
                                <select name="semester" class="form-control">
                                    <option value="1">1 </option>
                                    <option value="2">2</option>
                                  </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jadwal_hari" class="col-md-4 control-label">Hari</label>
                            <div class="col-md-6"   >
                                <select name="jadwal_hari" class="form-control">
                                    <option value="senin">Senin </option>
                                    <option value="selasa">Selasa</option>
                                    <option value="rabu">Rabu</option>
                                    <option value="kamis">Kamis</option>
                                    <option value="jumat">Jumat</option>
                                    <option value="sabtu">Sabtu</option>
                                    <option value="minggu">Minggu</option>
                                  </select>

                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jadwal_mulai') ? ' has-error' : '' }}">
                            <label for="jadwal_mulai" class="col-md-4 control-label">jadwal_mulai</label>

                            <div class="col-md-6">
                                <input id="jadwal_mulai" type="text" class="form-control" name="jadwal_mulai" value="{{ $paket->jadwal_mulai }}" required>

                                @if ($errors->has('jadwal_mulai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jadwal_mulai') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('jadwal_selesai') ? ' has-error' : '' }}">
                            <label for="jadwal_selesai" class="col-md-4 control-label">jadwal_selesai</label>

                            <div class="col-md-6">
                                <input id="jadwal_selesai" type="text" class="form-control" name="jadwal_selesai" value="{{ $paket->jadwal_selesai}}" required>

                                @if ($errors->has('jadwal_selesai'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jadwal_selesai') }}</strong>
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