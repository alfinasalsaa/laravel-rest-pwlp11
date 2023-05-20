<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MahasiswaResource::collection(Mahasiswa::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMahasiswaRequests $request)
    {
        // return response()->json('hello');

        return new MahasiswaResource(Mahasiswa::create([
            'Nim' =>$request->nim,
            'Nama' =>$request->nama,
            'Tanngal_Lahir' =>$request->tanggal_lahir,
            'Jurusan' =>$request->jurusan,
            'No_Handphone' =>$request->no_handphone,
            'Email' =>$request->email,
            'Kelas_id' =>$request->kelas_id,
        ]));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return new MahasiswaResource($mahasiswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $mahaisswa->update([
            'Nim' =>$request->nim,
            'Nama' =>$request->nama,
            'Tanngal_Lahir' =>$request->tanggal_lahir,
            'Jurusan' =>$request->jurusan,
            'No_Handphone' =>$request->no_handphone,
            'Email' =>$request->email,
            'Kelas_id' =>$request->kelas_id,
        ]);
        return new MahasiswaResource($mahasiswa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return response()->noContent();
    }
}
