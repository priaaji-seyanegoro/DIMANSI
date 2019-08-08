<!DOCTYPE html>
@extends('layouts.app')

@section('content')
    <div class="main">
    <div class="main-content">
        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
              {{session('sukses')}}
            </div>
        @endif
            <div class="row">
                <div class = "col-md-12">
                    <div class="panel">
                <div class="panel-heading">
                <h3 class="panel-title">Edit Data Siswa</h3>
            </div>
            <div class="panel-body">
            <div class="col-lg-12">
             <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                  <div class="form-row">
                                    <div class="form-group col-md-6 {{$errors->has('nama_depan') ? 'has-error' : ' '}}">
                                      <label for="inputEmail4">Nama Depan</label>
                                      <input name ="nama_depan"type="text" class="form-control" id="Nama_Depan" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
                                       @if($errors -> has('nama_depan'))
                                              <span class="help-block">{{$errors->first('nama_depan')}}</span>
                                       @endif
                                    </div>
                                    <div class="form-group col-md-6 {{$errors->has('nama_belakang') ? 'has-error' : ' '}}">
                                      <label for="inputPassword4">Nama Belakang</label>
                                      <input name ="nama_belakang"type="text" class="form-control" id="Nama_Belakang" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
                                      @if($errors -> has('nama_belakang'))
                                          <span class="help-block">{{$errors->first('nama_belakang')}}</span>
                                        @endif
                                    </div>
                                  </div>

                                    <div class="form-group col-md-12 {{$errors->has('jenis_kelamin') ? 'has-error' : ' '}}">
                                    <label for="exampleFormControlSelect">Jenis Kelamin</label>
                                     <select name ="jenis_kelamin" class="form-control custom-select">
                                      <option selected>Jenis Kelamin</option>
                                      <option value="Laki-laki" @if($siswa->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                      <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                    </select>
                                    @if($errors -> has('jenis_kelamin'))
                                          <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                    @endif
                                </div>

                                <div class="form-group col-md-12 {{$errors->has('alamat') ? 'has-error' : ' '}}">
                                    <label for="exampleFormControlTextarea1" value="{{$siswa->alamat}}">Alamat</label>
                                    <textarea name ="alamat"class="form-control" id="exampleFormControlTextarea1" rows="3"> {{$siswa->alamat}}</textarea>
                                    @if($errors -> has('alamat'))
                                          <span class="help-block">{{$errors->first('alamat')}}</span>
                                    @endif
                                  </div>
                                  <div class="form-group col-md-12 {{$errors->has('avatar') ? 'has-error' : ' '}}">
                                  <label for="exampleFormControlTextarea1">Avatar</label>
                                  <input type="file" name="avatar" class="form-control">
                                  @if($errors -> has('avatar'))
                                      <span class="help-block">{{$errors->first('avatar')}}</span>
                                    @endif
                                  </div>

                                  
                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>
                    </div>
                    </div>
                </div>
        </div>  
    </div>
</div>
@endsection
        
            