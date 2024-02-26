<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::all();
        return view ('data_produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_produk.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ],
        [   'nama_produk.required' => 'nama produk wajib di isi',
        'harga.required' => 'harga wajib di isi',
        'stok.required' => 'stok wajib di isi',
        ]
    );
    $data = [
        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ];

    Produk::create($data);
    return redirect()->route('produk.index')->with('succes', 'Data berhasil di simpan');
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
        $dt = Produk::find($id);
        return view('data_produk.form_edit', compact ('dt'));
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
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ],[
            'nama_produk.required' => 'Nama produk wajib di isi',
            'harga.required' => 'Harga wajib di isi',
            'stok.required' => 'Harga wajib di isi',
        ]
    );
    $data = [
        'nama_produk' => $request->nama_produk,
        'harga' => $request->harga,
        'stok' => $request->stok,
    ];

    Produk::where('id', $id)->update($data);
    return redirect()->route('produk.index')->with('succes', 'Data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::find($id)->delete();
        return back()->with('succes', 'Data berhasil di hapus');
    }

    public function export_pdf()
    {
        $data = Produk::OrderBy('nama_produk', 'asc');
        $data = $data->get();
    }
}
