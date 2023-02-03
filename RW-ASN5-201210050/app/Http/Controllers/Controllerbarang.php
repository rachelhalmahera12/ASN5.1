<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as baseController;
use Illuminate\Http\Request;
use App\Models\barang;

class Controllerbarang extends Controller
{
    public function create (Request $request)
    {
        $data = $request->all();
        $barang = barang :: create($data);

        return response()->json($barang);
    }

    public function index ()
    {
        $barang = barang::all();
        return response()->json($barang);
    }

    public function detail ($id)
    {
        $barang = barang::find($id);
        return response()->json($barang);
    }

    public function update (Request $request, $id)
    {
        $barang = barang:: whereId ($id)->update
        (['nama_barang' => $request->input('nama_barang'),
        'kategori_barang' =>$request->input('kategori_barang'),
        'satuan' =>$request->input('satuan'),
        'harga' =>$request->input('harga'),
        'deskripsi_barang' =>$request->input('deskripsi_barang'),
        
    ]);

    if($barang)
    {
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Update',
            'data' => $barang
        ],201);
    }
    else{
        return response()->json([
            'success' => false,
            'message' => 'Data Gagal di Update',
        ],400);
        }
    }

    public function delete ($id)
    {
        $barang = barang::whereId($id)->first();
        $barang->delete();

        if($barang)
        {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil di Hapus'
            ],200);
        }
    }
}