<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Helpers\ApiFormatter;

class PegawaiController extends Controller
{
    public function index()
    {
     $data = Pegawai::all();

    if($data){
        return ApiFormatter::createApi(200, 'berhasil', $data);
     } 
     else{

        return ApiFormatter::createApi(400, 'gagal', $data);
        
    }
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    try{
    $request->validate([
        'nama'=>'required',
        'jabatan'=>'required',
        'alamat'=>'required',
    ]);
    $pegawai = Pegawai::create([
        'nama'=>'required',
        'jabatan'=>'required',
        'alamat'=>'required',
    ]);

     $data = Pegawai::where('id', '=', $pegawai->id)->get();
     if($data){
        return ApiFormatter::createApi(200, 'berhasil', $data);
     } 
     else{

        return ApiFormatter::createApi(400, 'gagal', $data);
        
    }
} catch (Exception $error){
    return ApiFormatter::createApi(200, 'gagal', $data);
}
    return ApiFormatter::createApi(400, 'gagal', $data);
    }

    public function show($id)
    {
    $data = Pegawai::where('id', '=', $id)->get();
     if($data){
        return ApiFormatter::createApi(200, 'berhasil', $data);
     } 
     else{

        return ApiFormatter::createApi(400, 'gagal', $data);  
    }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nama'=>'required',
                'jabatan'=>'required',
                'alamat'=>'required'
            ]);

    $pegawai= Pegawai::findOrFail($id);
  $pegawai = Pegawai::update([
    'nama'=>$request->nama,
    'jabatan'=>$request->jabatan,
    'alamat'=>$request->alamat
    ]);

    $data = Pegawai::where('id', '=', $pegawai->id)->get();

     if($data){
        return ApiFormatter::createApi(200, 'berhasil menghapus data', $data);
     } 
     else{

        return ApiFormatter::createApi(400, 'gagal', $data);
        
    }
} catch (Exception $error) {
    return ApiFormatter::createApi(400, 'gagal', $data);
}
}


    public function destroy($id)
    {
   try{
    $pegawai = Pegawai::findOrFail($id);
    $data = $pegawai->delete();

     if($data){
        return ApiFormatter::createApi(200, 'berhasil menghapus data', $data);
     } 
     else{

        return ApiFormatter::createApi(400, 'gagal', $data);       
    }
 } 
catch (Exception $error) {
    return ApiFormatter::createApi(400, 'gagal', $data);       
}
}
}
    

