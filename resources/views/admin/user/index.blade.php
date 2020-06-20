@extends('admin.layout.app')
@section('judul', 'Users')
@section('header-section')
    <h4>Users</h4>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Users</a></div>
        
      </div>
@endsection
@section('conten')
      <div class="row">
          <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                  <h4>Users table</h4>
                  
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
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                      @foreach ($users as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>@if ($data->role_id == 1)
                                admin
                            @else
                                penulis    
                            @endif
                        
                             </td>
                            <td>
                                <form action="{{ route('category.destroy', $data->id ) }}" method="post">
                                <a class="btn btn-success" href="{{ route('user.edit', $data->id)}}">Edit</a>
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
                    {{ $users->links() }}
                </li>
              </ul>
            </nav>
              </div>
            </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                      <h4>Tambahkan User</h4>
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
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" placeholder="Masukan Nama">
                            </div>  
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Masukan Email">
                            </div>  
                            <div class="form-group">
                                <label>Password</label>
                                <input type="Password" class="form-control" name="password1" placeholder="Masukan Password">
                            </div>  
                            <div class="form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pilh User Role</label>
                                <select class="form-control" name="role_id" id="exampleFormControlSelect1">
                                  <option selected>Pilih User Role</option>
                                  <option value="1">Admin</option>
                                  <option value="2">Penulis</option>
                                </select>
                              </div>  
                            <button type="submit" class="btn btn-primary">+ Tambahkan</button>
                         </div>
                        </form>
                      </div>
                    </div>
                </div>
         
@endsection
                       




