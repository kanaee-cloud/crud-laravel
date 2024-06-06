<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

Validator::extend('alpha_dot_uppercase_numeric', function ($attribute, $value, $parameters, $validator) {
    return preg_match('/^[\d.A-Z]+$/', $value);
});
class KelasController extends Controller
{
    function addKelas(){
        $jurusan = DB::table('t_kelas')
        ->orderBy('nama_kelas', 'ASC')
        ->get();
        return view('kelas', compact('jurusan'));
    }

    function createKelas(){
        return view('kelas.form');
    }

    function storeKelas(Request $request){
        
        $request->validate([
            'nama_kelas' => 'required|string',
            'jurusan' => 'required|string',
            'lokasi_ruangan' => 'required|alpha_dot_uppercase_numeric',
            'nama_wali_kelas' => 'required'
        ]);

        $input = $request->all();
        unset($input['_token']);
        $status = DB::table('t_kelas')->insert($input);
        if($status){
            return redirect('/kelas')->with('success', 'Data berhasil ditambahkan');
        } else{
            return redirect('/kelas/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    function editKelas(Request $request, $id){
        $jurusan = DB::table('t_kelas')->find($id);
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
        unset($input['_token']);
        unset($input['_method']);
        $status = DB::table('t_kelas')->where('id', $id)->update($input);
        if($status){
            return redirect('/kelas')->with('success', 'Data berhasil diubah');
        }else{
            return redirect('/kelas/edit/' . $id)->with('error', 'Data tidak berhasil diubah');
        }
    }

   function destroyKelas($id){
    $status = DB::table('t_kelas')->where('id', $id)->delete();
    if($status){
        return redirect('/kelas')->with('success', 'Data berhasil dihapus');
    }else{
        return redirect('/kelas')->with('error', 'Data gagal dihapus');
    }
   }
}
