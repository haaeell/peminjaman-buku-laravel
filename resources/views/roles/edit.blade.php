@extends ('layouts.dashboard')

@section('content')
@section('judul', 'Edit Roles')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="myForm" action="{{ route('roles.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="card-header">
                            <h4>Edit Role</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label>Nama</label>
                                <input type="text" name="name" value="{{$role->name}}" class="form-control" required>
                                <div class="invalid-feedback">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label>Deskripsi</label>
                                <input type="text" name="description" value="{{$role->description}} " class="form-control" required>
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
    </div>
@endsection

