@extends ('layouts.dashboard')

@section('content')
@section('judul', 'Tabel Kategori')
@section('title', 'Tabel Kategori')
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
@if(session('error'))
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
      <button class="close" data-dismiss="alert">
        <span>×</span>
      </button>
      {{ session('error') }}
    </div>
  </div>
@endif

<div class="row mt-3">
    
    <div class="col-md-4">
        <div class="card">

            <div class="card-body">
                <form id="myForm" action="{{ route('categories.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="card-header">
                        <h4>Tambah Kategori</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" required>
                            <div class="invalid-feedback">
                                {{$errors->first('name')}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label>Color</label>
                            <input type="color" name="color" class="form-control @error('color') is-invalid @enderror" value="#000fff">
                            <div class="invalid-feedback">
                                {{$errors->first('color')}}
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card p-3">
            <div class="card-header">
                <h4>Daftar Kategori</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Warna</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            
                            <tr>
                                <td>{{$loop->iteration}}</td>

                                <td>{{$category->name}}
                                </td>
                                <td>
                                    <div class="badge" style="background-color: {{ $category->color }};">
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning mr-1">Edit</a>
                                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger delete-button"
                                                data-name="{{ $category->name }}"
                                                data-id="{{ $category->id }}">Hapus</button>
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

