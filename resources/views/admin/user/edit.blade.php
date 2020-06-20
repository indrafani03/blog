@extends('admin.layout.app')
@section('judul', 'Users edit')
@section('header-section')
    <h4>Category</h4>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Users</a></div>
        <div class="breadcrumb-item"><a href="#">Edit</a></div>
        
      </div>
@endsection
@section('conten')
      <div class="row">
          <div class="col-lg">
            <div class="card">
                <div class="card-header">
                  <h4>User edit</h4>
                  
                </div>
                <div class="card-body">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                        <h4>Edit User</h4>
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
                        <form action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                                </div>  
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ $user->email }}" readonly>
                                </div>  
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" >
                                </div>  
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilh User Role</label>
                                    <select class="form-control" name="role_id" id="exampleFormControlSelect1">
                                      <option selected>Pilih User Role</option>
                                     
                                      <option value="1"  @if ($user->role_id == 1)  
                                          selected
                                        @endif
                                        >Admin</option>
                                      <option value="2" @if ($user->role_id == 0 )
                                         selected
                                          
                                        @endif
                                        >Penulis</option>
                                    </select>
                                  </div>  
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                            </form>
                        </div>
                        </div>
                    </div>
@endsection
                       




