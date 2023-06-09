<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
        ]);

        $tanggalPinjam = Carbon::parse($request->tanggal_pinjam);
        $tanggalKembali = Carbon::parse($request->tanggal_pengembalian);
        $tanggalWajibKembali = $tanggalPinjam->copy()->addWeek();

        $peminjaman = new Peminjaman();
        $peminjaman->user_id = $request->user_id;
        $peminjaman->book_id = $request->book_id;
        $peminjaman->tanggal_pengembalian = $tanggalKembali;
        $peminjaman->tanggal_pinjam = $tanggalPinjam;
        $peminjaman->tanggal_wajib_kembali = $tanggalWajibKembali;
        $peminjaman->save();

        return redirect()->route('landingpage.index')->with('success', 'Pengajuan berhasil , tunggu admin konfirmasi lewat email ya!');
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
}
