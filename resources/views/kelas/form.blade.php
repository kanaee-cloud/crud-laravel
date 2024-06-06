<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label{
            font-weight: 700;
        }
    </style>
</head>
<body>
   
    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    @session('error')
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endsession

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Perhatian</strong>
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('kelas', @$jurusan->id ) }}" method="POST">
        <h1 class="text-center">FORM KELAS</h1>
        @csrf

        @csrf

        @if(!empty(@$jurusan)){
            @method('PATCH')
        }
        @endif
        <div class="mb-3">
            <label for="namakelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" name="nama_kelas" id="namakelas" value="{{ old('nama_kelas', @$jurusan->nama_kelas) }}">
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select class="form-select" name="jurusan" id="jurusan" value="{{ old('jurusan') }}">
                <option value="">Pilih Jurusan</option>
                <option value="Rekayasa Perangkat Lunak" {{ old('jurusan', @$jurusan->jurusan) == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                <option value="Desain Komunikasi Visual" {{ old('jurusan', @$jurusan->jurusan) == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                <option value="Teknik Ketenagalistrikan" {{ old('jurusan', @$jurusan->jurusan) == 'Teknik Ketenagalistrikan' ? 'selected' : '' }}>Teknik Ketenagalistrikan</option>
                <option value="Teknik Audio Video" {{ old('jurusan', @$jurusan->jurusan) == 'Teknik Audio Video' ? 'selected' : '' }}>Teknik Audio Video</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Lokasi Ruangan</label>
            <input type="text" class="form-control" name="lokasi_ruangan" id="lokasi_ruangan" value="{{ old('lokasi_ruangan', @$jurusan->lokasi_ruangan) }}">
        </div>
        <div class="mb-3">
            <label for="nama_wali_kelas" class="form-label">Nama Wali Kelas</label>
            <input type="text" class="form-control" name="nama_wali_kelas" id="nama_wali_kelas" value="{{ old('nama_wali_kelas', @$jurusan->nama_wali_kelas) }}">
        </div>
        <button type="submit" class="btn btn-warning form-control">Simpan</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-BUoZyjzCg+tnOz4L+9tjJEMN4S+xBTxg3fTq3/a6wwzV5wq2JwFkZ5TCt0tX4iS5" crossorigin="anonymous"></script>
</body>
</html>
