<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function index(){
        $guru = Guru::orderBy('nama_guru')->get();
        return view('guru', compact('guru'));
    }

    public function create(){
        return view('guru.form');
    }

    function store(Request $request){
        
        $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required|string',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            
        ]);

        $input = $request->all();

        $guru = new Guru();
        $guru -> nip = $input['nip'];
        $guru -> nama_guru = $input['nama_guru'];
        $guru -> jenis_kelamin = $input['jenis_kelamin'];
        $guru -> alamat = $input['alamat'];
       

        // unset($input['_token']);
        // $status = DB::table('t_siswa')->insert($input);

        $status = $guru->save();
        if($status){
            return redirect('/guru')->with('success', 'Data berhasil ditambahkan');
        } else{
            return redirect('/guru/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    function edit(Request $request, $id){
        $guru = Guru::find($id);
        return view('guru.form', compact('guru'));
    }

    function update(Request $request, $id){
        
        $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required|string',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            
        ]);

        $input = $request->all();

        $guru =  Guru::find($id);
        $guru -> nip = $input['nip'];
        $guru -> nama_guru = $input['nama_guru'];
        $guru -> jenis_kelamin = $input['jenis_kelamin'];
        $guru -> alamat = $input['alamat'];
       

        // unset($input['_token']);
        // $status = DB::table('t_siswa')->insert($input);

        $status = $guru->update();
        if($status){
            return redirect('/guru')->with('success', 'Data berhasil ditambahkan');
        } else{
            return redirect('/guru/create')->with('error', 'Data gagal ditambahkan');
        }
    }

    function destroy($id){
        $guru = Guru::find($id);
        $status = $guru->delete();
        if($status){
            return redirect('/guru')->with('success', 'Data berhasil dihapus');
        }else{
            return redirect('/guru')->with('error', 'Data gagal dihapus');
        }
    }
}
