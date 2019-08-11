<!DOCTYPE html>
@extends('layouts.app')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Categories</h3>
                    <div class="right">
                        <button type="button" class="btn"  data-toggle="modal" data-target="#exampleModal">
                      Tambahkan Data Kategori
                    </button>
                        <button type="button" class="btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-cross"></i></button>
                    </div>
                </div>
                @if(session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{session('sukses')}}
                    </div>
                @endif
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Depan</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorys as $row)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$row->name}}</td>
                                    <td> {{ date('j F Y', strtotime($row->created_at))}} </td>
                                    <td> {{ $row->updated_at->diffForHumans() }} </td>
                                    @if(auth()->user()->role == 'admin')
                                    <td>
                                        <a href="{{route('category.edit', $row->id)}}" class ="btn btn-warning btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('category.destroy', [$row->id]) }}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <br>
                                            <button class ="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                        </form>
                                    </td>
                                  @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group {{$errors->has('name') ? 'has-error' : ' '}}">
                <label for="name">Nama Kategori</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Nama Kategori">
                @if($errors -> has('name'))
                    <span class="help-block">{{$errors->first('name')}}</span>
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


</div>
@endsection

