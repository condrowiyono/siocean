@extends('layouts.app')
@section('page-css')
<link href="{{ asset('vendor/datepicker/css/bootstrap-datepicker.min.css') }} " rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Cashflow</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('cashflow.store') }}">
                        {{ csrf_field() }}
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
                            <label for="jenis" class="col-md-4 control-label">Jenis </label>
                            <div class="col-md-6"   >
                                <select name="jenis" class="form-control">
                                    <option value="in">Masuk </option>
                                    <option value="out">Keluar </option>
                                  </select>

                            </div>
                        </div>

                        <div class="form-group">
                        <label for="uraian" class="col-md-4 control-label">uraian</label>
                            <div class="col-md-6">
                                <textarea class="form-control" style="min-height:50px" name="uraian"> 
                                {{ old('uraian') }}
                                </textarea>
                                @if ($errors->has('uraian'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uraian') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('banyaknya') ? ' has-error' : '' }}">
                            <label for="banyaknya" class="col-md-4 control-label">banyaknya</label>

                            <div class="col-md-6">
                                <input id="banyaknya" type="text" class="form-control" name="banyaknya" value="{{ old('banyaknya') }}" required>

                                @if ($errors->has('banyaknya'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('banyaknya') }}</strong>
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
