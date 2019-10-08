<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<div class="main">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
              {{session('sukses')}}
            </div>
        @endif
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Guru</h3>
                    <div class="right">
                        <button type="button" class="btn"  data-toggle="modal" data-target="#exampleModal">
                      Tambahkan Data Guru
                    </button>
                        <button type="button" class="btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-cross"></i></button>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($data_guru as $guru)
                        <td>{{$guru->nama_lengkap()}} {{$guru->gelar}}</td>
                        <td>{{$guru->jenis_kelamin}}</td>
                        <td>{{$guru->agama}}</td>
                        <td>{{$guru->alamat}}</td>
                        <td>
                            <a href="/guru/{{$guru->id}}/edit" class ="btn btn-warning btn-sm">Edit</a>
                            <a href="/guru/{{$guru->id}}/delete" class ="btn btn-danger btn-sm " onclick ="return confirm('Yakin data ini mau dihapus ?')">Delete</a>
                        </td>
                    </tr>
                        @endforeach
                        </tbody>
                    </table>
                     {!! $data_guru->render() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
   

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="/guru/create" method="POST">
        {{csrf_field()}}
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Depan</label>
        <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Nama Belakang</label>
        <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
      </div>
      <div class="form-group col-md-12 {{$errors->has('tanggal_lahir') ? 'has-error' : ' '}}">
        <label for="tanggal_lahir ">Tanggal lahir</label>
          <input name="tanggal_lahir" type="text" class="form-control" id="tanggal_lahir" aria-describedby="emailHelp" placeholder="Tanggal lahir">
            @if($errors -> has('tanggal_lahir'))
              <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
            @endif
     </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
        </select>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Gelar</label>
        <input name="gelar" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="gelar">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Agama</label>
        <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="agama">
      </div>
      <div class="form-group {{$errors->has('nomer') ? 'has-error' : ' '}}">
        <label for="nomer">Nomer Handphone</label>
        <input name="nomer" type="text" class="form-control" id="nomer" aria-describedby="emailHelp" placeholder="Masukkan Nomer Handphone">
        @if($errors -> has('nomer'))
        <span class="help-block">{{$errors->first('nomer')}}</span>
        @endif
      </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Alamat</label>
            <textarea name="alamat"class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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


</div>
@endsection
@section('footer')
<script type="text/javascript">
  $('.deletegu').click(function(){
    var guru_id = $(this).attr('guru-id');
    swal({
          title: "Kamu yakin?",
          text: "Akan menghapus guru dengan id "+guru_id+" ??",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          console.log(willDelete);
          if (willDelete) {            
              window.location()="/siswa/"+siswa_id+"/delete";
           
          } 
        });
  });
</script>
@endsection

