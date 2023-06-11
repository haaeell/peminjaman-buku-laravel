<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\KirimMail;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $peminjamans = Peminjaman::orderBy('approved', 'asc')->get();
    $belumDisetujuiCount = Peminjaman::where('approved', 0)->count();

    return view('peminjaman.index', compact('peminjamans', 'belumDisetujuiCount'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $books = Book::all();

        return view('peminjaman.tambah', compact('users', 'books'));
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
    ]);

    $book = Book::find($request->book_id);

    if ($book->stok > 0) {
        $tanggalPinjam = Carbon::parse($request->tanggal_pinjam);
        $tanggalWajibKembali = $tanggalPinjam->copy()->addWeek();

        $peminjaman = new Peminjaman();
        $peminjaman->user_id = $request->user_id;
        $peminjaman->book_id = $request->book_id;
        $peminjaman->tanggal_pinjam = $tanggalPinjam;
        $peminjaman->tanggal_wajib_kembali = $tanggalWajibKembali;
        $peminjaman->save();

        // Mengurangi stok buku
        $book->stok -= 1;
        $book->save();

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman created successfully!');
    } else {
        return redirect()->route('peminjaman.index')->with('error', 'Stok buku habis!');
    }
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
        $peminjaman = Peminjaman::findOrFail($id);
        $users = User::all();
        $books = Book::all();

        return view('peminjaman.edit', compact('peminjaman', 'users', 'books'));
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $request->validate([
            'tanggal_pengembalian' => 'required|date',
        ]);

        $tanggalPengembalian = Carbon::parse($request->tanggal_pengembalian);

        $peminjaman->tanggal_pengembalian = $tanggalPengembalian;
        $peminjaman->denda = 0;

        if ($tanggalPengembalian->greaterThan($peminjaman->tanggal_wajib_kembali)) {
            $selisihHari = $tanggalPengembalian->diffInDays($peminjaman->tanggal_wajib_kembali);
            $peminjaman->denda = $selisihHari * 1000; //Denda Rp 1.000 per hari terlambat
        }

        $peminjaman->save();
        

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $peminjaman = Peminjaman::find($id);
    $peminjaman->delete();

    return redirect()->route('peminjaman.index')->with('success', 'Berhasil hapus peminjaman');
}
    public function approvePeminjaman($id)
{

    $peminjaman = Peminjaman::findOrFail($id);
    $peminjaman->approved = true;
    $peminjaman->status = 'sedang dipinjam';
    $peminjaman->save();

    // Mengirim email notifikasi ke peminjam
    try {
        $emailData = [
            'name' => $peminjaman->user->name,
            'message' => 'Peminjaman Anda telah disetujui. Silakan ambil barang di toko.',
        ];
        Mail::to($peminjaman->user->email)->send(new KirimMail($emailData));
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan dalam pengiriman email notifikasi: ' . $e->getMessage());
    }

    return redirect()->route('peminjaman.index')->with('success', 'Peminjaman disetujui dan email notifikasi telah dikirim.');
}



}
