<?php

namespace App\Http\Controllers;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penjualan = Penjualan::all();
        return view ('data_penjualan.index', compact('penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('data_penjualan.form_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'nama_pelanggan' => 'required',
            'tanggal_penjualan' => 'required',
            'total_harga' => 'required',
        ],
        [
            'nama_pelanggan.required' => 'nama pelanggan wajib di isi',
            'tanggal_penjualan.required' => 'tanggal penjualan wajib di isi',
            'total_harga.required' => 'total harga wajib di isi',

        ]
        );
        $data = [
            'nama_pelanggan' => $request->nama_pelanggan,
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'total_harga' => $request->total_harga,
        ];

        Penjualan::create($data);
        return redirect()->route('penjualan.index')->with('succes', 'data berhasil di simpan');
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
        $dt = Penjualan::find($id);
        return view('data_penjualan.form_edit', compact ('dt'));
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
            'nama_pelanggan' => 'required',
            'tanggal_penjualan' => 'required',
            'total_harga' => 'required',
        ],[
            'nama_pelanggan.required' => 'nama pelanggan wajib di isi',
            'tanggal_penjualan.required' => 'tanggal penjualan wajib di isi',
            'total_harga.required' => 'total harga wajib di isi',
        ]
    );
    $data = [
        'nama_pelanggan' => $request->nama_pelanggan,
        'tanggal_penjualan' => $request->tanggal_penjualan,
        'total_harga' => $request->total_harga,
    ];

    Penjualan::where('id', $id)->update($data);
    return redirect()->route('penjualan.index')->with('succes', 'data berhasil di simpan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjualan::find($id)->delete();
        return back()->with('succes', 'data berhasil di hapus');
    }
}
