<?php

namespace App\Http\Controllers\Admin;

use App\Models\Soal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoalController extends Controller
{
     /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:soal.index|soal.create|soal.edit|soal.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soal = Soal::latest()->when(request()->q, function($soal) {
            $soal = $soal->where('nama_mk', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.soal.index', compact('soal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.soal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_mk' => 'required',
            'dosen' => 'required',
            'jumlah_soal' => 'required',
            'keterangan' => 'required'
        ]);

        $soal = Soal::create([
            'nama_mk' => $request->nama_mk,
            'dosen' => $request->dosen,
            'jumlah_soal' => $request->jumlah_soal,
            'keterangan' => $request->keterangan
        ]);

        if($soal){
            //redirect dengan pesan sukses
            return redirect()->route('admin.soal.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.soal.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        return view('admin.soal.edit', compact('soal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal $soal)
    {
       $request->validate([
        'nama_mk' => 'required',
        'dosen' => 'required',
        'jumlah_soal' => 'required',
        'keterangan' => 'required'
       ]);

        $soal = Soal::findOrFail($soal->id);
        $soal->update([
            'nama_mk' => $request->nama_mk,
            'dosen' => $request->dosen,
            'jumlah_soal' => $request->jumlah_soal,
            'keterangan' => $request->keterangan,
        ]);

        if($soal){
            //redirect dengan pesan sukses
            return redirect()->route('admin.soal.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('admin.soal.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        if($soal){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
