@extends('blog.app')
@section('isi')
  <div id="hot-post" class="row hot-post">
        <div class="col-md-8 hot-post-left">
            <!-- post -->
        @foreach ($post as $data)
            
        <h1>{{ $data->judul }}</h1>
        <p>
            <img src="{{asset('public/uploads/posts/'.$data->gambar) }}" alt="">
            {!! $data->content !!}
        </p>
        @endforeach
        
    </div>    

@endsection