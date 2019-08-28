@extends('layouts.app')

@section('content')
<div class="main">
<div class="main-content">
	<div class="container-fluid">
        <div class="row">
<div class="col-md-12">

			<!-- BORDERED TABLE -->
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Nilai</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode</th>
								<th>Nama Pelajaran</th>
								<th>Nilai</th>

							</tr>
						</thead>
						<tbody>
							@php
								$no = 1;
							@endphp
							@foreach(auth()->user()->siswa->mapel as $mapel)
							<tr>
								<td>{{$no}}</td>
								<td>{{$mapel->kode}}</td>
								<td>{{$mapel->nama}}</td>
								<td>{{$mapel->pivot->nilai}}</td>
								
							</tr>
							@php
								$no++;
							@endphp
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!-- END BORDERED TABLE -->

		</div>
	</div>
</div>
</div>
</div>
@endsection