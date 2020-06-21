@extends('blog.app')
@section('isi')
    
<div id="hot-post" class="row hot-post">
    <div class="col-md-8 hot-post-left">
        @foreach ($posts as $data)
            
        <div class="post post-row">
            <a class="post-img" href="{{ url('/view/'.$data->slug) }}"><img src="{{asset('public/uploads/posts/'.$data->gambar) }}" alt=""></a>
            <div class="post-body">
                <div class="post-category">
                    <a href="category.html">{{ $data->category->name }}</a>
                    
                </div>
                <h3 class="post-title"><a href="{{ url('/view/'.$data->slug) }}">{{ $data->judul }}</a></h3>
                <ul class="post-meta">
                    <li><a href="{{ url('/view/'.$data->slug) }}">{{ $data->users->name }}</a></li>
                    <li>{{$data->created_at->diffForHumans()}}</li>
                </ul>
                <p>{!!  substr(strip_tags($data->content), 0, 200) !!}</p>
            </div>
         </div>

        @endforeach
    </div>     
  
@endsection