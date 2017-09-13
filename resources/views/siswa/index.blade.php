@extends('layouts.app')
@section('page-css')
<link rel="stylesheet" type="text/css" href="/vendor/fancybox/jquery.fancybox.css" media="screen" />
<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img src="https://unsplash.imgix.net/photo-1421986527537-888d998adb74?w=1024&q=50&fm=jpg&s=e633562a1da53293c4dc391fd41ce41d" class="img-responsive img-thumbnail">
                <h4>
                @if (auth()->user()->id==$user->biodata->id)
                    <a href="siswa/edit" class="btn btn-blocked btn-success"><span class="fa fa-edit"></span> </a>
                @endif
                {{$user->biodata->nama}}
                </h4>
                <h5>
                  <small>{{$user->biodata->role}}</small>
                </h5>
                <h6>
                  <i class="fa fa-globe fa-fw"></i>{{$user->biodata->alamat}}</h4>
                <h6>
                  <i class="fa fa-university fa-fw"></i>{{$user->asalsekolah}}</h4>
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
                Paket
                </div>
                <div class="panel-body">
                <a href="/siswa/paketsiswa" class="btn btn-primary">Kelola Paket</a>
                    <div class="table table-responsive">
                    <table class="table" id="contoh">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Pelajaran</td>
                        <td>Guru</td>
                        <td>Jadwal Hari</td>
                        <td>Jadwal</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($paket as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->paketnya->pelajaran}}</td>
                        <td>{{$data->pengajarnya->biodata->nama}} </td>
                        <td>{{$data->paketnya->jadwal_hari}}</td>
                        <td>{{$data->paketnya->jadwal_mulai}}</td>
                        <td>{{$data->paketnya->jadwal_selesai}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                </div>
            </div> 
            <div class="panel panel-success">
                <div class="panel-heading">
                Nilai
                </div>
                <div class="panel-body">
                <div class="table table-responsive">
                    <a href="/siswa/nilai" class="btn btn-primary">Cetak</a>
                    <table class="table" id="contoh">
                    <thead>
                    <tr>
                        <td>Pelajaran</td>
                        <td>Pengajar</td>
                        <td>Materi</td>
                        <td>Nilai</td>
                        <td>Deskrispi</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($nilai as $data)
                    <tr>
                        <td>{{$data->paketnya->pelajaran}}</td>
                        <td>{{$data->pengajarnya->biodata->nama}}  </td>
                        <td>{{$data->materi}}</td>
                        <td>{{$data->nilai}}</td>
                        <td>{{$data->deskripsi}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')

<script src="https://nightly.datatables.net/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="/vendor/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
      var table = $('#contoh').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
      $(".various").fancybox({});
    } );

</script>

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

