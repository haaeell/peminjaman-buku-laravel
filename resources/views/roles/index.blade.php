@extends ('layouts.dashboard')

@section('content')
@section('judul', 'Table Roles')
@if(session('success'))
<div class="alert alert-success alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>×</span>
      </button>
      {{ session('success') }}
    </div>
  </div>
@endif

<div class="row mt-3">
    
    <div class="col-md-4">
        <div class="card">

            <div class="card-body">
                <form id="myForm" action="{{ route('roles.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-header">
                        <h4>Tambah Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Deskripsi</label>
                            <input type="text" name="description" class="form-control" required>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card p-3">
            <div class="card-header">
                <h4>Daftar Roles</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            
                            <tr>
                                <td>{{$loop->iteration}}</td>

                                <td>
                                    <div class="badge badge-success">{{$role->name}}</div>
                                </td>
                                <td>{{$role->description}}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('roles.edit',$role->id)}}" class="btn btn-warning mr-1">Edit</a>
                                        <form method="POST" action="{{ route('roles.destroy', $role->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger delete-button"
                                                data-name="{{ $role->name }}"
                                                data-id="{{ $role->id }}">Hapus</button>
                                        </form>
                                    </div>
                                   
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

