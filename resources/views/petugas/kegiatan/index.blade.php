@extends('layouts.app')
@section('page-css')
<link rel="stylesheet" type="text/css" href="/vendor/fancybox/jquery.fancybox.css" media="screen" />
<link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            Kegiatan
                <a href="{{route('kegiatan.create')}}" class="btn btn-primary pull-right"> BUAT BARU</a>
                <div class="">
                    <div class="table table-responsive">
                    <table class="table" id="contoh" data-form="deleteForm">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Tempat</td>
                        <td>Tanggal</td>
                        <td>Deskripsi</td>
                        <td>Edit</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($kegiatan as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->tempat}}</td>
                        <td>{{$data->tanggal}} </td>
                        <td>{{$data->deskripsi}}</td>
                        <td>
                            
                            <form method="POST" action="{{route('kegiatan.destroy', $data->id)}}" accept-charset="UTF-8">
                            <input name="_method" type="hidden" value="DELETE">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <a href="{{route('kegiatan.edit', $data->id)}}" class="btn-raised btn btn-primary">EDIT</a>
                            <input type="submit" class="btn btn-danger" value="HAPUS">
                        </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script type="text/javascript">
  //MENAMPILKAN PESAN
  @if (session()->has('pesan'))
    alertify.success("{{ (string)Session::get('pesan') }}");
  @endif
</script>

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
@endsection