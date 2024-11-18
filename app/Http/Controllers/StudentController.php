<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $data = DB::table('t_siswa')->get();
        return view('student', compact('data'));
    }

    public function kelas(){
        $data = DB::table('t_kelas')
        ->where('jurusan', 'Teknik Audio Visual')
        ->get();
        return view('class', compact('data'));
    }

    public function jurusan(){
        $jurusan = "Rekayasa Perangkat Lunak";
        return view('ruangan', compact('jurusan'));
    }
}
