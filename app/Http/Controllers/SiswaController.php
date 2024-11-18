<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

Validator::extend('alpha_dot_uppercase_numeric', function ($attribute, $value, $parameters, $validator) {
    return preg_match('/^[\d.A-Z]+$/', $value);
});

class SiswaController extends Controller
{
    function addBelajar(){
        // $siswa = DB::table('t_siswa')->orderBy('nama_lengkap', 'ASC')->get();
        $siswa = Siswa::orderBy('jenis_kelamin')->get();
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
            'jurusan' => 'required',
            'kelas' => 'required',
            'golongan_darah' => 'required'
        ]);

        $input = $request->all();

        $siswa = new Siswa();
        $siswa -> nis = $input['nis'];
        $siswa -> nama_lengkap = $input['nama_lengkap'];
        $siswa -> kelas = $input['kelas'];
        $siswa -> jenis_kelamin = $input['jenis_kelamin'];
        $siswa -> jurusan = $input['jurusan'];
        $siswa -> golongan_darah = $input['golongan_darah'];

        // unset($input['_token']);
        // $status = DB::table('t_siswa')->insert($input);

        $status = $siswa->save();
        if($status){
            return redirect('/siswa')->with('success', 'Data berhasil ditambahkan');
        } else{
            return redirect('/siswa/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    function editSiswa(Request $request, $id){
        $siswa = Siswa::find($id);
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
        // unset($input['_token']);
        // unset($input['_method']);
        // $status = DB::table('t_siswa')->where('id', $id)->update($input);

        $siswa = Siswa::find($id);
        $siswa -> nis = $input['nis'];
        $siswa -> nama_lengkap = $input['nama_lengkap'];
        $siswa -> jenis_kelamin = $input['jenis_kelamin'];
        $siswa -> kelas = $input['kelas'];
        $siswa -> jurusan = $input['jurusan'];
        $siswa -> golongan_darah = $input['golongan_darah'];

        $status = $siswa->update();

        if($status){
            return redirect('/siswa')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/siswa/edit/' . $id)->with('error', 'Data tidak berhasil diubah');
        }
    }

   function destroySiswa($id){
    // $status = DB::table('t_siswa')->where('id', $id)->delete();

    $siswa = Siswa::find($id);
    $status = $siswa->delete();

    if($status){
        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }else{
        return redirect('/siswa')->with('error', 'Data gagal dihapus');
    }
   }
}
