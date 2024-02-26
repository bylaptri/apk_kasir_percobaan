<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view ('data_pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_pelanggan.form_create');
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
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ],
        [ 'nama_pelanggan.required' => 'nama pelanggan wajib di isi',
        'alamat.required' => 'alamat wajib di isi',
        'nomor_telepon.required' => 'nomor telepon wajib di isi',
        ]
    );
    $data = [
        'nama_pelanggan' => $request->nama_pelanggan,
        'alamat' => $request->alamat,
        'nomor_telepon' => $request->nomor_telepon,
    ];

    Pelanggan::create($data);
    return redirect()->route('pelanggan.index')->with('succes', 'Data berhasil di simpan');
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
        $dt = Pelanggan::find($id);
        return view('data_pelanggan.form_edit', compact ('dt'));
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
            'alamat' => 'required',
            'nomor_telepon' => 'required',
        ],[
            'nama_pelanggan.required' => 'nama pelanggan wajib di isi',
            'alamat.required' => 'alamat wajib di isi',
            'nomor_telepon.required' => 'nomor telepon wajib di isi',
        ]
    );
    $data = [
        'nama_pelanggan' => $request->nama_pelanggan,
        'alamat' => $request->alamat,
        'nomor_telepon' => $request->nomor_telepon,
    ];

    Pelanggan::where('id', $id)->update($data);
    return redirect()->route('pelanggan.index')->with('succes', 'data berhasil di simpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pelanggan::find($id)->delete();
        return back()->with('succes', 'data berhasil di simpan');
    }
}
