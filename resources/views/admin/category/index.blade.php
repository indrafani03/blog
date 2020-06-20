@extends('admin.layout.app')
@section('judul', 'Category')
@section('header-section')
    <h4>Category</h4>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Category</a></div>
        
      </div>
@endsection
@section('conten')
      <div class="row">
          <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                  <h4>Category table</h4>
                  
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
                        <th>Slug</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($category as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->slug }}</td>
                            <td>
                                <form action="{{ route('category.destroy', $data->id ) }}" method="post">
                                <a class="btn btn-success" href="{{ route('category.edit', $data->id)}}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                  </tbody></table>
                </div>
              </div>
              <div class="card-footer text-right">
                <nav class="d-inline-block">
                  <ul class="pagination mb-0">
                    {{ $category->links() }}
                </li>
              </ul>
            </nav>
            </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                  <h4>Tambahkan Category</h4>
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
                <form action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan category">
                        </div>  
                        <button type="submit" class="btn btn-primary">+ Tambahkan</button>
                     </div>
                    </form>
                  </div>
                </div>
            </div>
@endsection
                       




