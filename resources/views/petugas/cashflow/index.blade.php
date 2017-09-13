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
            Cashflow
                <a href="{{route('cashflow.create')}}" class="btn btn-primary pull-right"> BUAT BARU</a>
                <div class="">
                    <div class="table table-responsive">
                    <table class="table" id="contoh">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>Tanggal</td>
                        <td>Jenis</td>
                        <td>Uraian</td>
                        <td>Banyaknya</td>
                        <td>Saldo</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($cashflow as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->tanggal}}</td>
                        <td>{{$data->jenis}} </td>
                        <td>{{$data->uraian}}</td>
                        <td>{{$data->banyaknya}}</td>
                        <td>{{$data->saldo}}</td>
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
