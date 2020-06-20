@extends('admin.layout.app')
@section('judul', 'Posts')
@section('header-section')
    <h4>Posts</h4>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Sampah</a></div>
        
      </div>
@endsection
@section('conten')
      <div class="row">
          <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    
                  
                </div>
                <div class="card-body">
                    @if ($message = Session::get('pesan'))

                    <div class="alert alert-success alert-block">
                    
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                    
                            <strong>{{ $message }}</strong>
                    
                    </div>
                    
                    @endif
                  
                    
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tbody><tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Tags</th>
                        <th>Thumnail</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($posts as $data )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>{{ $data->category->name }}</td>
                            <td>
                              @foreach ($data->tags as $tag)
                                  <ul>
                                    <li>{{ $tag->name }}</li>
                                  </ul>
                              @endforeach
                            </td>
                            <td><img src="{{ asset('public/uploads/posts/'.$data->gambar) }}" class="img-fluid" style="width: 100px"></td>
                            <td>
                                
                            <a class="btn btn-success" href="{{url('/admin/restore/'. $data->id) }}">Restore</a>
                               
                                <a href="{{ url('/admin/hapus/'. $data->id)}}" type="submit" class="btn btn-danger">Hapus</a>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                  </tbody></table>
                </div>
              </div>
              <div class="card-footer text-right">
               
            </div>
            </div>
          </div>
          
@endsection
                       




