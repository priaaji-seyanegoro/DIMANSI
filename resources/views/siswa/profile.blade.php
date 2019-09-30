@extends('layouts.app')

@section('header')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

@endsection
@section('content')
<div class="main">

			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					 @if(session('sukses'))
        <div class="alert alert-success" role="alert">
              {{session('sukses')}}
            </div>
        @endif
         @if(session('error'))
        <div class="alert alert-danger" role="alert">
              {{session('error')}}
            </div>
        @endif
<div class="panel panel-profile">
	<div class="clearfix">
		<!-- LEFT COLUMN -->
		<div class="profile-left">

			<!-- PROFILE HEADER -->
			<div class="profile-header">
				<div class="overlay"></div>
				<div class="profile-main">
					<img src="{{$siswa->getAvatar()}}" width="90px" height="90px" class="img-circle" alt="Avatar">
					<h3 class="name">{{$siswa->nama_lengkap()}}</h3>
					
				</div>
				<div class="profile-stat">
					<div class="row">
						<div class="col-md-6 stat-item">
							{{$siswa->mapel->count()}}<span>Mata Pelajaran</span>
						</div>
						<div class="col-md-6 stat-item">
							{{$siswa->mapel->count()}}<span>Kelas</span>
						</div>
					</div>
				</div>
			</div>
			<!-- END PROFILE HEADER -->

			<!-- PROFILE DETAIL -->
			<div class="profile-detail">
				<div class="profile-info">
					<h4 class="heading">Data Diri</h4>
					<ul class="list-unstyled list-justify">
						<li>Jenis Kelamin<span>{{$siswa->jenis_kelamin}}</span></li>
						<li>No Handphone<span>{{$siswa->nomer}}</span></li>
						<li>Alamat<span>{{$siswa->alamat}}</span></li>
						<li>Tanggal Lahir <span></a></span></li>
					</ul>
				</div>
				<div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
			</div>
			<!-- END PROFILE DETAIL -->
		</div>
		<!-- END LEFT COLUMN -->

		<!-- RIGHT COLUMN -->

		<div class="profile-right">
			@if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
			<h4 class="heading"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  				Input Nilai
				</button>
			</h4>
			@endif

			<!-- AWARDS -->
			
			<!-- END AWARDS -->

			<!-- TABBED CONTENT -->
			<div class="custom-tabs-line tabs-line-bottom left-aligned">
				<ul class="nav" role="tablist">
					<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Nilai Siswa</a></li>
				</ul>
			</div>
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Nilai</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Nama Pelajaran</th>
								<th>Nilai</th>
								@if(auth()->user()->role == 'admin')
								<th>Aksi</th>
								@endif

							</tr>
						</thead>
						<tbody>
							@foreach($siswa->mapel as $mapel)
							<tr>
								<td>{{$mapel->kode}}</td>
								<td>{{$mapel->nama}}</td>
								<td><a href="#" class="nilai" data-type="text" data-pk="{{$mapel->id}}" data-url="/api/siswa/{{$siswa->id}}/editnilai" data-title="Masukkan Nilai">{{$mapel->pivot->nilai}}</a>
								</td>
								@if(auth()->user()->role == 'admin')
								<td><a href="/siswa/{{$siswa->id}}/{{$mapel->id}}/deletenilai" class ="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?')">Delete</a>
								</td>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!-- END TABBED CONTENT -->
		</div>
		<!-- END RIGHT COLUMN -->
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Nilai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        		<div class="form-group">
   				 <label for="mapel">Mata Pelajaran</label>
    				<select class="form-control" id="mapel" name="mapel">
    					@foreach($matapel as $map)
      						<option value="{{$map->id}}">{{$map->nama}}</option>
      					@endforeach
    				</select>
  				</div>
      		<div class="form-group {{$errors->has('nilai') ? 'has-error' : ' '}}">
        				<label for="exampleInputEmail1">Nilai</label>
        				<input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai" value="0">
        				@if($errors -> has('nilai'))
          				<span class="help-block">{{$errors->first('nilai')}}</span>
        				@endif
      		</div>		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
  </form>
    </div>
  </div>
</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
@endsection
@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
	    $(document).ready(function() {
        $('.nilai').editable();
    });	
</script>

@endsection