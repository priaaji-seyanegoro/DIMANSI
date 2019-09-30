@extends('layouts.app')

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
                            <br>
                              <a href="{{route('game.show' , $post->slug)}}" class="linkJudul">
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