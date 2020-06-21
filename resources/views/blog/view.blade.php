@extends('blog.app')
@section('isi')
  <div id="hot-post" class="row hot-post">
        <div class="col-md-8 hot-post-left">
            <!-- post -->
        
            
        <h1>{{ $post->judul }}</h1>
        <p>
            <img src="{{asset('public/uploads/posts/'.$post->gambar) }}" alt="">
            {!! $post->content !!}

            <div class="section-row">
                <div class="section-title">
                    <h3 class="title">{{ $comments->count()}} Comments</h3>
                </div>
                <div class="post-comments">
                    @foreach ($comments as $data)
                    <!-- comment -->
                        
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object" src="{{ asset('/public/frontend/img/avatar.png')}}" alt="">
                        </div>
                        <div class="media-body">
                            <div class="media-heading">
                                <h4>{{ $data->nama}}</h4>
                                <span class="time">{{$data->created_at->diffForHumans()}}</span>
                            </div>
                            <p>{{ $data->pesan}}</p>
                            
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="section-row">
                <div class="section-title">
                    <h3 class="title">Write comment</h3>
                </div>
                
                <div class="row">
                    <form action="{{route('blog.comment')}}" method="post">
                        @csrf
                        @method('POST') 
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="input" name="pesan" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="input" type="text" name="nama" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="input" type="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="input" type="text" name="website" placeholder="Website">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="primary-button">Submit</button>
                        </div>
                  
                    </div>
                </form>
            </div>
        </p>
       
        
    </div>    

@endsection