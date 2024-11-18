<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view ('report');
    }

    public function generate(Request $request){

        $request->validate([
            'nama' => 'required|string',
            'option' => 'required|string',
            'date' => 'required|date'
        ]);

        $nama = $request->input('nama');
        $option = $request->input('option');
        $date = $request->input('date');

        return view('report', compact('nama', 'option', 'date'));
    }
}
