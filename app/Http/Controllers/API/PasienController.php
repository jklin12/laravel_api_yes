<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PasienResource;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Validator;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::latest()->paginate(5);

        //return collection of posts as a resource
        return new PasienResource(true, 'List Data Posts', $pasien);
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_rekam_medis' => 'required|string|max:255|unique:pasiens',
            'pasien_nama' => 'required|string|max:50',
            'pasien_alamat' => 'required|string|max:255',
            'pasien_telp' => 'required|max:50',
            'pasien_jenis_kelamin' => 'required',
            'pasien_tempat_lahir' => 'required|max:50',
            'pasien_tgl_lahir' => 'date',
            'pasien_pekerjaan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $postVal = $request->all();
        $pasiens = Pasien::create($postVal);

        return new PasienResource(true, 'Data Pasien Berhasil Ditambahkan!', $pasiens);
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
        //
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
        $validator = Validator::make($request->all(), [
            'pasien_nama' => 'required|string|max:50',
            'pasien_alamat' => 'required|string|max:255',
            'pasien_telp' => 'required|max:50',
            'pasien_jenis_kelamin' => 'required',
            'pasien_tempat_lahir' => 'required|max:50',
            'pasien_tgl_lahir' => 'date',
            'pasien_pekerjaan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $postVal = $request->all();
        $pasiens = Pasien::where('no_rekam_medis', $id)
            ->update($postVal);
        if ($pasiens) {
            return new PasienResource(true, 'Data Pasien Berhasil Diupdate!', $pasiens);
        }else{
            return new PasienResource(false, 'Data Pasien tidak ditemukan', $pasiens);
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
        $pasiens = Pasien::find($id);

        if ($pasiens) {
            $pasiens->delete();
            return new PasienResource(true, 'Data Pasien Berhasil Dihapus!', $pasiens);
        }else{
            return new PasienResource(false, 'Data Pasien tidak ditemukan', $pasiens);
        }
    }
}
