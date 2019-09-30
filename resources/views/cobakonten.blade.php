@extends('layouts.nav')

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
    color: black;
    font-weight: 800px;

  }

  a:hover{
    color: blueviolet;
    text-decoration: none;
  }

  .card{
    max-height: auto;
    min-height: 100px;
    margin-bottom : 20px;
    padding : 20px;
  }


  img:hover{
    transform: scale(1.1);
  }
</style>
@endsection
<br><br><br><br>
@section('isi')
<div class="main">
  <div class="main-content">
      <div class="row">
          <div class="col-md-12">
              <div class="row my-4 justify-content-center">
                  @foreach($kontens as $post)
                  <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 d-flex">
                      <div class="card">
                          <a href="{{route('coba.show' , $post->slug)}}">
                              <img class="img-thumbnail" id="news-images" src="{{asset('images/'.$post->image)}}" alt="sampul berita" style="border:none;">
                          </a>
                          <div class="judul">
                            <br>
                              <a href="{{route('coba.show' , $post->slug)}}" class="linkJudul">
                                  <b>
                                    {{strtoupper(str_limit($post->title,40))}}
                                  </b>  
                              </a>
                          </div>
                          <div>
                            <br>
                            <span><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                          </div>
                      </div>
                  </div>
                  @endforeach
              </div>
          </div>
          {{-- <div class="paginate text-center">
              {{ $kontens->links() }}
          </div> --}}
      </div>
  </div>
</div>
@endsection