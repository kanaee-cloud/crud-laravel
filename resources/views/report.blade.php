<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <h1 class="text-black font-semibold text-2xl underline decoration-accent">Absen Guru</h1>
        <div class="flex justify-between gap-x-4">
            <form action="{{ url('report') }}" method="POST" class="border border-solid p-4 w-full ">
                @csrf
                <div class="flex justify-between mb-4 items-center">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="border border-solid p-2">
                </div>
                <div class="flex justify-between mb-4 items-center">
                    <label for="option">Guru Jurusan</label>
                    <select name="option" id="option" class="border border-solid p-2">
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                        <option value="Teknik Ketenagalistrikan">Teknik Ketenagalistrikan</option>
                    </select>
                </div>
                <div class="flex justify-between mb-4 items-center">
                    <label for="date">Tanggal</label>
                    <input type="date" name="date" id="date" class="border border-solid p-2">
                </div>
                <div class="flex justify-between mb-4 items-center">
                    <label for="Kehadiran">Kehadiran</label>
                    <input type="radio" name="kehadiran" id="kehadiran">
                </div>
                <button type="submit" class="bg-accent w-full p-2">Kirim</button>
            </form>
            @if(isset($nama) && isset($option) && isset($date))
                <div class="bg-gray-200 p-4 flex justify-center items-center flex-col w-full">
                    <h1 class="text-black">{{ $nama }}</h1>
                    <p>Guru Jurusan : {{ $option }}</p>
                    <p>Tanggal Hadir : {{ $date }}</p>
                </div>
            @else
                <div class="bg-gray-200 p-4 flex justify-center items-center w-full">
                    <p class="">
                        Kamu belum absen hari ini
                    </p>
                </div>

            @endif
        </div>
    @endsection

</body>

</html>
