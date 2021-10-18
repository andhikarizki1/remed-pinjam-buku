<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Transaksi;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = DB::table('table_transaksi')
        ->join('table_buku', 'table_buku.id_buku', '=', 'table_transaksi.id_buku')
        ->join('table_kategori', 'table_kategori.kategori', '=', 'table_buku.kategori')
        ->join('table_anggota', 'table_transaksi.id_anggota', '=', 'table_anggota.id_anggota')
        ->select('table_transaksi.tgl_pinjam')
        ->get();

        // return $transaksi;
        return view('admin.dashboard', compact('transaksi'));
    }
}