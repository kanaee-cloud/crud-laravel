<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

Validator::extend('alpha_dot_uppercase_numeric', function ($attribute, $value, $parameters, $validator) {
    return preg_match('/^[\d.A-Z]+$/', $value);
});

class SiswaController extends Controller
{
    function addBelajar(){
        $siswa = DB::table('t_siswa')->orderBy('nama_lengkap', 'ASC')->get();
        return view('belajar', compact('siswa'));
    }

    function addJurusan(){
        $jurusan = "Rekayasa Perangkat Lunak";
        return view('ruangan', compact('jurusan'));
    }

    function createSiswa(){
        return view('siswa.form');
    }

   

    function storeSiswa(Request $request){
        
        $request->validate([
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required',
            'golongan_darah' => 'required'
        ]);

        $input = $request->all();

        unset($input['_token']);
        $status = DB::table('t_siswa')->insert($input);
        if($status){
            return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else{
            return redirect('/siswa/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    function editSiswa(Request $request, $id){
        $siswa = DB::table('t_siswa')->find($id);
        return view('siswa.form', compact('siswa'));
    }

    function updateSiswa(Request $request, $id){
        $request->validate([
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|string',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required|string',
            'golongan_darah' => 'required'
        ]);

        $input = $request->all();
        unset($input['_token']);
        unset($input['_method']);
        $status = DB::table('t_siswa')->where('id', $id)->update($input);
        if($status){
            return redirect('/siswa')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/siswa/edit/' . $id)->with('error', 'Data tidak berhasil diubah');
        }
    }

   function destroySiswa($id){
    $status = DB::table('t_siswa')->where('id', $id)->delete();
    if($status){
        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }else{
        return redirect('/siswa')->with('error', 'Data gagal dihapus');
    }
   }
}
