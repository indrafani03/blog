@extends('admin.layout.app')
@section('judul', 'Posts')
@section('text-editor')
    <!-- CSS Libraries -->
 <link rel="stylesheet" href="{{ asset('public/assets/modules/summernote/summernote-bs4.css') }}">
 <link rel="stylesheet" href="{{ asset('public/assets/modules/codemirror/lib/codemirror.css') }}">
 <link rel="stylesheet" href="{{ asset('public/assets/modules/codemirror/theme/duotone-dark.css') }}">
 <link rel="stylesheet" href="{{ asset('public/assets/modules/jquery-selectric/selectric.css') }}">
 <link rel="stylesheet" href="{{ asset('public/assets/modules/select2/dist/css/select2.min.css ') }}">

@endsection
@section('header-section')
    <h4>Posts</h4>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Posts</a></div>
        
      </div>
@endsection

@section('conten')

    <div class="card">
        <div class="card-header">
          <h4>Buat postingan</h4>
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
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
         @csrf   
        <div class="card-body">
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
            <div class="col-sm-12 col-md-7">
              <input type="text" class="form-control" name="judul">
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
            <div class="col-sm-12 col-md-7">
              <select name="category_id" class="form-control selectric">
                @foreach ($category as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
                    
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Tag</label>
            <div class="col-sm-12 col-md-7">
            <select class="form-control select2" multiple="" name="tags[]">
              @foreach ($tags as $data)
              <option value="{{ $data->id}}">{{ $data->name}}</option>
              
              @endforeach
             
            </select>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
            <div class="col-sm-12 col-md-7">
              <textarea name="content" class="summernote"></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnailt</label>
            <div class="col-sm-12 col-md-7">
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
    <script src="{{ asset('public/assets/modules/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('public/assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('public/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
    @endsection
    @section('multipel-select')
    <script src="{{ asset('public/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    @endsection
@endsection

