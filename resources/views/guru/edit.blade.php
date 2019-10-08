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
             <form action="/guru/{{$guru->id}}/update" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                  <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="inputEmail4">Nama Depan</label>
                                      <input name ="nama_depan"type="text" class="form-control" id="Nama_Depan" placeholder="Nama Depan" value="{{$guru->nama_depan}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label for="inputPassword4">Nama Belakang</label>
                                      <input name ="nama_belakang"type="text" class="form-control" id="Nama_Belakang" placeholder="Nama Belakang" value="{{$guru->nama_belakang}}">
                                    </div>
                                  </div>
                                  <div class="form-group col-md-12 {{$errors->has('tanggal_lahir') ? 'has-error' : ' '}}">
                                      <label for="tanggal_lahir ">Tanggal lahir</label>
                                      <input name="tanggal_lahir" type="text" class="form-control" id="tanggal_lahir" aria-describedby="emailHelp" placeholder="Tanggal lahir" value="{{$guru->tanggal_lahir}}">
                                      @if($errors -> has('tanggal_lahir'))
                                      <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
                                      @endif
                                    </div>
                                  <div class="form-group col-md-12">
                                    <label for="exampleFormControlSelect">Jenis Kelamin</label>
                                     <select name ="jenis_kelamin" class="form-control custom-select">
                                      <option selected>Jenis Kelamin</option>
                                      <option value="Laki-laki" @if($guru->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                      <option value="Perempuan" @if($guru->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                      <label for="inputEmail4">Gelar</label>
                                      <input name ="gelar"type="text" class="form-control" id="gelar" placeholder="gelar" value="{{$guru->gelar}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label for="inputEmail4">Agama</label>
                                      <input name ="agama" type="text" class="form-control" id="agama" placeholder="agama" value="{{$guru->agama}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                      <label for="nomer">Nomer</label>
                                      <input name ="nomer"type="text" class="form-control" id="gelar" placeholder="gelar" value="{{$guru->nomer}}">
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="exampleFormControlTextarea1" value="{{$guru->Alamat}}">Alamat</label>
                                    <textarea name ="alamat"class="form-control" id="exampleFormControlTextarea1" rows="3"> {{$guru->alamat}}</textarea>
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
        
            