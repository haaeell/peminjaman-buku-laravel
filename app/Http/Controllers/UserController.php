<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $users = User::with('role')->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validasi request jika diperlukan
    $messages = [
        'email.required' => 'Email harus diisi.',
        'email.email' => 'Email harus dalam format yang valid.',
        'email.unique' => 'Email sudah digunakan oleh pengguna lain.',
        // Tambahkan pesan kustom untuk aturan validasi lainnya jika diperlukan
    ];
    
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'role_id' => 'required|exists:roles,id',
    ], $messages);
    

    // Simpan data user ke dalam database
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password); // Simpan password terenkripsi
    $user->role_id = $request->role_id;
    $user->save();

    // Kirim respons JSON jika berhasil
    return response()->json(['message' => 'Data berhasil ditambahkan']);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function detail()
    {
        //
        return view('users.detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
{
    // Periksa apakah ada data terhubung dengan pengguna
    $hasRelatedData = DB::table('peminjaman')->where('user_id', $id)->exists();

    if ($hasRelatedData) {
        return response()->json([
            'error' => true,
            'message' => 'Tidak dapat menghapus pengguna karena terhubung dengan data lain.'
        ]);
    }

    // Lanjutkan penghapusan pengguna jika tidak ada data terhubung
    $user = User::findOrFail($id);
    $user->delete();

    return response()->json([
        'error' => false,
        'message' => 'Pengguna berhasil dihapus.'
    ]);
}
}
