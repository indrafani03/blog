@extends('blog.app')

@section('isi')
    
    <div id="hot-post" class="row hot-post">
        <div class="col-md-8 hot-post-left">
            <!-- post -->
            <div class="post post-thumb">
                <a class="post-img" href="blog-post.html"><img src="{{asset('public/frontend/img/hot-post') }}-1.jpg" alt=""></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="category.html">Lifestyle</a>
                    </div>
                    <h3 class="post-title title-lg"><a href="blog-post.html">Postea senserit id eos, vivendo periculis ei qui</a></h3>
                    <ul class="post-meta">
                        <li><a href="author.html">John Doe</a></li>
                        <li>20 April 2018</li>
                    </ul>
                </div>
            </div>
            <!-- /post -->
        </div>
        <div class="col-md-4 hot-post-right">
            <!-- post -->
            <div class="post post-thumb">
                <a class="post-img" href="blog-post.html"><img src="{{asset('public/frontend/img/hot-post') }}-2.jpg" alt=""></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="category.html">Lifestyle</a>
                    </div>
                    <h3 class="post-title"><a href="blog-post.html">Sed ut perspiciatis, unde omnis iste natus error sit</a></h3>
                    <ul class="post-meta">
                        <li><a href="author.html">John Doe</a></li>
                        <li>20 April 2018</li>
                    </ul>
                </div>
            </div>
            <!-- /post -->

            <!-- post -->
            <div class="post post-thumb">
                <a class="post-img" href="blog-post.html"><img src="{{asset('public/frontend/img/hot-post') }}-3.jpg" alt=""></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="category.html">Fashion</a>
                        <a href="category.html">Lifestyle</a>
                    </div>
                    <h3 class="post-title"><a href="blog-post.html">Mel ut impetus suscipit tincidunt. Cum id ullum laboramus persequeris.</a></h3>
                    <ul class="post-meta">
                        <li><a href="author.html">John Doe</a></li>
                        <li>20 April 2018</li>
                    </ul>
                </div>
            </div>
            <!-- /post -->
        </div>
    </div>
    <!-- /row -->


    <!-- SECTION -->
    <div class="section">
    <!-- container -->
    <div class="container">
    <!-- row -->
    <div class="row">
        <div class="col-md-8">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Recent posts</h2>
                    </div>
                </div>
                @foreach ($posts as $data)
                <!-- post -->
                <div class="col-md-6">
                    <div class="post">
                        <a class="post-img" href="{{ url('/view/'.$data->slug) }}"><img src="{{asset('public/uploads/posts/'.$data->gambar) }}" alt=""></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="category.html">{{ $data->category->name }}</a>
                            </div>
                            <h4 class="post-title"><a href="{{ url('/view/'.$data->slug) }}">{{ $data->judul}}</a></h4>
                            <ul class="post-meta">
                                <li><a href="author.html">{{ $data->users->name }}</a></li>
                                <li>{{$data->created_at->diffForHumans()}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /post -->
                    
                @endforeach

                
            </div>
            <!-- /row -->

            

            
            {{-- <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Technology & Health</h2>
                    </div>
                </div>
                

                
            </div> --}}
            <!-- /row -->
        </div>
@endsection