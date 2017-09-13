@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="https://unsplash.imgix.net/photo-1421986527537-888d998adb74?w=1024&q=50&fm=jpg&s=e633562a1da53293c4dc391fd41ce41d" class="img-responsive img-thumbnail">
                <h4>
                @if (auth()->user()->id==$user->biodata->id)
                    <a href="petugas/edit" class="btn btn-blocked btn-success"><span class="fa fa-edit"></span> </a>
                @endif
                {{$user->biodata->nama}}
                </h4>
                <h5>
                  <small>{{$user->biodata->role}}</small>
                </h5>
                <h6>
                  <i class="fa fa-globe fa-fw"></i>{{$user->biodata->alamat}}</h6>
                <h6>{{$user->posisi}}</h6>
                </div>
            </div>
             <div class="panel panel-default">
            <div class="panel-body">
            <div style="height: 200px" id="map"></div>
            </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading">
                Biodata
                </div>
                <div class="panel-body">
                    <div class="row">
                    <div class="col-sm-4">
                        Nama
                    </div>
                    <div class="col-md-8">
                        {{$user->biodata->nama}}
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                        Jenis Kelamin
                    </div>
                    <div class="col-md-8">
                        {{$user->biodata->jeniskelamin}}
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                        Email dan HP 
                    </div>
                    <div class="col-md-8">
                        {{$user->biodata->email}}
                        {{$user->biodata->no_hape}}
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">
                        Alamat
                    </div>
                    <div class="col-md-8">
                        {{$user->biodata->alamat}}
                    </div>
                    </div>
                    </div>
                </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                Biodata
                </div>
                <div class="panel-body">
                  <a href="{{route('cashflow.index')}}" class="btn btn-success">Cashflow</a>
                  <a href="{{route('kegiatan.index')}}" class="btn btn-success">Kegiatan</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
  <script>
    var map = new GMaps({
      el: '#map',
      lat: -12.043333,
      lng: -77.028333
    });
      GMaps.geocode({
        address: '{{$user->biodata->alamat}}',
        callback: function(results, status){
          if(status=='OK'){
            var latlng = results[0].geometry.location;
            map.setCenter(latlng.lat(), latlng.lng());
            map.addMarker({
              lat: latlng.lat(),
              lng: latlng.lng()
            });
          }
        }
      });
  </script>
@endsection
