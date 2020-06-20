@extends('admin.layout.app')
@section('judul', 'Edit post')
@section('text-editor')
    <!-- CSS Libraries -->
 <link rel="stylesheet" href="{{ asset('public/assets/modules/summernote/summernote-bs4.css') }}">
 <link rel="stylesheet" href="{{ asset('public/assets/modules/select2/dist/css/select2.min.css ') }}">

@endsection
@section('header-section')
    <h4>Posts</h4>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Posts</a></div>
        <div class="breadcrumb-item"><a href="#">Edit</a></div>
        
      </div>
@endsection

@section('conten')

    <div class="card">
        <div class="card-header">
          <h4>Edit postingan</h4>
        </div>
         
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
         @csrf
         @method('PUT')   
        <div class="card-body">
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="judul" value="{{ $post->judul }}">
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
            <div class="col-sm-12 col-md-7">
              <select name="category_id" class="form-control selectric">
                @foreach ($category as $data)
                   
                <option value="{{ $data->id }}"
                      @if ($data->id == $post->category_id)
                    selected
                @endif
                >{{ $data->name }}</option>
                    
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Tag</label>
            <div class="col-sm-12 col-md-7">
            <select class="form-control select2" multiple="" name="tags[]">
              @foreach ($tags as $data)
              <option value="{{ $data->id  }}"
                
                @foreach ($post->tags as $value)
                    @if ($data->id == $value->id)
                       selected 
                    @endif
                @endforeach
                >{{ $data->name }}</option>
              
              @endforeach
             
            </select>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
            <div class="col-sm-12 col-md-7">
              <textarea name="content" class="summernote">{{ $post->content }}</textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
              <div class="col-sm-12 col-md-7">
                <img src="{{ asset('public/uploads/posts/'.$post->gambar) }}" class="img-fluid" style="width: 200px" alt="" srcset="">
                <br><span>Upload gambar jika ingin di ganti </span>
                <input type="file" name="gambar" class="form-control">
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
            <div class="col-sm-12 col-md-7">
              <button class="btn btn-primary">Publish</button>
            </div>
          </div>
        </div>
        </form>
      </div>
  
    @section('js-text-editor')
    <script src="{{ asset('public/assets/modules/summernote/summernote-bs4.js') }}"></script>
    @endsection
    @section('multipel-select')
    <script src="{{ asset('public/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    @endsection
@endsection

