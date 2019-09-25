@extends('layouts.app')

@section('content')
	<div class="main">
		 @if(session('sukses'))
        <div class="alert alert-success" role="alert">
              {{session('sukses')}}
            </div>
        @endif
		<div class="main-content">
			<div class="container-fluid">
		        <div class="row">
		<div class="col-md-12">

					<!-- BORDERED TABLE -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Kuis</h3>
							 @if(auth()->user()->role == 'admin' || auth()->user()->role == 'guru')
		                    <div class="right">
		                        <button type="button" class="btn"  data-toggle="modal" data-target="#md">
		                      Tambahkan Kuis
		                    </button>
		                        <button type="button" class="btn-primary btn-sm" data-toggle="modal" data-target="#md"><i class="lnr lnr-cross"></i></button>
		                    </div>
		                    @endif
						</div>
						<div class="panel-body">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode</th>
										<th>Nama Kuis</th>
										 @if(auth()->user()->role == 'siswa' || auth()->user()->role == 'admin')
										<th>Ambil</th>
										 @endif
									</tr>
								</thead>
								<tbody>
									@php
										$no = 1;
									@endphp
									@foreach($data as $dat)
									<tr>
										<td>{{$no}}</td>
										<td>{{$dat->kode_kuis}}</td>
										<td>{{$dat->nama_kuis}}</td>
										 @if(auth()->user()->role == 'siswa' || auth()->user()->role == 'admin')
										<td><a href="/show/{{$dat->id}}" class="btn btn-secondary btn-sm">Ambil Kuis</a></td>
										 @endif
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

<!--modal-->
<div class="modal fade" id="md" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kuis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="/kuis/create" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
      <div class="form-group {{$errors->has('kode_kuis') ? 'has-error' : ' '}}">
        <label for="exampleInputEmail1">Kode</label>
        <input name="kode_kuis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kode">
        @if($errors -> has('kode_kuis'))
          <span class="help-block">{{$errors->first('kode_kuis')}}</span>
        @endif
      </div>
      <div class="form-group {{$errors->has('nama_kuis') ? 'has-error' : ' '}}">
        <label for="exampleInputEmail1">Nama Kuis</label>
        <input name="nama_kuis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Kuis">
        @if($errors -> has('nama_kuis'))
          <span class="help-block">{{$errors->first('nama_kuis')}}</span>
        @endif
      </div>
      <div class="form-group">
	         <label for="link">Link Kuis</label>
	             <input type="text" name="link" class="form-control" placeholder="Input Link .. " value="{{ old('link') }}">
	               @if($errors->has('link'))
	                   <strong class="text-danger"> {{$errors->first('link')}} </strong>
	               @endif
       </div>
        <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>
@endsection