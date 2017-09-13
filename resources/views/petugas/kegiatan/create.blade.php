@extends('layouts.app')
@section('page-css')
<link href="{{ asset('vendor/datepicker/css/bootstrap-datepicker.min.css') }} " rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Kegiatan</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('kegiatan.store') }}">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('tempat') ? ' has-error' : '' }}">
                            <label for="tempat" class="col-md-4 control-label">tempat</label>

                            <div class="col-md-6">
                                <input id="tempat" type="text" class="form-control" name="tempat" value="{{ old('tempat') }}" required>

                                @if ($errors->has('tempat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tempat') }}</strong>
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
                        <label for="deskripsi" class="col-md-4 control-label">deskripsi</label>
                            <div class="col-md-6">
                                <textarea class="form-control" style="min-height:50px" name="deskripsi"> 
                                {{ old('deskripsi') }}
                                </textarea>
                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
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
