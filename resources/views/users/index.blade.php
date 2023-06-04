
@extends ('layouts.dashboard')

@section('content')
@section('judul','Table Users')
 <!-- Tambah Users -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
    Tambah
</button>
<div class="row mt-3">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Daftar Users</h4>
          <div class="card-header-action">
            <form>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Foto</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Admin 1  
                  </td>
                  <td>Admin@gmail.com  
                  </td>
                  <td>
                    <img alt="image" src="{{asset('stisla/assets')}}/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                  </td>
                  <td><div class="badge badge-success">Admin</div></td>
                  <td>
                      <a href="#" class="btn btn-info">Detail</a>
                      <a href="#" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-danger">Hapus</a>
                </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Tambah Pengguna -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Pengguna -->
                <form id="createForm">
                    @csrf
                    <!-- Isi form dengan input yang dibutuhkan -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="createUser">Simpan</button>
            </div>
        </div>
    </div>
</div>

@endsection
