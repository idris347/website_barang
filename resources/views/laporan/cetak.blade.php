<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Data Barang</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
			<th   >No.</th>
              <th >id Barang</th>
            <th >Nama Barang</th>
            <th >jenis</th>
             <th >Stok</th>
            <th >Satuan</th>
            <th >foto</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($laporan as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->id_barang}}</td>
				<td>{{$p->nama_barang}}</td>
				<td>{{$p->jenis}}</td>
                <td>{{ $p->stok_minimal }}</td>
                <td>{{ $p->satuan }}</td>
                <td><img width="75px" height="75px" src="{{ url('/data_file/'.$p->foto) }}"></td>      
			</tr>
			@endforeach
		</tbody>
	</table>
 
</body>
</html>