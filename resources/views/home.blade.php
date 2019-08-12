<!DOCTYPE html>
@extends('layouts.app')
@section('css')
    <style media="screen">
      @font-face {
        font-family: "superfont";
        src: url("{{asset('font/superfont.ttf')}}") format('truetype');
      }

      h3{
        text-align: center;
        font-family: "superfont", "arial";
        font-size: 25px;

      }

      .linkJudul{
        color: white;

      }

      a:hover{
        color: black;
        text-decoration: none;
      }

      .card{
        max-height: auto;
        min-height: 300px;
        margin-bottom : 20px;
        padding : 20px;
        object-fit: cover;
        border-radius: 30px;
        box-shadow: 0px 5px 20px black;
        background-color: #00AAFF;
      }

      .img-thumbnail{
        border-radius: 20%;
      }

      img:hover{
        transform: scale(1.1);
      }
    </style>
@endsection

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="row my-4 justify-content-center">
                        @foreach($kontens as $post)
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 d-flex">
                            <div class="card">
                                <a href="{{route('konten.show' , $post->slug)}}">
                                    <img class="img-thumbnail" id="news-images" src="{{asset('images/'.$post->image)}}" alt="sampul berita" style="border:none;">
                                </a>
                                <div class="judul">
                                    <a href="{{route('konten.show' , $post->slug)}}" class="linkJudul" >
                                        <h3 class="card-title">{{strtoupper($post->title)}} </h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="paginate text-center">
                    {{ $kontens->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

