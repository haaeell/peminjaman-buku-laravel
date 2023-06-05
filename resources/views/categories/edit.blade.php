@extends ('layouts.dashboard')

@section('content')
@section('judul', 'Edit categories')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form id="myForm" action="{{ route('categories.update', $category->id) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Kategori</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label>Nama</label>
                                <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" required>
                                <div class="invalid-feedback">
                                    {{$errors->first('name')}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label>Color</label>
                                <input type="color" name="color" value="{{$category->color}}" class="form-control @error('color') is-invalid @enderror">

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
    </div>
@endsection
