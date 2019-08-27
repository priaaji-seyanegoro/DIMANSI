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
								<th>Kode</th>
								<th>Nama Pelajaran</th>
								<th>Nilai</th>

							</tr>
						</thead>
						<tbody>
							@foreach(auth()->user()->siswa->mapel as $mapel)
							<tr>
								<td>{{$mapel->kode}}</td>
								<td>{{$mapel->nama}}</td>
								<td>{{$mapel->pivot->nilai}}</td>
								
							</tr>
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