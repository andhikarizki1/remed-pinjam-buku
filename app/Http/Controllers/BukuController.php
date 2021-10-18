<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use Image;
use DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $buku = Buku::all();
        // return view('admin.buku.index', compact('buku'));

        $buku = DB::table('table_buku')
        ->join('table_kategori', 'table_buku.kategori', '=', 'table_kategori.kategori')
        ->select('table_buku.id_buku','table_buku.judul_buku', 'table_buku.deskripsi', 'table_kategori.deskripsi as kategori', 'table_buku.cover_img')
        ->get();

        // return $buku;
        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $buku = Buku::all();
        return view('admin.buku.tambah', compact('kategori', 'buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('cover_img');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(150, 150)->save(public_path ('uploads/cover_buku/' . $filename) );

        $this->validate($request, [
            'judul_buku' => 'required',
            'deskripsi' => 'required',
            'cover_img' => 'required|image|mimes:jpg,png|max:2048',
        ]);

        Buku::create([
            'judul_buku' => request('judul_buku'),
            'deskripsi' => request('deskripsi'),
            'kategori' => request('kategori'),
            'cover_img' => $filename,
        ]);
        return redirect()->route('buku.index')->with('pesan','Data Berhasil di Simpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::find($id);
        $kategori = Kategori::all();
        return view('admin.buku.edit', compact('buku', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('cover_img');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(150, 150)->save(public_path ('uploads/cover_buku/' . $filename) );

        $this->validate($request, [
            'judul_buku' => 'required',
            'deskripsi' => 'required',
            'cover_img' => 'required|image|mimes:jpg,png|max:2048'
        ]);

        Buku::find($id)->update([
            'judul_buku' => request('judul_buku'),
            'deskripsi' => request('deskripsi'),
            'kategori' => request('kategori'),
            'cover_img' => $filename,
        ]);
        return redirect()->route('buku.index')->with('pesan','Data Berhasil di Ganti!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id); 
        $buku->delete();
        return redirect()->route('buku.index')->with('pesan', 'Data berhasil di Hapus!');
    }
}
