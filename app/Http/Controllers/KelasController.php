<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Kelas;

Validator::extend('alpha_dot_uppercase_numeric', function ($attribute, $value, $parameters, $validator) {
    return preg_match('/^[\d.A-Z]+$/', $value);
});
class KelasController extends Controller
{
    function addKelas(){
        $jurusan = Kelas::orderBy('nama_kelas')->get();
        return view('kelas', compact('jurusan'));
    }

    function createKelas(){
        return view('kelas.form');
    }

    function storeKelas(Request $request){
        
        $request->validate([
            'nama_kelas' => 'required|string',
           'jurusan' => 'required|string|in:Teknik Audio Visual,Desain Komunikasi Visual,Rekayasa Perangkat Lunak, Teknik Ketenagalistrikan, Teknik Otomasi Industri',
            'lokasi_ruangan' => 'required|regex:/^[A-Z0-9.]+$/',
            'nama_wali_kelas' => 'required'
        ]);

        $input = $request->all();

        $jurusan = new Kelas();
        $jurusan -> nama_kelas = $input['nama_kelas'];
        $jurusan -> jurusan = $input['jurusan'];
        $jurusan -> lokasi_ruangan = $input['lokasi_ruangan'];
        $jurusan -> nama_wali_kelas = $input['nama_wali_kelas'];
        

        // unset($input['_token']);
        $status = $jurusan->save();
        if($status){
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
        } else{
            return redirect('/kelas/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    function editKelas(Request $request, $id){
        $jurusan = Kelas::find($id);
        return view('kelas.form', compact('jurusan'));
    }

    function updateKelas(Request $request, $id){
        $request->validate([
            'nama_kelas' => 'required|string',
            'jurusan' => 'required|string',
            'lokasi_ruangan' => 'required',
            'nama_wali_kelas' => 'required'
        ]);

        $input = $request->all();

        $jurusan = Kelas::find($id);
        $jurusan -> nama_kelas = $input['nama_kelas'];
        $jurusan -> jurusan = $input['jurusan'];
        $jurusan -> lokasi_ruangan = $input['lokasi_ruangan'];
        $jurusan -> nama_wali_kelas = $input['nama_wali_kelas'];

        // unset($input['_token']);
        // unset($input['_method']);
        $status = $jurusan->update();

        if($status){
            return redirect('/kelas')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/kelas/edit/' . $id)->with('error', 'Data tidak berhasil diubah');
        }
    }

   function destroyKelas($id){
    $jurusan = Kelas::find($id);
    $status = $jurusan->delete();
    if($status){
        return redirect('/kelas')->with('success', 'Data berhasil dihapus');
    }else{
        return redirect('/kelas')->with('error', 'Data gagal dihapus');
    }
   }
}
