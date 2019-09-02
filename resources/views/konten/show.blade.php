@extends('layouts.app')

@section('css')
    <style>
        @font-face {
            font-family: "superfont";
            src: url("{{asset('font/superfont.ttf')}}") format('truetype');
        }
        h1{
            /* font-family: "superfont", "arial"; */
            color : black;
            font-weight : bold;
        }
        .iframe-container{
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            height: 0;
        }
        .iframe-container iframe{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
@section('content')
    <div class="main">
        <div class="main-content">
            <div class="panel-body">
                <div class="row justify-content-center align-items-center">
                    <div class="content">
                        <div class="col-md-12">
                                <h1>{{strtoupper($konten->title)}}</h1>
                                <div class="asker-meta">
                                    <span>{{ date('j F Y, h:ia', strtotime($konten->created_at))}}</span> <br>
                                    <span class="label label-default">{{$konten->category->name}}</span>
                                </div>
                        </div>
    
                        
                        <div class="col-md-12">
                            <br>
                            <div class="iframe-container">
                                {!! $konten->link_youtube !!}
                            </div>
                            <br>
                            <div class="post-content">
                                <p>{!! $konten->content !!}</p>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
@endsection