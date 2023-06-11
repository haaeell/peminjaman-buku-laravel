<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalians = Peminjaman::where('approved', true)
            ->orderByRaw("CASE WHEN status = 'sedang dipinjam' THEN 0 ELSE 1 END")
            ->orderBy('id', 'desc')
            ->get();
    
        return view('pengembalian.index', compact('pengembalians'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengembalian = Peminjaman::findOrFail($id);
        $users = User::all();
        $books = Book::all();

        return view('pengembalian.edit', compact('pengembalian', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pengembalian = Peminjaman::findOrFail($id);

        $request->validate([
            'tanggal_pengembalian' => 'required|date',
        ]);

        $tanggalPengembalian = Carbon::parse($request->tanggal_pengembalian);

        $pengembalian->tanggal_pengembalian = $tanggalPengembalian;
        $pengembalian->denda = 0;
        $pengembalian->status = 'dikembalikan';

        if ($tanggalPengembalian->greaterThan($pengembalian->tanggal_wajib_kembali)) {
            $selisihHari = $tanggalPengembalian->diffInDays($pengembalian->tanggal_wajib_kembali);
            $pengembalian->denda = $selisihHari * 1000; //Denda Rp 1.000 per hari terlambat
        }

        $pengembalian->save();
        $book = $pengembalian->book;
        $book->stok += 1;
        $book->save();

        return redirect()->route('pengembalian.index')->with('success', 'pengembalian updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
