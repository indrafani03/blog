@extends('admin.layout.app')
@section('judul', 'Tag edit')
@section('header-section')
    <h4>Tags</h4>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Tags</a></div>
        <div class="breadcrumb-item"><a href="#">Edit</a></div>
        
      </div>
@endsection
@section('conten')
      <div class="row">
          <div class="col-lg">
            <div class="card">
                <div class="card-header">
                  <h4> Tags</h4>
                  
                </div>
                <div class="card-body">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                        <h4>Edit Tag</h4>
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
                        <form action="{{ route('tag.update', $tag->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{ $tag->name }}">
                                </div>  
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
@endsection
                       




