<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->get();
        $categories = Category::all();

        return view('welcome', compact('books','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::with('category')->get();
        $categories = Category::all();

        return view('landingpage.daftarBuku', compact('books','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Ambil ID pengguna saat ini
    $userId = Auth::user()->id;

    // Ambil pengguna saat ini berdasarkan ID
    $user = User::find($userId);

    // Tentukan batasan jumlah maksimum peminjaman
    $maxPeminjaman = 3;

    // Lakukan validasi
    $countPeminjaman = $user->peminjamans()
        ->whereIn('status', ['sedang dipinjam', 'menunggu persetujuan admin'])
        ->count();

    if ($countPeminjaman >= $maxPeminjaman) {
        // Jika melebihi batas, kembalikan pesan kesalahan
        return back()->with('error', 'Anda telah mencapai batas maksimum peminjaman buku.');
    }

    $request->validate([
        'user_id' => 'required',
        'book_id' => 'required',
        'tanggal_pinjam' => 'required|date',
    ]);

    $tanggalPinjam = Carbon::parse($request->tanggal_pinjam);
    $tanggalKembali = Carbon::parse($request->tanggal_pengembalian);
    $tanggalWajibKembali = $tanggalPinjam->copy()->addWeek();

    $peminjaman = new Peminjaman();
    $peminjaman->user_id = $request->user_id;
    $peminjaman->book_id = $request->book_id;
    $peminjaman->tanggal_pinjam = $tanggalPinjam;
    $peminjaman->tanggal_wajib_kembali = $tanggalWajibKembali;
    $peminjaman->status = 'menunggu persetujuan admin'; // Atur status peminjaman
    $peminjaman->save();

    // Mengurangi stok buku
    $book = Book::find($request->book_id);
    $book->stok -= 1;
    $book->save();

    return back()->with('success', 'Pengajuan berhasil, tunggu konfirmasi dari admin melalui email!');
}

    
    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $book = Book::findOrFail($id);
    $user = User::all();
        $categories = Category::all();
    return view('landingpage.show', compact('book','categories','user'));
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
    public function destroy(string $id)
    {
        //
    }
    public function search(Request $request)
{
    $query = $request->input('query');
    $books = [];

    if ($query) {
        $books = Book::where('title', 'LIKE', '%' . $query . '%')->get();
    }

    return view('books.search_results', compact('books'));
}

}
