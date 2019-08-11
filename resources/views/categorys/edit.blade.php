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
                <h3 class="panel-title">Edit Data Category</h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <form action="{{route('category.update', $category->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('PUT')}} 
                        <div class="form-group col-md-12 {{$errors->has('nama_depan') ? 'has-error' : ' '}}">
                            <label for="name">Name</label>
                            <input name ="name"type="text" class="form-control" id="name" placeholder="Name Category" value="{{$category->name}}">
                            @if($errors -> has('name'))
                                    <span class="help-block">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
        
            