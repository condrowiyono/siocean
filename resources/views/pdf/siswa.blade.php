<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
/*  KOLOM  */
/*  PERSIAPAN UNTUK KOLOM  */
.section {
	clear: both;
	display: block;
}
table {
  border-collapse: collapse;
}

.tipis {
  border: 1px solid #999;
}

.col {
	display: block;
	float:left;
	margin: 1% 2.3% 0 0;
}

/*  SATUIN  */
.group:before, .group:after { 
	content:""; display:table; 
}
.group:after { 
	clear:both;
}

.u12 {
	width: 96%;
}
.u11 {
	width: 89%;
}
.u9 {
	width: 72%;
}
.u8 {
	width: 64%;
}
.u6 {
	width: 47.5%;
}
.u4 {
	width: 31%
}
.u3 {
	width: 22.6%;
}
.u2 {
	width: 14%;
}
.u1 {
	width: 7%; 
}
	.penuh {
    	width: 100%;
    }
    .border-line{
    	border: solid 1px black;
    	margin: 4px;
    }
    .border-tipis{
    	border: solid 1px #cccccc;
    	margin: 4px;
    	padding: 5px;
    }

    body {
    	font-size: 10pt;
    	font-family: Arial;
    }
    .enter {
    	page-break-after: always;
    }
</style>
<style tyle="text/css" media="print">
    body {
    	font-size: 10pt;
    }
	@page
	{
		margin: 2cm;
	}
   @media print
   {
      p.bodyText {font-family:georgia, times, serif;}
   }
   

    .judul {color: #2980b9;}

}

</style>
</head>
<body>

<div class="enter wraped">
<div class="section group" >
<div class="col u12">
		<div class="border-line">
			<table>
				<tr>
					<td width="20%">
					</td>
					<td>
						OCEAN EDUCATION
						<br>Jalan A.H Nasution No.103, Nasution Square, Ruko No.7, Karang Pamulang, Mandalajati, Karang Pamulang, Mandalajati, Kota Bandung, Jawa Barat 40194
					</td>
					<td width="20%">
					
					</td>
				</tr>
			</table>
		</div>
		<div class="border-tipis">
			<table>
				<tr>
					<td class="30%"><strong>Nama Siswa</strong></td>
					<td class="5%">:</td>
					<td>{{$user->biodata->nama}}</td>
				</tr>
				<tr>
					<td class="30%"><strong>Jenis Kelamin</strong></td>
					<td class="5%">:</td>
					<td>{{$user->biodata->jeniskelamin}}</td>
				</tr>
				<tr>
					<td class="30%"><strong>SEKOLAH</strong></td>
					<td class="5%">:</td>
					<td>{{$user->asalsekolah}}</td>
				</tr>
				<tr>
					<td class="30%"><strong>No Telepon</strong></td>
					<td class="5%">:</td>
					<td>{{$user->biodata->no_hape}}</td>
				</tr>
			</table>
			
		</div>
		<div class="border-tipis">
			<h4><center>DAFTAR NILAI</center></h4>
			<table class="table" border="1" width="100%">
                    <thead>
                    <tr>
                        <td><b><center>Pelajaran</center></b></td>
                        <td><b><center>Pengajar</center></b></td>
                        <td><b><center>Materi</center></b></td>
                        <td><b><center>Nilai</center></b></td>
                        <td><b><center>Deskrispi</center></b></td>
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
		<div class="border-tipis" >
			<div>

				<strong>Catatan</strong>
				<br/>_____________________________________________________________
				<br/>_____________________________________________________________
				<br/>_____________________________________________________________

				
			</div>
		</div>
		<div class="border-tipis" >
		<table>
				<tr>
					<td width="70%">
					</td>
					<td width="30">
						Bandung, @php ($tanggal = date("d, M Y")) {{$tanggal}}
						<br/>Kepala Bimbingan Belajar
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>Hari Wibowo


					</td>
				</tr>
			</table>
		</div>
		</div>
</div>

</div>
<br/>
<br/>
<br/>
<br/>
</body>
</html>