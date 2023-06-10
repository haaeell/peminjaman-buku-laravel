@extends ('layouts.dashboard')

@section('content')
@section('judul', 'Table Users')

@if (session('success'))
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
              <!-- Tambah Users -->
              <button type="button" class="btn btn-primary ml-4" data-toggle="modal" data-target="#modalTambah">
                  Tambah
              </button>
                <div class="table-responsive p-4">
                    <table class="table table-striped" id="table_id">
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
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}
                                    </td>
                                    <td>{{ $user->email }}
                                    </td>
                                    <td>
                                        <img alt="image" src="{{ asset('stisla/assets') }}/img/avatar/avatar-5.png"
                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                            title="Wildan Ahdian">
                                    </td>
                                    <td>
                                        <div class="badge badge-success">{{ $user->role->name }}</div>
                                    </td>
                                    <td>
                                      <div class="d-flex">
                                          <button class="btn btn-danger btn-delete" data-id="{{ $user->id }}">Hapus</button>
                                          <button class="btn btn-warning " data-id="{{ $user->id }}">Edit</button>
                                          <button class="btn btn-info " data-id="{{ $user->id }}">Reset Password</button>
                                    
                                      
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

@section('modal')
<!-- Modal -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahTitle">Tambah User</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUserForm" action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="role_id" class="form-label">Role</label>
                        <select name="role_id" class="form-control" id="role_id">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control"
                            id="konfirmasi_password">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
    $('#addUserForm').submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr('action');
        var method = form.attr('method');
        var data = form.serialize();
        var password = $('#password').val();
        var konfirmasiPassword = $('#konfirmasi_password').val();

        // Validasi password minimal 5 karakter
        if (password.length < 5) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Password harus minimal 5 karakter!',
                showConfirmButton: true
            });
            return; // Berhenti eksekusi jika validasi tidak terpenuhi
        }

        // Validasi konfirmasi password harus sama dengan password
        if (password !== konfirmasiPassword) {
            Swal.fire({
                icon: 'warning',
                title: 'Peringatan',
                text: 'Konfirmasi password harus sama dengan password!',
                showConfirmButton: true
            });
            return; // Berhenti eksekusi jika validasi tidak terpenuhi
        }

        $.ajax({
            url: url,
            type: method,
            data: data,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 1500
                }).then(function() {
                    location.reload();
                });
            },
            error: function(xhr) {
                var errorMessage = '';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;

                    // Mengambil pesan kesalahan validasi dari server
                    Object.keys(errors).forEach(function(key) {
                        errorMessage += '<li>' + errors[key][0] + '</li>';
                    });
                } 

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorMessage,
                    showConfirmButton: true
                });
            }
        });
    });
});

    // delete
    $(document).ready(function() {
    // Event listener untuk tombol "Hapus"
    $('.btn-delete').click(function() {
        var userId = $(this).data('id');
        
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data pengguna akan dihapus secara permanen!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal'
        }).then(function(result) {
            if (result.isConfirmed) {
                // Mengambil token CSRF dari meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Konfigurasi headers untuk menyertakan token CSRF
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });

                // Kirim permintaan penghapusan menggunakan Ajax
                $.ajax({
                    url: '/users/' + userId,
                    type: 'DELETE',
                    success: function(response) {
                        if (response.error) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan',
                                text: response.message,
                                showConfirmButton: true
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Sukses',
                                text: response.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(function() {
                                location.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
            }
        });
    });
});



</script>

@endsection
