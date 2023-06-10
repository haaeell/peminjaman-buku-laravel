<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->get();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('books.tambah',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $messages = [
        'required' => 'Kolom :attribute harus diisi.',
        'image' => 'File :attribute harus berupa gambar.',
        'mimes' => 'File :attribute harus memiliki format PNG, JPG, atau JPEG.',
        'min' => 'Kolom :attribute harus memiliki nilai minimal :min.',
    ];

    $data = $request->validate([
        'title' => 'required',
        'image' => 'required|image|mimes:png,jpg,jpeg',
        'publisher' => 'required',
        'author' => 'required',
        'category_id' => 'required',
        'year' => 'required',
        'description' => 'required',
        'stok' => 'required|integer|min:0'
    ], $messages);

    if ($image = $request->file('image')) {
        $path = 'public/posts';
        $namaGambar = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($path, $namaGambar);
        $data['image'] = $namaGambar;
    }

    $book = Book::create($data);

    return redirect()->route('books.index')->with('success', 'Data Berhasil diTambah!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::all();
        $book = Book::find($id);
        return view('books.view', compact('book', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $book = Book::find($id);
        return view('books.edit', compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $messages = [
        'required' => 'Kolom :attribute harus diisi.',
        'image' => 'File :attribute harus berupa gambar.',
        'mimes' => 'File :attribute harus memiliki format PNG, JPG, atau JPEG.',
        'min' => 'Kolom :attribute harus memiliki nilai minimal :min.',
    ];

    $data = $request->validate([
        'title' => 'required',
        'image' => 'nullable|image|mimes:png,jpg,jpeg',
        'publisher' => 'required',
        'author' => 'required',
        'category_id' => 'required',
        'year' => 'required',
        'description' => 'required',
        'stok' => 'required|integer|min:0'
    ], $messages);

    $book = Book::findOrFail($id);

    if ($image = $request->file('image')) {
        $path = 'public/posts';

        // Menghapus gambar lama jika ada
        if ($book->image) {
            Storage::delete($path . '/' . $book->image);
        }

        $namaGambar = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($path, $namaGambar);
        $data['image'] = $namaGambar;
    }

    $book->update($data);

    return redirect()->route('books.index')->with('success', 'Data berhasil diupdate!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $book = Book::find($id);

    // Menghapus file gambar jika ada
    if ($book->image) {
        $path = 'public/posts';
        Storage::delete($path . '/' . $book->image);
    }
    

    $book->delete();

    return redirect()->route('books.index')->with('success', 'Berhasil hapus buku');
}

}
