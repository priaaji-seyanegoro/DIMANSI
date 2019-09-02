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
                <h3 class="panel-title">Edit Data Kontens</h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-12">
                        <form action="{{route('konten.store')}}" method="post" enctype="multipart/form-data">
                            <div class="text-center">
                                <h4>Buat Postingan</h4>
                            </div>

                            @if(session('info'))
                                <div class="alert alert-success">
                                    {{session('info')}}
                                </div>
                            @endif


                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="title">Title : </label>
                                <input type="text" name="title" class="form-control" placeholder="Input Title .. " value="{{ old('title') }}">
                                @if($errors->has('title'))
                                    <strong class="text-danger"> {{$errors->first('title')}} </strong>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="category">Category : </label>
                                <select name="category" id="" class="form-control">
                                    <option value="" class="disable selected">Pilih Kategori</option>
                                    @foreach($categorys as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category'))
                                    <strong class="text-danger"> {{$errors->first('category')}} </strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image">Upload Image : </label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="link_youtube">Link Iframe Youtube </label>
                                <input type="text" name="link_youtube" class="form-control" placeholder="Input Link .. " value="{{ old('link_youtube') }}">
                                @if($errors->has('link_youtube'))
                                    <strong class="text-danger"> {{$errors->first('link_youtube')}} </strong>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="content">Content : </label>
                                <textarea name="content" id="editor" class="form-control" placeholder="Input Content .." >{{ old('content') }}</textarea>
                                @if($errors->has('content'))
                                    <strong class="text-danger"> {{$errors->first('content')}} </strong>
                                @endif
                            </div>

                            <button class="btn btn-success" type="submit">Save</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace( 'editor', options );
    </script>
@endsection
        
            